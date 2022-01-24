<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app" class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>
        <div class="content">
            <div class="container container-fluid py-4">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        @foreach ($articles as $ar )
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{$ar->title}}</h3>
                            </div>

                            <div class="card-body">
                                <p>{{$ar->blog}}</p>
                            </div>
                            <div class="card-footer">
                                <small>Author : {{$ar->reporter->name}}</small> <br>
                                <small class="">Editor : {{$ar->getEditorName()}}</small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>