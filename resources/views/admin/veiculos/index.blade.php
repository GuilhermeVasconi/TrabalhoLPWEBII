@extends('layouts.app')

@section('title', 'Gerenciar Veículos')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Gerenciar Veículos</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.veiculos.create') }}" class="btn btn-success">Novo Veículo</a>
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
                        <th>Foto</th>
                        <th>Marca/Modelo</th>
                        <th>Cor</th>
                        <th>Ano</th>
                        <th>Valor</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($veiculos as $veiculo)
                        <tr>
                            <td>{{ $veiculo->id }}</td>
                            <td>
                                <img src="{{ $veiculo->foto_principal }}" alt="Foto" style="width: 60px; height: 40px; object-fit: cover;" class="rounded">
                            </td>
                            <td>{{ $veiculo->marca->nome }} {{ $veiculo->modelo->nome }}</td>
                            <td>{{ $veiculo->cor->nome }}</td>
                            <td>{{ $veiculo->ano }}</td>
                            <td>R$ {{ number_format($veiculo->valor, 2, ',', '.') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.veiculos.edit', $veiculo->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                <form action="{{ route('admin.veiculos.destroy', $veiculo->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este veículo?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Nenhum veículo cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
