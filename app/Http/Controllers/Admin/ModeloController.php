<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modelo;
use App\Models\Marca;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $modelos = Modelo::with('marca')->get();
        return view('admin.modelos.index', compact('modelos'));
    }

    public function create()
    {
        $marcas = Marca::all();
        return view('admin.modelos.create', compact('marcas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'marca_id' => 'required|exists:marcas,id',
        ]);

        Modelo::create($request->all());

        return redirect()->route('admin.modelos.index')
            ->with('success', 'Modelo criado com sucesso!');
    }

    public function edit($id)
    {
        $modelo = Modelo::findOrFail($id);
        $marcas = Marca::all();
        return view('admin.modelos.edit', compact('modelo', 'marcas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'marca_id' => 'required|exists:marcas,id',
        ]);

        $modelo = Modelo::findOrFail($id);
        $modelo->update($request->all());

        return redirect()->route('admin.modelos.index')
            ->with('success', 'Modelo atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $modelo = Modelo::findOrFail($id);
        $modelo->delete();

        return redirect()->route('admin.modelos.index')
            ->with('success', 'Modelo excluído com sucesso!');
    }
}
