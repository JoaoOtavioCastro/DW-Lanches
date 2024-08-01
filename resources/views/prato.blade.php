@extends('layouts.main')
@section('title', 'Prato')
@section('content')
    <h1>Prato</h1>
    <p>Nome: {{ $prato->nome }}</p>
    @if ($prato->imagem)
    <figure>
    <img src="/img/pratos/{{ $prato->imagem }}" alt="{{ $prato->nome }}">
    </figure>
    @endif
    <p>Descrição: {{ $prato->descricao }}</p>
    <p>Preço: {{ $prato->preco }}</p>
    <p>Disponibilidade: {{ $prato->disponibilidade }}</p>
    <p>Autor: {{ $nome_autor}}</p>
    @auth
<form action="{{route('prato.pedir', $prato->id)}}" method="post">
    @csrf
    <button type="submit">Pedir</button>
</form>
@endauth
    @if($prato->user->id == Auth::id())
    <a href="{{ route('prato.edit', $prato->id) }}">Editar</a>
    <form action="{{ route('prato.destroy', $prato->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Deletar</button>
    </form>
    @endif
    <a href="{{ route('prato.index') }}">Voltar</a>
@endsection
