@extends('layouts.app')

@section('title', 'Gerenciar Cores')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Gerenciar Cores</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.cores.create') }}" class="btn btn-success">Nova Cor</a>
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
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cores as $cor)
                        <tr>
                            <td>{{ $cor->id }}</td>
                            <td>{{ $cor->nome }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.cores.edit', $cor->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                <form action="{{ route('admin.cores.destroy', $cor->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta cor?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Nenhuma cor cadastrada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
