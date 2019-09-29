<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Empresa;
use App\Vaga;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $empresas = Empresa::with(['enderecos', 'vagas'])->get();
        $vagas = Vaga::All();
        return view('index', compact('empresas', 'vagas'));
    }

    public function show($id)
    {
        $vaga = Vaga::find($id);
        $empresa = Empresa::with(['enderecos', 'contatos'])->where('id', $vaga->empresa_id)->get();
        return view('show', compact(['vaga', 'empresa']));
    }
}
