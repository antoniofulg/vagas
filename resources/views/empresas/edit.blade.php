@extends('structure.head', ["menu_active" => "empresas"])

@section('titulo', 'Atualizar empresa')

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

@if (count($empresa) > 0)

    <div class="card border shadow-sm">
        <div class="card-body">
            <div class="order-md-1">
                <form class="needs-validation" action="{{route('empresas.update', $empresa->first()->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nome">Nome da Empresa</label>
                            <input type="text" class="form-control" name="nome" id="nome" value="{{ $empresa->first()->nome }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="contato@empresa.com" value="{{ $empresa->first()->contatos->first()->email }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="website">Website</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">http://</span>
                                </div>
                                <input type="text" class="form-control" id="website" name="website" placeholder="Ex: www.minhaempresa.com.br" value="{{ $empresa->first()->contatos->first()->website }}">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Ex: (XX) 99999-9999" value="{{ $empresa->first()->contatos->first()->telefone }}" required>
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="logradouro">Logradouro</label>
                            <input type="text" class="form-control" name="logradouro" id="logradouro" placeholder="Av. | Rua Principal" value="{{ $empresa->first()->enderecos->first()->logradouro }}" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="numero">Número</label>
                            <input type="text" class="form-control" id="numero" name="numero" placeholder="999 A" value="{{ $empresa->first()->enderecos->first()->numero }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Ex: Próximo a praça..." value="{{ $empresa->first()->enderecos->first()->complemento }}">
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Ex. Centro" value="{{ $empresa->first()->enderecos->first()->bairro }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" value="{{ $empresa->first()->enderecos->first()->cidade }}" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="uf">UF</label>
                            <select class="custom-select d-block w-100" id="uf" name="uf" required>
                                <option value="">Escolha...</option>
                                <option value="AC" @if ($empresa->first()->enderecos->first()->uf == 'AC') selected @endif>Acre</option>
                                <option value="AL" @if ($empresa->first()->enderecos->first()->uf == 'AL') selected @endif>Alagoas</option>
                                <option value="AP" @if ($empresa->first()->enderecos->first()->uf == 'AP') selected @endif>Amapá</option>
                                <option value="AM" @if ($empresa->first()->enderecos->first()->uf == 'AM') selected @endif>Amazonas</option>
                                <option value="BA" @if ($empresa->first()->enderecos->first()->uf == 'BA') selected @endif>Bahia</option>
                                <option value="CE" @if ($empresa->first()->enderecos->first()->uf == 'CE') selected @endif>Ceará</option>
                                <option value="DF" @if ($empresa->first()->enderecos->first()->uf == 'DF') selected @endif>Distrito Federal</option>
                                <option value="ES" @if ($empresa->first()->enderecos->first()->uf == 'ES') selected @endif>Espírito Santo</option>
                                <option value="GO" @if ($empresa->first()->enderecos->first()->uf == 'GO') selected @endif>Goiás</option>
                                <option value="MA" @if ($empresa->first()->enderecos->first()->uf == 'MA') selected @endif>Maranhão</option>
                                <option value="MT" @if ($empresa->first()->enderecos->first()->uf == 'MT') selected @endif>Mato Grosso</option>
                                <option value="MS" @if ($empresa->first()->enderecos->first()->uf == 'MS') selected @endif>Mato Grosso do Sul</option>
                                <option value="MG" @if ($empresa->first()->enderecos->first()->uf == 'MG') selected @endif>Minas Gerais</option>
                                <option value="PA" @if ($empresa->first()->enderecos->first()->uf == 'PA') selected @endif>Pará</option>
                                <option value="PB" @if ($empresa->first()->enderecos->first()->uf == 'PB') selected @endif>Paraíba</option>
                                <option value="PR" @if ($empresa->first()->enderecos->first()->uf == 'PR') selected @endif>Paraná</option>
                                <option value="PE" @if ($empresa->first()->enderecos->first()->uf == 'PE') selected @endif>Pernambuco</option>
                                <option value="PI" @if ($empresa->first()->enderecos->first()->uf == 'PI') selected @endif>Piauí</option>
                                <option value="RJ" @if ($empresa->first()->enderecos->first()->uf == 'RJ') selected @endif>Rio de Janeiro</option>
                                <option value="RN" @if ($empresa->first()->enderecos->first()->uf == 'RN') selected @endif>Rio Grande do Norte</option>
                                <option value="RS" @if ($empresa->first()->enderecos->first()->uf == 'RS') selected @endif>Rio Grande do Sul</option>
                                <option value="RO" @if ($empresa->first()->enderecos->first()->uf == 'RO') selected @endif>Rondônia</option>
                                <option value="RR" @if ($empresa->first()->enderecos->first()->uf == 'RR') selected @endif>Roraima</option>
                                <option value="SC" @if ($empresa->first()->enderecos->first()->uf == 'SC') selected @endif>Santa Catarina</option>
                                <option value="SP" @if ($empresa->first()->enderecos->first()->uf == 'SP') selected @endif>São Paulo</option>
                                <option value="SE" @if ($empresa->first()->enderecos->first()->uf == 'SE') selected @endif>Sergipe</option>
                                <option value="TO" @if ($empresa->first()->enderecos->first()->uf == 'TO') selected @endif>Tocantins</option>
                            </select>
                        </div>


                        <div class="col-md-3 mb-3">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" id="cep" name="cep" placeholder="99999-999" value="{{ $empresa->first()->enderecos->first()->cep }}" required>
                        </div>
                    </div>
                
                    <hr class="mb-4">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <button class="btn btn-success btn-lg btn-block" type="submit"><i class="fas fa-check-circle mr-1"></i> Editar cadastro</button>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{route('empresas.index')}}" class="btn btn-danger btn-lg btn-block"><i class="fas fa-times-circle mr-1"></i> Cancelar</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@else

@endif

@endsection