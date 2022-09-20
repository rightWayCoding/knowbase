<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') :: База знаний</title>
        <link href="styles/main.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-light bg-light">
                <a href="{{ route('index') }}" class="navbar-brand mr-auto">Главная</a>
                @guest
                <a href="{{ route('register') }}" class="nav-item nav-link">Регистрация</a>
                <a href="{{ route('login') }}" class="nav-item nav-link">Вход</a>
                @endguest
                @auth
                <a href=" {{ route('home') }}" class="nav-item nav-link font-mono">Моя база знаний</a>
                <form action="{{ route('logout') }}" method="POST" class="form-inline">
                @csrf
                    <input type="submit" class="btn btn-danger" value="Выход">
                </form>
                @endauth
            </nav>
            <h1 class="my-3 text-center">База знаний</h1>
            @yield('main')
        </div>
    </body>
</html>