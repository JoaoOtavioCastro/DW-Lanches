@extends('layouts.main')
@section('title', 'Prato')
@section('content')
    <h1>Prato</h1>
    <p>Nome: {{ $prato->nome }}</p>
    @if ($prato->imagem)
        <img src="{{ $prato->imagem }}" alt="{{ $prato->nome }}">
    @endif
    <p>Descrição: {{ $prato->descricao }}</p>
    <p>Preço: {{ $prato->preco }}</p>
    <p>Disponibilidade: {{ $prato->disponibilidade }}</p>
    <p>Autor: {{ $prato->user->nome }}</p>
    <a href="{{ route('prato.edit', $prato->id) }}">Editar</a>
    <form action="{{ route('prato.destroy', $prato->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Deletar</button>
    </form>
    <a href="{{ route('prato.index') }}">Voltar</a>
@endsection
