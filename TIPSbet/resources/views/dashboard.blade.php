@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-12">
        <div class="container mt-4">
    <h2>Lista de Odds</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Casa</th>
                <th>Visitante</th>
                <th>Odd casa</th>
                <th>Odd visitante</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($odds as $odd)
                <tr>
                    <td>{{ $odd->id }}</td>
                    <td>{{ $odd->home_team }}</td>
                    <td>{{ $odd->away_team }}</td>
                    <td>{{ $odd->odds}}</td>
                    <td>{{ $odd->odd_visitante}}</td>
                    <td>{{ \Carbon\Carbon::parse($odd->commence_time)->format('d/m/Y H:i') }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
        </div>
    </div>
@endsection


