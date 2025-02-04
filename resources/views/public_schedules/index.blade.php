@extends('layouts.guest')

@section('title', __('lecturing.list'))

@section('content')
@include('public_schedules._nav')
<div class="jumbotron p-4 mb-0 p-md-5 text-dark rounded bg-lightgray mt-5">
    <div class="px-0 row">
        {{-- <div class="col-md-3">
            <p class="lead mb-0">
                <a class="btn btn-lg btn-success mr-2" href="{{ route('public_reports.index') }}"
                    role="button">{{ __('report.view_report') }}</a>
            </p>
        </div> --}}
        <div class="col-md-12">
            <p class="font-weight-bold">
                Assalamu’alaikum,
Mari kita berkontribusi dan bergabung dalam program kegiatan kami dalam membangun dan memakmurkan Rumah Allah. Infaq Anda, sekecil apa pun, menjadi amal jariyah yang abadi. 

Jazakumullahu khairan.<br>
                <br>
                Bendahara <br>
                Ahmad Husni
            </p>
        </div>
    </div>
</div>
 
@foreach ($audienceCodes as $audienceCode => $audience)
    @if (isset($lecturings[$audienceCode]))
        <div class="page-header my-4">
            <h2 class="page-title">Kegiatan {{ __('lecturing.audience_'.$audienceCode) }}</h2>
        </div>
        @foreach($lecturings[$audienceCode] as $lecturing)
            @include('public_schedules._single_'.$audienceCode)
        @endforeach
    @endif
@endforeach

@if ($lecturings->isEmpty())
    <p class="my-4">
        {{ __('lecturing.empty') }}
        {{ in_array(Request::segment(2), [null, 'hari_ini']) ? __('time.today').'.' : '' }}
        {{ in_array(Request::segment(2), ['besok']) ? __('time.tomorrow').'.' : '' }}
        {{ Request::segment(2) == 'pekan_ini' ? __('time.this_week').'.' : '' }}
        {{ Request::segment(2) == 'pekan_depan' ? __('time.next_week').'.' : '' }}
    </p>
@endif

@endsection
