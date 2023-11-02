<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite('resources/js/app.js')

</head>

<body>

    <header>
        <nav class="nav justify-content-center navbar-dark bg-dark align-items-center py-3">
            <a class="nav-link text-info" href="{{ route('comics.index') }}">Comics</a>
            <a class="btn btn-info btn-sm ms-auto me-5" href="{{ route('welcome') }}">Home</a>
        </nav>
    </header>

    <main>
        @yield('main')
    </main>


    <footer class="bg-dark text-white py-4 text-center">
        <p>
            Copyright &copy; DC Comics
        </p>
    </footer>



</body>

</html>
