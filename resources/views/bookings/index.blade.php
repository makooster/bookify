{{-- resources/views/bookings/index.blade.php --}}

<h1>Мои бронирования</h1>

@if($bookings->isEmpty())
    <p>У вас нет бронирований.</p>
@else
    <table>
        <thead>
        <tr>
            <th>Номер комнаты</th>
            <th>Дата заезда</th>
            <th>Дата выезда</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->room->room_number }}</td>
                <td>{{ $booking->check_in }}</td>
                <td>{{ $booking->check_out }}</td>
                <td>
                    <form method="POST" action="{{ route('bookings.destroy', $booking->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Отменить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
