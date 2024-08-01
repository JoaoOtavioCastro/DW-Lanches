@extends('layouts.main') <!-- Supondo que o layout fornecido está salvo em resources/views/layouts/app.blade.php -->

@section('title', 'Bem-vindo à DW-Lanches')

@section('content')
    <div class="welcome-section">
        <div class="welcome-text">
            <h1>Bem-vindo à DW-Lanches!</h1>
            <p>Descubra os sabores irresistíveis dos nossos lanches! Na DW-Lanches, oferecemos uma variedade de opções deliciosas feitas com ingredientes frescos e de alta qualidade.</p>
            <p>Se você está procurando uma refeição saborosa e rápida, está no lugar certo. Explore nosso menu e faça seu pedido hoje mesmo!</p>
            <a href="{{ route('prato.index') }}" class="cta-button">Explore o Menu</a>
        </div>
        <div class="welcome-image">
            <img src="{{ asset('img/logo-dwlanches.jpeg') }}" alt="Deliciosos Lanches">
        </div>
    </div>
@endsection

<style>
    .welcome-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        margin: 2rem auto;
        max-width: 1200px;
        text-align: center;
    }

    .welcome-text {
        max-width: 600px;
        margin-bottom: 2rem;
    }

    .welcome-text h1 {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 1rem;
    }

    .welcome-text p {
        font-size: 1.1rem;
        color: #666;
        margin-bottom: 1rem;
    }

    .cta-button {
        display: inline-block;
        background-color: #333;
        color: #fff;
        padding: 0.75rem 1.5rem;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    .cta-button:hover {
        background-color: #555;
    }

    .welcome-image img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }

    @media (max-width: 768px) {
        .welcome-section {
            padding: 1rem;
        }

        .welcome-text h1 {
            font-size: 2rem;
        }

        .welcome-text p {
            font-size: 1rem;
        }
    }
</style>
