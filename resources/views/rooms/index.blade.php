@extends('layouts.app')

@section('title', 'Hotel Room Directory')

@section('content')

<!-- Hero Header with 3 Stat Cards (Matching Slide 7) -->
<div class="hero-banner mb-4">
    <div class="text-center mb-4">
        <div class="d-inline-flex align-items-center justify-content-center bg-white bg-opacity-25 rounded-circle p-3 mb-2">
            <i class="bi bi-buildings-fill fs-2"></i>
        </div>
        <h2 class="fw-bold mb-1">Hotel Room Directory</h2>
        <p class="mb-0 opacity-75">Browse and manage all registered rooms, categories, and availability</p>
    </div>

    <!-- 3 Stat KPI Cards -->
    <div class="row g-3 justify-content-center">
        <div class="col-md-3 col-sm-4">
            <div class="stat-card">
                <div class="stat-number">{{ $totalRooms }}</div>
                <div class="stat-label"><i class="bi bi-door-closed me-1"></i> Total Rooms</div>
            </div>
        </div>

        <div class="col-md-3 col-sm-4">
            <div class="stat-card">
                <div class="stat-number">{{ $totalRoomTypes }}</div>
                <div class="stat-label"><i class="bi bi-grid me-1"></i> Room Types</div>
            </div>
        </div>

        <div class="col-md-3 col-sm-4">
            <div class="stat-card">
                <div class="stat-number">{{ $availableRooms }}</div>
                <div class="stat-label"><i class="bi bi-check2-circle me-1"></i> Available Rooms</div>
            </div>
        </div>
    </div>
</div>

