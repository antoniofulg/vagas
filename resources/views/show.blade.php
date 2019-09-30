@extends('structure.head', ["menu_active" => "home"])

@section('titulo', 'Vaga')

@section('body')

    @if (isset($vaga))

    <div class="card mb-3">
        <div class="card-header">
            <h4 class="card-title mb-0">{{ $vaga->titulo }}</h4>
        </div>
        <div class="card-body p-4">
            <div class="row mb-2">
                <div class="col-md-6 rounded shadow-sm mb-3 pt-3">
                    <h6 class="card-subtitle text-muted mb-1">Empresa</h6>
                    <h5 class="card-title">{{ $empresa->first()->nome }}</h5>
                </div>
                <div class="col-md-3 rounded shadow-sm mb-3 pt-3">
                    <h6 class="card-subtitle text-muted mb-1">Cidade</h6>
                    <h5 class="card-title">{{ $empresa->first()->enderecos->first()->cidade }} -  {{ $empresa->first()->enderecos->first()->uf }} </h5>
                </div>
                @if (isset($empresa->first()->contatos->first()->website))
                    <div class="col-md-3 rounded shadow-sm mb-3 pt-3">
                        <h6 class="card-subtitle text-muted mb-1">Website</h6>
                        <a href="http://{{ $empresa->first()->contatos->first()->website }}"><h5 class="card-title">{{ $empresa->first()->contatos->first()->website }}</h5></a>
                    </div>
                @endif
            </div>
            <div class="row mb-2">
                <div class="col-md-3 rounded shadow-sm mb-3 pt-3">
                    <h6 class="card-subtitle text-muted mb-1">Cargo</h6>
                    <h5 class="card-title">{{ $vaga->cargo }}</h5>
                </div>
                <div class="col-md-3 rounded shadow-sm mb-3 pt-3">
                    <h6 class="card-subtitle text-muted mb-1">Regime de Contrato</h6>
                    <h5 class="card-title">@switch($vaga->regime)
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
                            Não definido
                    @endswitch</h5>
                </div>
                <div class="col-md-3 rounded shadow-sm mb-3 pt-3">
                    <h6 class="card-subtitle text-muted mb-1">Carga horária semanal</h6>
                    <h5 class="card-title">
                    @if (isset($vaga->horario))
                        {{ $vaga->horario }}
                    @else
                        Não definido
                    @endif</h5>
                </div>
                <div class="col-md-3 rounded shadow-sm mb-3 pt-3">
                    <h6 class="card-subtitle text-muted mb-1">Remuneração</h6>
                    <h5 class="card-title">
                        @if (isset($vaga->remuneracao))
                            R$ {{ $vaga->remuneracao }}
                        @else
                            A combinar
                        @endif</h5></h5>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-12 rounded shadow-sm mb-3 pt-3">
                    <h6 class="card-subtitle text-muted mb-1">Formação</h6>
                    <h5 class="card-title">{{ $vaga->formacao }}</h5>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-12 rounded shadow-sm mb-3 pt-3">
                    <h6 class="card-subtitle text-muted mb-1">Atribuições</h6>
                    <h5 class="card-title">{{ $vaga->atribuicoes }}</h5>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-12 rounded shadow-sm mb-3 pt-3">
                    <h6 class="card-subtitle text-muted mb-1">Requisitos</h6>
                    <h5 class="card-title">{{ $vaga->requisitos }}</h5>
                </div>
            </div>
            @if (isset($vaga->desejavel))
                <div class="row mb-2">
                    <div class="col-md-12 rounded shadow-sm mb-3 pt-3">
                        <h6 class="card-subtitle text-muted mb-1">Desejável</h6>
                        <h5 class="card-title">{{ $vaga->desejavel }}</h5>
                    </div>
                </div>
            @endif
            @if (isset($vaga->beneficios))
                <div class="row">
                    <div class="col-md-12 rounded shadow-sm mb-3 pt-3">
                        <h6 class="card-subtitle text-muted mb-1">Benefícios</h6>
                        <h5 class="card-title">{{ $vaga->beneficios }}</h5>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-8 rounded shadow-sm mb-3 pt-3">
                    <h6 class="card-subtitle text-muted mb-1">Contato</h6>
                    <h5 class="card-title">{{ $vaga->contato }}</h5>
                </div>
                @if (isset($vaga->data_final))
                    <div class="col-md-4 rounded shadow-sm mb-3 pt-3">
                        <h6 class="card-subtitle text-muted mb-1">Data final para candidatura</h6>
                        <h5 class="card-title">{{ date("d/m/Y", strtotime($vaga->data_final)) }}</h5>
                    </div>
                @endif  
            </div>           
        </div>
        <div class="card-footer text-center">
            <a href="{{route('index')}}" class="btn btn-primary text-white"><i class="fas fa-undo-alt mr-1"></i> Voltar para home</a>
        </div>
    </div>
        
    @else
        
    @endif

@endsection