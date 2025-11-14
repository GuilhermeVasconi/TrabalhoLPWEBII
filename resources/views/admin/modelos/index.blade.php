@extends('layouts.app')

@section('title', 'Gerenciar Modelos')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Gerenciar Modelos</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.modelos.create') }}" class="btn btn-success">Novo Modelo</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Marca</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($modelos as $modelo)
                        <tr>
                            <td>{{ $modelo->id }}</td>
                            <td>{{ $modelo->nome }}</td>
                            <td>{{ $modelo->marca->nome }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.modelos.edit', $modelo->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                <form action="{{ route('admin.modelos.destroy', $modelo->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este modelo?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Nenhum modelo cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
