@extends('layouts.main')
@section('title', 'Prato - Criar')
@section('content')
<h1>Criar Prato</h1>
<form action="{{ route('prato.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome">
    <label for="descricao">Descrição</label>
    <textarea name="descricao" id="descricao"></textarea>
    <label for="preco">Preço</label>
    <input type="number" min="0.00" max="99999999.99" step="0.01" name="preco" id="preco">
    <label for="disponibilidade">Disponibilidade</label>
    <select name="disponibilidade" id="disponibilidade">
        <option value="Disponivel">Disponível</option>
        <option value="Indisponivel">Indisponível</option>
    </select>
    <label for="imagem">Imagem</label>
    <input type="file" name="imagem" id="imagem" >
    <button type="submit">Criar</button>
</form>
<a href="{{ route('prato.index') }}">Voltar</a>
@endsection