@extends('layouts.app')

@section('title', $veiculo->marca->nome . ' ' . $veiculo->modelo->nome)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="{{ route('public.index') }}" class="btn btn-secondary">
                &larr; Voltar para Listagem
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <img src="{{ $veiculo->foto_principal }}" class="card-img-top" alt="{{ $veiculo->marca->nome }} {{ $veiculo->modelo->nome }}" style="max-height: 500px; object-fit: cover;">
            </div>

            <h4>Galeria de Fotos</h4>
            <div class="row">
                @foreach($veiculo->fotos as $foto)
                    <div class="col-md-4 mb-3">
                        <img src="{{ $foto->url }}" class="img-fluid rounded shadow-sm" alt="Foto do veículo" style="height: 200px; width: 100%; object-fit: cover;">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">{{ $veiculo->marca->nome }} {{ $veiculo->modelo->nome }}</h4>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Marca:</th>
                                <td>{{ $veiculo->marca->nome }}</td>
                            </tr>
                            <tr>
                                <th>Modelo:</th>
                                <td>{{ $veiculo->modelo->nome }}</td>
                            </tr>
                            <tr>
                                <th>Cor:</th>
                                <td>{{ $veiculo->cor->nome }}</td>
                            </tr>
                            <tr>
                                <th>Ano:</th>
                                <td>{{ $veiculo->ano }}</td>
                            </tr>
                            <tr>
                                <th>Quilometragem:</th>
                                <td>{{ number_format($veiculo->quilometragem, 0, ',', '.') }} km</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="alert alert-success text-center mb-3">
                        <h3 class="mb-0">R$ {{ number_format($veiculo->valor, 2, ',', '.') }}</h3>
                    </div>

                    <h5>Detalhes</h5>
                    <p>{{ $veiculo->detalhes ?? 'Sem detalhes adicionais.' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
