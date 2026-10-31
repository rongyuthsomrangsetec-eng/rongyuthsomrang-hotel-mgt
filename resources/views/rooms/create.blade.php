@extends('layouts.app')

@section('title', 'Hotel Room Registration')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">

        <!-- Top Header Card (Matching Slide 6) -->
        <div class="hero-banner text-center mb-4">
            <div class="d-inline-flex align-items-center justify-content-center bg-white bg-opacity-25 rounded-circle p-3 mb-2">
                <i class="bi bi-door-open-fill fs-2"></i>
            </div>
            <h2 class="fw-bold mb-1">Hotel Room Registration</h2>
            <p class="mb-0 opacity-75">Complete the form below to register a new hotel room into the system</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mb-4 border-0 shadow-sm" role="alert">
                <strong><i class="bi bi-exclamation-triangle-fill me-1"></i> Please check the form errors:</strong>
                <ul class="mb-0 mt-2 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card card-custom p-4 p-md-5">
            <form action="{{ route('rooms.store') }}" method="POST" id="roomForm">
                @csrf

                <!-- Section 1: Room Information -->
                <div class="mb-4">
                    <h5 class="fw-bold text-primary d-flex align-items-center gap-2 mb-3">
                        <i class="bi bi-info-circle-fill"></i>
                        <span>Room Information</span>
                    </h5>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="room_number" class="form-label fw-semibold text-secondary">
                                <i class="bi bi-hash me-1"></i> Room Number
                            </label>
                            <input type="text" class="form-control py-2 @error('room_number') is-invalid @enderror" id="room_number" name="room_number" value="{{ old('room_number') }}" placeholder="e.g. 101, 202, VIP-1" required>
                        </div>

                        <div class="col-md-6">
                            <label for="floor" class="form-label fw-semibold text-secondary">
                                <i class="bi bi-layers me-1"></i> Floor Level
                            </label>
                            <input type="text" class="form-control py-2 @error('floor') is-invalid @enderror" id="floor" name="floor" value="{{ old('floor') }}" placeholder="e.g. 1st Floor, 2nd Floor, Penthouse" required>
                        </div>
                    </div>
                </div>

                <hr class="text-muted my-4 opacity-25">

                <!-- Section 2: Category & Pricing -->
                <div class="mb-4">
                    <h5 class="fw-bold text-primary d-flex align-items-center gap-2 mb-3">
                        <i class="bi bi-grid-fill"></i>
                        <span>Category & Pricing</span>
                    </h5>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="room_type_id" class="form-label fw-semibold text-secondary">
                                <i class="bi bi-tag-fill me-1"></i> Room Type (Category)
                            </label>
                            <select class="form-select py-2 @error('room_type_id') is-invalid @enderror" id="room_type_id" name="room_type_id" required>
                                <option value="" disabled selected>-- Select Room Type --</option>
                                @foreach($roomTypes as $type)
                                    <option value="{{ $type->id }}" data-price="{{ $type->base_price }}" {{ old('room_type_id') == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }} (Base: ${{ number_format($type->base_price, 2) }} - {{ $type->capacity }} Guests)
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="price_per_night" class="form-label fw-semibold text-secondary">
                                <i class="bi bi-currency-dollar me-1"></i> Price per Night ($)
                            </label>
                            <input type="number" step="0.01" class="form-control py-2 @error('price_per_night') is-invalid @enderror" id="price_per_night" name="price_per_night" value="{{ old('price_per_night') }}" placeholder="0.00" required>
                        </div>

                        <div class="col-md-12">
                            <label for="status" class="form-label fw-semibold text-secondary">
                                <i class="bi bi-check2-circle me-1"></i> Room Availability Status
                            </label>
                            <select class="form-select py-2 @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="Available" {{ old('status', 'Available') == 'Available' ? 'selected' : '' }}>Available (Ready for check-in)</option>
                                <option value="Occupied" {{ old('status') == 'Occupied' ? 'selected' : '' }}>Occupied (Guest currently checked in)</option>
                                <option value="Maintenance" {{ old('status') == 'Maintenance' ? 'selected' : '' }}>Maintenance (Cleaning / Repairs)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <hr class="text-muted my-4 opacity-25">

                <!-- Section 3: Amenities & Additional Information -->
                <div class="mb-4">
                    <h5 class="fw-bold text-primary d-flex align-items-center gap-2 mb-3">
                        <i class="bi bi-card-text"></i>
                        <span>Additional Information & Amenities</span>
                    </h5>

                    <div>
                        <label for="description" class="form-label fw-semibold text-secondary">Amenities & Features</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Enter any additional information about room amenities, sea/garden view, king bed, jacuzzi...">{{ old('description') }}</textarea>
                    </div>
                </div>

                <!-- Submit / Action Buttons (Matching Slide 6) -->
                <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center pt-3 border-top">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary-custom d-flex align-items-center gap-2">
                            <i class="bi bi-send-fill"></i>
                            <span>Submit Registration</span>
                        </button>
                        <button type="reset" class="btn btn-outline-secondary d-flex align-items-center gap-2 px-3">
                            <i class="bi bi-arrow-counterclockwise"></i>
                            <span>Reset Form</span>
                        </button>
                    </div>

                    <a href="{{ route('rooms.index') }}" class="btn btn-info text-white fw-semibold d-flex align-items-center gap-2 px-3">
                        <i class="bi bi-list-task"></i>
                        <span>View Room List</span>
                    </a>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
    // Automatically suggest base price when room type is chosen
    document.getElementById('room_type_id').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const priceInput = document.getElementById('price_per_night');
        if (selectedOption && selectedOption.dataset.price && (!priceInput.value || priceInput.value == '0.00')) {
            priceInput.value = selectedOption.dataset.price;
        }
    });
</script>
@endsection
