@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Painel Administrativo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Bem-vindo ao sistema de gerenciamento de veículos!</p>
                    <p>Use o menu acima para gerenciar marcas, modelos, cores e veículos.</p>
                    
                    <div class="mt-4">
                        <a href="{{ route('admin.veiculos.index') }}" class="btn btn-primary">Gerenciar Veículos</a>
                        <a href="{{ route('public.index') }}" class="btn btn-secondary">Ver Site Público</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
