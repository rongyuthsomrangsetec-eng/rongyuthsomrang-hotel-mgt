@extends('layouts.app')

@section('title', 'Hotel Room Registration')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">

        <!-- Top Header Card (Slide 6) -->
        <div class="hero-banner-natural text-center mb-4">
            <div class="d-inline-flex align-items-center justify-content-center bg-white bg-opacity-20 rounded-circle p-3 mb-2 animate-float" style="width: 68px; height: 68px;">
                <i class="bi bi-door-open-fill fs-2 text-white"></i>
            </div>
            <h2 class="fw-bold mb-1 text-white">Hotel Room Registration</h2>
            <p class="mb-0 text-white-50" style="font-size: 1rem;">Complete the form below to register a new suite or eco-friendly hotel room</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mb-4 border-0 shadow-sm rounded-4 bg-white border-start border-4 border-danger p-3" role="alert">
                <div class="d-flex align-items-center gap-2 mb-1">
                    <i class="bi bi-exclamation-triangle-fill text-danger fs-5"></i>
                    <strong class="text-danger">Please correct the following errors:</strong>
                </div>
                <ul class="mb-0 mt-2 ps-4 text-dark small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card card-natural p-4 p-md-5 mb-4">
            <form action="{{ route('rooms.store') }}" method="POST" id="roomForm">
                @csrf

                <!-- Section 1: Room Information -->
                <div class="mb-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="d-inline-flex align-items-center justify-content-center bg-teal bg-opacity-10 text-teal rounded-circle" style="width: 32px; height: 32px; background: #f0fdfa; color: #0d9488;">
                            <i class="bi bi-info-circle-fill"></i>
                        </span>
                        <h5 class="fw-bold text-dark mb-0">Room Identification</h5>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="room_number" class="form-label fw-semibold text-secondary">
                                <i class="bi bi-hash text-teal me-1"></i> Room Number
                            </label>
                            <input type="text" class="form-control form-control-natural @error('room_number') is-invalid @enderror" id="room_number" name="room_number" value="{{ old('room_number') }}" placeholder="e.g. 101, 202, ECO-1" required>
                        </div>

                        <div class="col-md-6">
                            <label for="floor" class="form-label fw-semibold text-secondary">
                                <i class="bi bi-layers text-teal me-1"></i> Floor Level
                            </label>
                            <input type="text" class="form-control form-control-natural @error('floor') is-invalid @enderror" id="floor" name="floor" value="{{ old('floor') }}" placeholder="e.g. 1st Floor, Garden Terrace, Penthouse" required>
                        </div>
                    </div>
                </div>

                <hr class="text-muted my-4 opacity-25">

                <!-- Section 2: Category & Pricing -->
                <div class="mb-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="d-inline-flex align-items-center justify-content-center bg-teal bg-opacity-10 text-teal rounded-circle" style="width: 32px; height: 32px; background: #f0fdfa; color: #0d9488;">
                            <i class="bi bi-grid-fill"></i>
                        </span>
                        <h5 class="fw-bold text-dark mb-0">Category & Pricing</h5>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="room_type_id" class="form-label fw-semibold text-secondary">
                                <i class="bi bi-tag-fill text-teal me-1"></i> Room Type (Category)
                            </label>
                            <select class="form-select form-select-natural @error('room_type_id') is-invalid @enderror" id="room_type_id" name="room_type_id" required>
                                <option value="" disabled selected>-- Choose Room Category --</option>
                                @foreach($roomTypes as $type)
                                    <option value="{{ $type->id }}" data-price="{{ $type->base_price }}" {{ old('room_type_id') == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }} (Base: ${{ number_format($type->base_price, 2) }} - {{ $type->capacity }} Guests)
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="price_per_night" class="form-label fw-semibold text-secondary">
                                <i class="bi bi-currency-dollar text-teal me-1"></i> Price per Night ($)
                            </label>
                            <input type="number" step="0.01" class="form-control form-control-natural @error('price_per_night') is-invalid @enderror" id="price_per_night" name="price_per_night" value="{{ old('price_per_night') }}" placeholder="0.00" required>
                        </div>

                        <div class="col-md-12">
                            <label for="status" class="form-label fw-semibold text-secondary">
                                <i class="bi bi-check2-circle text-teal me-1"></i> Room Availability Status
                            </label>
                            <select class="form-select form-select-natural @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="Available" {{ old('status', 'Available') == 'Available' ? 'selected' : '' }}>Available (Ready for guest arrival)</option>
                                <option value="Occupied" {{ old('status') == 'Occupied' ? 'selected' : '' }}>Occupied (Guest in residence)</option>
                                <option value="Maintenance" {{ old('status') == 'Maintenance' ? 'selected' : '' }}>Maintenance (Deep sanitization / Inspection)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <hr class="text-muted my-4 opacity-25">

                <!-- Section 3: Additional Information & Amenities -->
                <div class="mb-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="d-inline-flex align-items-center justify-content-center bg-teal bg-opacity-10 text-teal rounded-circle" style="width: 32px; height: 32px; background: #f0fdfa; color: #0d9488;">
                            <i class="bi bi-flower2"></i>
                        </span>
                        <h5 class="fw-bold text-dark mb-0">Amenities & Natural Features</h5>
                    </div>

                    <div>
                        <label for="description" class="form-label fw-semibold text-secondary">Description & Special Features</label>
                        <textarea class="form-control form-control-natural @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Enter amenities, organic linens, botanical garden view, private solar jacuzzi, king bed...">{{ old('description') }}</textarea>
                    </div>
                </div>

                <!-- Submit / Action Buttons (Slide 6) -->
                <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center pt-4 border-top">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-natural-primary">
                            <i class="bi bi-send-fill"></i>
                            <span>Submit Registration</span>
                        </button>
                        <button type="reset" class="btn btn-natural-outline">
                            <i class="bi bi-arrow-counterclockwise"></i>
                            <span>Reset Form</span>
                        </button>
                    </div>

                    <a href="{{ route('rooms.index') }}" class="btn btn-natural-outline text-teal border-teal">
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
    // Real-time automatic base price suggestion
    document.getElementById('room_type_id').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const priceInput = document.getElementById('price_per_night');
        if (selectedOption && selectedOption.dataset.price && (!priceInput.value || priceInput.value == '0.00')) {
            priceInput.value = selectedOption.dataset.price;
            // Subtle flash animation on price input
            priceInput.style.transition = 'background-color 0.4s ease';
            priceInput.style.backgroundColor = '#ccfbf1';
            setTimeout(() => {
                priceInput.style.backgroundColor = '#f8faf8';
            }, 500);
        }
    });
</script>
@endsection
