@extends('layouts.main')
@section('title', 'Pratos')
@section('content')
<h1>Pratos</h1>
<a href="{{ route('prato.create')}}">Criar Prato</a>
@foreach ($pratos as $prato)

    <h3>Nome: {{ $prato->nome }}</h3>
    <img src="{{ $prato->imagem }}" alt="{{ $prato->nome }}">
    <p>Descrição: {{ $prato->descricao }}</p>
    <p>Disponibilidade: {{ $prato->disponibilidade }}</p>
    <p>Preço: {{ $prato->preco }}</p>
    <a href="/prato/{{$prato->id}}">Ver mais</a>
    <hr>
@endforeach

@endsection