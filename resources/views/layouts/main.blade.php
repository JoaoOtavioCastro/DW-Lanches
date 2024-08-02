<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1rem;
        }

        header nav {
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            flex-wrap: wrap;
        }

        header nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 0.5rem;
            font-weight: 600;
            transition: color 0.3s;
        }

        header nav a:hover {
            color: lightblue;
        }

        header img {
            height: 50px;
            border-radius: 50%;
        }
        .link-footer {
            color: #fff;
            text-decoration: none;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 1rem;
            text-align: center;
            position: sticky;
        }

        .alert {
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 5px;
            font-weight: bold;
        }

        .alert.error {
            background-color: #f8d7da;
            color: #721c24;
        }

        .alert.success {
            background-color: #d4edda;
            color: #155724;
        }

        @media (max-width: 768px) {
            header nav {
                flex-direction: column;
                align-items: flex-start;
            }

            header nav a {
                margin: 0.5rem 0;
            }
        }
    </style>
</head>

<body>
    <header>
        <div>
            <a href="{{ '/' }}">
                <img src="{{ asset('img/logo-dwlanches.jpeg') }}" alt="DW Lanches Logo">
            </a>
        </div>
        @if (Route::has('login'))
        <nav>
            @auth
            <a href="{{ route('prato.index') }}">Pratos</a>
            <a href="{{ route('prato.create') }}">Novo prato</a>
            <a href="/pedido"><img src="{{ asset('img/icons8-carrinho-64.png') }}" alt="Carrinho"></a>
            <a href="{{ route('pedido.index') }}">Meus Pedidos</a>
            <a href="{{ route('prato.my') }}">Meus Pratos</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" style="background:none; border:none; color:#fff; cursor:pointer;">Log out</button>
            </form>
            @else
            <a href="{{ route('login') }}">Log in</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </nav>
        @endif
    </header>

    <div class="container">
        @if(session('error'))
        <div class="alert error">{{ session('error') }}</div>
        @endif
        @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>

    <footer>
        &copy; {{ date('Y') }} DW Lanches -
        <div style="text-align: center; display: flex;  justify-content: center">
            <div style="margin: 1vw">
                <h3>
                    Autores:

                </h3>
            </div>
            <div style="margin: 1vw">
                <h4><a href="https://github.com/JoaoOtavioCastro" target="_blank" class="link-footer">João Otávio</a></h4>
                <h4><a href="https://github.com/Marthurmig" target="_blank" class="link-footer">Arthur Vilar</a></h4>
            </div>
        </div>
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </footer>
</body>

</html>