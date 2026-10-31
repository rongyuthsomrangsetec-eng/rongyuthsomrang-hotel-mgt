@extends('layouts.app')

@section('title', 'Room ' . $room->room_number . ' Details')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">

        <!-- Top Header Card -->
        <div class="hero-banner d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
            <div>
                <span class="badge bg-white text-primary px-3 py-2 fw-bold text-uppercase mb-2">Room Details</span>
                <h2 class="fw-bold mb-1">Room {{ $room->room_number }}</h2>
                <p class="mb-0 opacity-75">{{ $room->floor }} &bull; {{ $room->roomType->name ?? 'Standard Category' }}</p>
            </div>

            <div>
                @if($room->status === 'Available')
                    <span class="badge bg-success fs-6 px-3 py-2 rounded-pill">
                        <i class="bi bi-check-circle-fill me-1"></i> Available
                    </span>
                @elseif($room->status === 'Occupied')
                    <span class="badge bg-warning text-dark fs-6 px-3 py-2 rounded-pill">
                        <i class="bi bi-person-fill me-1"></i> Occupied
                    </span>
                @else
                    <span class="badge bg-danger fs-6 px-3 py-2 rounded-pill">
                        <i class="bi bi-tools me-1"></i> Maintenance
                    </span>
                @endif
            </div>
        </div>

        <!-- Details Card -->
        <div class="card card-custom p-4 p-md-5 mb-4">
            <h5 class="fw-bold text-dark border-bottom pb-3 mb-4">
                <i class="bi bi-info-square-fill text-primary me-2"></i> Room Overview
            </h5>

            <div class="row g-4 mb-4">
                <div class="col-sm-6">
                    <div class="p-3 bg-light rounded-3">
                        <small class="text-muted d-block fw-semibold mb-1">ROOM NUMBER</small>
                        <h4 class="fw-bold text-dark mb-0">{{ $room->room_number }}</h4>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="p-3 bg-light rounded-3">
                        <small class="text-muted d-block fw-semibold mb-1">FLOOR LEVEL</small>
                        <h4 class="fw-bold text-dark mb-0">{{ $room->floor }}</h4>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="p-3 bg-light rounded-3">
                        <small class="text-muted d-block fw-semibold mb-1">PRICE PER NIGHT</small>
                        <h4 class="fw-bold text-primary mb-0">${{ number_format($room->price_per_night, 2) }} <small class="text-muted fs-6">USD</small></h4>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="p-3 bg-light rounded-3">
                        <small class="text-muted d-block fw-semibold mb-1">MAX CAPACITY</small>
                        <h4 class="fw-bold text-dark mb-0">{{ $room->roomType->capacity ?? 1 }} {{ ($room->roomType->capacity ?? 1) > 1 ? 'Guests' : 'Guest' }}</h4>
                    </div>
                </div>
            </div>

            <!-- Category Description -->
            <div class="mb-4">
                <h6 class="fw-bold text-secondary mb-2">Category Description ({{ $room->roomType->name ?? 'N/A' }}):</h6>
                <p class="text-muted">{{ $room->roomType->description ?? 'No category details available.' }}</p>
            </div>

            <!-- Amenities & Description -->
            <div class="mb-4">
                <h6 class="fw-bold text-secondary mb-2">Room Amenities & Features:</h6>
                <div class="p-3 border rounded-3 bg-white">
                    {{ $room->description ?: 'No special amenities listed for this room.' }}
                </div>
            </div>

            <div class="text-muted small border-top pt-3 mb-4">
                <span class="me-4"><i class="bi bi-calendar-plus me-1"></i> Created: {{ $room->created_at->format('M d, Y h:i A') }}</span>
                <span><i class="bi bi-clock-history me-1"></i> Last Updated: {{ $room->updated_at->format('M d, Y h:i A') }}</span>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center">
                <div class="d-flex gap-2">
                    <a href="{{ route('rooms.edit', $room) }}" class="btn btn-primary-custom d-flex align-items-center gap-2">
                        <i class="bi bi-pencil-square"></i>
                        <span>Edit Room</span>
                    </a>

                    <a href="{{ route('rooms.index') }}" class="btn btn-outline-secondary d-flex align-items-center gap-2">
                        <i class="bi bi-arrow-left"></i>
                        <span>Back to Directory</span>
                    </a>
                </div>

                <!-- Delete Form -->
                <form action="{{ route('rooms.destroy', $room) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete Room {{ $room->room_number }}?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger d-flex align-items-center gap-1">
                        <i class="bi bi-trash3"></i>
                        <span>Delete Room</span>
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
