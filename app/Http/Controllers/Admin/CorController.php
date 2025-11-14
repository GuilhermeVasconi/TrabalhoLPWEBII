<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cor;
use Illuminate\Http\Request;

class CorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cores = Cor::all();
        return view('admin.cores.index', compact('cores'));
    }

    public function create()
    {
        return view('admin.cores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Cor::create($request->all());

        return redirect()->route('admin.cores.index')
            ->with('success', 'Cor criada com sucesso!');
    }

    public function edit($id)
    {
        $cor = Cor::findOrFail($id);
        return view('admin.cores.edit', compact('cor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $cor = Cor::findOrFail($id);
        $cor->update($request->all());

        return redirect()->route('admin.cores.index')
            ->with('success', 'Cor atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $cor = Cor::findOrFail($id);
        $cor->delete();

        return redirect()->route('admin.cores.index')
            ->with('success', 'Cor excluída com sucesso!');
    }
}
