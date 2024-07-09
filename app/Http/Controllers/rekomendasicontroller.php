<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\chipset;
use App\Models\Kriteria;
use App\Models\modelbobot;
use App\Models\TipeKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Log;
use Schema;

class RekomendasiController extends Controller
{
    public function index()
    {
        $chipsets = chipset::all();
        $chipsetList = session()->get('chipset_list', []);
        $kriteriaList = Kriteria::all();
        return view('user.rekomendasi', compact('chipsetList', 'chipsets', 'kriteriaList'));
    }

    public function process(Request $request)
    {
        // input chipset
        $validated = $request->validate([
            'chipset' => 'required',
        ]);

        $user_preference = $request->input('user_preference');
        $arr_chipset = $request->input('chipset');
        // pilih alternatif where id_chipset in arr_chipset
        $alternatif_datas = Alternatif::whereIn('id', $arr_chipset)->get();
        $alternatifs = [];
        foreach ($alternatif_datas as $alternatif) {
            $alternatifs[] = [
                'id' => $alternatif->id_chipset,
                'name' => $alternatif->name,
                'code' => $alternatif->code,
                'c1' => $alternatif->chipsets->first()->jumlah_clock_prosesor,
                'c2' => $alternatif->chipsets->first()->jumlah_inti_cores,
                'c3' => $alternatif->chipsets->first()->jumlah_thread,
                'c4' => $alternatif->chipsets->first()->kinerja_grafis_cpu,
                'c5' => $alternatif->chipsets->first()->harga,
            ];
        }
        $kriteria_datas = Kriteria::all();
        $kriterias = [];
        foreach ($kriteria_datas as $kriteria) {
            $kriterias[] = [
                'id' => $kriteria->id,
                'name' => $kriteria->name,
                'code' => $kriteria->code,
                'attribute' => $kriteria->attribute,
                'bobot' => $kriteria->bobot,
            ];
        }

        if ($user_preference == 1) {
            $total_kriteria = Kriteria::count();
            // validate nama_chipset, bobot[]
            $validated = $request->validate([
                'user_chipset' => 'required',
                'bobot' => 'required|array|size:' . $total_kriteria,
            ]);
            $arr_bobot = $request->input('bobot');
            $alternatif_tambahan = [
                'id' => 9999,
                'name' => $request->input('user_chipset'),
                'code' => 'PRUSR',
                'c1' => isset($arr_bobot[1]) ? $arr_bobot[1] : 0,
                'c2' => isset($arr_bobot[2]) ? $arr_bobot[2] : 0,
                'c3' => isset($arr_bobot[3]) ? $arr_bobot[3] : 0,
                'c4' => isset($arr_bobot[4]) ? $arr_bobot[4] : 0,
                'c5' => isset($arr_bobot[5]) ? $arr_bobot[5] : 0,
            ];

            $alternatifs[] = $alternatif_tambahan;
        }

        // Normalization step 1: Calculate squares of each criterion
        $normalisasis = [];
        $normalisasi_total = [
            'c1' => 0,
            'c2' => 0,
            'c3' => 0,
            'c4' => 0,
            'c5' => 0,
        ];
        foreach ($alternatifs as $key => $alternatif) {
            $normalisasis[$key] = [
                'id' => $alternatif['id'],
                'name' => $alternatif['name'],
                'code' => $alternatif['code'],
                'c1' => pow($alternatif['c1'], 2),
                'c2' => pow($alternatif['c2'], 2),
                'c3' => pow($alternatif['c3'], 2),
                'c4' => pow($alternatif['c4'], 2),
                'c5' => pow($alternatif['c5'], 2),
            ];
            $normalisasi_total['c1'] += $normalisasis[$key]['c1'];
            $normalisasi_total['c2'] += $normalisasis[$key]['c2'];
            $normalisasi_total['c3'] += $normalisasis[$key]['c3'];
            $normalisasi_total['c4'] += $normalisasis[$key]['c4'];
            $normalisasi_total['c5'] += $normalisasis[$key]['c5'];
        }

        $normalisas_tahap_2 = [];
        foreach ($alternatifs as $key => $alternatif) {
            $normalisas_tahap_2[$key] = [
                'id' => $alternatif['id'],
                'name' => $alternatif['name'],
                'code' => $alternatif['code'],
                'c1' => round($alternatif['c1'] / sqrt($normalisasi_total['c1']), 5),
                'c2' => round($alternatif['c2'] / sqrt($normalisasi_total['c2']), 5),
                'c3' => round($alternatif['c3'] / sqrt($normalisasi_total['c3']), 5),
                'c4' => round($alternatif['c4'] / sqrt($normalisasi_total['c4']), 5),
                'c5' => round($alternatif['c5'] / sqrt($normalisasi_total['c5']), 5),
            ];
        }

        $normalisasi_terbobot = [];
        foreach ($normalisas_tahap_2 as $key => $alternatif) {
            $bobot_c1 = 0;
            $bobot_c2 = 0;
            $bobot_c3 = 0;
            $bobot_c4 = 0;
            $bobot_c5 = 0;
            foreach ($kriterias as $kriteria) {
                if ($kriteria['code'] == 'C1') {
                    $bobot_c1 = $kriteria['bobot'];
                }
                if ($kriteria['code'] == 'C2') {
                    $bobot_c2 = $kriteria['bobot'];
                }
                if ($kriteria['code'] == 'C3') {
                    $bobot_c3 = $kriteria['bobot'];
                }
                if ($kriteria['code'] == 'C4') {
                    $bobot_c4 = $kriteria['bobot'];
                }
                if ($kriteria['code'] == 'C5') {
                    $bobot_c5 = $kriteria['bobot'];
                }
            }
            $normalisasi_terbobot[$key] = [
                'id' => $alternatif['id'],
                'name' => $alternatif['name'],
                'code' => $alternatif['code'],
                'c1' => round($alternatif['c1'] * $bobot_c1, 5),
                'c2' => round($alternatif['c2'] * $bobot_c2, 5),
                'c3' => round($alternatif['c3'] * $bobot_c3, 5),
                'c4' => round($alternatif['c4'] * $bobot_c4, 5),
                'c5' => round($alternatif['c5'] * $bobot_c5, 5),
            ];
        }

        $matriks_solusi_ideal = [];
        $matriks_solusi_ideal = [
            'positif' => [
                'c1' => max(array_column($normalisasi_terbobot, 'c1')), // benefit
                'c2' => max(array_column($normalisasi_terbobot, 'c2')), // benefit
                'c3' => max(array_column($normalisasi_terbobot, 'c3')), // benefit
                'c4' => max(array_column($normalisasi_terbobot, 'c4')), // benefit
                'c5' => min(array_column($normalisasi_terbobot, 'c5')), // cost
            ],
            'negatif' => [
                'c1' => min(array_column($normalisasi_terbobot, 'c1')), // benefit
                'c2' => min(array_column($normalisasi_terbobot, 'c2')), // benefit
                'c3' => min(array_column($normalisasi_terbobot, 'c3')), // benefit
                'c4' => min(array_column($normalisasi_terbobot, 'c4')), // benefit
                'c5' => max(array_column($normalisasi_terbobot, 'c5')), // cost
            ]
        ];

        $total = [];
        foreach ($normalisasi_terbobot as $key => $data) {
            // Calculate D+ (positive distance)
            $positif = sqrt(
                pow($data['c1'] - $matriks_solusi_ideal['positif']['c1'], 2) +
                pow($data['c2'] - $matriks_solusi_ideal['positif']['c2'], 2) +
                pow($data['c3'] - $matriks_solusi_ideal['positif']['c3'], 2) +
                pow($data['c4'] - $matriks_solusi_ideal['positif']['c4'], 2) +
                pow($data['c5'] - $matriks_solusi_ideal['positif']['c5'], 2) // Cost criterion
            );

            // Calculate D- (negative distance)
            $negatif = sqrt(
                pow($data['c1'] - $matriks_solusi_ideal['negatif']['c1'], 2) +
                pow($data['c2'] - $matriks_solusi_ideal['negatif']['c2'], 2) +
                pow($data['c3'] - $matriks_solusi_ideal['negatif']['c3'], 2) +
                pow($data['c4'] - $matriks_solusi_ideal['negatif']['c4'], 2) +
                pow($data['c5'] - $matriks_solusi_ideal['negatif']['c5'], 2) // Cost criterion
            );

            // Calculate preference (V)
            $preferensi = $negatif / ($negatif + $positif);

            // Round values as needed
            $positif = round($positif, 5);
            $negatif = round($negatif, 5);
            $preferensi = round($preferensi, 5);

            // Save the results in the $total array
            $total[$key] = [
                'id' => $data['id'],
                'name' => $data['name'],
                'code' => $data['code'],
                'positif' => $positif,
                'negatif' => $negatif,
                'preferensi' => $preferensi,
            ];
        }

        // Urutkan $total berdasarkan preferensi (descending)
        usort($total, function ($a, $b) {
            return $b['preferensi'] <=> $a['preferensi'];
        });

        // Ambil rekomendasi terbaik (index 0 karena sudah diurutkan)
        $rekomendasi_terbaik = [
            'code' => $total[0]['code'],
            'name' => $total[0]['name'],
            'preferensi' => $total[0]['preferensi'],
        ];

        // Kembalikan view dengan data yang diperlukan
        return view('user.rekomendasi_process', compact(
            'alternatifs',
            'kriterias',
            'user_preference',
            'normalisasis',
            'normalisasi_total',
            'normalisas_tahap_2',
            'normalisasi_terbobot',
            'matriks_solusi_ideal',
            'total',
            'rekomendasi_terbaik'
        )
        );
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_chipset' => 'required|string|max:255',
            'user_price' => 'required|numeric',
            'user_singlecore' => 'required|numeric',
            'user_multicore' => 'required|numeric',
            'user_thread' => 'required|numeric',
            'user_graphics' => 'required|numeric',
        ]);

        // Simpan data alternatif dari form
        $alternatif_tambahan = [
            'id' => 9999, // Atau sesuaikan dengan logika generasi ID
            'name' => $request->input('user_chipset'),
            'code' => 'PRUSR', // Atau sesuaikan dengan logika pengkodean
            'c1' => isset($validatedData['user_singlecore']) ? $validatedData['user_singlecore'] : 0,
            'c2' => isset($validatedData['user_multicore']) ? $validatedData['user_multicore'] : 0,
            'c3' => isset($validatedData['user_thread']) ? $validatedData['user_thread'] : 0,
            'c4' => isset($validatedData['user_graphics']) ? $validatedData['user_graphics'] : 0,
            'c5' => isset($validatedData['user_price']) ? $validatedData['user_price'] : 0,
        ];

        // Proses penyimpanan alternatif_tambahan ke dalam database atau manipulasi data lainnya

        return redirect()->route('chipset.index')->with('success', 'Chipset successfully added.');
    }


    public function destroy($index)
    {
        $chipsetList = session()->get('chipset_list', []);

        if (isset($chipsetList[$index])) {
            $deletedChipset = $chipsetList[$index];
            unset($chipsetList[$index]);

            session()->put('chipset_list', $chipsetList);

            return redirect()->route('user.rekomendasi')->with('success', 'Chipset ' . $deletedChipset . ' successfully deleted.');
        }

        return redirect()->route('user.rekomendasi')->with('error', 'Failed to delete chipset.');
    }

    public function addBobot(Request $request)
    {
        $request->validate([
            'w1' => 'required|numeric',
            'w2' => 'required|numeric',
            'w3' => 'required|numeric',
            'w4' => 'required|numeric',
            'w5' => 'required|numeric',
        ]);

        $users_id = Auth::id(); // Mendapatkan ID pengguna yang sedang login


        $bobot = new modelbobot();
        $bobot->users_id = $users_id;
        $bobot->created_at = now();
        $bobot->w1 = $request->input('w1');
        $bobot->w2 = $request->input('w2');
        $bobot->w3 = $request->input('w3');
        $bobot->w4 = $request->input('w4');
        $bobot->w5 = $request->input('w5');
        $bobot->save();

        return redirect()->route('user.rekomendasi')->with('success', 'Bobot successfully saved.');
    }

    public function PerhitunganTopsis()
    {
        try {
            // Get all column names from 'chipset' table
            $columns = Schema::getColumnListing('chipset');

            // Columns to exclude from calculations
            $exclude = ['id_chipset', 'nama'];

            // Filter columns to be used in TOPSIS calculation
            $criteria = array_diff($columns, $exclude);

            \Log::info('Selected Criteria', $criteria);

            // Get the ID of the currently authenticated user
            $user_id = Auth::id();

            // Retrieve the latest 'modelbobot' record for the user
            $bobots = modelbobot::where('users_id', $user_id)->latest()->first();

            // Get columns from 'bobot' model
            $column = Schema::getColumnListing('bobot');
            $exclude = ['id_bobot', 'users_id', 'created_at'];
            $BobotColumns = array_diff($column, $exclude);

            if (!$bobots) {
                return redirect()->route('user.rekomendasi')->with('error', 'Bobot not found.');
            }

            // Calculate total weight of all criteria
            $total_bobot = array_sum($bobots->only($BobotColumns));

            // Normalize weights
            $normalized_bobot = [];
            foreach ($BobotColumns as $bobot) {
                $normalized_bobot[$bobot] = $total_bobot != 0 ? $bobots->$bobot / $total_bobot : 0;
            }

            \Log::info('Normalized Weights', $normalized_bobot);

            // Store normalized weights in session
            session()->put('normalized_bobot', $normalized_bobot);

            // Calculate sum of squares for numeric columns in 'chipset' table
            $sum_of_squares = $this->hitungSumOfSquares();

            if (!$sum_of_squares) {
                return redirect()->route('user.rekomendasi')->with('error', 'Error calculating sum of squares.');
            }

            \Log::info('Sum of Squares Calculation', $sum_of_squares);

            // Calculate square root of sum of squares
            $sqrt_result = [];
            foreach ($sum_of_squares->toArray() as $key => $value) {
                $sqrt_result[$key] = sqrt($value);
            }

            \Log::info('Square Root Results', $sqrt_result);

            // Store square root results in session
            session()->put('sqrt_result', $sqrt_result);

            // Normalize chipsets based on square root values
            $normalized_chipsets = [];
            $chipsets = Chipset::all();
            $chipsetList = session()->get('chipset_list', []);

            foreach ($chipsets as $chipset) {
                if (in_array($chipset->nama, $chipsetList)) {
                    $normalized_chipset = new \stdClass();

                    foreach ($sqrt_result as $key => $sqrt_value) {
                        $column = $key;
                        $normalized_chipset->$column = $chipset->$column / $sqrt_value;
                    }

                    $normalized_chipsets[] = $normalized_chipset;
                }
            }

            \Log::info('Normalized Chipsets', $normalized_chipsets);

            // Store weighted normalized chipsets in session
            session()->put('weighted_normalized_chipsets', $weighted_normalized_chipsets);

            // Calculate criteria types from 'tipe_kriteria' table
            $criteria_types = [];

            foreach ($normalized_chipsets as $key => $normalized_chipset) {
                $criteria_type = TipeKriteria::whereIn('nama', $criteria)->get();

                foreach ($criteria_type as $type) {
                    if ($type->tipe === 'benefit') {
                        $criteria_types['ideal_positive_solution'][$type->nama] = max(array_column($normalized_chipsets, $type->nama));
                    }
                }
            }

            \Log::info('Criteria Types', $criteria_types);

            // Redirect to recommendation page with success message
            return redirect()->route('user.rekomendasi')->with('success', 'TOPSIS calculation completed successfully.');
        } catch (\Exception $e) {
            // Log and handle exceptions
            \Log::error('Error in TOPSIS Calculation: ' . $e->getMessage());
            return redirect()->route('user.rekomendasi')->with('error', 'Error occurred during TOPSIS calculation.');
        }
    }

    private function hitungSumOfSquares()
    {
        // Mengambil semua kolom dari tabel chipset
        $columns = Schema::getColumnListing('chipset');

        // Kolom yang akan dikecualikan
        $exclude = ['id_chipset', 'nama'];

        // Menghitung kolom yang akan digunakan
        $criteria = array_diff($columns, $exclude);

        // Membuat array untuk menyimpan pernyataan DB::raw
        $sumOfSquaresArray = [];

        // Membuat pernyataan DB::raw untuk setiap kolom yang relevan
        foreach ($criteria as $kriteria) {
            $sumOfSquaresArray[] = DB::raw("SUM(POW($kriteria, 2)) as $kriteria");
        }

        // Melakukan query dengan pernyataan yang telah dibuat
        $sum_of_squares = Chipset::select($sumOfSquaresArray)->first();

        return $sum_of_squares;
    }

}
