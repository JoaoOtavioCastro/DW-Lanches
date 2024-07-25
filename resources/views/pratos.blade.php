@extends('layouts.main')
@section('title', 'Pratos')
@section('content')
<h1>Pratos</h1>
<a href="{{ route('prato.create')}}">Criar Prato</a>
@foreach ($pratos as $prato)

    <h3>Nome: {{ $prato->nome }}</h3>
    <figure>
    <img src="/img/pratos/{{ $prato->imagem }}" alt="{{ $prato->nome }}">
    </figure>
    <p>Descrição: {{ $prato->descricao }}</p>
    <p>Disponibilidade: {{ $prato->disponibilidade }}</p>
    <p>Preço: {{ $prato->preco }}</p>
    <p>Autor: {{ $prato->user->name }}</p>
    <a href="/prato/{{$prato->id}}">Ver mais</a>
    <hr>
@endforeach

@endsection