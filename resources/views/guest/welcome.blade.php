@extends('layouts.guest')

@section('title', __('app.welcome'))

@section('content')
    <div class="jumbotron p-4 mb-0 p-md-5 text-dark rounded bg-lightgray">
        <div class="col-md-6 px-0">
            <h2 class="font-italic">
                {{-- @yield('title'),<br> {{ Setting::get('masjid_name', config('masjid.name')) }} --}}
            </h2>
            <p class="lead mb-0">
                <a class="btn btn-lg btn-success mr-2" href="{{ route('public_reports.index') }}"
                    role="button">{{ __('report.view_report') }}</a>
                {{-- @if (Route::has('lecturings.index'))
                    <a class="btn btn-lg btn-info" href="{{ route('public_schedules.index') }}"
                        role="button">{{ __('lecturing.lecturing') }}</a>
                @endif --}}
            </p>
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
    
        <div class="col-lg-4 d-flex">
            @forelse ($bankAccounts as $bankAccount)
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
            @empty
                {{ __('bank_account.empty') }}
            @endforelse
        </div>        
    
        <div class="col-lg-4 d-flex justify-content-center">
            <div class="col-md-12 pb-4 d-flex flex-column align-items-center">
                <div class="card h-100 text-center">
                    @if (Setting::for($bankAccount)->get('qris_image_path'))
                        <a href="{{ Storage::url(Setting::for($bankAccount)->get('qris_image_path'))}}">
                            <img id="bank_account_qris_image_show" class="img-fluid" src="{{ Storage::url(Setting::for($bankAccount)->get('qris_image_path'))}}" alt="QRIS">
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>    
@endsection
