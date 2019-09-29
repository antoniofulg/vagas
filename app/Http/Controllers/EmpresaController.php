<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Empresa;
use App\Contato;
use App\Endereco;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::with(['enderecos', 'contatos', 'vagas'])->get();
        return view('empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'nome' => 'required',
            'email' => 'required|unique:contatos|email',
            'telefone' => 'required|unique:contatos',
            'website' => 'unique:contatos',
            'logradouro' => 'required|min:6',
            'numero' => 'required',
            'bairro' => 'required|min:3',
            'cidade' => 'required|min:2',
            'uf' => 'required|min:2',
            'cep' => 'required|min:2',
        ]);

        $empresa = new Empresa();
        $empresa->nome = $request->input('nome');

        $contato = new Contato();
        $contato->email = $request->input('email');
        $contato->telefone = $request->input('telefone');
        $contato->website = $request->input('website');

        $endereco = new Endereco();
        $endereco->logradouro = $request->input('logradouro');
        $endereco->numero = $request->input('numero');
        $endereco->complemento = $request->input('complemento');
        $endereco->bairro = $request->input('bairro');
        $endereco->cidade = $request->input('cidade');
        $endereco->uf = $request->input('uf');
        $endereco->cep = $request->input('cep');

        $empresa->save();
        $empresa->contatos()->save($contato);
        $empresa->enderecos()->save($endereco);

        return redirect('empresas')->with('success', 'Empresa cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::where('id', $id)->with(['enderecos', 'contatos', 'vagas'])->get();
        return view('empresas.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::where('id', $id)->with(['enderecos', 'contatos', 'vagas'])->get();
        return view('empresas.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            "nome" => "required",
            "email" => "required|unique:contatos,email,$id",
            "telefone" => "required|unique:contatos,telefone,$id",
            "website" => "unique:contatos,website,$id",
            "logradouro" => "required|min:6",
            "numero" => "required",
            "bairro" => "required|min:3",
            "cidade" => "required|min:2",
            "uf" => "required|min:2",
            "cep" => "required|min:2",
        ]);

        $empresa = Empresa::find($id);
        $empresa->nome = $request->input('nome');
        $empresa->save();

        $contato = Contato::where('empresa_id', $id)->first();
        $contato->email = $request->input('email');
        $contato->telefone = $request->input('telefone');
        $contato->website = $request->input('website');
        $contato->save();

        $endereco = Endereco::where('empresa_id', $id)->first();
        $endereco->logradouro = $request->input('logradouro');
        $endereco->numero = $request->input('numero');
        $endereco->complemento = $request->input('complemento');
        $endereco->bairro = $request->input('bairro');
        $endereco->cidade = $request->input('cidade');
        $endereco->uf = $request->input('uf');
        $endereco->cep = $request->input('cep');
        $endereco->save();

        return redirect('empresas')->with('success', 'Empresa atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::find($id);
        if (isset($empresa)) {
            $empresa->delete();
        }
        return redirect('empresas')->with('success', 'Empresa deletada com sucesso!');
    }
}
