<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ Setting::get('masjid_name', config('masjid.name')) }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    @yield('styles')
</head>
<body>
        <div class="container-fluid text-center">
            <header class="d-flex flex-column flex-md-row align-items-right justify-content-center py-5 text-center">
                <div class="mb-3 mb-md-0">
                    <img src="{{ asset('images/logo.png') }}" style="width: 100px">
                </div>
                <div class="ml-md-3">
                    <a class="h3 text-dark" href="{{ url('/') }}">{{ Setting::get('masjid_name', config('masjid.name')) }}</a>
                    @if (Setting::get('masjid_address'))
                    <div class="mt-4">
                        <p class="mb-1">Jalan Benda Raya, Gg. Masjid No.99 11, RT 11/RW 04, Cilandak Timur <br> Ps. Minggu, Kota Jakarta Selatan, DKI Jakarta 12560, Indonesia</p>
                    </div>
                    @endif
                    <div class="mt-4">
                        <h5 class="mb-0">{{ __('LAPORAN KEUANGAN') }}</h5>
                    </div>
                </div>
            </header>
        </div>
    <div class="navbar-light bg-white shadow-sm mb-4">
        <div class="container-fluid bg-green">
            <div class="row">
                <div class="offset-0 offset-lg-1 offset-xl-2 col-12 col-lg-10 col-xl-8">
                    <div class="py-1">
                        <nav class="nav d-flex justify-content-between">
                            <a class="py-2 px-1 {{ in_array(Request::segment(1), [null]) ? 'text-primary strong' : 'text-white' }}" href="{{ url('/') }}">
                                <i class="fe fe-home"></i> {{ __('app.home') }}
                            </a>
                            <a class="py-2 px-1 {{ in_array(Request::segment(1), ['laporan-kas']) ? 'text-primary strong' : 'text-white' }}" href="{{ route('public_reports.index') }}">
                                <i class="fe fe-layout"></i> {{ __('report.report') }}
                            </a>
                            <a class="py-2 px-1 {{ in_array(Request::segment(1), ['donasi']) ? 'text-primary strong' : 'text-white' }}" href="{{ route('public.donate') }}">
                                <i class="fe fe-pocket"></i> {{ __('app.donate') }}
                            </a>
                            @if (Route::has('public_schedules.index'))
                                <a class="py-2 px-1 {{ in_array(Request::segment(1), ['jadwal']) ? 'text-primary strong' : 'text-white' }}" href="{{ route('public_schedules.index') }}">
                                    <i class="fe fe-calendar"></i> {{ __('lecturing.public_schedule') }}
                                </a>
                            @endif
                            @auth
                            <a class="py-2 px-1 text-white" href="{{ route('home') }}"><i class="fe fe-user"></i> {{ auth()->user()->name }}</a>
                            @else
                            <a class="py-2 px-1 text-white" href="{{ route('login') }}"><i class="fe fe-user"></i> {{ __('auth.login') }}</a>
                            @endauth
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main role="main" class="container-fluid">
        <div class="row">
            <div class="offset-0 offset-lg-1 offset-xl-2 col-12 col-lg-10 col-xl-8">
                @yield('content')
            </div>
        </div>
    </main>
    <script src="{{ asset('js/app.js') }}" ></script>
    @include('layouts.partials.noty')
    @stack('scripts')
</body>
</html>
