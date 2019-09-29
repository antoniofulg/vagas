<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NExTI @hasSection ('titulo') | @yield('titulo') @endif</title>

    {{-- csrf --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Bootstrap --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    {{-- Header --}}
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">

    {{-- FontAwesome
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
</head>
<body>
    
    <div class="container">
        <header class="blog-header py-3 mb-4">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 text-left">
                    <a class="blog-header-logo text-dark" href="{{route('index')}}">NexTI</a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="btn @if ($menu_active == 'home') btn-dark @else btn-outline-dark @endif" href="{{route('index')}}"><i class="fas fa-home mr-1"></i> Home</a>
                    <a class="btn @if ($menu_active == 'vagas') btn-dark @else btn-outline-dark @endif ml-2 mr-2" href="{{route('vagas.index')}}"><i class="fas fa-id-card mr-1"></i> Vagas</a>
                    <a class="btn @if ($menu_active == 'empresas') btn-dark @else btn-outline-dark @endif" href="{{route('empresas.index')}}"><i class="fas fa-building mr-1"></i> Empresas</a>
                </div>
            </div>
        </header>
                
        @hasSection ('body')
            @yield('body')
        @else
            <div class="alert alert-danger" role="alert">
                O conteúdo desta página não está disponível.
            </div>
        @endif
    </div>

    {{-- Bootstrap --}}
    <script src="{{ asset('js/app.js')}}" type="text/javascript"></script>
</body>
</html>