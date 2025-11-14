<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Veiculo;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Cor;
use App\Models\VeiculoFoto;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $veiculos = Veiculo::with(['marca', 'modelo', 'cor'])->get();
        return view('admin.veiculos.index', compact('veiculos'));
    }

    public function create()
    {
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $cores = Cor::all();
        return view('admin.veiculos.create', compact('marcas', 'modelos', 'cores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'marca_id' => 'required|exists:marcas,id',
            'modelo_id' => 'required|exists:modelos,id',
            'cor_id' => 'required|exists:cores,id',
            'ano' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'quilometragem' => 'required|integer|min:0',
            'valor' => 'required|numeric|min:0',
            'detalhes' => 'nullable|string',
            'foto_principal' => 'required|url',
            'fotos' => 'required|array|min:3',
            'fotos.*' => 'required|url',
        ]);

        $veiculo = Veiculo::create($request->except('fotos'));

        foreach ($request->fotos as $foto_url) {
            VeiculoFoto::create([
                'veiculo_id' => $veiculo->id,
                'url' => $foto_url,
            ]);
        }

        return redirect()->route('admin.veiculos.index')
            ->with('success', 'Veículo criado com sucesso!');
    }

    public function edit($id)
    {
        $veiculo = Veiculo::with('fotos')->findOrFail($id);
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $cores = Cor::all();
        return view('admin.veiculos.edit', compact('veiculo', 'marcas', 'modelos', 'cores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'marca_id' => 'required|exists:marcas,id',
            'modelo_id' => 'required|exists:modelos,id',
            'cor_id' => 'required|exists:cores,id',
            'ano' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'quilometragem' => 'required|integer|min:0',
            'valor' => 'required|numeric|min:0',
            'detalhes' => 'nullable|string',
            'foto_principal' => 'required|url',
            'fotos' => 'required|array|min:3',
            'fotos.*' => 'required|url',
        ]);

        $veiculo = Veiculo::findOrFail($id);
        $veiculo->update($request->except('fotos'));

        // Remover fotos antigas e adicionar novas
        VeiculoFoto::where('veiculo_id', $veiculo->id)->delete();
        
        foreach ($request->fotos as $foto_url) {
            VeiculoFoto::create([
                'veiculo_id' => $veiculo->id,
                'url' => $foto_url,
            ]);
        }

        return redirect()->route('admin.veiculos.index')
            ->with('success', 'Veículo atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->delete();

        return redirect()->route('admin.veiculos.index')
            ->with('success', 'Veículo excluído com sucesso!');
    }
}
