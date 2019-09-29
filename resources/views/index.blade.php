@extends('structure.head', ["menu_active" => "home"])

@section('titulo', 'Home')

@section('body')

@if (count($vagas) > 0)

    @foreach ($empresas as $empresa)

    @foreach ($empresa->vagas as $vaga)

    <div class="card shadow-sm mb-3">
        <div class="card-header">
            <h4 class="card-title">{{ $vaga->titulo }}</h4>
            <ul class="nav nav-pills card-header-pills mt-1">
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="fas fa-building mr-1"></i>
                        {{ $empresa->nome }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="fas fa-id-card mr-1"></i>
                        {{ $vaga->cargo }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        {{$empresa->enderecos->first()->cidade}} - {{$empresa->enderecos->first()->uf}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="fas fa-briefcase mr-1"></i>
                        @switch($vaga->regime)
                            @case(1)
                                Estágio
                                @break
                            @case(2)
                                CLT
                                @break
                            @case(3)
                                PJ
                                @break
                            @default
                                Não informado                                    
                        @endswitch
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="fas fa-dollar-sign mr-1"></i>
                        @if (isset($vaga->remuneracao))
                            R$ {{$vaga->remuneracao}}
                        @else
                            Não remunerado
                        @endif

                        @if (isset($vaga->beneficios))
                                + benefícios
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="fas fa-clock mr-1"></i>
                        @if (isset($vaga->horario))
                            {{$vaga->horario}}
                        @else
                            Não definido
                        @endif
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <h5 class="card-title">Atribuições</h5>
            <p class="card-text">{{ $vaga->atribuicoes }}</p>
        </div>
        <div class="card-footer text-center">
            <a href="{{route('show', $vaga->id)}}" class="btn btn-primary text-white"><i class="fas fa-eye mr-1"></i> Mostrar mais</a>
        </div>
    </div>

    @endforeach

    @endforeach

@else

    <div class="card shadow-sm text-center mb-3 p-5">
        <h4>Ainda não há vagas cadastradas.</h4>
    </div>

@endif

@endsection