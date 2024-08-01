@extends('layouts.main')
@section('title', 'Pedidos')
@section('content')
<style>
    .pedidos-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .pedidos-container h1 {
        margin-bottom: 2rem;
    }

    .pedido-item {
        margin-bottom: 1.5rem;
        padding-bottom: 1.5rem;
    }

    .pedido-item h3 {
        margin: 0;
        font-size: 1.2rem;
    }

    .pedido-item p {
        margin: 0.5rem 0;
        font-size: 1rem;
    }

    .btn-view {
        display: inline-block;
        background-color: #007bff;
        color: #fff;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .btn-view:hover {
        background-color: #0056b3;
    }

    .form-delete {
        display: inline;
        margin-left: 1rem;
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
</style>
<div class="pedidos-container">
    <h1>Meus Pedidos</h1>

    @foreach ($pedidos as $pedido)
        <div class="pedido-item">
            <h3>Usuário: {{ $pedido->user->name }}</h3>
            <p><strong>Data:</strong> {{ $pedido->created_at->format('d/m/Y H:i') }}</p>
            <a href="/pedido/{{$pedido->id}}" class="btn-view">Ver mais</a>
            <form action="{{ route('pedido.destroy', $pedido->id) }}" method="post" class="form-delete">
                @csrf
                @method('delete')
                <button type="submit" class="btn-delete">Excluir</button>
            </form>
            <hr>
        </div>
    @endforeach
</div>

@endsection