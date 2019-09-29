@extends('structure.head', ["menu_active" => "vagas"])

@section('titulo', 'Vagas cadastradas')

@section('body')

<div class="row">

    @if ($message = Session::get('success'))
        <div class="col-md-12 mb-2">
            <div class="alert alert-success">
                <h5 class="mb-0">{{$message}}</h5>
            </div>
        </div>
    @endif

    <div class="col-md-12 mb-4">
        <a href="/vagas/create" class="btn btn-primary btn-lg btn-block"><i class="fas fa-plus-circle mr-1"></i> Cadastrar nova vaga</a>
    </div>
    @if (count($vagas) > 0)

        @foreach ($empresas as $empresa)

        @foreach ($empresa->vagas as $vaga)
        <div class="col-md-6">
            <div class="card shadow-sm mb-3">
                <div class="card-header">
                    <h4 class="card-title mb-0">{{ $vaga->titulo }}</h4>
                </div>  
                <div class="card-body">
                    <div class="p-2 rounded">                    
                        <i class="fas fa-building mr-1"></i>
                        {{ $empresa->nome }}
                    </div>
                    <div class="p-2 rounded">
                        <i class="fas fa-id-card mr-1"></i>
                        {{ $vaga->cargo }}
                    </div>
                    <div class="p-2 rounded">    
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        {{ $empresa->enderecos->first()->cidade}}
                    </div>
                    <div class="p-2 rounded"> 
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
                    </div>
                    <div class="p-2 rounded">
                        <i class="fas fa-dollar-sign mr-1"></i>
                        @if (isset($vaga->remuneracao))
                            R$ {{$vaga->remuneracao}}
                        @else
                            Não remunerado
                        @endif

                        @if (isset($vaga->beneficios))
                                + benefícios
                        @endif
                    </div>
                    <div class="p-2 rounded">
                        <i class="fas fa-clock mr-1"></i>
                        @if (isset($vaga->horario))
                            {{$vaga->horario}}
                        @else
                            Não definido
                        @endif
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{route('vagas.show', $vaga->id)}}" class="btn btn-primary text-white btn-sm"><i class="fas fa-eye mr-1"></i> Mostrar mais</a>
                    <a href="{{route('vagas.edit', $vaga->id)}}" class="btn btn-success text-white btn-sm ml-1 mr-1"><i class="fas fa-edit mr-1"></i> Editar</a>
                    <button type="button" class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#delete-{{$vaga->id}}"><i class="fas fa-trash-alt mr-1"></i> Excluir</button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="delete-{{$vaga->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">{{$vaga->titulo}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <h5>Você realmente deseja excluir esta vaga?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <a href="{{route('vagas.delete', $vaga->id)}}" class="btn btn-danger">Excluir</a>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

        @endforeach

    @else

    <div class="col-md-12 mb-4">
        <div class="card shadow-sm text-center mb-3 p-5">
            <h4>Ainda não há vagas cadastradas.</h4>
        </div>
    </div>

    @endif
    
</div>

@endsection