@extends('layouts.app')

@section('title', 'ព័ត៌មានលម្អិតបន្ទប់ ' . $room->room_number . ' - ផ្ទះសំណាក់ ចាន់ថន (SCT)')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">

        <!-- Top Header Banner -->
        <div class="hero-banner-sct d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
            <div>
                <span class="badge bg-warning text-dark px-3 py-2 fw-bold text-uppercase mb-2 shadow-sm rounded-pill">
                    <i class="bi bi-door-open-fill me-1"></i> ព័ត៌មានលម្អិតបន្ទប់ (Room Details)
                </span>
                <h2 class="fw-bold mb-1 text-white">បន្ទប់ {{ $room->room_number }}</h2>
                <p class="mb-0 text-white-50">{{ $room->floor }} &bull; {{ $room->roomType->name ?? 'Standard Category' }}</p>
            </div>

            <div>
                @if($room->status === 'Available')
                    <span class="badge bg-success bg-opacity-90 fs-6 px-3 py-2 rounded-pill shadow-sm">
                        <i class="bi bi-check-circle-fill me-1"></i> ទំនេរ (Available)
                    </span>
                @elseif($room->status === 'Occupied')
                    <span class="badge bg-warning text-dark fs-6 px-3 py-2 rounded-pill shadow-sm">
                        <i class="bi bi-person-fill me-1"></i> មានភ្ញៀវ (Occupied)
                    </span>
                @else
                    <span class="badge bg-danger fs-6 px-3 py-2 rounded-pill shadow-sm">
                        <i class="bi bi-tools me-1"></i> កំពុងថែទាំ (Maintenance)
                    </span>
                @endif
            </div>
        </div>

        <!-- Details Card -->
        <div class="card card-sct p-4 p-md-5 mb-4">
            <h5 class="fw-bold text-dark border-bottom pb-3 mb-4 d-flex align-items-center gap-2">
                <i class="bi bi-info-square-fill text-warning"></i>
                <span>លក្ខណៈបច្ចេកទេស និងតម្លៃ (Specifications & Pricing)</span>
            </h5>

            <div class="row g-3 mb-4">
                <div class="col-sm-6">
                    <div class="p-3 bg-light rounded-4 border">
                        <small class="text-muted d-block fw-semibold mb-1" style="font-size: 0.75rem; letter-spacing: 0.05em;">លេខបន្ទប់ (ROOM NUMBER)</small>
                        <h4 class="fw-bold text-dark mb-0">{{ $room->room_number }}</h4>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="p-3 bg-light rounded-4 border">
                        <small class="text-muted d-block fw-semibold mb-1" style="font-size: 0.75rem; letter-spacing: 0.05em;">តំបន់ / ជាន់ (ZONE / FLOOR)</small>
                        <h4 class="fw-bold text-dark mb-0">{{ $room->floor }}</h4>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="p-3 bg-light rounded-4 border">
                        <small class="text-muted d-block fw-semibold mb-1" style="font-size: 0.75rem; letter-spacing: 0.05em;">តម្លៃស្នាក់នៅ / យប់ (PRICE / NIGHT)</small>
                        <h4 class="fw-bold text-success mb-0">${{ number_format($room->price_per_night, 2) }} <small class="text-muted fs-6">USD</small></h4>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="p-3 bg-light rounded-4 border">
                        <small class="text-muted d-block fw-semibold mb-1" style="font-size: 0.75rem; letter-spacing: 0.05em;">ចំនួនភ្ញៀវអតិបរមា (MAX CAPACITY)</small>
                        <h4 class="fw-bold text-dark mb-0">{{ $room->roomType->capacity ?? 2 }} នាក់ (Guests)</h4>
                    </div>
                </div>
            </div>

            <!-- Category Description -->
            <div class="mb-4">
                <h6 class="fw-bold text-secondary mb-2">ប្រភេទបន្ទប់ (Category Overview):</h6>
                <div class="p-3 rounded-3" style="background: #e6f4ef; border: 1px solid #bbf7d0; color: #062c21;">
                    <strong>{{ $room->roomType->name ?? 'N/A' }}:</strong>
                    <p class="mb-0 mt-1 small">{{ $room->roomType->description ?? 'មិនមានព័ត៌មានលម្អិត។' }}</p>
                </div>
            </div>

            <!-- Amenities & Description -->
            <div class="mb-4">
                <h6 class="fw-bold text-secondary mb-2">បរិក្ខារ & លក្ខណៈពិសេសក្នុងបន្ទប់ (Amenities):</h6>
                <div class="p-3 border rounded-3 bg-white">
                    {{ $room->description ?: 'បន្ទប់ស្អាត មានផាសុកភាព, ម៉ាស៊ីនត្រជាក់, WiFi រហ័សទាន់ចិត្ត, ទឹកក្តៅ-ត្រជាក់។' }}
                </div>
            </div>

            <!-- Hotel Contact from Poster -->
            <div class="p-3 rounded-3 mb-4 bg-light border d-flex flex-wrap align-items-center justify-content-between gap-2">
                <div>
                    <i class="bi bi-geo-alt-fill text-warning me-1"></i>
                    <strong>ទីតាំង៖</strong> ជិតវិទ្យាល័យស្វាយរៀង ទីរួមខេត្តស្វាយរៀង
                </div>
                <div>
                    <i class="bi bi-telephone-fill text-success me-1"></i>
                    <strong>ទូរស័ព្ទ៖</strong> 067 636 262 / 010 824 444
                </div>
            </div>

            <div class="text-muted small border-top pt-3 mb-4 d-flex flex-wrap gap-4">
                <span><i class="bi bi-calendar-plus me-1 text-success"></i> កាលបរិច្ឆេទបង្កើត៖ {{ $room->created_at->format('d/m/Y h:i A') }}</span>
                <span><i class="bi bi-clock-history me-1 text-success"></i> កែប្រែចុងក្រោយ៖ {{ $room->updated_at->format('d/m/Y h:i A') }}</span>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center">
                <div class="d-flex gap-2">
                    <a href="{{ route('rooms.edit', $room) }}" class="btn btn-sct-gold">
                        <i class="bi bi-pencil-square"></i>
                        <span>កែប្រែបន្ទប់ (Edit Room)</span>
                    </a>

                    <a href="{{ route('rooms.index') }}" class="btn btn-sct-outline">
                        <i class="bi bi-arrow-left"></i>
                        <span>ត្រឡប់ទៅបញ្ជីបន្ទប់ (Directory)</span>
                    </a>
                </div>

                <!-- Delete Button with Modal -->
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteDetailModal">
                    <i class="bi bi-trash3 me-1"></i> លុបបន្ទប់ (Delete)
                </button>

                <div class="modal fade" id="deleteDetailModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-0 shadow-lg rounded-4">
                            <div class="modal-header border-0 bg-danger bg-opacity-10 py-3">
                                <h5 class="modal-title fw-bold text-danger">បញ្ជាក់ការលុបបន្ទប់</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-start py-4 px-4">
                                តើអ្នកពិតជាចង់លុប <strong>បន្ទប់ {{ $room->room_number }}</strong> ចេញពីប្រព័ន្ធមែនទេ?
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
            </div>
        </div>

    </div>
</div>
@endsection
