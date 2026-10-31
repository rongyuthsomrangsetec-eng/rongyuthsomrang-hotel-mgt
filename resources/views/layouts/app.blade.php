<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hotel Management') - Rong Yuthsomrang Resort & Hotel</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts: Outfit & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Fresh Natural Color Palette */
            --eco-primary: #0f766e;        /* Deep Teal / Pine */
            --eco-primary-light: #14b8a6;  /* Fresh Mint / Aqua */
            --eco-forest: #064e3b;         /* Deep Forest Green */
            --eco-sage: #10b981;           /* Vibrant Leaf Sage */
            --eco-emerald-glow: rgba(16, 185, 129, 0.25);
            --eco-gold: #d97706;           /* Sunset Gold */
            --eco-sand: #fef3c7;           /* Warm Sand */
            --eco-bg: #f4f7f4;             /* Soft Fresh Linen Tint */
            --eco-card-bg: rgba(255, 255, 255, 0.95);
            --eco-border: #e2e8f0;
            --eco-text-dark: #0f172a;
            --eco-text-muted: #64748b;

            /* Fresh Gradients */
            --gradient-natural: linear-gradient(135deg, #064e3b 0%, #0d9488 55%, #10b981 100%);
            --gradient-subtle-leaf: linear-gradient(180deg, #f0fdf4 0%, #f4f7f4 100%);
            --gradient-card: linear-gradient(145deg, #ffffff 0%, #f8faf8 100%);
            --gradient-glass: linear-gradient(135deg, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0.05) 100%);

            /* Shadows */
            --shadow-soft: 0 10px 30px -5px rgba(6, 78, 59, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.02);
            --shadow-hover: 0 20px 35px -8px rgba(13, 148, 136, 0.18), 0 8px 12px -4px rgba(0, 0, 0, 0.04);
            --shadow-banner: 0 15px 35px -8px rgba(6, 78, 59, 0.35);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--eco-bg);
            background-image: 
                radial-gradient(at 10% 10%, rgba(20, 184, 166, 0.07) 0px, transparent 50%),
                radial-gradient(at 90% 90%, rgba(16, 185, 129, 0.06) 0px, transparent 50%),
                radial-gradient(at 50% 50%, rgba(254, 243, 199, 0.05) 0px, transparent 50%);
            color: var(--eco-text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6, .brand-title {
            font-family: 'Outfit', sans-serif;
            letter-spacing: -0.02em;
        }

        /* Ambient Keyframe Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes floatSlow {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-6px) rotate(1deg);
            }
        }

        @keyframes pulseGlow {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4);
            }
            50% {
                box-shadow: 0 0 0 8px rgba(16, 185, 129, 0);
            }
        }

        @keyframes shimmerGleam {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        .animate-fade-up {
            animation: fadeInUp 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .animate-float {
            animation: floatSlow 4s ease-in-out infinite;
        }

        /* Navbar */
        .navbar-natural {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: 0 4px 20px -2px rgba(6, 78, 59, 0.04);
            transition: all 0.3s ease;
        }

        .brand-logo-icon {
            background: var(--gradient-natural);
            color: white;
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            box-shadow: 0 4px 12px rgba(13, 148, 136, 0.3);
            transition: transform 0.3s ease;
        }

        .brand-logo-icon:hover {
            transform: rotate(8deg) scale(1.05);
        }

        .nav-link-natural {
            color: #334155 !important;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .nav-link-natural:hover {
            color: var(--eco-primary) !important;
            background: rgba(20, 184, 166, 0.1);
            transform: translateY(-1px);
        }

        .nav-link-natural.active {
            color: #ffffff !important;
            background: var(--gradient-natural);
            box-shadow: 0 4px 10px rgba(13, 148, 136, 0.25);
        }

        /* Natural Hero Banner */
        .hero-banner-natural {
            background: var(--gradient-natural);
            border-radius: 1.25rem;
            color: white;
            padding: 2.75rem 2.25rem;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-banner);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .hero-banner-natural::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, rgba(255,255,255,0.18) 0%, rgba(255,255,255,0) 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-banner-natural::after {
            content: '';
            position: absolute;
            bottom: -60px;
            left: 20%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.25) 0%, rgba(255,255,255,0) 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        /* Glass Stat Cards with Natural Hover */
        .stat-card-natural {
            background: rgba(255, 255, 255, 0.16);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 1rem;
            padding: 1.25rem 1.5rem;
            text-align: center;
            color: white;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
        }

        .stat-card-natural:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }

        .stat-card-natural .stat-number {
            font-family: 'Outfit', sans-serif;
            font-size: 2.35rem;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 0.3rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .stat-card-natural .stat-label {
            font-size: 0.88rem;
            font-weight: 500;
            letter-spacing: 0.02em;
            opacity: 0.95;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.35rem;
        }

        /* Modern Card */
        .card-natural {
            background: var(--eco-card-bg);
            border: 1px solid var(--eco-border);
            border-radius: 1.25rem;
            box-shadow: var(--shadow-soft);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            position: relative;
        }

        .card-natural:hover {
            box-shadow: var(--shadow-hover);
        }

        /* Buttons with Organic Flair */
        .btn-natural-primary {
            background: var(--gradient-natural);
            border: none;
            color: white;
            font-family: 'Outfit', sans-serif;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 0.7rem 1.5rem;
            border-radius: 0.75rem;
            box-shadow: 0 4px 15px rgba(13, 148, 136, 0.3);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-natural-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(13, 148, 136, 0.45);
            color: white;
            filter: brightness(1.05);
        }

        .btn-natural-outline {
            border: 1.5px solid #cbd5e1;
            background: white;
            color: #334155;
            font-weight: 600;
            padding: 0.65rem 1.25rem;
            border-radius: 0.75rem;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .btn-natural-outline:hover {
            border-color: var(--eco-primary);
            color: var(--eco-primary);
            background: #f0fdfa;
            transform: translateY(-1px);
        }

        /* Natural Badges */
        .badge-room-type-natural {
            background: linear-gradient(135deg, #f0fdfa 0%, #ccfbf1 100%);
            color: #0f766e;
            border: 1px solid #99f6e4;
            padding: 0.4rem 0.85rem;
            border-radius: 2rem;
            font-weight: 600;
            font-size: 0.82rem;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            letter-spacing: 0.01em;
        }

        .badge-status-available-natural {
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #a7f3d0;
            padding: 0.4rem 0.85rem;
            border-radius: 2rem;
            font-weight: 600;
            font-size: 0.82rem;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
        }

        .status-dot-pulse {
            width: 8px;
            height: 8px;
            background-color: #10b981;
            border-radius: 50%;
            display: inline-block;
            animation: pulseGlow 2s infinite;
        }

        .badge-status-occupied-natural {
            background: #fffbeb;
            color: #b45309;
            border: 1px solid #fde68a;
            padding: 0.4rem 0.85rem;
            border-radius: 2rem;
            font-weight: 600;
            font-size: 0.82rem;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
        }

        .badge-status-maintenance-natural {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
            padding: 0.4rem 0.85rem;
            border-radius: 2rem;
            font-weight: 600;
            font-size: 0.82rem;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
        }

        /* Form Controls with Smooth Focus Animation */
        .form-control-natural, .form-select-natural {
            background-color: #f8faf8;
            border: 1.5px solid #e2e8f0;
            border-radius: 0.75rem;
            padding: 0.7rem 1.1rem;
            font-size: 0.95rem;
            color: #1e293b;
            transition: all 0.25s ease;
        }

        .form-control-natural:focus, .form-select-natural:focus {
            background-color: #ffffff;
            border-color: #14b8a6;
            box-shadow: 0 0 0 4px rgba(20, 184, 166, 0.15);
            outline: none;
        }

        /* Table Styling */
        .table-natural th {
            font-family: 'Outfit', sans-serif;
            font-size: 0.84rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: #0f766e;
            font-weight: 700;
            border-bottom: 2px solid #e2e8f0;
            padding: 1.1rem 1rem;
            background: #fafcfb;
        }

        .table-natural td {
            padding: 1.1rem 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            transition: background-color 0.2s ease;
        }

        .table-natural tbody tr {
            transition: all 0.2s ease;
        }

        .table-natural tbody tr:hover {
            background-color: #f0fdfa !important;
            transform: scale([1.002]);
        }

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

        .action-btn-view:hover {
            background: #0d9488;
            color: white !important;
            box-shadow: 0 4px 10px rgba(13, 148, 136, 0.35);
        }

        .action-btn-edit:hover {
            background: #0284c7;
            color: white !important;
            box-shadow: 0 4px 10px rgba(2, 132, 199, 0.35);
        }

        .action-btn-delete:hover {
            background: #e11d48;
            color: white !important;
            box-shadow: 0 4px 10px rgba(225, 29, 72, 0.35);
        }

        /* Footer */
        .footer-natural {
            margin-top: auto;
            background: #ffffff;
            border-top: 1px solid #e2e8f0;
            padding: 1.5rem 0;
            font-size: 0.9rem;
            color: #64748b;
        }
    </style>
    @yield('styles')
</head>
<body>

    @auth
    <!-- Fresh Natural Navbar -->
    <nav class="navbar navbar-expand-lg navbar-natural sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('rooms.index') }}">
                <span class="brand-logo-icon">
                    <i class="bi bi-tree-fill"></i>
                </span>
                <div>
                    <span class="brand-title fw-bold text-dark fs-5">Somrang Eco Resort</span>
                    <small class="d-block text-muted" style="font-size: 0.72rem; line-height: 1; letter-spacing: 0.05em; font-weight: 600;">HOTEL MANAGEMENT SYSTEM</small>
                </div>
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNatural">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNatural">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4 gap-1">
                    <li class="nav-item">
                        <a class="nav-link-natural {{ request()->routeIs('rooms.index') ? 'active' : '' }}" href="{{ route('rooms.index') }}">
                            <i class="bi bi-grid-1x2-fill"></i> Rooms Directory
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-natural {{ request()->routeIs('rooms.create') ? 'active' : '' }}" href="{{ route('rooms.create') }}">
                            <i class="bi bi-plus-circle-fill"></i> Register Room
                        </a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-3">
                    <div class="d-flex align-items-center gap-2 bg-light px-3 py-1 rounded-pill border">
                        <span class="status-dot-pulse"></span>
                        <i class="bi bi-person-circle text-primary"></i>
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
        <div class="container animate-fade-up">

            {{-- Flash Alert Messages with Nature Glow --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4 d-flex align-items-center gap-3 p-3 bg-white border-start border-4 border-success" role="alert">
                    <div class="bg-success bg-opacity-10 text-success rounded-circle p-2 d-inline-flex">
                        <i class="bi bi-check-circle-fill fs-5"></i>
                    </div>
                    <div class="flex-grow-1">
                        <strong class="d-block text-success" style="font-size: 0.95rem;">Success</strong>
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
                        <strong class="d-block text-danger" style="font-size: 0.95rem;">Notice</strong>
                        <span class="text-dark">{{ session('error') }}</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="footer-natural text-center">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                <span>🌿 <strong>Somrang Luxury & Eco Hotel</strong> &bull; Laravel 13 Final Project</span>
                <span>Student Developer: <strong class="text-dark">Rong Yuthsomrang</strong> &bull; Topic #5</span>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
