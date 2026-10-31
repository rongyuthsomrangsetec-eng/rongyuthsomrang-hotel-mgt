@extends('layouts.app')

@section('title', 'Room ' . $room->room_number . ' Details')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">

        <!-- Top Header Banner -->
        <div class="hero-banner-natural d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
            <div>
                <span class="badge bg-white text-teal px-3 py-2 fw-bold text-uppercase mb-2 shadow-sm rounded-pill" style="color: #0f766e;">
                    <i class="bi bi-tree-fill me-1"></i> Room Details
                </span>
                <h2 class="fw-bold mb-1 text-white">Room {{ $room->room_number }}</h2>
                <p class="mb-0 text-white-50">{{ $room->floor }} &bull; {{ $room->roomType->name ?? 'Standard Category' }}</p>
            </div>

            <div>
                @if($room->status === 'Available')
                    <span class="badge bg-success bg-opacity-90 fs-6 px-3 py-2 rounded-pill shadow-sm">
                        <i class="bi bi-check-circle-fill me-1"></i> Available
                    </span>
                @elseif($room->status === 'Occupied')
                    <span class="badge bg-warning text-dark fs-6 px-3 py-2 rounded-pill shadow-sm">
                        <i class="bi bi-person-fill me-1"></i> Occupied
                    </span>
                @else
                    <span class="badge bg-danger fs-6 px-3 py-2 rounded-pill shadow-sm">
                        <i class="bi bi-tools me-1"></i> Maintenance
                    </span>
                @endif
            </div>
        </div>

        <!-- Details Card -->
        <div class="card card-natural p-4 p-md-5 mb-4">
            <h5 class="fw-bold text-dark border-bottom pb-3 mb-4 d-flex align-items-center gap-2">
                <i class="bi bi-info-square-fill text-teal" style="color: #0d9488;"></i>
                <span>Room Specifications & Pricing</span>
            </h5>

            <div class="row g-3 mb-4">
                <div class="col-sm-6">
                    <div class="p-3 bg-light rounded-4 border">
                        <small class="text-muted d-block fw-semibold mb-1" style="font-size: 0.75rem; letter-spacing: 0.05em;">ROOM NUMBER</small>
                        <h4 class="fw-bold text-dark mb-0">{{ $room->room_number }}</h4>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="p-3 bg-light rounded-4 border">
                        <small class="text-muted d-block fw-semibold mb-1" style="font-size: 0.75rem; letter-spacing: 0.05em;">FLOOR LEVEL</small>
                        <h4 class="fw-bold text-dark mb-0">{{ $room->floor }}</h4>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="p-3 bg-light rounded-4 border">
                        <small class="text-muted d-block fw-semibold mb-1" style="font-size: 0.75rem; letter-spacing: 0.05em;">PRICE PER NIGHT</small>
                        <h4 class="fw-bold text-teal mb-0" style="color: #0d9488;">${{ number_format($room->price_per_night, 2) }} <small class="text-muted fs-6">USD</small></h4>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="p-3 bg-light rounded-4 border">
                        <small class="text-muted d-block fw-semibold mb-1" style="font-size: 0.75rem; letter-spacing: 0.05em;">MAX GUEST CAPACITY</small>
                        <h4 class="fw-bold text-dark mb-0">{{ $room->roomType->capacity ?? 1 }} {{ ($room->roomType->capacity ?? 1) > 1 ? 'Guests' : 'Guest' }}</h4>
                    </div>
                </div>
            </div>

            <!-- Category Description -->
            <div class="mb-4">
                <h6 class="fw-bold text-secondary mb-2">Category Overview ({{ $room->roomType->name ?? 'N/A' }}):</h6>
                <div class="p-3 rounded-3" style="background: #f0fdfa; border: 1px solid #ccfbf1; color: #134e4a;">
                    <i class="bi bi-quote fs-5 align-middle me-1"></i>
                    {{ $room->roomType->description ?? 'No category details provided.' }}
                </div>
            </div>

            <!-- Amenities & Description -->
            <div class="mb-4">
                <h6 class="fw-bold text-secondary mb-2">Room Amenities & Features:</h6>
                <div class="p-3 border rounded-3 bg-white">
                    {{ $room->description ?: 'No additional amenities listed for this room.' }}
                </div>
            </div>

            <div class="text-muted small border-top pt-3 mb-4 d-flex flex-wrap gap-4">
                <span><i class="bi bi-calendar-plus me-1 text-teal"></i> Registered: {{ $room->created_at->format('M d, Y h:i A') }}</span>
                <span><i class="bi bi-clock-history me-1 text-teal"></i> Last Updated: {{ $room->updated_at->format('M d, Y h:i A') }}</span>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center">
                <div class="d-flex gap-2">
                    <a href="{{ route('rooms.edit', $room) }}" class="btn btn-natural-primary">
                        <i class="bi bi-pencil-square"></i>
                        <span>Edit Room</span>
                    </a>

                    <a href="{{ route('rooms.index') }}" class="btn btn-natural-outline">
                        <i class="bi bi-arrow-left"></i>
                        <span>Back to Directory</span>
                    </a>
                </div>

                <!-- Delete Form with Confirmation Modal -->
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteDetailModal">
                    <i class="bi bi-trash3 me-1"></i> Delete Room
                </button>

                <div class="modal fade" id="deleteDetailModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-0 shadow-lg rounded-4">
                            <div class="modal-header border-0 bg-danger bg-opacity-10 py-3">
                                <h5 class="modal-title fw-bold text-danger">Confirm Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-start py-4 px-4">
                                Are you sure you want to permanently delete <strong>Room {{ $room->room_number }}</strong>?
                            </div>
                            <div class="modal-footer border-0 pt-0 px-4 pb-4">
                                <button type="button" class="btn btn-natural-outline" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('rooms.destroy', $room) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger fw-semibold px-4 py-2 rounded-3">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
