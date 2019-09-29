@extends('structure.head', ["menu_active" => "empresas"])

@section('titulo', 'Empresas cadastradas')

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
        <a href="/empresas/create" class="btn btn-primary btn-lg btn-block"><i class="fas fa-plus-circle mr-1"></i> Cadastrar nova empresa</a>
    </div>
    @if (count($empresas) > 0)

    @foreach ($empresas as $empresa)
        <div class="col-md-6">
            <div class="card shadow-sm mb-3">
                <div class="card-header">
                    <h4 class="card-title mb-0">{{ $empresa->nome }}</h4>
                </div>
                <div class="card-body">
                    <div class="p-2 rounded">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        {{ $empresa->enderecos->first()->cidade }} - {{ $empresa->enderecos->first()->uf }}
                    </div>
                    <div class="p-2 rounded">
                        <i class="fas fa-envelope mr-1"></i>
                        {{ $empresa->contatos->first()->email }}
                    </div>
                    <div class="p-2 rounded">
                        <i class="fas fa-phone-alt mr-1"></i>
                        {{ $empresa->contatos->first()->telefone }}
                    </div>
                    <div class="p-2 rounded">
                        <i class="fas fa-folder-open mr-1"></i>
                        {{ count($empresa->vagas) }} vagas postadas
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{route('empresas.show', $empresa->id)}}" class="btn btn-primary text-white btn-sm"><i class="fas fa-eye mr-1"></i> Mostrar mais</a>
                    <a href="{{route('empresas.edit', $empresa->id)}}" class="btn btn-success text-white btn-sm ml-1 mr-1"><i class="fas fa-edit mr-1"></i> Editar</a>
                    <button type="button" class="btn btn-danger text-white btn-sm" data-toggle="modal" data-target="#delete-{{$empresa->id}}"><i class="fas fa-trash-alt mr-1"></i> Excluir</button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="delete-{{$empresa->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">{{$empresa->nome}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <h5>Você realmente deseja excluir a empresa e todas as suas vagas cadastradas?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a href="{{route('empresas.delete', $empresa->id)}}" class="btn btn-danger">Excluir</a>
                </div>
            </div>
            </div>
        </div>
    @endforeach

    @else

        <div class="col-md-12 mb-4">
            <div class="card shadow-sm text-center mb-3 p-5">
                <h4>Ainda não há empresas cadastradas.</h4>
            </div>
        </div>
        
    @endif
</div>
    
@endsection