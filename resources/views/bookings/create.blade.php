{{-- resources/views/bookings/create.blade.php --}}

<h1>Создать новое бронирование</h1>

<form method="POST" action="{{ route('bookings.store') }}">
    @csrf
    <div>
        <label for="room_id">Номер комнаты</label>
        <select name="room_id" id="room_id" required>
            @foreach ($rooms as $room)
                <option value="{{ $room->id }}">{{ $room->room_number }} ({{ $room->price }} KZT)</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="check_in">Дата заезда</label>
        <input type="date" name="check_in" id="check_in" required>
    </div>

    <div>
        <label for="check_out">Дата выезда</label>
        <input type="date" name="check_out" id="check_out" required>
    </div>

    <button type="submit" class="btn btn-success">Забронировать</button>
</form>
