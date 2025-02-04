@extends('layouts.guest')

@section('title', __('app.welcome'))

@section('content')
<div class="jumbotron p-4 mb-0 p-md-5 text-dark rounded bg-lightgray">
    <div class="px-0 row">
        <div class="col-md-3">
            <p class="lead mb-0">
                <a class="btn btn-lg btn-success mr-2" href="{{ route('public_reports.index') }}"
                    role="button">{{ __('report.view_report') }}</a>
            </p>
        </div>
        <div class="col-md-9">
            <p class="font-weight-bold">
                Laporan keuangan Masjid Jami Alakhyar ini adalah bentuk dari transparansi kepada jamaah, laporan ini kami perbarui setiap minggu nya, jika terdapat kesalahan atau koreksi bisa menghubungi kami <br>
                <br>
                Bendahara <br>
                Ahmad Husni
            </p>
        </div>
    </div>
</div>

    <div class="row justify-content-center mt-5">
        <div class="col-lg-4 d-flex">
            <div class="col-md-12 pb-4 d-flex flex-column">
                <div class="card h-100">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Kas Pekan Ini</h3>
                    </div>
                    <div class="card-body flex-grow">
                        @livewire('public-home.weekly-financial-summary')
                    </div>
                </div>
            </div>
        </div>

        @forelse ($bankAccounts as $bankAccount)
        <div class="col-lg-4 d-flex">
                <div class="col-md-12 pb-4 d-flex flex-column">
                    <div class="card h-100">
                        <div class="card-header">
                            <h3 class="card-title">{{ $bankAccount->name }}</h3>
                        </div>
                        <div class="card-body flex-grow-1">
                            <p><span class="text-primary">{{ __('bank_account.number') }}</span>:<br><strong>{{ $bankAccount->number }}</strong></p>
                            <p><span class="text-primary">{{ __('bank_account.account_name') }}</span>:<br><strong>{{ $bankAccount->account_name }}</strong></p>
                        </div>
                        @if ($bankAccount->description)
                            <div class="card-body bg-green-lightest">{{ $bankAccount->description }}</div>
                        @endif
                    </div>
                </div>
            </div>        
            @empty
                {{ __('bank_account.empty') }}
            @endforelse
    
        <div class="col-lg-4 d-flex justify-content-center">
            <div class="col-md-12 pb-4 d-flex flex-column align-items-center">
                @if (Route::has('lecturings.index'))
                    <div class="card h-100 text-center">
                        <div class="col-lg-12">
                            @livewire('public-home.daily-lecturings', ['date' => today(), 'dayTitle' => 'today'])
                            {{-- @livewire('public-home.daily-lecturings', ['date' => today()->addDay(), 'dayTitle' => 'tomorrow']) --}}
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-lg-4 d-flex justify-content-center">
            <div class="col-md-12 pb-4 d-flex flex-column align-items-center">
                @if (Route::has('lecturings.index'))
                    <div class="card h-100 text-center">
                        <div class="col-lg-12">
                            @livewire('public-home.daily-lecturings', ['date' => today(), 'dayTitle' => 'this_week', 'rangeType' => 'pekan_ini'])
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-lg-4 d-flex justify-content-center">
            <div class="col-md-12 pb-4 d-flex flex-column align-items-center">
                @if (Route::has('lecturings.index'))
                    <div class="card h-100 text-center">
                        <div class="col-lg-12">
                            @livewire('public-home.daily-lecturings', ['date' => today(), 'dayTitle' => 'this_month', 'rangeType' => 'bulan_ini'])
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>    
@endsection