<!-- Main Table Card -->
<div class="card card-custom p-4">

    <!-- Search & Filter Form (Matching Slide 7) -->
    <form action="{{ route('rooms.index') }}" method="GET" class="mb-4">
        <div class="row g-3 align-items-center">

            <!-- Search Input -->
            <div class="col-lg-4 col-md-12">
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="bi bi-search text-muted"></i>
                    </span>
                    <input type="text" name="search" class="form-control border-start-0 bg-light"
                           placeholder="Search rooms by number, floor, or amenities..."
                           value="{{ request('search') }}">
                </div>
            </div>

            <!-- Filter 1: Room Type -->
            <div class="col-lg-3 col-md-4">
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="bi bi-funnel text-muted"></i>
                    </span>
                    <select name="room_type_id" class="form-select border-start-0 bg-light">
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
                    <span class="input-group-text bg-light border-end-0">
                        <i class="bi bi-arrow-down-up text-muted"></i>
                    </span>
                    <select name="sort" class="form-select border-start-0 bg-light">
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
                    <span class="input-group-text bg-light border-end-0">
                        <i class="bi bi-tag text-muted"></i>
                    </span>
                    <select name="status" class="form-select border-start-0 bg-light">
                        <option value="all">All Statuses</option>
                        <option value="Available" {{ request('status') == 'Available' ? 'selected' : '' }}>Available</option>
                        <option value="Occupied" {{ request('status') == 'Occupied' ? 'selected' : '' }}>Occupied</option>
                        <option value="Maintenance" {{ request('status') == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                    </select>
                </div>
            </div>

            <!-- Filter Actions -->
            <div class="col-lg-1 col-md-12 d-flex gap-2">
                <button type="submit" class="btn btn-primary w-100" title="Apply Filters">
                    <i class="bi bi-search"></i>
                </button>
                @if(request('search') || request('room_type_id') || request('status') || request('sort'))
                    <a href="{{ route('rooms.index') }}" class="btn btn-outline-secondary" title="Reset Filters">
                        <i class="bi bi-x-circle"></i>
                    </a>
                @endif
            </div>
        </div>
    </form>

    <!-- Room Table (Matching Slide 7) -->
    <div class="table-responsive">
        <table class="table table-hover table-custom align-middle">
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
                        <td class="fw-bold text-muted">{{ $room->id }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="d-inline-flex align-items-center justify-content-center bg-light text-primary rounded-3 p-2 border" style="width: 40px; height: 40px;">
                                    <i class="bi bi-door-open fs-5"></i>
                                </span>
                                <div>
                                    <div class="fw-bold text-dark">Room {{ $room->room_number }}</div>
                                    <small class="text-muted text-truncate d-inline-block" style="max-width: 200px;">
                                        {{ $room->description ?: 'No description' }}
                                    </small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-secondary fw-medium">
                                <i class="bi bi-layers text-muted me-1"></i> {{ $room->floor }}
                            </span>
                        </td>
                        <td>
                            <span class="badge-room-type d-inline-flex align-items-center gap-1">
                                <i class="bi bi-bookmark-check-fill"></i>
                                <span>{{ $room->roomType->name ?? 'N/A' }}</span>
                            </span>
                        </td>
                        <td>
                            <span class="fw-bold text-dark">${{ number_format($room->price_per_night, 2) }}</span>
                            <small class="text-muted">/night</small>
                        </td>
                        <td>
                            @if($room->status === 'Available')
                                <span class="badge-status-available d-inline-flex align-items-center gap-1">
                                    <i class="bi bi-check-circle-fill"></i> Available
                                </span>
                            @elseif($room->status === 'Occupied')
                                <span class="badge-status-occupied d-inline-flex align-items-center gap-1">
                                    <i class="bi bi-person-fill"></i> Occupied
                                </span>
                            @else
                                <span class="badge-status-maintenance d-inline-flex align-items-center gap-1">
                                    <i class="bi bi-tools"></i> Maintenance
                                </span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group">
                                <!-- View Button -->
                                <a href="{{ route('rooms.show', $room) }}" class="btn btn-outline-info text-info border-0 rounded-circle p-2 mx-1" title="View Details">
                                    <i class="bi bi-eye fs-6"></i>
                                </a>

                                <!-- Edit Button -->
                                <a href="{{ route('rooms.edit', $room) }}" class="btn btn-outline-primary border-0 rounded-circle p-2 mx-1" title="Edit Room">
                                    <i class="bi bi-pencil-square fs-6"></i>
                                </a>

                                <!-- Delete Button (Triggers Modal) -->
                                <button type="button" class="btn btn-outline-danger border-0 rounded-circle p-2 mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $room->id }}" title="Delete Room">
                                    <i class="bi bi-trash3 fs-6"></i>
                                </button>
                            </div>

                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteModal{{ $room->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 shadow">
                                        <div class="modal-header border-0 pb-0">
                                            <h5 class="modal-title fw-bold text-danger">
                                                <i class="bi bi-exclamation-triangle me-2"></i> Confirm Deletion
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-start py-3">
                                            Are you sure you want to delete <strong>Room {{ $room->room_number }}</strong> ({{ $room->roomType->name ?? 'Standard' }})?
                                            <p class="text-muted small mt-2 mb-0">This action cannot be undone.</p>
                                        </div>
                                        <div class="modal-footer border-0 pt-0">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('rooms.destroy', $room) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
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
                            <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary opacity-50"></i>
                            <h6 class="fw-semibold">No hotel rooms found</h6>
                            <p class="small mb-3">Try adjusting your search criteria or register a new room.</p>
                            <a href="{{ route('rooms.create') }}" class="btn btn-sm btn-primary">
                                <i class="bi bi-plus-circle me-1"></i> Register New Room
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination & Footer Navigation (Matching Slide 7) -->
    <div class="d-flex flex-wrap align-items-center justify-content-between pt-3 border-top mt-2 gap-2">
        <div class="text-muted small">
            Showing {{ $rooms->firstItem() ?? 0 }} to {{ $rooms->lastItem() ?? 0 }} of {{ $rooms->total() }} entries
        </div>

        <div>
            {{ $rooms->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <!-- Back to Form Button (Matching Slide 7 bottom button) -->
    <div class="text-center mt-4 pt-2">
        <a href="{{ route('rooms.create') }}" class="btn btn-primary-custom w-100 py-3 rounded-3 d-flex align-items-center justify-content-center gap-2">
            <i class="bi bi-plus-circle-fill"></i>
            <span>Back to Room Registration Form</span>
        </a>
    </div>

</div>

@endsection
