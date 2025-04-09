{{-- resources/views/profile.blade.php --}}

<h1>Профиль пользователя</h1>

<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PATCH')
    <div>
        <label for="name">Имя</label>
        <input type="text" name="name" id="name" value="{{ auth()->user()->name }}" required>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ auth()->user()->email }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Обновить профиль</button>
</form>

<form method="POST" action="{{ route('profile.destroy') }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Удалить аккаунт</button>
</form>
