@extends('layouts.app')

@section('title', 'Hotel Room Directory')

@section('content')

<!-- Fresh Natural Hero Banner with 3 KPI Stat Cards (Slide 7) -->
<div class="hero-banner-natural mb-4">
    <div class="text-center mb-4 position-relative" style="z-index: 2;">
        <div class="d-inline-flex align-items-center justify-content-center bg-white bg-opacity-20 rounded-circle p-3 mb-2 animate-float" style="width: 68px; height: 68px;">
            <i class="bi bi-buildings-fill fs-2 text-white"></i>
        </div>
        <h2 class="fw-bold mb-1 text-white">Hotel Room Directory</h2>
        <p class="mb-0 text-white-50" style="font-size: 1rem;">Browse and manage all registered rooms, categories, and real-time availability</p>
    </div>

    <!-- 3 Stat KPI Cards with Natural Glass Effect -->
    <div class="row g-3 justify-content-center position-relative" style="z-index: 2;">
        <div class="col-md-3 col-sm-4">
            <div class="stat-card-natural">
                <div class="stat-number count-up" data-target="{{ $totalRooms }}">{{ $totalRooms }}</div>
                <div class="stat-label">
                    <i class="bi bi-door-closed-fill"></i> Total Rooms
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-4">
            <div class="stat-card-natural">
                <div class="stat-number count-up" data-target="{{ $totalRoomTypes }}">{{ $totalRoomTypes }}</div>
                <div class="stat-label">
                    <i class="bi bi-grid-fill"></i> Room Types
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-4">
            <div class="stat-card-natural">
                <div class="stat-number count-up" data-target="{{ $availableRooms }}">{{ $availableRooms }}</div>
                <div class="stat-label">
                    <i class="bi bi-check2-circle"></i> Available Rooms
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Table Card with Natural Aesthetics -->
<div class="card card-natural p-4">

    <!-- Search & Filter Form (Slide 7) -->
    <form action="{{ route('rooms.index') }}" method="GET" class="mb-4">
        <div class="row g-3 align-items-center">

            <!-- Search Input -->
            <div class="col-lg-4 col-md-12">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted ps-3" style="border-radius: 0.75rem 0 0 0.75rem; border: 1.5px solid #e2e8f0; border-right: none;">
                        <i class="bi bi-search text-success"></i>
                    </span>
                    <input type="text" name="search" class="form-control form-control-natural border-start-0"
                           style="border-radius: 0 0.75rem 0.75rem 0;"
                           placeholder="Search by room number, floor, amenities..."
                           value="{{ request('search') }}">
                </div>
            </div>

            <!-- Filter 1: Room Type -->
            <div class="col-lg-3 col-md-4">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted ps-3" style="border-radius: 0.75rem 0 0 0.75rem; border: 1.5px solid #e2e8f0; border-right: none;">
                        <i class="bi bi-funnel text-teal"></i>
                    </span>
                    <select name="room_type_id" class="form-select form-select-natural border-start-0" style="border-radius: 0 0.75rem 0.75rem 0;">
                        <option value="all">All Room Types</option>
                        @foreach($roomTypes as $type)
                            <option value="{{ $type->id }}" {{ request('room_type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Filter 2: Sort Order -->
            <div class="col-lg-2 col-md-4">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted ps-3" style="border-radius: 0.75rem 0 0 0.75rem; border: 1.5px solid #e2e8f0; border-right: none;">
                        <i class="bi bi-arrow-down-up text-secondary"></i>
                    </span>
                    <select name="sort" class="form-select form-select-natural border-start-0" style="border-radius: 0 0.75rem 0.75rem 0;">
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                        <option value="room_asc" {{ request('sort') == 'room_asc' ? 'selected' : '' }}>Room Number</option>
                    </select>
                </div>
            </div>

            <!-- Filter 3: Status -->
            <div class="col-lg-2 col-md-4">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted ps-3" style="border-radius: 0.75rem 0 0 0.75rem; border: 1.5px solid #e2e8f0; border-right: none;">
                        <i class="bi bi-tag text-secondary"></i>
                    </span>
                    <select name="status" class="form-select form-select-natural border-start-0" style="border-radius: 0 0.75rem 0.75rem 0;">
                        <option value="all">All Statuses</option>
                        <option value="Available" {{ request('status') == 'Available' ? 'selected' : '' }}>Available</option>
                        <option value="Occupied" {{ request('status') == 'Occupied' ? 'selected' : '' }}>Occupied</option>
                        <option value="Maintenance" {{ request('status') == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                    </select>
                </div>
            </div>

            <!-- Filter Actions -->
            <div class="col-lg-1 col-md-12 d-flex gap-2">
                <button type="submit" class="btn btn-natural-primary w-100 p-2" title="Filter Records">
                    <i class="bi bi-search"></i>
                </button>
                @if(request('search') || request('room_type_id') || request('status') || request('sort'))
                    <a href="{{ route('rooms.index') }}" class="btn btn-natural-outline p-2" title="Reset Filters">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </a>
                @endif
            </div>
        </div>
    </form>

    <!-- Natural Table (Slide 7) -->
    <div class="table-responsive rounded-3 overflow-hidden border">
        <table class="table table-natural table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th scope="col" style="width: 70px;">ID</th>
                    <th scope="col">Room</th>
                    <th scope="col">Floor Level</th>
                    <th scope="col">Room Type (Category)</th>
                    <th scope="col">Price / Night</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center" style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rooms as $room)
                    <tr>
                        <td class="fw-bold text-muted ps-3">#{{ $room->id }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <span class="d-inline-flex align-items-center justify-content-center bg-teal bg-opacity-10 text-teal rounded-3 p-2 border" style="width: 44px; height: 44px; background: #f0fdfa; border-color: #ccfbf1 !important; color: #0d9488;">
                                    <i class="bi bi-door-open-fill fs-5"></i>
                                </span>
                                <div>
                                    <div class="fw-bold text-dark fs-6">Room {{ $room->room_number }}</div>
                                    <small class="text-muted text-truncate d-inline-block" style="max-width: 220px;">
                                        {{ $room->description ?: 'Fresh & sanitized room' }}
                                    </small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-secondary fw-semibold">
                                <i class="bi bi-layers text-success me-1"></i> {{ $room->floor }}
                            </span>
                        </td>
                        <td>
                            <span class="badge-room-type-natural">
                                <i class="bi bi-flower2"></i>
                                <span>{{ $room->roomType->name ?? 'N/A' }}</span>
                            </span>
                        </td>
                        <td>
                            <div class="d-inline-flex align-items-baseline gap-1">
                                <span class="fw-bold text-dark fs-6">${{ number_format($room->price_per_night, 2) }}</span>
                                <small class="text-muted" style="font-size: 0.75rem;">/ night</small>
                            </div>
                        </td>
                        <td>
                            @if($room->status === 'Available')
                                <span class="badge-status-available-natural">
                                    <span class="status-dot-pulse"></span>
                                    <span>Available</span>
                                </span>
                            @elseif($room->status === 'Occupied')
                                <span class="badge-status-occupied-natural">
                                    <i class="bi bi-person-fill"></i>
                                    <span>Occupied</span>
                                </span>
                            @else
                                <span class="badge-status-maintenance-natural">
                                    <i class="bi bi-tools"></i>
                                    <span>Maintenance</span>
                                </span>
                            @endif
                        </td>
                        <td class="text-center pe-3">
                            <div class="d-flex align-items-center justify-content-center gap-1">
                                <!-- View Button -->
                                <a href="{{ route('rooms.show', $room) }}" class="action-btn-circle action-btn-view text-teal" title="View Details">
                                    <i class="bi bi-eye-fill"></i>
                                </a>

                                <!-- Edit Button -->
                                <a href="{{ route('rooms.edit', $room) }}" class="action-btn-circle action-btn-edit text-primary" title="Edit Room">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>

                                <!-- Delete Button (Triggers Modal) -->
                                <button type="button" class="action-btn-circle action-btn-delete text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $room->id }}" title="Delete Room">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </div>

                            <!-- Delete Confirmation Modal with Soft Theme -->
                            <div class="modal fade" id="deleteModal{{ $room->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                                        <div class="modal-header border-0 bg-danger bg-opacity-10 py-3">
                                            <h5 class="modal-title fw-bold text-danger d-flex align-items-center gap-2">
                                                <i class="bi bi-exclamation-triangle-fill"></i> Delete Room {{ $room->room_number }}?
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body text-start py-4 px-4">
                                            <p class="mb-2 text-dark">
                                                Are you sure you want to delete <strong>Room {{ $room->room_number }}</strong> ({{ $room->roomType->name ?? 'Standard' }})?
                                            </p>
                                            <div class="alert alert-light border small text-muted mb-0">
                                                <i class="bi bi-info-circle me-1"></i> This record will be permanently deleted from the database.
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0 pt-0 px-4 pb-4">
                                            <button type="button" class="btn btn-natural-outline" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('rooms.destroy', $room) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger fw-semibold px-4 py-2 rounded-3">Confirm Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-tree fs-1 d-block mb-2 text-success opacity-50"></i>
                            <h5 class="fw-semibold text-dark">No hotel rooms found</h5>
                            <p class="small mb-3">Try adjusting your search criteria or register a new room.</p>
                            <a href="{{ route('rooms.create') }}" class="btn btn-natural-primary btn-sm">
                                <i class="bi bi-plus-circle-fill"></i> Register New Room
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination & Footer (Slide 7) -->
    <div class="d-flex flex-wrap align-items-center justify-content-between pt-4 mt-2 gap-2 border-top">
        <div class="text-muted small fw-medium">
            Showing <strong class="text-dark">{{ $rooms->firstItem() ?? 0 }}</strong> to <strong class="text-dark">{{ $rooms->lastItem() ?? 0 }}</strong> of <strong class="text-dark">{{ $rooms->total() }}</strong> entries
        </div>

        <div>
            {{ $rooms->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <!-- Back to Room Form Button (Bottom of Slide 7) -->
    <div class="text-center mt-4 pt-2">
        <a href="{{ route('rooms.create') }}" class="btn btn-natural-primary w-100 py-3 rounded-4 shadow-sm fs-6">
            <i class="bi bi-plus-circle-fill fs-5"></i>
            <span>Back to Room Registration Form</span>
        </a>
    </div>

</div>

@endsection

@section('scripts')
<script>
    // Smooth number counter animation for KPI cards
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll(".count-up");
        counters.forEach(counter => {
            const target = +counter.getAttribute("data-target");
            const duration = 600;
            const startTime = performance.now();

            const updateCount = (currentTime) => {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                // Ease out quart
                const easeProgress = 1 - Math.pow(1 - progress, 4);
                counter.innerText = Math.floor(easeProgress * target);

                if (progress < 1) {
                    requestAnimationFrame(updateCount);
                } else {
                    counter.innerText = target;
                }
            };

            requestAnimationFrame(updateCount);
        });
    });
</script>
@endsection
