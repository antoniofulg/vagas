<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vaga;
use App\Empresa;

class VagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::with(['enderecos', 'vagas'])->get();
        $vagas = Vaga::All();
        return view('vagas.index', compact(['empresas', 'vagas']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all();
        return view('vagas.create', compact('empresas'));
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
            'empresa' => 'required',
            'titulo' => 'required|min:5',
            'cargo' => 'required|min:3',
            'regime' => 'required|numeric',
            'formacao' => 'required|min:5',
            'atribuicoes' => 'required|min:5',
            'requisitos' => 'required|min:5',
            'remuneracao' => 'required|numeric',
            'contato' => 'required|min:3',
            'horario' => 'required|min:3',
            'vagas' => 'required|numeric|min:1',
            'data_final' => 'required|date'
        ]);

        $vaga = new Vaga();
        $vaga->empresa_id = $request->input('empresa');
        $vaga->titulo = $request->input('titulo');
        $vaga->cargo = $request->input('cargo');
        $vaga->regime = $request->input('regime');
        $vaga->formacao = $request->input('formacao');
        $vaga->atribuicoes = $request->input('atribuicoes');
        $vaga->requisitos = $request->input('requisitos');
        $vaga->desejavel = $request->input('desejavel');
        $vaga->remuneracao = $request->input('remuneracao');
        $vaga->beneficios = $request->input('beneficios');
        $vaga->contato = $request->input('contato');
        $vaga->horario = $request->input('horario');
        $vaga->vagas = $request->input('vagas');
        $vaga->data_final = $request->input('data_final');
        $vaga->save();
        return redirect('vagas')->with('success', 'Vaga cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vaga = Vaga::find($id);
        $empresa = Empresa::with(['enderecos', 'contatos'])->where('id', $vaga->empresa_id)->get();
        return view('show', compact(['vaga', 'empresa']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vaga = Vaga::find($id);
        $empresas = Empresa::all();
        return view('vagas.edit', compact(['vaga', 'empresas']));
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
            'empresa' => 'required',
            'titulo' => 'required|min:5',
            'cargo' => 'required|min:3',
            'regime' => 'required|numeric',
            'formacao' => 'required|min:5',
            'atribuicoes' => 'required|min:5',
            'requisitos' => 'required|min:5',
            'remuneracao' => 'required|numeric',
            'contato' => 'required|min:3',
            'horario' => 'required|min:3',
            'vagas' => 'required|numeric|min:1',
            'data_final' => 'required|date'
        ]);

        $vaga = Vaga::find($id);
        $vaga->empresa_id = $request->input('empresa');
        $vaga->titulo = $request->input('titulo');
        $vaga->cargo = $request->input('cargo');
        $vaga->regime = $request->input('regime');
        $vaga->formacao = $request->input('formacao');
        $vaga->atribuicoes = $request->input('atribuicoes');
        $vaga->requisitos = $request->input('requisitos');
        $vaga->desejavel = $request->input('desejavel');
        $vaga->remuneracao = $request->input('remuneracao');
        $vaga->beneficios = $request->input('beneficios');
        $vaga->contato = $request->input('contato');
        $vaga->horario = $request->input('horario');
        $vaga->vagas = $request->input('vagas');
        $vaga->data_final = $request->input('data_final');
        $vaga->save();

        return redirect('vagas')->with('success', 'Vaga atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vaga = Vaga::find($id);
        if (isset($vaga)) {
            $vaga->delete();
        }
        return redirect('vagas')->with('success', 'Vaga deletada com sucesso!');
    }
}
