@extends('structure.head', ["menu_active" => "empresas"])

@section('titulo', 'Cadastrar empresa')

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

    <div class="card border shadow-sm">
        <div class="card-body">
            <div class="order-md-1">
                <form class="needs-validation" action="{{route('empresas.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nome">Nome da Empresa</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Ex: Minha empresa" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Ex: contato@empresa.com" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="website">Website</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">http://</span>
                                </div>
                                <input type="text" class="form-control" id="website" name="website" placeholder="Ex: www.minhaempresa.com.br">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Ex: (XX) 99999-9999" required>
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="logradouro">Logradouro</label>
                            <input type="text" class="form-control" name="logradouro" id="logradouro" placeholder="Ex: Av. | Rua Principal" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="numero">Número</label>
                            <input type="text" class="form-control" id="numero" name="numero" placeholder="Ex: 999 A" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Ex: Próximo a praça...">
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Ex. Centro" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="uf">UF</label>
                            <select class="custom-select d-block w-100" id="uf" name="uf" required>
                                <option value="">Escolha...</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </div>


                        <div class="col-md-3 mb-3">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" id="cep" name="cep" placeholder="Ex: 99999-999" required>
                        </div>
                    </div>
                
                    <hr class="mb-4">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <button class="btn btn-success btn-lg btn-block" type="submit"><i class="fas fa-check-circle mr-1"></i> Cadastrar nova empresa</button>
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

@endsection