@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Hasil Perhitungan TOPSIS</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Alternatif</th>
                                    <th>Normalized Matrix</th>
                                    <th>Weighted Matrix</th>
                                    <th>A+</th>
                                    <th>A-</th>
                                    <th>D+</th>
                                    <th>D-</th>
                                    <th>V</th>
                                    <th>Ranking</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($results as $name => $result)
                                    <tr>
                                        <td>{{ $name }}</td>
                                        <td>
                                            @foreach ($result['NormalizedMatrix'] as $value)
                                                {{ number_format($value, 4) }}<br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($result['WeightedMatrix'] as $value)
                                                {{ number_format($value, 4) }}<br>
                                            @endforeach
                                        </td>
                                        <td>{{ number_format($result['APlus'], 4) }}</td>
                                        <td>{{ number_format($result['AMinus'], 4) }}</td>
                                        <td>{{ number_format($result['DPlus'], 4) }}</td>
                                        <td>{{ number_format($result['DMinus'], 4) }}</td>
                                        <td>{{ number_format($result['V'], 4) }}</td>
                                        <td>{{ $result['Rank'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
