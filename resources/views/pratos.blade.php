@extends('layouts.main')
@section('title', 'Pratos')
@section('content')
<style>
    body {
        font-family: 'Figtree', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color: #f4f4f4;
        color: #333;
    }

    /* Contêiner principal */

    .custom-container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* Título da página */

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    /* Estilos dos itens de prato */

    .prato-item {
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
        background-color: #f9f9f9;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .prato-item h3 {
        margin-top: 0;
    }

    .prato-item figure {
        margin: 0;
        text-align: center;
    }

    .prato-item img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin-top: 10px;
    }

    /* Botões */

    .btn-create,
    .btn-view {
        display: inline-block;
        padding: 10px 20px;
        margin-top: 10px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    .btn-create {
        background-color: #007bff;
        color: #fff;
        margin-bottom: 20px;
    }

    .btn-view {
        background-color: #28a745;
        color: #fff;
    }

    .btn-create:hover,
    .btn-view:hover {
        opacity: 0.8;
    }

    /* Linha horizontal */

    hr {
        border: 0;
        height: 1px;
        background: #ccc;
        margin: 20px 0;
    }
</style>
<div class="custom-container">
    <h1>Pratos</h1>
    <a href="{{ route('prato.create')}}" class="btn-create">Criar Prato</a>
    @foreach ($pratos as $prato)
        <div class="prato-item">
            <h3>{{ $prato->nome }}</h3>
            @if ($prato->imagem)
                <figure>
                    <img src="/img/pratos/{{ $prato->imagem }}" alt="{{ $prato->nome }}" style="
                    width: 25vw;
                    ">
                </figure>
            @endif
            <p><strong>Descrição:</strong> {{ $prato->descricao }}</p>
            <p><strong>Disponibilidade:</strong> {{ $prato->Disponibilidade }}</p>
            <p><strong>Preço:</strong> {{ $prato->preco }}</p>
            <p><strong>Autor:</strong> {{ $prato->user->name }}</p>
            <a href="/prato/{{$prato->id}}" class="btn-view">Ver mais</a>
        </div>
        <hr>
    @endforeach
</div>
@endsection