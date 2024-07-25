@extends('layouts.main')
@section('title', 'Prato - editar')
@section('content')
<h1>Criar Prato</h1>
<form action="{{ route('prato.update', ['prato' => $prato->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <input type="hidden" name="id" value="{{$prato->id}}">
    <input type="hidden" name="user_id" value="{{$prato->user_id}}">

    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" value="{{$prato->nome}}">
    <label for="descricao">Descrição</label>
    <textarea name="descricao" id="descricao">{{$prato->descricao}}</textarea>
    <label for="preco">Preço</label>
    <input type="text" name="preco" id="preco" value="{{$prato->preco}}">
    <label for="disponibilidade">Disponibilidade</label>
    <select name="disponibilidade" id="disponibilidade">
        <option value="Disponivel" {{$prato->disponibilidade == 'Disponivel' ? 'selected' : ''}}>Disponível</option>
        <option value="Indisponivel" {{$prato->disponibilidade == 'Indisponivel' ? 'selected' : ''}}>Indisponível</option>
    </select>
    <label for="imagem">Imagem</label>
    <img src="{{ $prato->imagem }}" alt="{{ $prato->nome }}">
    <input type="hidden" name="imagem_atual" value="{{$prato->imagem}}">
    <input type="file" name="imagem" id="imagem">
    <button type="submit">Editar</button>
</form>
@endsection