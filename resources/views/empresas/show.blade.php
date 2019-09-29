@extends('structure.head', ["menu_active" => "empresas"])

@section('titulo', 'Empresa')

@section('body')

@if (count($empresa) > 0)

<div class="card mb-3">
    <div class="card-header">
        <h4 class="card-title mb-0">{{ $empresa->first()->nome }}</h4>
    </div>
    <div class="card-body">
        <div class="row mb-2">
            <div class="col-md-6 rounded shadow-sm mb-3 pt-3">
                <h6 class="card-subtitle text-muted mb-1">E-mail</h6>
                <h5 class="card-title">{{ $empresa->first()->contatos->first()->email }}</h5>
            </div>
            <div class="col-md-6 rounded shadow-sm mb-3 pt-3">
                <h6 class="card-subtitle text-muted mb-1">Telefone</h6>
                <h5 class="card-title">{{ $empresa->first()->contatos->first()->telefone }}</h5>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-9 rounded shadow-sm mb-3 pt-3">
                <h6 class="card-subtitle text-muted mb-1">Logradouro</h6>
                <h5 class="card-title">{{ $empresa->first()->enderecos->first()->logradouro }}</h5>
            </div>
            <div class="col-md-3 rounded shadow-sm mb-3 pt-3">
                <h6 class="card-subtitle text-muted mb-1">Número</h6>
                <h5 class="card-title">{{ $empresa->first()->enderecos->first()->numero }}</h5>
            </div>
        </div>
        @if (isset($empresa->first()->enderecos->first()->complemento))
        <div class="row mb-2">
            <div class="col-md-12 rounded shadow-sm mb-3 pt-3">
                <h6 class="card-subtitle text-muted mb-1">Complemento</h6>
                <h5 class="card-title">{{ $empresa->first()->enderecos->first()->complemento }}</h5>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-3 rounded shadow-sm pt-3">
                <h6 class="card-subtitle text-muted mb-1">Bairro</h6>
                <h5 class="card-title">{{ $empresa->first()->enderecos->first()->bairro }}</h5>
            </div>
            <div class="col-md-5 rounded shadow-sm pt-3">
                <h6 class="card-subtitle text-muted mb-1">Cidade</h6>
                <h5 class="card-title">{{ $empresa->first()->enderecos->first()->cidade }}</h5>
            </div>
            <div class="col-md-1 rounded shadow-sm pt-3">
                <h6 class="card-subtitle text-muted mb-1">UF</h6>
                <h5 class="card-title">{{ $empresa->first()->enderecos->first()->uf }}</h5>
            </div>
            <div class="col-md-3 rounded shadow-sm pt-3">
                <h6 class="card-subtitle text-muted mb-1">CEP</h6>
                <h5 class="card-title">{{ $empresa->first()->enderecos->first()->cep }}</h5>
            </div>
        </div>
    </div>
    <div class="card-footer text-center">
        <a href="{{route('empresas.index')}}" class="btn btn-primary text-white"><i class="fas fa-undo-alt mr-1"></i> Voltar para empresas</a>
        <a href="{{route('empresas.edit', $empresa->first()->id)}}" class="btn btn-success text-white ml-1 mr-1"><i class="fas fa-edit mr-1"></i> Editar</a>
        <button type="button" class="btn btn-danger text-white" data-toggle="modal" data-target="#delete-{{$empresa->first()->id}}"><i class="fas fa-trash-alt mr-1"></i> Excluir</button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="delete-{{$empresa->first()->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">{{$empresa->first()->nome}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <h5>Você realmente deseja excluir a empresa e todas as suas vagas cadastradas?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a href="{{route('empresas.delete', $empresa->first()->id)}}" class="btn btn-danger">Excluir</a>
            </div>
        </div>
    </div>
</div>
    
@else
    
@endif

@endsection