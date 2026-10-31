@extends('layouts.app')

@section('title', 'បញ្ជីបន្ទប់ - ផ្ទះសំណាក់ ចាន់ថន (SCT)')

@section('content')

<!-- SCT Poster Hero Banner (Slide 7) -->
<div class="hero-banner-sct mb-4">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4 position-relative" style="z-index: 2;">
        <div class="d-flex align-items-center gap-3">
            <span class="sct-logo-badge" style="width: 62px; height: 62px; font-size: 1.6rem;">SCT</span>
            <div>
                <div class="d-flex align-items-center gap-2">
                    <h2 class="fw-bold mb-0 text-white" style="letter-spacing: -0.02em;">ផ្ទះសំណាក់ ចាន់ថន</h2>
                    <span class="badge bg-warning text-dark px-2 py-1 rounded-pill small fw-bold">ស្វាយរៀង</span>
                </div>
                <p class="mb-0 text-white-50 mt-1" style="font-size: 0.95rem;">
                    បទពិសោធន៍សម្រាកលំហែបែបធម្មជាតិ 🌿 &bull; Chan Thorn Guesthouse & Nature Resort Directory
                </p>
            </div>
        </div>

        <div class="d-flex align-items-center gap-2">
            <button type="button" class="btn btn-outline-light d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#contactModal">
                <i class="bi bi-chat-dots-fill text-warning"></i>
                <span>ទំនាក់ទំនង (5.5K FB)</span>
            </button>

            <button type="button" class="btn btn-outline-light d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#locationQrModal">
                <i class="bi bi-qr-code-scan text-warning"></i>
                <span>QR ទីតាំង</span>
            </button>

            <a href="{{ route('rooms.create') }}" class="btn btn-sct-gold">
                <i class="bi bi-plus-circle-fill"></i>
                <span>+ ចុះឈ្មោះបន្ទប់ថ្មី</span>
            </a>
        </div>
    </div>

    <!-- 3 Stat KPI Cards (Slide 7) -->
    <div class="row g-3 justify-content-center position-relative" style="z-index: 2;">
        <div class="col-md-4 col-sm-4">
            <div class="stat-card-sct">
                <div class="stat-number count-up" data-target="{{ $totalRooms }}">{{ $totalRooms }}</div>
                <div class="stat-label">
                    <i class="bi bi-door-closed-fill text-warning"></i> បន្ទប់សរុប (Total Rooms)
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4">
            <div class="stat-card-sct">
                <div class="stat-number count-up" data-target="{{ $totalRoomTypes }}">{{ $totalRoomTypes }}</div>
                <div class="stat-label">
                    <i class="bi bi-grid-fill text-warning"></i> ប្រភេទបន្ទប់ (Room Types)
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4">
            <div class="stat-card-sct">
                <div class="stat-number count-up" data-target="{{ $availableRooms }}">{{ $availableRooms }}</div>
                <div class="stat-label">
                    <i class="bi bi-check2-circle text-warning"></i> បន្ទប់ទំនេរ (Available Rooms)
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Facebook Page & Official Social Connect Banner -->
<div class="card card-sct p-3 mb-4 bg-white border">
    <div class="row align-items-center g-3">
        <div class="col-lg-7 col-md-6">
            <div class="d-flex align-items-center gap-3">
                <img src="{{ asset('images/sct-night-resort.png') }}" alt="ផ្ទះសំណាក់ ចាន់ថន" class="rounded-circle border border-2 border-success shadow-sm" style="width: 58px; height: 58px; object-fit: cover;">
                <div>
                    <div class="d-flex align-items-center gap-2">
                        <h5 class="fw-bold text-dark mb-0">ផ្ទះសំណាក់ ចាន់ថន</h5>
                        <i class="bi bi-patch-check-fill text-primary" title="Facebook Page"></i>
                    </div>
                    <div class="text-muted small mt-1">
                        <span class="badge bg-primary bg-opacity-10 text-primary fw-bold me-1">5.5K followers</span>
                        <span>&bull; Digital creator &bull; Phnom Penh &bull; Svay Rieng Province</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-6 text-md-end">
            <div class="d-flex flex-wrap gap-2 justify-content-md-end">
                <a href="tel:067636262" class="btn btn-sm btn-outline-success rounded-pill px-3 fw-semibold">
                    <i class="bi bi-telephone-fill me-1"></i> 067 636 262
                </a>
                <button type="button" class="btn btn-sm btn-facebook rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#contactModal">
                    <i class="bi bi-messenger me-1"></i> ផ្ញើសារ (Message)
                </button>
                <button type="button" class="btn btn-sm btn-sct-gold rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#locationQrModal">
                    <i class="bi bi-qr-code-scan me-1"></i> QR ទីតាំង
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Poster Amenities Highlight Strip -->
<div class="d-flex flex-wrap align-items-center justify-content-center gap-2 mb-4 p-2 bg-white rounded-4 border shadow-sm">
    <div class="amenity-pill">
        <i class="bi bi-check-circle-fill text-success"></i>
        <span>បន្ទប់ស្អាត មានផាសុកភាព</span>
    </div>
    <div class="amenity-pill">
        <i class="bi bi-wifi text-primary"></i>
        <span>WiFi រហ័សទាន់ចិត្ត</span>
    </div>
    <div class="amenity-pill">
        <i class="bi bi-cup-hot-fill text-danger"></i>
        <span>កាហ្វេ & អាហារដ្ឋាន</span>
    </div>
    <div class="amenity-pill">
        <i class="bi bi-car-front-fill text-info"></i>
        <span>ចំណតរថយន្ត ធំទូលាយ</span>
    </div>
    <div class="amenity-pill">
        <i class="bi bi-camera-video-fill text-secondary"></i>
        <span>សុវត្ថិភាព 24 ម៉ោង (CCTV)</span>
    </div>
