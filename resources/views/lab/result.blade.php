@extends('layouts.public')

@section('title', 'Resultados COVID19')

@section('content')

@if($patient)
<h3 class="mb-3">Resultado de exámenes de {{ Auth::user()->name }} {{ Auth::user()->fathers_family }}</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Origen de toma de muestra</th>
            <th>Fecha de toma de muestra</th>
            <th>Fecha del resultado</th>
            <th>Resultado COVID19</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($patient->suspectCases as $case)
        <tr>
            <td>{{ $case->origin }}</td>
            <td>{{ $case->sample_at->format('Y-m-d') }}</td>
            <td>{{ ($case->pscr_sars_cov_2 != 'positive') ? $case->covid19 : 'Será notificado' }}</td>
            <td>{{ ($case->pscr_sars_cov_2_at) ? $case->pscr_sars_cov_2_at : '' }}</td>
            <td>
                @if($case->pscr_sars_cov_2 != 'positive')
                <!-- <a href="{{ route('lab.suspect_cases.download', $case->files->first()->id) }}"
                    target="_blank" data-toggle="tooltip" data-placement="top"
                    data-original-title="resultado_{{$case->patient->run}}.pdf">
                    resultado_{{$case->patient->run}}.pdf<i class="fas fa-paperclip"></i>&nbsp
                </a> -->
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
    <h3>{{ Auth::user()->name }} {{ Auth::user()->fathers_family }} no registra exámenes de COVID19 en el Hospital Ernesto Torres Galdámes </h3>
@endif

@endsection

@section('custom_js')

@endsection
