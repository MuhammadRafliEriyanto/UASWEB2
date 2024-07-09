<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculateTOPSISController extends Controller
{
    public function calculateTOPSIS()
    {
        // Matriks data dengan nama alternatif
        $alternatives = [
            'Intel Core i9 ' => [3, 5, 2, 1, 4],
            'Intel Core i7' => [1, 2, 4, 3, 5],
            'Intel Core i5' => [5, 4, 1, 2, 3],
            'AMD Ryzen 9' => [4, 1, 5, 3, 2],
            'AMD Ryzen 5' => [4, 3, 2, 5, 1],
        ];

        // Bobot untuk setiap kriteria
        $weights = [4, 4, 3, 5, 3];

        // Langkah 1: Normalisasi
        $normalizedMatrix = $this->normalize($alternatives);

        // Langkah 2: Normalisasi Terbobot
        $weightedMatrix = $this->weightedNormalize($normalizedMatrix, $weights);

        // Langkah 3: Menghitung Solusi Ideal
        $idealSolutions = $this->calculateIdealSolutions($weightedMatrix);
        $idealPositive = $idealSolutions['idealPositive'];
        $idealNegative = $idealSolutions['idealNegative'];

        // Langkah 4: Menghitung Nilai D+ dan D-
        $distances = $this->calculateDistances($weightedMatrix, $idealPositive, $idealNegative);

        // Langkah 5: Menghitung Pembagi (S)
        $S = $this->calculateDivisor($distances);

        // Langkah 6: Menghitung Nilai A+ dan A-
        $APlus = $this->calculateAPlus($distances, $S);
        $AMinus = $this->calculateAMinus($distances, $S);

        // Hitung nilai V dan peringkat
        $results = $this->calculateResults($distances, $S, $normalizedMatrix, $weightedMatrix);

        // Tampilkan view dengan data hasil perhitungan dan bobot
        return view('admin.topsis', compact('results', 'weights'));
    }

    // Helper functions (dapat ditempatkan di dalam controller atau sebagai private functions)

    private function normalize($alternatives)
    {
        $normalizedMatrix = [];

        foreach ($alternatives as $name => $row) {
            $sumSquares = 0;

            // Menghitung jumlah kuadrat setiap elemen dalam baris
            foreach ($row as $value) {
                $sumSquares += pow($value, 2);
            }

            $magnitude = sqrt($sumSquares);

            $normalizedRow = [];

            // Normalisasi setiap elemen dalam baris
            foreach ($row as $value) {
                $normalizedRow[] = $value / $magnitude;
            }

            $normalizedMatrix[$name] = $normalizedRow;
        }

        return $normalizedMatrix;
    }

    private function weightedNormalize($normalizedMatrix, $weights)
    {
        $weightedMatrix = [];

        foreach ($normalizedMatrix as $name => $row) {
            $weightedRow = [];

            // Mengalikan setiap elemen dalam baris dengan bobotnya
            foreach ($row as $key => $value) {
                $weightedRow[] = $value * $weights[$key];
            }

            $weightedMatrix[$name] = $weightedRow;
        }

        return $weightedMatrix;
    }

    private function calculateIdealSolutions($weightedMatrix)
    {
        $numCriteria = count(current($weightedMatrix));
        $idealPositive = array_fill(0, $numCriteria, 0);
        $idealNegative = array_fill(0, $numCriteria, INF);

        foreach ($weightedMatrix as $row) {
            foreach ($row as $key => $value) {
                if ($value > $idealPositive[$key]) {
                    $idealPositive[$key] = $value;
                }
                if ($value < $idealNegative[$key]) {
                    $idealNegative[$key] = $value;
                }
            }
        }

        return [
            'idealPositive' => $idealPositive,
            'idealNegative' => $idealNegative,
        ];
    }

    private function calculateDistances($weightedMatrix, $idealPositive, $idealNegative)
    {
        $distances = [];

        foreach ($weightedMatrix as $name => $row) {
            $dPlus = 0;
            $dMinus = 0;

            foreach ($row as $key => $value) {
                $dPlus += pow($value - $idealPositive[$key], 2);
                $dMinus += pow($value - $idealNegative[$key], 2);
            }

            $distances[$name] = [
                'DPlus' => sqrt($dPlus),
                'DMinus' => sqrt($dMinus),
            ];
        }

        return $distances;
    }

    private function calculateDivisor($distances)
    {
        $S = [];

        foreach ($distances as $name => $distance) {
            $S[$name] = $distance['DPlus'] + $distance['DMinus'];
        }

        return $S;
    }

    private function calculateAPlus($distances, $S)
    {
        $APlus = [];

        foreach ($distances as $name => $distance) {
            $APlus[$name] = $distance['DPlus'] / $S[$name];
        }

        return $APlus;
    }

    private function calculateAMinus($distances, $S)
    {
        $AMinus = [];

        foreach ($distances as $name => $distance) {
            $AMinus[$name] = $distance['DMinus'] / $S[$name];
        }

        return $AMinus;
    }

    private function calculateResults($distances, $S, $normalizedMatrix, $weightedMatrix)
    {
        $results = [];

        foreach ($distances as $name => $distance) {
            $DPlus = $distance['DPlus'];
            $DMinus = $distance['DMinus'];

            $V = $DMinus / ($DPlus + $DMinus);

            $results[$name] = [
                'DPlus' => $DPlus,
                'DMinus' => $DMinus,
                'V' => $V,
                'S' => $S[$name],
                'APlus' => $this->calculateAPlus([$name => $distance], [$name => $S[$name]])[$name],
                'AMinus' => $this->calculateAMinus([$name => $distance], [$name => $S[$name]])[$name],
                'NormalizedMatrix' => $normalizedMatrix[$name],
                'WeightedMatrix' => $weightedMatrix[$name],
            ];
        }

        // Urutkan hasil berdasarkan nilai V dari tertinggi ke terendah
        uasort($results, function ($a, $b) {
            return $b['V'] <=> $a['V'];
        });

        // Tambahkan peringkat ke dalam hasil berdasarkan urutan nilai V
        $rank = 1;
        foreach ($results as &$result) {
            $result['Rank'] = $rank++;
        }

        return $results;
    }
}
