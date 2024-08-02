@extends('layouts.main')
@section('title', 'Prato')
@section('content')
<style>
    .prato-detail {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .prato-detail h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .prato-detail figure {
        text-align: center;
        margin: 20px 0;
    }

    .prato-detail .prato-image {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .prato-detail p {
        font-size: 16px;
        margin: 10px 0;
    }

    .btn-action {
        display: inline-block;
        padding: 10px 20px;
        border-radius: 4px;
        font-size: 16px;
        text-decoration: none;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s;
        border: none;
    }

    .btn-action:hover {
        opacity: 0.8;
    }

    .btn-edit {
        background-color: #007bff;
    }

    .btn-delete {
        background-color: #dc3545;
    }

    .btn-back {
        display: inline-block;
        padding: 10px 20px;
        margin-top: 20px;
        border-radius: 4px;
        font-size: 16px;
        text-decoration: none;
        color: #fff;
        background-color: #6c757d;
        transition: background-color 0.3s;
    }

    .btn-back:hover {
        opacity: 0.8;
    }

    .action-form {
        display: inline-block;
        margin: 0;
    }

    .btn-action.btn-pedir {
        background-color: #28a745;
        /* Verde escuro */
        color: #fff;
    }

    .btn-action.btn-pedir:hover {
        background-color: #218838;
        /* Verde mais escuro para o efeito hover */
    }
</style>
<div class="custom-container prato-detail">
    <h1>{{ $prato->nome }}</h1>
    @if ($prato->imagem)
        <figure>
            <img src="/img/pratos/{{ $prato->imagem }}" alt="{{ $prato->nome }}" class="prato-image">
        </figure>
    @endif
    <p><strong>Descrição:</strong> {{ $prato->descricao }}</p>
    <p><strong>Preço:</strong> R$ {{ number_format($prato->preco, 2, ',', '.') }}</p>
    <p><strong>Disponibilidade:</strong> {{ $prato->Disponibilidade }}</p>
    <p><strong>Autor:</strong> {{ $nome_autor }}</p>
    @auth
        <form action="{{ route('prato.pedir', $prato->id) }}" method="post" class="action-form">
            @csrf
            @if($prato->Disponibilidade != 'Indisponivel')
            <button type="submit" class="btn-action btn-pedir" >Pedir</button>
            @else
            <button type="submit" class="btn-action btn-pedir" disabled>Indisponível</button>
            @endif
        </form>
    @endauth
    @if ($prato->user->id == Auth::id())
        <div class="action-buttons">
            <br><a href="{{ route('prato.edit', $prato->id) }}" class="btn-action btn-edit">Editar</a><br><br>
            <form action="{{ route('prato.destroy', $prato->id) }}" method="post" class="action-form">
                @csrf
                @method('delete')
                <button type="submit" class="btn-action btn-delete">Deletar</button>
            </form>
        </div>
    @endif
    <a href="{{ route('prato.index') }}" class="btn-back">Voltar</a>
</div>
@endsection