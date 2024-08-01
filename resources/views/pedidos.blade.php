@extends('layouts.main')
@section('title', 'Pedidos')
@section('content')

<h1>Meus Pedidos</h1>   
@foreach ($pedidos as $pedido)
    <h3>Usuário: {{ $pedido->user->name }}</h3>
    <p>Data: {{ $pedido->created_at }}</p>
    <a href="/pedido/{{$pedido->id}}">Ver mais</a>
    <form action="{{ route('pedido.destroy', $pedido->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Excluir">
    </form>
    <hr>
@endforeach
@endsection