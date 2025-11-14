@extends('layouts.app')

@section('title', 'Editar Veículo')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2>Editar Veículo</h2>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.veiculos.update', $veiculo->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="marca_id" class="form-label">Marca</label>
                        <select class="form-select @error('marca_id') is-invalid @enderror" id="marca_id" name="marca_id" required>
                            <option value="">Selecione uma marca</option>
                            @foreach($marcas as $marca)
                                <option value="{{ $marca->id }}" {{ old('marca_id', $veiculo->marca_id) == $marca->id ? 'selected' : '' }}>
                                    {{ $marca->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('marca_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="modelo_id" class="form-label">Modelo</label>
                        <select class="form-select @error('modelo_id') is-invalid @enderror" id="modelo_id" name="modelo_id" required>
                            <option value="">Selecione um modelo</option>
                            @foreach($modelos as $modelo)
                                <option value="{{ $modelo->id }}" {{ old('modelo_id', $veiculo->modelo_id) == $modelo->id ? 'selected' : '' }}>
                                    {{ $modelo->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('modelo_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="cor_id" class="form-label">Cor</label>
                        <select class="form-select @error('cor_id') is-invalid @enderror" id="cor_id" name="cor_id" required>
                            <option value="">Selecione uma cor</option>
                            @foreach($cores as $cor)
                                <option value="{{ $cor->id }}" {{ old('cor_id', $veiculo->cor_id) == $cor->id ? 'selected' : '' }}>
                                    {{ $cor->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('cor_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="ano" class="form-label">Ano</label>
                        <input type="number" class="form-control @error('ano') is-invalid @enderror" id="ano" name="ano" value="{{ old('ano', $veiculo->ano) }}" required>
                        @error('ano')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="quilometragem" class="form-label">Quilometragem</label>
                        <input type="number" class="form-control @error('quilometragem') is-invalid @enderror" id="quilometragem" name="quilometragem" value="{{ old('quilometragem', $veiculo->quilometragem) }}" required>
                        @error('quilometragem')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="valor" class="form-label">Valor (R$)</label>
                    <input type="number" step="0.01" class="form-control @error('valor') is-invalid @enderror" id="valor" name="valor" value="{{ old('valor', $veiculo->valor) }}" required>
                    @error('valor')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="foto_principal" class="form-label">URL da Foto Principal</label>
                    <input type="url" class="form-control @error('foto_principal') is-invalid @enderror" id="foto_principal" name="foto_principal" value="{{ old('foto_principal', $veiculo->foto_principal) }}" required>
                    @error('foto_principal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">URLs das Fotos Adicionais (mínimo 3)</label>
                    @foreach($veiculo->fotos as $index => $foto)
                        <input type="url" class="form-control mb-2" name="fotos[]" value="{{ old('fotos.' . $index, $foto->url) }}" required>
                    @endforeach
                    @if($veiculo->fotos->count() < 3)
                        @for($i = $veiculo->fotos->count(); $i < 3; $i++)
                            <input type="url" class="form-control mb-2" name="fotos[]" value="{{ old('fotos.' . $i) }}" placeholder="URL da Foto {{ $i + 1 }}" required>
                        @endfor
                    @endif
                    @error('fotos')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="detalhes" class="form-label">Detalhes</label>
                    <textarea class="form-control @error('detalhes') is-invalid @enderror" id="detalhes" name="detalhes" rows="4">{{ old('detalhes', $veiculo->detalhes) }}</textarea>
                    @error('detalhes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                    <a href="{{ route('admin.veiculos.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
