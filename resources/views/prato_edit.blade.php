@extends('layouts.main')
@section('title', 'Prato - editar')
@section('content')
<style>
    .edit-form-container {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        margin: 2rem 0;
    }

    .edit-form-container h1 {
        font-size: 1.8rem;
        margin-bottom: 1rem;
    }

    .edit-form-container label {
        display: block;
        margin: 0.5rem 0 0.2rem;
        font-weight: bold;
        color: #333;
    }

    .edit-form-container input[type="text"],
    .edit-form-container input[type="number"],
    .edit-form-container textarea,
    .edit-form-container select,
    .edit-form-container input[type="file"] {
        width: 100%;
        padding: 0.8rem;
        margin-bottom: 1rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .edit-form-container textarea {
        resize: vertical;
    }

    .edit-form-container img {
        max-width: 100%;
        height: auto;
        border-radius: 4px;
        margin-bottom: 1rem;
    }

    .edit-form-container button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 0.8rem 1.2rem;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1rem;
        transition: background-color 0.3s;
    }

    .edit-form-container button:hover {
        background-color: #0056b3;
    }

    .edit-form-container a {
        display: inline-block;
        margin-top: 1rem;
        color: #007bff;
        text-decoration: none;
        font-weight: 600;
    }

    .edit-form-container a:hover {
        text-decoration: underline;
    }

    .access-denied {
        text-align: center;
        color: #721c24;
        background-color: #f8d7da;
        padding: 1rem;
        border-radius: 4px;
        font-weight: bold;
    }

    .file-upload {
        position: relative;
        overflow: hidden;
        display: inline-block;
        width: 100%;
    }

    .file-upload input[type="file"] {
        position: absolute;
        right: 0;
        top: 0;
        margin: 0;
        padding: 0;
        font-size: 100px;
        opacity: 0;
        cursor: pointer;
    }

    .file-upload-button {
        display: inline-block;
        background-color: #007bff;
        color: #fff;
        padding: 0.8rem 1.2rem;
        border-radius: 4px;
        font-size: 1rem;
        cursor: pointer;
        border: none;
        transition: background-color 0.3s, color 0.3s;
    }

    .file-upload-button:hover {
        background-color: #0056b3;
    }

    .file-upload-image {
        display: block;
        margin-top: 1rem;
        max-width: 100%;
        height: auto;
        border-radius: 4px;
        border: 1px solid #ddd;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .btn-submit,
    .btn-back {
        display: inline-block;
        padding: 0.8rem 1.2rem;
        border-radius: 4px;
        font-size: 1rem;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        border: none;
        transition: background-color 0.3s, color 0.3s;
        margin-top: 1rem;
        margin-right: 1rem;
    }

    .btn-submit {
        background-color: #007bff;
        color: #fff;
    }

    .btn-submit:hover {
        background-color: #0056b3;
    }

    .btn-back {
        background-color: #6c757d;
        color: #fff;
    }

    .btn-back:hover {
        background-color: #5a6268;
    }

    /* Estilo para o formulário de edição */
    .edit-form-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .edit-form-container h1 {
        margin-bottom: 1rem;
    }

    .edit-form-container .form-group {
        margin-bottom: 1.5rem;
    }

    .edit-form-container label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
    }

    .edit-form-container input[type="text"],
    .edit-form-container input[type="number"],
    .edit-form-container textarea,
    .edit-form-container select {
        width: 100%;
        padding: 0.8rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .edit-form-container textarea {
        resize: vertical;
    }
</style>
@if($prato->user_id == auth()->user()->id)
    <div class="edit-form-container">
        <h1>Editar Prato</h1>
        <form action="{{ route('prato.update', ['prato' => $prato->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{$prato->id}}">
            <input type="hidden" name="user_id" value="{{$prato->user_id}}">

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="{{$prato->nome}}">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao">{{$prato->descricao}}</textarea>
            </div>

            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="number" step="0.01" name="preco" id="preco" value="{{$prato->preco}}">
            </div>

            <div class="form-group">
                <label for="disponibilidade">Disponibilidade</label>
                <select name="disponibilidade" id="disponibilidade">
                    <option value="Disponivel" {{$prato->disponibilidade == 'Disponivel' ? 'selected' : ''}}>Disponível
                    </option>
                    <option value="Indisponivel" {{$prato->disponibilidade == 'Indisponivel' ? 'selected' : ''}}>Indisponível
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="imagem">Imagem</label>
                <div class="file-upload">
                    <label for="imagem" class="file-upload-button">Escolher Imagem</label>
                    <input type="file" name="imagem" id="imagem" accept="image/*" onchange="previewImage(event)">
                </div>
                @if ($prato->imagem)
                    <img src="{{ $prato->imagem }}" alt="{{ $prato->nome }}" class="file-upload-image" id="imagePreview">
                @else
                    <img id="imagePreview" class="file-upload-image" style="display: none;">
                @endif
            </div>

            <input type="hidden" name="imagem_atual" value="{{$prato->imagem}}">

            <button type="submit">Editar</button>
        </form>
        <a href="{{ route('prato.index') }}" class="btn-back">Voltar</a>
    </div>
@else
    <div class="access-denied">
        <h1>Você não Possui acesso a essa Página!!</h1>
    </div>
@endif
@endsection

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            const image = document.getElementById('imagePreview');
            image.src = reader.result;
            image.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>