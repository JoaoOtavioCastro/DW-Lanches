@extends('layouts.main')
@section('title', 'Pedido')
@section('content')
<style>
    .pedido-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .pedido-container h1 {
        margin-bottom: 1rem;
    }

    .pedido-container .user-info {
        font-weight: bold;
        margin-bottom: 1rem;
    }

    .prato-item {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #ddd;
    }

    .prato-image {
        border-radius: 8px;
        margin-right: 1rem;
    }

    .prato-details {
        flex: 1;
    }

    .prato-details p {
        margin: 0.5rem 0;
    }

    .form-delete {
        display: inline;
    }

    .btn-delete {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }

    .form-finalizar {
        margin-top: 2rem;
    }

    .btn-finalizar {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 0.8rem 1.2rem;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-finalizar:hover {
        background-color: #0056b3;
    }
</style>
<div class="pedido-container">
    <h1>Pedido</h1>
    <p class="user-info">Usuário: {{ $pedido->user->name }}</p>
    <hr>

    @foreach ($pedido->pratos as $prato)
        <div class="prato-item">
            <figure>
                <img src="/img/pratos/{{ $prato->imagem }}" alt="{{ $prato->nome }}" class="prato-image">
            </figure>
            <div class="prato-details">
                <p><strong>Prato:</strong> {{ $prato->nome }}</p>
                <p><strong>Preço:</strong> {{ $prato->preco }}</p>
                <p><strong>Autor:</strong> {{ $prato->user->name }}</p>
                <form action="{{ route('prato.cancelar', $prato->id) }}" method="post" class="form-delete">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn-delete">Excluir</button>
                </form>
            </div>
            <hr>
        </div>
    @endforeach

    <form action="{{ route('pedido.store') }}" method="post" class="form-finalizar">
        @csrf
        <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
        <button type="submit" class="btn-finalizar">Finalizar Pedido</button>
    </form>
</div>

@endsection