</div>

<!-- Main Table Card (Slide 7) -->
<div class="card card-sct p-4">

    <!-- Search & Filter Form (Slide 7) -->
    <form action="{{ route('rooms.index') }}" method="GET" class="mb-4">
        <div class="row g-3 align-items-center">

            <!-- Search Input -->
            <div class="col-lg-4 col-md-12">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted ps-3" style="border-radius: 0.75rem 0 0 0.75rem; border: 1.5px solid #e2e8f0; border-right: none;">
                        <i class="bi bi-search text-success"></i>
                    </span>
                    <input type="text" name="search" class="form-control form-control-sct border-start-0"
                           style="border-radius: 0 0.75rem 0.75rem 0;"
                           placeholder="ស្វែងរកតាមលេខបន្ទប់ តំបន់ ឬបរិក្ខារ..."
                           value="{{ request('search') }}">
                </div>
            </div>

            <!-- Filter 1: Room Type -->
            <div class="col-lg-3 col-md-4">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted ps-3" style="border-radius: 0.75rem 0 0 0.75rem; border: 1.5px solid #e2e8f0; border-right: none;">
                        <i class="bi bi-funnel text-success"></i>
                    </span>
                    <select name="room_type_id" class="form-select form-select-sct border-start-0" style="border-radius: 0 0.75rem 0.75rem 0;">
                        <option value="all">គ្រប់ប្រភេទបន្ទប់ (All Types)</option>
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
                    <select name="sort" class="form-select form-select-sct border-start-0" style="border-radius: 0 0.75rem 0.75rem 0;">
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>ថ្មីបំផុត (Newest)</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>ចាស់បំផុត (Oldest)</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>តម្លៃទាប -> ខ្ពស់</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>តម្លៃខ្ពស់ -> ទាប</option>
                        <option value="room_asc" {{ request('sort') == 'room_asc' ? 'selected' : '' }}>តាមលេខបន្ទប់</option>
                    </select>
                </div>
            </div>

            <!-- Filter 3: Status -->
            <div class="col-lg-2 col-md-4">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted ps-3" style="border-radius: 0.75rem 0 0 0.75rem; border: 1.5px solid #e2e8f0; border-right: none;">
                        <i class="bi bi-tag text-secondary"></i>
                    </span>
                    <select name="status" class="form-select form-select-sct border-start-0" style="border-radius: 0 0.75rem 0.75rem 0;">
                        <option value="all">គ្រប់ស្ថានភាព (All Status)</option>
                        <option value="Available" {{ request('status') == 'Available' ? 'selected' : '' }}>ទំនេរ (Available)</option>
                        <option value="Occupied" {{ request('status') == 'Occupied' ? 'selected' : '' }}>មានភ្ញៀវ (Occupied)</option>
                        <option value="Maintenance" {{ request('status') == 'Maintenance' ? 'selected' : '' }}>កំពុងថែទាំ (Maintenance)</option>
                    </select>
                </div>
            </div>

            <!-- Filter Actions -->
            <div class="col-lg-1 col-md-12 d-flex gap-2">
                <button type="submit" class="btn btn-sct-emerald w-100 p-2" title="Filter Records">
                    <i class="bi bi-search"></i>
                </button>
                @if(request('search') || request('room_type_id') || request('status') || request('sort'))
                    <a href="{{ route('rooms.index') }}" class="btn btn-sct-outline p-2" title="Reset Filters">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </a>
                @endif
            </div>
        </div>
    </form>

    <!-- Table (Slide 7) -->
    <div class="table-responsive rounded-3 overflow-hidden border">
        <table class="table table-sct table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th scope="col" style="width: 70px;">ID</th>
                    <th scope="col">បន្ទប់ (Room)</th>
                    <th scope="col">តំបន់/ជាន់ (Zone / Floor)</th>
                    <th scope="col">ប្រភេទបន្ទប់ (Room Category)</th>
                    <th scope="col">តម្លៃ / យប់ (Price)</th>
                    <th scope="col">ស្ថានភាព (Status)</th>
                    <th scope="col" class="text-center" style="width: 150px;">សកម្មភាព (Actions)</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rooms as $room)
                    <tr>
                        <td class="fw-bold text-muted ps-3">#{{ $room->id }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <span class="d-inline-flex align-items-center justify-content-center rounded-3 p-2 border" style="width: 44px; height: 44px; background: #e6f4ef; border-color: #bbf7d0 !important; color: #062c21;">
                                    <i class="bi bi-door-open-fill fs-5"></i>
                                </span>
                                <div>
                                    <div class="fw-bold text-dark fs-6">{{ $room->room_number }}</div>
                                    <small class="text-muted text-truncate d-inline-block" style="max-width: 220px;">
                                        {{ $room->description ?: 'បន្ទប់ស្អាត មានផាសុកភាព' }}
                                    </small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-secondary fw-semibold">
                                <i class="bi bi-geo-alt-fill text-warning me-1"></i> {{ $room->floor }}
                            </span>
                        </td>
                        <td>
                            <span class="badge-room-type-sct">
                                <i class="bi bi-tree-fill text-success"></i>
                                <span>{{ $room->roomType->name ?? 'N/A' }}</span>
                            </span>
                        </td>
                        <td>
                            <div class="d-inline-flex align-items-baseline gap-1">
                                <span class="fw-bold text-dark fs-6">${{ number_format($room->price_per_night, 2) }}</span>
                                <small class="text-muted" style="font-size: 0.75rem;">/ យប់</small>
                            </div>
                        </td>
                        <td>
                            @if($room->status === 'Available')
                                <span class="badge-status-available-sct">
                                    <span class="status-dot-pulse-sct"></span>
                                    <span>ទំនេរ (Available)</span>
                                </span>
                            @elseif($room->status === 'Occupied')
                                <span class="badge-status-occupied-sct">
                                    <i class="bi bi-person-fill"></i>
                                    <span>មានភ្ញៀវ (Occupied)</span>
                                </span>
                            @else
                                <span class="badge-status-maintenance-sct">
                                    <i class="bi bi-tools"></i>
                                    <span>ថែទាំ (Maintenance)</span>
                                </span>
                            @endif
                        </td>
                        <td class="text-center pe-3">
                            <div class="d-flex align-items-center justify-content-center gap-1">
                                <!-- View Button -->
                                <a href="{{ route('rooms.show', $room) }}" class="action-btn-circle action-btn-view" title="មើលលម្អិត (View)">
                                    <i class="bi bi-eye-fill"></i>
                                </a>

                                <!-- Edit Button -->
                                <a href="{{ route('rooms.edit', $room) }}" class="action-btn-circle action-btn-edit" title="កែប្រែ (Edit)">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>

                                <!-- Delete Button (Triggers Modal) -->
                                <button type="button" class="action-btn-circle action-btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $room->id }}" title="លុបបន្ទប់ (Delete)">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </div>

                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteModal{{ $room->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                                        <div class="modal-header border-0 bg-danger bg-opacity-10 py-3">
                                            <h5 class="modal-title fw-bold text-danger d-flex align-items-center gap-2">
                                                <i class="bi bi-exclamation-triangle-fill"></i> តើអ្នកពិតជាចង់លុបបន្ទប់ {{ $room->room_number }}?
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body text-start py-4 px-4">
                                            <p class="mb-2 text-dark">
                                                តើអ្នកច្បាស់ទេថានឹងលុប <strong>បន្ទប់ {{ $room->room_number }}</strong> ({{ $room->roomType->name ?? 'ស្តង់ដារ' }}) ចេញពីប្រព័ន្ធ?
                                            </p>
                                            <div class="alert alert-light border small text-muted mb-0">
                                                <i class="bi bi-info-circle me-1"></i> សកម្មភាពនេះមិនអាចត្រឡប់ក្រោយបានទេ!
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0 pt-0 px-4 pb-4">
                                            <button type="button" class="btn btn-sct-outline" data-bs-dismiss="modal">បោះបង់</button>
                                            <form action="{{ route('rooms.destroy', $room) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger fw-semibold px-4 py-2 rounded-3">យល់ព្រមលុប</button>
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
                            <i class="bi bi-house-door fs-1 d-block mb-2 text-success opacity-50"></i>
                            <h5 class="fw-semibold text-dark">រកមិនឃើញទិន្នន័យបន្ទប់ទេ</h5>
                            <p class="small mb-3">សូមសាកល្បងកែប្រែលក្ខខណ្ឌស្វែងរក ឬបន្ថែមបន្ទប់ថ្មី។</p>
                            <a href="{{ route('rooms.create') }}" class="btn btn-sct-gold btn-sm">
                                <i class="bi bi-plus-circle-fill"></i> ចុះឈ្មោះបន្ទប់ថ្មី
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination (Slide 7) -->
    <div class="d-flex flex-wrap align-items-center justify-content-between pt-4 mt-2 gap-2 border-top">
        <div class="text-muted small fw-medium">
            បង្ហាញពី <strong class="text-dark">{{ $rooms->firstItem() ?? 0 }}</strong> ដល់ <strong class="text-dark">{{ $rooms->lastItem() ?? 0 }}</strong> នៃចំនួនសរុប <strong class="text-dark">{{ $rooms->total() }}</strong> បន្ទប់
        </div>

        <div>
            {{ $rooms->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <!-- Back to Room Form Button (Bottom of Slide 7) -->
    <div class="text-center mt-4 pt-2">
        <a href="{{ route('rooms.create') }}" class="btn btn-sct-gold w-100 py-3 rounded-4 shadow-sm fs-6">
            <i class="bi bi-plus-circle-fill fs-5"></i>
            <span>ត្រឡប់ទៅទម្រង់ចុះឈ្មោះបន្ទប់ (Back to Room Registration Form)</span>
        </a>
    </div>

</div>

@endsection

@section('scripts')
<script>
    // Smooth number counter animation
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll(".count-up");
        counters.forEach(counter => {
            const target = +counter.getAttribute("data-target");
            const duration = 600;
            const startTime = performance.now();

            const updateCount = (currentTime) => {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
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
