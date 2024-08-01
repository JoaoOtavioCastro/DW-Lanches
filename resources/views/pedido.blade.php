@extends('layouts.main')
@section('title', 'Pedido')
@section('content')

<h1>Pedido</h1>
<p>Usuário: {{ $pedido->user->name }}</p>
<hr>
@foreach ($pedido->pratos as $prato)
<figure>
    <img src="/img/pratos/{{ $prato->imagem }}" alt="{{ $prato->nome }}" width="300">
</figure>
<p>Prato: {{ $prato->nome }}</p>
<p>Preço: {{ $prato->preco }}</p>
<p>Autor: {{ $prato->user->name }}</p>
<form action="{{ route('prato.cancelar', $prato->id) }}" method="post">
    @csrf
    @method('delete')
    <input type="submit" value="Excluir">
<hr>
@endforeach

<form action="{{ route('pedido.store') }}" method="post">
    @csrf
    <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
    <input type="submit" value="Finalizar Pedido">
@endsection