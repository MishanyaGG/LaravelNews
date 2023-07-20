<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap-5.3.0-dist/css/bootstrap.css')}}">
    <title>@yield('title')</title>
</head>
<body>
<div class="container">
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <span class="fs-4">Новости</span>
                </a>
                <ul class="nav nav-pills">
                    <!-- Вход в акк -->
                    <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Для администратора</a></li>
                </ul>
            </header>
        </div>

    @yield('categoriesSelect')
    @yield('content')
</div>

</body>
</html>
