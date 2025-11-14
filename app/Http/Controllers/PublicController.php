<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $veiculos = Veiculo::with(['marca', 'modelo', 'cor'])->get();
        return view('public.index', compact('veiculos'));
    }

    public function show($id)
    {
        $veiculo = Veiculo::with(['marca', 'modelo', 'cor', 'fotos'])->findOrFail($id);
        return view('public.show', compact('veiculo'));
    }
}
