@extends('layouts.app')

@section('title', 'ចុះឈ្មោះបន្ទប់ថ្មី - ផ្ទះសំណាក់ ចាន់ថន (SCT)')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">

        <!-- Top Header Banner (Slide 6) -->
        <div class="hero-banner-sct text-center mb-4">
            <div class="d-inline-flex align-items-center justify-content-center sct-logo-badge mb-2" style="width: 60px; height: 60px; font-size: 1.5rem;">
                SCT
            </div>
            <h2 class="fw-bold mb-1 text-white">ចុះឈ្មោះបន្ទប់ថ្មី (Room Registration)</h2>
            <p class="mb-0 text-white-50" style="font-size: 0.95rem;">
                ផ្ទះសំណាក់ ចាន់ថន &bull; បំពេញព័ត៌មានខាងក្រោមដើម្បីបញ្ចូលបន្ទប់ ឬបឹងហ្គាឡូថ្មី
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
            <form action="{{ route('rooms.store') }}" method="POST" id="roomForm">
                @csrf

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
                            <input type="text" class="form-control form-control-sct @error('room_number') is-invalid @enderror" id="room_number" name="room_number" value="{{ old('room_number') }}" placeholder="ឧ. B-103, V-203, VIP-303" required>
                        </div>

                        <div class="col-md-6">
                            <label for="floor" class="form-label fw-semibold text-secondary">
                                <i class="bi bi-geo-alt-fill text-warning me-1"></i> តំបន់ / ជាន់ (Zone / Floor)
                            </label>
                            <input type="text" class="form-control form-control-sct @error('floor') is-invalid @enderror" id="floor" name="floor" value="{{ old('floor') }}" placeholder="ឧ. Green Garden Zone, Villa Pavilion, VIP Block" required>
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
                                <option value="" disabled selected>-- ជ្រើសរើសប្រភេទបន្ទប់ --</option>
                                @foreach($roomTypes as $type)
                                    <option value="{{ $type->id }}" data-price="{{ $type->base_price }}" {{ old('room_type_id') == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }} (មូលដ្ឋាន: ${{ number_format($type->base_price, 2) }} - {{ $type->capacity }} នាក់)
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="price_per_night" class="form-label fw-semibold text-secondary">
                                <i class="bi bi-currency-dollar text-warning me-1"></i> តម្លៃស្នាក់នៅ / យប់ (USD)
                            </label>
                            <input type="number" step="0.01" class="form-control form-control-sct @error('price_per_night') is-invalid @enderror" id="price_per_night" name="price_per_night" value="{{ old('price_per_night') }}" placeholder="0.00" required>
                        </div>

                        <div class="col-md-12">
                            <label for="status" class="form-label fw-semibold text-secondary">
                                <i class="bi bi-check2-circle text-warning me-1"></i> ស្ថានភាពបន្ទប់ (Availability Status)
                            </label>
                            <select class="form-select form-select-sct @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="Available" {{ old('status', 'Available') == 'Available' ? 'selected' : '' }}>ទំនេរ - អាចទទួលភ្ញៀវបាន (Available)</option>
                                <option value="Occupied" {{ old('status') == 'Occupied' ? 'selected' : '' }}>មានភ្ញៀវស្នាក់នៅ (Occupied)</option>
                                <option value="Maintenance" {{ old('status') == 'Maintenance' ? 'selected' : '' }}>កំពុងសម្អាត / ថែទាំ (Maintenance)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <hr class="text-muted my-4 opacity-25">

                <!-- Section 3: Amenities & Description -->
                <div class="mb-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 32px; height: 32px; background: #e6f4ef; color: #062c21;">
                                <i class="bi bi-stars"></i>
                            </span>
                            <h5 class="fw-bold text-dark mb-0">៣. បរិក្ខារ & លក្ខណៈពិសេស (Amenities & Features)</h5>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-semibold text-secondary">ការពិពណ៌នាពីបន្ទប់ និងបរិក្ខារ</label>
                        <textarea class="form-control form-control-sct @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="ឧ. បន្ទប់ស្អាត មានផាសុកភាព, ម៉ាស៊ីនត្រជាក់, Smart TV, កញ្ចក់ LED, ទឹកក្តៅ, WiFi រហ័សទាន់ចិត្ត, ចំណតធំទូលាយ...">{{ old('description') }}</textarea>
                    </div>

                    <!-- Quick Add Amenities from Poster -->
                    <div class="d-flex flex-wrap gap-2 pt-2">
                        <span class="badge bg-light text-dark border p-2 cursor-pointer amenity-tag" onclick="addAmenity('ម៉ាស៊ីនត្រជាក់ (AC)')" style="cursor: pointer;">+ ម៉ាស៊ីនត្រជាក់ (AC)</span>
                        <span class="badge bg-light text-dark border p-2 cursor-pointer amenity-tag" onclick="addAmenity('WiFi រហ័សទាន់ចិត្ត')" style="cursor: pointer;">+ WiFi រហ័សទាន់ចិត្ត</span>
                        <span class="badge bg-light text-dark border p-2 cursor-pointer amenity-tag" onclick="addAmenity('Smart TV')" style="cursor: pointer;">+ Smart TV</span>
                        <span class="badge bg-light text-dark border p-2 cursor-pointer amenity-tag" onclick="addAmenity('កញ្ចក់ LED ទំនើប')" style="cursor: pointer;">+ កញ្ចក់ LED ទំនើប</span>
                        <span class="badge bg-light text-dark border p-2 cursor-pointer amenity-tag" onclick="addAmenity('កាហ្វេ & អាហារដ្ឋាន')" style="cursor: pointer;">+ កាហ្វេ & អាហារដ្ឋាន</span>
                        <span class="badge bg-light text-dark border p-2 cursor-pointer amenity-tag" onclick="addAmenity('ចំណតរថយន្តធំទូលាយ')" style="cursor: pointer;">+ ចំណតរថយន្តធំទូលាយ</span>
                        <span class="badge bg-light text-dark border p-2 cursor-pointer amenity-tag" onclick="addAmenity('សុវត្ថិភាព 24 ម៉ោង (CCTV)')" style="cursor: pointer;">+ សុវត្ថិភាព 24h</span>
                    </div>
                </div>

                <!-- Submit / Action Buttons (Slide 6) -->
                <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center pt-4 border-top">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-sct-gold">
                            <i class="bi bi-send-fill"></i>
                            <span>រក្សាទុកទិន្នន័យ (Submit)</span>
                        </button>
                        <button type="reset" class="btn btn-sct-outline">
                            <i class="bi bi-arrow-counterclockwise"></i>
                            <span>សម្អាតទម្រង់ (Reset)</span>
                        </button>
                    </div>

                    <a href="{{ route('rooms.index') }}" class="btn btn-sct-emerald">
                        <i class="bi bi-list-task"></i>
                        <span>មើលបញ្ជីបន្ទប់ (View List)</span>
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
            priceInput.style.backgroundColor = '#fdf8e2';
            setTimeout(() => {
                priceInput.style.backgroundColor = '#fbfdfb';
            }, 400);
        }
    });

    function addAmenity(text) {
        const textarea = document.getElementById('description');
        if (textarea.value.trim().length > 0) {
            if (!textarea.value.includes(text)) {
                textarea.value += ', ' + text;
            }
        } else {
            textarea.value = text;
        }
    }
</script>
@endsection
