<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">Home</a>
                    </li>
                </ul>


            </div>
        </div>
    </nav>

    <main class="py-4">

        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <!-- Alert message (start) -->
                    @if(Session::has('message'))
                        <div class="alert {{ Session::get('alert-class') }}">
                            {{ Session::get('message') }}
                        </div>
                @endif
                <!-- Alert message (end) -->

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <!-- Alert message (start) -->
                            <!-- Alert message (start) -->
                            @if(Session::has('message'))
                                <div class="alert {{ Session::get('alert-class') }}">
                                    {{ Session::get('message') }}
                                </div>
                        @endif
                        <!-- Alert message (end) -->

                            <div class="actionbutton">

                                <a class='btn btn-info float-right' href="{{route('index')}}">volver</a>

                            </div>

                            <form action="{{route('guardar')}}" method="post" >
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name" class="form-control col-md-12 col-xs-12" name="name" placeholder="ingrese nombre" required="required" type="text" >

                                        @if ($errors->has('name'))
                                            <span class="errormsg">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha">Fecha <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="fecha" class="form-control col-md-12 col-xs-12" name="fecha"  required="required" type="date" >

                                        @if ($errors->has('fecha'))
                                            <span class="errormsg">{{ $errors->first('fecha') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="matricula">Matricula <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="matricula" class="form-control col-md-12 col-xs-12" name="matricula" placeholder="AAA999" required="required" maxlength="6" type="text" >

                                        @if ($errors->has('matricula'))
                                            <span class="errormsg">{{ $errors->first('matricula') }}</span>
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="col-md-6">

                                        <input type="submit" name="submit" value='Submit' class='btn btn-success'>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </main>
</div>
<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}" ></script>
@stack('scripts')
</body>
</html>
