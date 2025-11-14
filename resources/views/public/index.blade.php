@extends('layouts.app')

@section('title', 'Veículos Disponíveis')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h1 class="text-center mb-4">Veículos Disponíveis para Venda</h1>
            <p class="text-center text-muted">Confira nossa seleção de veículos</p>
        </div>
    </div>

    <div class="row">
        @forelse($veiculos as $veiculo)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ $veiculo->foto_principal }}" class="card-img-top" alt="{{ $veiculo->marca->nome }} {{ $veiculo->modelo->nome }}" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $veiculo->marca->nome }} {{ $veiculo->modelo->nome }}</h5>
                        <p class="card-text">
                            <strong>Cor:</strong> {{ $veiculo->cor->nome }}<br>
                            <strong>Ano:</strong> {{ $veiculo->ano }}<br>
                            <strong>Quilometragem:</strong> {{ number_format($veiculo->quilometragem, 0, ',', '.') }} km<br>
                            <strong class="text-success fs-5">R$ {{ number_format($veiculo->valor, 2, ',', '.') }}</strong>
                        </p>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="{{ route('public.show', $veiculo->id) }}" class="btn btn-primary w-100">Ver Detalhes</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12">
                <div class="alert alert-info text-center">
                    Nenhum veículo disponível no momento.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
