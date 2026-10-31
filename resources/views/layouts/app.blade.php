<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ផ្ទះសំណាក់ ចាន់ថន (SCT)') - SCT Chan Thorn Resort</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts: Kantumruy Pro (Khmer) + Outfit & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            /* SCT Poster Royal Emerald & Gold Theme */
            --sct-emerald-dark: #062c21;
            --sct-emerald: #0b4233;
            --sct-emerald-light: #155e4b;
            --sct-mint: #e6f4ef;
            --sct-gold: #d4af37;
            --sct-gold-light: #f5e7b2;
            --sct-gold-dark: #a67c1e;
            --sct-facebook-blue: #1877f2;
            --sct-gold-gradient: linear-gradient(135deg, #f6e27a 0%, #d4af37 50%, #aa771c 100%);
            --sct-emerald-gradient: linear-gradient(145deg, #062c21 0%, #0d4637 55%, #155e4b 100%);
            --sct-bg: #f8faf8;
            --sct-surface: #ffffff;
            --sct-border: #e2e8f0;
            --sct-shadow: 0 10px 30px -5px rgba(6, 44, 33, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.02);
            --sct-shadow-banner: 0 16px 36px -10px rgba(6, 44, 33, 0.45);
        }

        body {
            font-family: 'Kantumruy Pro', 'Plus Jakarta Sans', sans-serif;
            background: var(--sct-bg);
            background-image: 
                radial-gradient(at 15% 15%, rgba(212, 175, 55, 0.06) 0px, transparent 40%),
                radial-gradient(at 85% 85%, rgba(11, 66, 51, 0.07) 0px, transparent 45%);
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        h1, h2, h3, h4, h5, h6, .brand-font {
            font-family: 'Kantumruy Pro', 'Outfit', sans-serif;
            letter-spacing: -0.01em;
        }

        /* Ambient Animations */
        @keyframes fadeInSct {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: none; }
        }

        @keyframes pulseDot {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.3); opacity: 0.6; }
        }

        .animate-sct-entrance {
            animation: fadeInSct 0.3s ease-out;
        }

        /* Gold SCT Crest Emblem */
        .sct-logo-badge {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--sct-gold-gradient);
            border: 2px solid #ffffff;
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.4);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #062c21;
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 1.15rem;
            letter-spacing: 0.5px;
            text-shadow: 0 1px 1px rgba(255,255,255,0.6);
            transition: transform 0.3s ease;
        }

        .sct-logo-badge:hover {
            transform: scale(1.08) rotate(5deg);
        }

        /* Navbar */
        .navbar-sct {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border-bottom: 2px solid rgba(212, 175, 55, 0.3);
            box-shadow: 0 4px 20px -2px rgba(6, 44, 33, 0.05);
        }

        .nav-link-sct {
            color: #334155 !important;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 0.55rem 1.1rem !important;
            border-radius: 0.75rem;
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .nav-link-sct:hover {
            color: var(--sct-emerald) !important;
            background: rgba(11, 66, 51, 0.08);
            transform: translateY(-1px);
        }

        .nav-link-sct.active {
            color: #ffffff !important;
            background: var(--sct-emerald-gradient);
            box-shadow: 0 4px 12px rgba(6, 44, 33, 0.3);
        }

        /* Top Location & Hotline Bar */
        .top-info-ribbon {
            background: var(--sct-emerald-dark);
            color: var(--sct-gold-light);
            font-size: 0.8rem;
            padding: 0.45rem 0;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        /* SCT Poster Style Hero Banner */
        .hero-banner-sct {
            background: var(--sct-emerald-gradient);
            border: 2px solid rgba(212, 175, 55, 0.35);
            border-radius: 1.5rem;
            color: white;
            padding: 2.5rem 2rem;
            position: relative;
            overflow: hidden;
            box-shadow: var(--sct-shadow-banner);
        }

        .hero-banner-sct::before {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 260px;
            height: 260px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.25) 0%, rgba(212, 175, 55, 0) 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-banner-sct::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: 10%;
            width: 320px;
            height: 320px;
            background: radial-gradient(circle, rgba(21, 94, 75, 0.4) 0%, rgba(21, 94, 75, 0) 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        /* Golden Stat Cards */
        .stat-card-sct {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(212, 175, 55, 0.4);
            border-radius: 1.1rem;
            padding: 1.25rem 1.5rem;
            text-align: center;
            color: white;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .stat-card-sct:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.22);
            border-color: var(--sct-gold);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
        }

        .stat-card-sct .stat-number {
            font-family: 'Outfit', sans-serif;
            font-size: 2.4rem;
            font-weight: 800;
            line-height: 1;
            color: var(--sct-gold-light);
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
            margin-bottom: 0.35rem;
        }

        .stat-card-sct .stat-label {
            font-size: 0.9rem;
            font-weight: 600;
            letter-spacing: 0.02em;
            color: #ffffff;
            opacity: 0.95;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
        }

        /* Poster Amenities Ribbon */
        .amenity-pill {
            background: #ffffff;
            border: 1px solid rgba(212, 175, 55, 0.4);
            padding: 0.45rem 0.9rem;
            border-radius: 2rem;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--sct-emerald-dark);
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            box-shadow: 0 2px 6px rgba(0,0,0,0.03);
            transition: all 0.2s ease;
        }

        .amenity-pill:hover {
            border-color: var(--sct-gold);
            background: var(--sct-mint);
            transform: translateY(-2px);
        }

        /* SCT Custom Buttons */
        .btn-sct-gold {
            background: var(--sct-gold-gradient);
            border: 1px solid var(--sct-gold-dark);
            color: #062c21;
            font-family: 'Kantumruy Pro', 'Outfit', sans-serif;
            font-weight: 700;
            font-size: 0.95rem;
            padding: 0.75rem 1.6rem;
            border-radius: 0.75rem;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.4);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-sct-gold:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(212, 175, 55, 0.55);
            color: #062c21;
            filter: brightness(1.05);
        }

        .btn-sct-emerald {
            background: var(--sct-emerald-gradient);
            border: 1px solid rgba(212, 175, 55, 0.4);
            color: #ffffff;
            font-family: 'Kantumruy Pro', 'Outfit', sans-serif;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            box-shadow: 0 4px 15px rgba(6, 44, 33, 0.25);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-sct-emerald:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(6, 44, 33, 0.35);
            color: #ffffff;
            filter: brightness(1.1);
        }

        .btn-sct-outline {
            border: 1.5px solid #cbd5e1;
            background: white;
            color: #334155;
            font-weight: 600;
            padding: 0.7rem 1.3rem;
            border-radius: 0.75rem;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .btn-sct-outline:hover {
            border-color: var(--sct-emerald);
            color: var(--sct-emerald);
            background: var(--sct-mint);
        }

        .btn-facebook {
            background: #1877f2;
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 0.75rem;
            padding: 0.7rem 1.4rem;
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-facebook:hover {
            background: #1464cc;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(24, 119, 242, 0.35);
        }

        /* Modern Card */
        .card-sct {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 1.35rem;
            box-shadow: var(--sct-shadow);
            position: relative;
        }

        /* Status Badges */
        .badge-room-type-sct {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            color: #0b4233;
            border: 1px solid #bbf7d0;
            padding: 0.45rem 0.9rem;
            border-radius: 2rem;
            font-weight: 700;
            font-size: 0.82rem;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .badge-status-available-sct {
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #a7f3d0;
            padding: 0.45rem 0.9rem;
            border-radius: 2rem;
            font-weight: 700;
            font-size: 0.82rem;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
        }

        .status-dot-pulse-sct {
            width: 8px;
            height: 8px;
            background-color: #10b981;
            border-radius: 50%;
            display: inline-block;
            animation: pulseDot 1.8s infinite;
        }

        .badge-status-occupied-sct {
            background: #fffbeb;
            color: #b45309;
            border: 1px solid #fde68a;
            padding: 0.45rem 0.9rem;
            border-radius: 2rem;
            font-weight: 700;
            font-size: 0.82rem;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
        }

        .badge-status-maintenance-sct {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
            padding: 0.45rem 0.9rem;
            border-radius: 2rem;
            font-weight: 700;
            font-size: 0.82rem;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
        }

        /* Table Styling */
        .table-sct th {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--sct-emerald);
            font-weight: 700;
            border-bottom: 2px solid #e2e8f0;
            padding: 1.15rem 1rem;
            background: #fafcfb;
        }

        .table-sct td {
            padding: 1.15rem 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
        }

        .table-sct tbody tr:hover {
            background-color: #f0fdf4 !important;
        }

        /* Action Buttons */
        .action-btn-circle {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
            border: none;
            background: #f1f5f9;
        }

        .action-btn-circle:hover {
            transform: translateY(-2px) scale(1.1);
        }

        .action-btn-view:hover { background: #0b4233; color: white !important; }
        .action-btn-edit:hover { background: #d4af37; color: #062c21 !important; }
        .action-btn-delete:hover { background: #e11d48; color: white !important; }

        /* Form Inputs */
        .form-control-sct, .form-select-sct {
            background-color: #fbfdfb;
            border: 1.5px solid #e2e8f0;
            border-radius: 0.75rem;
            padding: 0.75rem 1.1rem;
            font-size: 0.95rem;
            color: #1e293b;
            transition: all 0.25s ease;
        }

        .form-control-sct:focus, .form-select-sct:focus {
            background-color: #ffffff;
            border-color: var(--sct-emerald);
            box-shadow: 0 0 0 4px rgba(11, 66, 51, 0.15);
            outline: none;
        }

        /* Facebook Profile Header Card */
        .fb-profile-avatar {
            width: 68px;
            height: 68px;
            border-radius: 50%;
            border: 3px solid #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            object-fit: cover;
        }

        /* Footer */
        .footer-sct {
            margin-top: auto;
            background: #ffffff;
            border-top: 1px solid #e2e8f0;
            padding: 1.75rem 0;
            font-size: 0.9rem;
            color: #64748b;
        }
    </style>
    @yield('styles')
</head>
<body>

    @auth
    <!-- Top Information Ribbon from Poster -->
    <div class="top-info-ribbon d-none d-md-block">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <span><i class="bi bi-geo-alt-fill text-warning me-1"></i> ទីតាំងល្អ៖ ជិតវិទ្យាល័យស្វាយរៀង ទីរួមខេត្តស្វាយរៀង</span>
                <span class="opacity-50">|</span>
                <span><i class="bi bi-tree-fill text-success me-1"></i> បទពិសោធន៍សម្រាកលំហែបែបធម្មជាតិ 🌿</span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="#contactModal" data-bs-toggle="modal" class="text-white text-decoration-none fw-semibold">
                    <i class="bi bi-chat-dots-fill text-warning me-1"></i> ទំនាក់ទំនង (Contact & FB)
                </a>
                <span class="opacity-50">|</span>
                <a href="#locationQrModal" data-bs-toggle="modal" class="text-warning text-decoration-none fw-semibold">
                    <i class="bi bi-qr-code-scan me-1"></i> ស្កេនទីតាំង (QR)
                </a>
                <span class="opacity-50">|</span>
                <span><i class="bi bi-telephone-fill text-warning me-1"></i> <strong>067 636 262 / 010 824 444</strong></span>
            </div>
        </div>
    </div>

    <!-- SCT Navbar -->
    <nav class="navbar navbar-expand-lg navbar-sct sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('rooms.index') }}">
                <span class="sct-logo-badge">SCT</span>
                <div>
                    <span class="fw-bold text-dark fs-5 d-block" style="line-height: 1.2;">ផ្ទះសំណាក់ ចាន់ថន</span>
                    <small class="text-muted fw-semibold" style="font-size: 0.72rem; letter-spacing: 0.05em; color: var(--sct-emerald) !important;">
                        CHAN THORN RESORT &bull; SVAY RIENG
                    </small>
                </div>
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSCT">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSCT">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4 gap-1">
                    <li class="nav-item">
                        <a class="nav-link-sct {{ request()->routeIs('rooms.index') ? 'active' : '' }}" href="{{ route('rooms.index') }}">
                            <i class="bi bi-grid-fill"></i> បញ្ជីបន្ទប់ (Directory)
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-sct {{ request()->routeIs('rooms.create') ? 'active' : '' }}" href="{{ route('rooms.create') }}">
                            <i class="bi bi-plus-circle-fill"></i> ចុះឈ្មោះបន្ទប់ថ្មី (Register Room)
                        </a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2">
                    <!-- Contact & Social Modal Trigger -->
                    <button type="button" class="btn btn-outline-primary btn-sm rounded-pill px-3 fw-semibold d-flex align-items-center gap-1 shadow-sm" data-bs-toggle="modal" data-bs-target="#contactModal">
                        <i class="bi bi-chat-dots-fill text-primary"></i>
                        <span>ទំនាក់ទំនង (Contact)</span>
                    </button>

                    <!-- Location QR Modal Trigger -->
                    <button type="button" class="btn btn-outline-success btn-sm rounded-pill px-3 fw-semibold d-flex align-items-center gap-1 shadow-sm" data-bs-toggle="modal" data-bs-target="#locationQrModal">
                        <i class="bi bi-qr-code-scan"></i>
                        <span>QR ទីតាំង</span>
                    </button>

                    <div class="d-flex align-items-center gap-2 bg-light px-3 py-1 rounded-pill border ms-1">
                        <span class="status-dot-pulse-sct"></span>
                        <i class="bi bi-person-circle text-success"></i>
                        <span class="fw-semibold text-dark small">{{ Auth::user()->name }}</span>
                    </div>

                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3 fw-semibold d-flex align-items-center gap-1">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    @endauth

    <main class="py-4 flex-grow-1">
        <div class="container animate-sct-entrance">

            {{-- Flash Alert Messages with Gold / Emerald Border --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4 d-flex align-items-center gap-3 p-3 bg-white border-start border-4 border-success" role="alert">
                    <div class="bg-success bg-opacity-10 text-success rounded-circle p-2 d-inline-flex">
                        <i class="bi bi-check-circle-fill fs-5"></i>
                    </div>
                    <div class="flex-grow-1">
                        <strong class="d-block text-success" style="font-size: 0.95rem;">ជោគជ័យ (Success)</strong>
                        <span class="text-dark">{{ session('success') }}</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4 d-flex align-items-center gap-3 p-3 bg-white border-start border-4 border-danger" role="alert">
                    <div class="bg-danger bg-opacity-10 text-danger rounded-circle p-2 d-inline-flex">
                        <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                    </div>
                    <div class="flex-grow-1">
                        <strong class="d-block text-danger" style="font-size: 0.95rem;">ដំណឹង (Notice)</strong>
                        <span class="text-dark">{{ session('error') }}</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <!-- Comprehensive Contact & Facebook Social Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <!-- Header with Night Resort Banner -->
                <div class="p-4 text-white position-relative" style="background: var(--sct-emerald-gradient);">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="d-flex align-items-center gap-3">
                        <img src="{{ asset('images/sct-night-resort.png') }}" alt="ផ្ទះសំណាក់ ចាន់ថន" class="fb-profile-avatar">
                        <div>
                            <div class="d-flex align-items-center gap-2">
                                <h4 class="fw-bold mb-0 text-white">ផ្ទះសំណាក់ ចាន់ថន</h4>
                                <i class="bi bi-patch-check-fill text-warning fs-5" title="Verified Resort Page"></i>
                            </div>
                            <div class="text-white-50 small mt-1">
                                <i class="bi bi-people-fill text-warning me-1"></i> <strong>5.5K followers</strong> &bull; 349 following
                            </div>
                            <div class="badge bg-white bg-opacity-20 text-white px-2 py-1 rounded-pill mt-1 small">
                                Digital Creator &bull; Hotel & Resort
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <!-- Location Tags from Facebook -->
                    <div class="p-3 bg-light rounded-3 mb-3 border">
                        <div class="fw-bold text-dark mb-1 d-flex align-items-center gap-1">
                            <i class="bi bi-geo-alt-fill text-danger"></i>
                            <span>ទីតាំង និងតំបន់គ្របដណ្តប់៖</span>
                        </div>
                        <div class="d-flex flex-wrap gap-1 text-muted small mt-2">
                            <span class="badge bg-white text-dark border"><i class="bi bi-pin-map text-success me-1"></i> Phnom Penh</span>
                            <span class="badge bg-white text-dark border"><i class="bi bi-pin-map text-success me-1"></i> Svay Reang</span>
                            <span class="badge bg-white text-dark border"><i class="bi bi-pin-map text-success me-1"></i> svay rieng</span>
                            <span class="badge bg-white text-dark border"><i class="bi bi-pin-map text-success me-1"></i> Svay Reang Province!</span>
                        </div>
                        <div class="small text-muted mt-2">
                            <strong>អាសយដ្ឋានជាក់ស្តែង៖</strong> ជិតវិទ្យាល័យស្វាយរៀង ទីរួមខេត្តស្វាយរៀង
                        </div>
                    </div>

                    <!-- Direct Contact Buttons -->
                    <h6 class="fw-bold text-dark mb-2">ទំនាក់ទំនងបន្ទាន់ (Quick Contacts)៖</h6>

                    <div class="list-group mb-3">
                        <a href="tel:067636262" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between p-3 rounded-3 border mb-2">
                            <div class="d-flex align-items-center gap-3">
                                <span class="bg-success text-white rounded-circle p-2 d-inline-flex" style="width: 38px; height: 38px; align-items: center; justify-content: center;">
                                    <i class="bi bi-telephone-fill"></i>
                                </span>
                                <div>
                                    <strong class="d-block text-dark">067 636 262</strong>
                                    <small class="text-muted">Metfone / Smart (Call Now)</small>
                                </div>
                            </div>
                            <span class="btn btn-sm btn-outline-success rounded-pill px-3">Call</span>
                        </a>

                        <a href="tel:010824444" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between p-3 rounded-3 border mb-2">
                            <div class="d-flex align-items-center gap-3">
                                <span class="bg-success text-white rounded-circle p-2 d-inline-flex" style="width: 38px; height: 38px; align-items: center; justify-content: center;">
                                    <i class="bi bi-telephone-fill"></i>
                                </span>
                                <div>
                                    <strong class="d-block text-dark">010 824 444</strong>
                                    <small class="text-muted">Smart (Call Now)</small>
                                </div>
                            </div>
                            <span class="btn btn-sm btn-outline-success rounded-pill px-3">Call</span>
                        </a>

                        <a href="tel:010482345" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between p-3 rounded-3 border">
                            <div class="d-flex align-items-center gap-3">
                                <span class="bg-success text-white rounded-circle p-2 d-inline-flex" style="width: 38px; height: 38px; align-items: center; justify-content: center;">
                                    <i class="bi bi-telephone-fill"></i>
                                </span>
                                <div>
                                    <strong class="d-block text-dark">010 482 345</strong>
                                    <small class="text-muted">Smart (Call Now)</small>
                                </div>
                            </div>
                            <span class="btn btn-sm btn-outline-success rounded-pill px-3">Call</span>
                        </a>
                    </div>

                    <!-- Facebook & Messenger Action Buttons -->
                    <div class="row g-2">
                        <div class="col-6">
                            <a href="https://www.facebook.com" target="_blank" class="btn btn-facebook w-100 py-2 justify-content-center">
                                <i class="bi bi-messenger"></i>
                                <span>Message FB</span>
                            </a>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-sct-gold w-100 py-2 justify-content-center" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#locationQrModal">
                                <i class="bi bi-qr-code-scan"></i>
                                <span>ស្កេនរកទីតាំង</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Location QR Code Modal -->
    <div class="modal fade" id="locationQrModal" tabindex="-1" aria-labelledby="locationQrModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header text-white py-3" style="background: var(--sct-emerald-gradient);">
                    <div class="d-flex align-items-center gap-2">
                        <span class="sct-logo-badge" style="width: 36px; height: 36px; font-size: 0.95rem;">SCT</span>
                        <div>
                            <h5 class="modal-title fw-bold mb-0" id="locationQrModalLabel">ស្កេនដើម្បីរកទីតាំង</h5>
                            <small class="text-white-50">SCT Chan Thorn Location QR Code</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body text-center p-4">
                    <div class="p-3 bg-light rounded-4 d-inline-block border shadow-sm mb-3 position-relative">
                        <img src="{{ asset('images/sct-location-qr.png') }}" alt="SCT Location QR Code" class="img-fluid rounded-3" style="max-width: 220px; width: 100%;">
                        <div class="position-absolute bottom-0 start-50 translate-middle-x mb-2">
                            <span class="badge bg-dark bg-opacity-75 text-white px-3 py-1 rounded-pill small">
                                <i class="bi bi-camera me-1"></i> Scan with Phone
                            </span>
                        </div>
                    </div>

                    <h5 class="fw-bold text-dark mb-1">ផ្ទះសំណាក់ ចាន់ថន (SCT)</h5>
                    <p class="text-muted small mb-3">
                        <i class="bi bi-geo-alt-fill text-danger me-1"></i>
                        ទីតាំងល្អ៖ ជិតវិទ្យាល័យស្វាយរៀង ទីរួមខេត្តស្វាយរៀង
                    </p>

                    <div class="p-3 rounded-3 mb-3 text-start small border" style="background: #e6f4ef; color: #062c21;">
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <i class="bi bi-telephone-fill text-warning"></i>
                            <strong>ទូរស័ព្ទទាក់ទង៖</strong> 067 636 262 / 010 824 444 / 010 482 345
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-tree-fill text-success"></i>
                            <span>Facebook៖ ផ្ទះសំណាក់ ចាន់ថន (5.5K Followers)</span>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2 justify-content-center">
                        <a href="https://maps.google.com/?q=Svay+Rieng+High+School,+Svay+Rieng" target="_blank" class="btn btn-sct-gold">
                            <i class="bi bi-geo-alt-fill"></i>
                            <span>បើកក្នុង Google Maps</span>
                        </a>

                        <button type="button" class="btn btn-sct-outline" data-bs-toggle="modal" data-bs-target="#fullPosterModal">
                            <i class="bi bi-image"></i>
                            <span>មើលផ្ទាំងផ្សាយពាណិជ្ជកម្ម</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Full Poster Modal -->
    <div class="modal fade" id="fullPosterModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header py-2 text-white" style="background: var(--sct-emerald-gradient);">
                    <h6 class="modal-title fw-bold">ផ្ទាំងផ្សាយពាណិជ្ជកម្ម &bull; ផ្ទះសំណាក់ ចាន់ថន (SCT Poster)</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center p-2 bg-dark">
                    <img src="{{ asset('images/sct-poster.jpg') }}" alt="SCT Full Poster" class="img-fluid rounded-3" style="max-height: 80vh;">
                </div>
            </div>
        </div>
    </div>

    <footer class="footer-sct text-center">
        <div class="container">
            <div class="row align-items-center g-3 mb-3">
                <div class="col-md-4 text-md-start">
                    <div class="d-flex align-items-center gap-2">
                        <img src="{{ asset('images/sct-night-resort.png') }}" alt="Avatar" class="rounded-circle border" style="width: 42px; height: 42px; object-fit: cover;">
                        <div>
                            <strong class="d-block text-dark">ផ្ទះសំណាក់ ចាន់ថន</strong>
                            <small class="text-primary fw-semibold"><i class="bi bi-facebook me-1"></i> 5.5K Followers on Facebook</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 text-center">
                    <span class="badge bg-light text-dark border px-3 py-2">
                        <i class="bi bi-geo-alt-fill text-danger me-1"></i> ទីរួមខេត្តស្វាយរៀង &bull; ជិតវិទ្យាល័យស្វាយរៀង
                    </span>
                </div>

                <div class="col-md-4 text-md-end">
                    <div class="text-muted small">
                        ទូរស័ព្ទ៖ <strong class="text-dark">067 636 262 / 010 824 444</strong>
                    </div>
                </div>
            </div>

            <div class="border-top pt-3 d-flex flex-wrap align-items-center justify-content-between gap-2 small text-muted">
                <span>
                    <strong>SCT ផ្ទះសំណាក់ ចាន់ថន</strong> &bull; Laravel 13 Final Project Exam
                </span>
                <span>
                    និស្សិត៖ <strong class="text-dark">Rong Yuthsomrang</strong> &bull; Topic #5 (Hotel Management System)
                </span>
            </div>
        </div>
    </footer>

    @yield('modals')

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
