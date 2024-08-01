@extends('layouts.main')
@section('title', 'Prato - Criar')
@section('content')
<style>
    /* style.css */

    body {
        font-family: 'Figtree', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color: #f4f4f4;
        color: #333;
    }

    .custom-container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        box-sizing: border-box;
    }

    .form-control:focus {
        border-color: #007bff;
        outline: none;
    }

    .custom-file-upload {
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
        background-color: #007bff;
        color: #fff;
        border-radius: 4px;
        font-size: 16px;
        margin-top: 10px;
        margin-right: 10px;
    }

    .custom-file-upload:hover {
        opacity: 0.8;
    }

    #file-chosen {
        margin-left: 10px;
        font-size: 16px;
    }

    .btn-submit,
    .btn-back {
        display: inline-block;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        text-align: center;
        margin-top: 10px;
    }

    .btn-submit {
        background-color: #007bff;
        color: #fff;
    }

    .btn-back {
        background-color: #6c757d;
        color: #fff;
        text-decoration: none;
    }

    .btn-submit:hover,
    .btn-back:hover {
        opacity: 0.8;
    }
</style>
<div class="custom-container">
    <h1>Criar Prato</h1>
    <form action="{{ route('prato.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome">
        </div>
        <div class="form-group">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" class="form-control" id="preco" name="preco" min="0.00" max="99999999.99" step="0.01">
        </div>
        <div class="form-group">
            <label for="disponibilidade" class="form-label">Disponibilidade</label>
            <select class="form-control" id="disponibilidade" name="disponibilidade">
                <option value="Disponivel">Disponível</option>
                <option value="Indisponivel">Indisponível</option>
            </select>
        </div>
        <div class="form-group">
            <label for="imagem" class="form-label">Imagem</label>
            <input type="file" class="form-control" id="imagem" name="imagem" style="display: none;">
            <label for="imagem" class="custom-file-upload">
                Escolher Imagem
            </label>
            <span id="file-chosen">Nenhum arquivo escolhido</span>
        </div>
        <button type="submit" class="btn-submit">Criar</button>
    </form>
    <a href="{{ route('prato.index') }}" class="btn-back">Voltar</a>
</div>

<script>
    const fileInput = document.getElementById('imagem');
    const fileChosen = document.getElementById('file-chosen');

    fileInput.addEventListener('change', function () {
        fileChosen.textContent = this.files[0].name;
    })
</script>
@endsection