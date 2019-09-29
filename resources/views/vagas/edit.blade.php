@extends('structure.head', ["menu_active" => "vagas"])

@section('titulo', 'Atualizar vaga')

@section('body')

@if (count($errors)>0)

    <div class="alert alert-danger">
        <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
    
@endif

    <div class="card border shadow-lg">
        <div class="card-body">
            <div class="order-md-1">
                <form class="needs-validation" action="{{route('vagas.update', $vaga->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="empresa">Empresa</label>
                            <select class="custom-select d-block w-100" id="empresa" name="empresa" required>
                                <option value="">Escolha...</option>
                                @foreach ($empresas as $empresa)
                                    <option value="{{$empresa->id}}" @if ($empresa->id == $vaga->empresa_id)
                                        selected
                                    @endif>{{$empresa->nome}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control" name="titulo" id="titulo" value="{{ $vaga->titulo }}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cargo">Cargo</label>
                            <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Ex: Desenvolvedor" value="{{ $vaga->cargo }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="regime">Regime de contrato</label>
                            <div class="row">
                                <div class="form-check form-check-inline custom-control custom-radio">
                                    <input class="form-check-input custom-control-input" type="radio" name="regime" id="estagio" value="1"
                                    @if ($vaga->regime == 1)
                                        checked
                                    @endif required>
                                    <label class="form-check-label custom-control-label" for="estagio">Estágio</label>
                                </div>
                                <div class="form-check form-check-inline custom-control custom-radio">
                                    <input class="form-check-input custom-control-input" type="radio" name="regime" id="clt" value="2"
                                    @if ($vaga->regime == 2)
                                        checked
                                    @endif required>
                                    <label class="form-check-label custom-control-label" for="clt">CLT</label>
                                </div>
                                <div class="form-check form-check-inline custom-control custom-radio">
                                    <input class="form-check-input custom-control-input" type="radio" name="regime" id="pj" value="3"
                                    @if ($vaga->regime == 3)
                                        checked
                                    @endif required>
                                    <label class="form-check-label custom-control-label" for="pj">PJ</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9 mb-3">
                            <label for="formacao">Formação</label>
                            <input type="text" class="form-control" name="formacao" id="formacao" placeholder="Ex: Superior incompleto em Sistemas de Informação, Ciências da computação ou afins." value="{{ $vaga->formacao }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="atribuicoes">Atribuições</label>
                            <textarea rows="5" class="form-control" name="atribuicoes" id="atribuicoes" required>{{ $vaga->atribuicoes }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="requisitos">Requisitos</label>
                            <textarea rows="8" class="form-control" name="requisitos" id="requisitos" required>{{ $vaga->requisitos }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="desejavel">Desejável</label>
                            <textarea rows="6" class="form-control" name="desejavel" id="desejavel" required>{{ $vaga->desejavel }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="remuneracao">Remuneração</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">R$</span>
                                </div>
                                <input type="number" step=".01" class="form-control" id="remuneracao" name="remuneracao" placeholder="0.00" value="{{ $vaga->remuneracao }}" required>
                            </div>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="remuneracao">Horario</label>
                            <label for="horario">Horário</label>
                            <input type="text" class="form-control" id="horario" name="horario" placeholder="Ex: De segunda a quinta, das 7:30 às 17:30, e sexta das 7:30 as 16:30." value="{{ $vaga->horario }}">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="vagas">Vagas</label>
                            <div class="input-group">
                                <input type="number" step="1" class="form-control" id="vagas" name="vagas" placeholder="1" value="{{ $vaga->vagas }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="beneficios">Benefícios</label>
                            <input type="text" class="form-control" id="beneficios" name="beneficios" placeholder="Ex: Auxílio transporte, auxílio alimentação..." value="{{ $vaga->beneficios }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="contato">Contato</label>
                            <input type="text" class="form-control" name="contato" id="contato" placeholder='Ex: Enviar e-mail para contato@empresa.com o assunto "Estágio" até o dia 31/12/2019.' value="{{ $vaga->contato }}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="data_final">Data final para candidatura</label>
                            <input type="date" class="form-control" name="data_final" id="data_final" value="{{ $vaga->data_final }}" required>
                        </div>
                    </div>
    
                    <hr class="mb-4">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <button class="btn btn-success btn-lg btn-block" type="submit"><i class="fas fa-check-circle mr-1"></i> Editar vaga</button>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{route('vagas.index')}}" class="btn btn-danger btn-lg btn-block"><i class="fas fa-times-circle mr-1"></i> Cancelar</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection