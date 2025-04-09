{{-- resources/views/welcome.blade.php --}}
    <!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добро пожаловать в систему бронирования отелей</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Bookify.com</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Панель</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn nav-link border-0 bg-transparent">Выйти</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

{{-- Hero --}}
<div class="container">
    <div class="hero">
        <h1>Добро пожаловать в систему бронирования отелей</h1>
        <div class="btn-group">
            @if (Auth::check())
                <a href="{{ route('dashboard') }}" class="btn btn-light btn-lg">Перейти в панель</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-light btn-lg me-2">Войти</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">Зарегистрироваться</a>
            @endif
        </div>
    </div>

    <h2 class="mb-4">Доступные отели</h2>
    <div class="row">
        @foreach ($hotels as $hotel)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($hotel->image)
                        <img src="{{ asset('storage/'.$hotel->image) }}" class="card-img-top" alt="Фото отеля">
                    @else
                        <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Фото отеля">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $hotel->name }}</h5>
                        <p class="card-text flex-grow-1">{{ $hotel->description }}</p>
                        <a href="{{ route('hotels.show', $hotel->id) }}" class="btn btn-primary mt-3">Подробнее</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if (Auth::check() && auth()->user()->role === 'hotel_owner')
        <div class="text-center add-hotel-btn">
            <a href="{{ route('hotels.create') }}" class="btn btn-success btn-lg">Добавить свой отель</a>
        </div>
    @endif
</div>

{{-- Footer --}}
<footer>
    <div class="container">
        <p>&copy; {{ now()->year }} Bookify.com. Все права защищены.</p>
        <p><a href="#">Политика конфиденциальности</a> | <a href="#">Условия использования</a></p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
