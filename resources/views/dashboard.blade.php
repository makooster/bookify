<head>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body class="modern-booking-theme">
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark booking-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <span class="brand-logo">Bookify</span>
            <span class="brand-com">.com</span>
        </a>
        <div class="user-nav">
            <div class="user-greeting">Welcome, {{ auth()->user()->name }}</div>
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>
</nav>

<div class="container main-container">
    @if (auth()->user()->role === 'admin')
        <!-- Admin Panel Section -->
        <section class="admin-panel">
            <div class="section-header">
                <h2><i class="fas fa-shield-alt"></i> Admin Dashboard</h2>
            </div>

            <div class="management-section">
                <h3><i class="fas fa-users"></i> User Management</h3>
                <div class="user-grid">
                    @foreach ($users as $user)
                        <div class="user-card">
                            <div class="user-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                            <div class="user-info">
                                <h5>{{ $user->name }}</h5>
                                <p>{{ $user->email }}</p>
                            </div>
                            <form method="POST" action="{{ route('users.delete', ['user' => $user->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-delete">
                                    <i class="fas fa-trash"></i> Remove
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="management-section">
                <h3><i class="fas fa-hotel"></i> Hotel Owners</h3>
                <div class="user-grid">
                    @foreach ($hotel_owners as $hotel_owner)
                        <div class="user-card">
                            <div class="user-avatar">{{ strtoupper(substr($hotel_owner->name, 0, 1)) }}</div>
                            <div class="user-info">
                                <h5>{{ $hotel_owner->name }}</h5>
                                <p>{{ $hotel_owner->email }}</p>
                            </div>
                            <form method="POST" action="{{ route('hotel_owners.delete', ['hotel_owner' => $hotel_owner->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-delete">
                                    <i class="fas fa-trash"></i> Remove
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if (auth()->user()->role === 'hotel_owner')
        <!-- Hotel Owner Section -->
        <section class="hotel-owner-section">
            <div class="section-header with-action">
                <h2><i class="fas fa-hotel"></i> Your Hotels</h2>
                <a href="{{ route('hotels.create') }}" class="btn-primary">
                    <i class="fas fa-plus"></i> Add New Hotel
                </a>
            </div>

            <div class="hotels-grid">
                @foreach ($hotels as $hotel)
                    <div class="hotel-card">
                        <div class="hotel-image-container">
                            @if($hotel->image)
                                <img src="{{ asset('storage/'.$hotel->image) }}" alt="{{ $hotel->name }}" class="hotel-image">
                            @else
                                <div class="hotel-image-placeholder">
                                    <i class="fas fa-hotel"></i>
                                </div>
                            @endif
                            <div class="hotel-actions">
                                <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn-action btn-edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form method="POST" action="{{ route('hotels.destroy', $hotel->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="hotel-details">
                            <h3>{{ $hotel->name }}</h3>
                            <p class="hotel-description">{{ $hotel->description }}</p>

                            <div class="rooms-section">
                                <h4><i class="fas fa-door-open"></i> Rooms</h4>
                                @foreach ($hotel->rooms as $room)
                                    <div class="room-item">
                                        <div class="room-info">
                                            <span class="room-number">Room #{{ $room->room_number }}</span>
                                            <span class="room-price">${{ $room->price }}/night</span>
                                        </div>
                                        <form method="POST" action="{{ route('rooms.destroy', $room->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-delete sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <!-- Available Hotels Section -->
    <section class="available-hotels">
        <div class="section-header">
            <h2><i class="fas fa-search"></i> Available Hotels</h2>
        </div>

        <div class="hotels-grid">
            @foreach ($hotels as $hotel)
                <div class="hotel-card">
                    <div class="hotel-image-container">
                        @if($hotel->image)
                            <img src="{{ asset('storage/'.$hotel->image) }}" alt="{{ $hotel->name }}" class="hotel-image">
                        @else
                            <div class="hotel-image-placeholder">
                                <i class="fas fa-hotel"></i>
                            </div>
                        @endif
                    </div>

                    <div class="hotel-details">
                        <h3>{{ $hotel->name }}</h3>
                        <p class="hotel-description">{{ $hotel->description }}</p>

                        <div class="rooms-section">
                            @foreach ($hotel->rooms as $room)
                                <div class="room-item booking-available">
                                    <div class="room-info">
                                        <span class="room-number">Room #{{ $room->room_number }}</span>
                                        <span class="room-price">${{ $room->price }}/night</span>
                                    </div>
                                    @if(auth()->user()->role === 'user')
                                        <form method="POST" action="{{ route('bookings.store') }}" class="booking-form">
                                            @csrf
                                            <input type="hidden" name="room_id" value="{{ $room->id }}">
                                            <div class="date-inputs">
                                                <div class="input-group">
                                                    <label>Check-in</label>
                                                    <input type="date" name="check_in" required>
                                                </div>
                                                <div class="input-group">
                                                    <label>Check-out</label>
                                                    <input type="date" name="check_out" required>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn-primary book-now">
                                                <i class="fas fa-calendar-check"></i> Book Now
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>

<!-- Font Awesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
