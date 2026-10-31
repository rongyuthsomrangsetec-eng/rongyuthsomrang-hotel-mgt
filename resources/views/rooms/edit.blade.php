@extends('layouts.app')

@section('title', 'កែប្រែបន្ទប់ ' . $room->room_number . ' - ផ្ទះសំណាក់ ចាន់ថន (SCT)')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">

        <!-- Top Header Card -->
        <div class="hero-banner-sct text-center mb-4">
            <div class="d-inline-flex align-items-center justify-content-center sct-logo-badge mb-2" style="width: 60px; height: 60px; font-size: 1.5rem;">
                SCT
            </div>
            <h2 class="fw-bold mb-1 text-white">កែប្រែព័ត៌មានបន្ទប់ {{ $room->room_number }} (Edit Room)</h2>
            <p class="mb-0 text-white-50" style="font-size: 0.95rem;">
                កែប្រែព័ត៌មានសម្គាល់ តម្លៃ ប្រភេទ និងស្ថានភាពបន្ទប់
            </p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mb-4 border-0 shadow-sm rounded-4 bg-white border-start border-4 border-danger p-3" role="alert">
                <div class="d-flex align-items-center gap-2 mb-1">
                    <i class="bi bi-exclamation-triangle-fill text-danger fs-5"></i>
                    <strong class="text-danger">សូមពិនិត្យព័ត៌មានដែលមានកំហុស៖</strong>
                </div>
                <ul class="mb-0 mt-2 ps-4 text-dark small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card card-sct p-4 p-md-5 mb-4">
            <form action="{{ route('rooms.update', $room) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Section 1: Room Information -->
                <div class="mb-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 32px; height: 32px; background: #e6f4ef; color: #062c21;">
                            <i class="bi bi-door-open-fill"></i>
                        </span>
                        <h5 class="fw-bold text-dark mb-0">១. ព័ត៌មានសម្គាល់បន្ទប់ (Room Identification)</h5>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="room_number" class="form-label fw-semibold text-secondary">
                                <i class="bi bi-hash text-warning me-1"></i> លេខបន្ទប់ (Room Number)
                            </label>
                            <input type="text" class="form-control form-control-sct @error('room_number') is-invalid @enderror" id="room_number" name="room_number" value="{{ old('room_number', $room->room_number) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="floor" class="form-label fw-semibold text-secondary">
                                <i class="bi bi-geo-alt-fill text-warning me-1"></i> តំបន់ / ជាន់ (Zone / Floor)
                            </label>
                            <input type="text" class="form-control form-control-sct @error('floor') is-invalid @enderror" id="floor" name="floor" value="{{ old('floor', $room->floor) }}" required>
                        </div>
                    </div>
                </div>

                <hr class="text-muted my-4 opacity-25">

                <!-- Section 2: Category & Pricing -->
                <div class="mb-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 32px; height: 32px; background: #e6f4ef; color: #062c21;">
                            <i class="bi bi-grid-fill"></i>
                        </span>
                        <h5 class="fw-bold text-dark mb-0">២. ប្រភេទបន្ទប់ & តម្លៃ (Category & Pricing)</h5>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="room_type_id" class="form-label fw-semibold text-secondary">
                                <i class="bi bi-tag-fill text-warning me-1"></i> ប្រភេទបន្ទប់ (Room Type)
                            </label>
                            <select class="form-select form-select-sct @error('room_type_id') is-invalid @enderror" id="room_type_id" name="room_type_id" required>
                                @foreach($roomTypes as $type)
                                    <option value="{{ $type->id }}" {{ old('room_type_id', $room->room_type_id) == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }} (មូលដ្ឋាន: ${{ number_format($type->base_price, 2) }} - {{ $type->capacity }} នាក់)
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="price_per_night" class="form-label fw-semibold text-secondary">
                                <i class="bi bi-currency-dollar text-warning me-1"></i> តម្លៃស្នាក់នៅ / យប់ (USD)
                            </label>
                            <input type="number" step="0.01" class="form-control form-control-sct @error('price_per_night') is-invalid @enderror" id="price_per_night" name="price_per_night" value="{{ old('price_per_night', $room->price_per_night) }}" required>
                        </div>

                        <div class="col-md-12">
                            <label for="status" class="form-label fw-semibold text-secondary">
                                <i class="bi bi-check2-circle text-warning me-1"></i> ស្ថានភាពបន្ទប់ (Availability Status)
                            </label>
                            <select class="form-select form-select-sct @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="Available" {{ old('status', $room->status) == 'Available' ? 'selected' : '' }}>ទំនេរ - អាចទទួលភ្ញៀវបាន (Available)</option>
                                <option value="Occupied" {{ old('status', $room->status) == 'Occupied' ? 'selected' : '' }}>មានភ្ញៀវស្នាក់នៅ (Occupied)</option>
                                <option value="Maintenance" {{ old('status', $room->status) == 'Maintenance' ? 'selected' : '' }}>កំពុងសម្អាត / ថែទាំ (Maintenance)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <hr class="text-muted my-4 opacity-25">

                <!-- Section 3: Amenities -->
                <div class="mb-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 32px; height: 32px; background: #e6f4ef; color: #062c21;">
                            <i class="bi bi-stars"></i>
                        </span>
                        <h5 class="fw-bold text-dark mb-0">៣. បរិក្ខារ & លក្ខណៈពិសេស (Amenities & Features)</h5>
                    </div>

                    <div>
                        <label for="description" class="form-label fw-semibold text-secondary">ការពិពណ៌នាពីបន្ទប់ និងបរិក្ខារ</label>
                        <textarea class="form-control form-control-sct @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $room->description) }}</textarea>
                    </div>
                </div>

                <!-- Submit / Action Buttons -->
                <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center pt-4 border-top">
                    <button type="submit" class="btn btn-sct-gold">
                        <i class="bi bi-check2-circle fs-5"></i>
                        <span>រក្សាទុកការកែប្រែ (Save Changes)</span>
                    </button>

                    <a href="{{ route('rooms.index') }}" class="btn btn-sct-outline">
                        <i class="bi bi-x-circle"></i>
                        <span>បោះបង់ & ត្រឡប់ក្រោយ (Cancel)</span>
                    </a>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
