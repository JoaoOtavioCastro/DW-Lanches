@extends('layouts.main')
@section('title', 'Prato - Criar')
@section('content')
<h1>Criar Prato</h1>
<form action="{{ route('prato.store') }}" method="post">
    @csrf
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome">
    <label for="descricao">Descrição</label>
    <textarea name="descricao" id="descricao"></textarea>
    <label for="preco">Preço</label>
    <input type="text" name="preco" id="preco">
    <label for="disponibilidade">Disponibilidade</label>
    <select name="disponibilidade" id="disponibilidade">
        <option value="Disponivel">Disponível</option>
        <option value="Indisponivel">Indisponível</option>
    </select>
    <label for="imagem">Imagem</label>
    <input type="file" name="imagem" id="imagem">
    <button type="submit">Criar</button>
</form>
@endsection