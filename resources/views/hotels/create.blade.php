@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Create New Hotel</h1>
        <form method="POST" action="{{ route('hotels.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Hotel Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Hotel Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Hotel Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Hotel Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Hotel Image (optional) -->
            <div class="mb-3">
                <label for="image" class="form-label">Hotel Image (optional)</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Create Hotel</button>
        </form>
    </div>
@endsection
