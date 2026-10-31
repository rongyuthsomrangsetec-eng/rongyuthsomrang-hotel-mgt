<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hotel Management System') - Rong Yuthsomrang</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #2563eb 0%, #3b82f6 50%, #1d4ed8 100%);
            --header-gradient: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
            --card-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
            color: #334155;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar-custom {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-weight: 700;
            color: #1e293b !important;
            letter-spacing: -0.02em;
        }

        .hero-banner {
            background: var(--primary-gradient);
            border-radius: 1rem;
            color: white;
            padding: 2.2rem 2rem;
            margin-bottom: 1.75rem;
            box-shadow: 0 10px 20px -5px rgba(37, 99, 235, 0.3);
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 0.75rem;
            padding: 1rem 1.5rem;
            text-align: center;
            color: white;
        }

        .stat-card .stat-number {
            font-size: 2rem;
            font-weight: 800;
            line-height: 1.1;
        }

        .stat-card .stat-label {
            font-size: 0.85rem;
            font-weight: 500;
            opacity: 0.9;
        }

        .card-custom {
            border: none;
            border-radius: 1rem;
            box-shadow: var(--card-shadow);
            background: #ffffff;
        }

        .btn-primary-custom {
            background-color: #2563eb;
            border-color: #2563eb;
            color: white;
            font-weight: 600;
            padding: 0.6rem 1.3rem;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
        }

        .btn-primary-custom:hover {
            background-color: #1d4ed8;
            border-color: #1d4ed8;
            color: white;
            transform: translateY(-1px);
        }

        .badge-room-type {
            background-color: #eff6ff;
            color: #2563eb;
            border: 1px solid #bfdbfe;
            padding: 0.35rem 0.75rem;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 0.8rem;
        }

        .badge-status-available {
            background-color: #ecfdf5;
            color: #059669;
            border: 1px solid #a7f3d0;
            padding: 0.35rem 0.75rem;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 0.8rem;
        }

        .badge-status-occupied {
            background-color: #fff7ed;
            color: #ea580c;
            border: 1px solid #fed7aa;
            padding: 0.35rem 0.75rem;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 0.8rem;
        }

        .badge-status-maintenance {
            background-color: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
            padding: 0.35rem 0.75rem;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 0.8rem;
        }

        .table-custom th {
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #64748b;
            font-weight: 700;
            border-bottom: 2px solid #e2e8f0;
            padding: 1rem;
        }

        .table-custom td {
            padding: 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
        }

        .footer {
            margin-top: auto;
            background: #ffffff;
            border-top: 1px solid #e2e8f0;
            padding: 1.25rem 0;
            font-size: 0.875rem;
            color: #64748b;
        }
    </style>
    @yield('styles')
</head>
<body>
    @auth
    <!-- Authenticated Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('rooms.index') }}">
                <span class="d-inline-flex align-items-center justify-content-center bg-primary text-white rounded-3 p-2" style="width: 36px; height: 36px;">
                    <i class="bi bi-building"></i>
                </span>
                <span>Hotel Management System</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-3">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('rooms.index') ? 'active fw-bold text-primary' : '' }}" href="{{ route('rooms.index') }}">
                            <i class="bi bi-door-open me-1"></i> Rooms Directory
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('rooms.create') ? 'active fw-bold text-primary' : '' }}" href="{{ route('rooms.create') }}">
                            <i class="bi bi-plus-circle me-1"></i> Add New Room
                        </a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-3">
                    <div class="d-flex align-items-center gap-2 text-secondary">
                        <i class="bi bi-person-circle fs-5 text-primary"></i>
                        <span class="fw-semibold text-dark">{{ Auth::user()->name }}</span>
                    </div>

                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3">
                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    @endauth

    <main class="py-4">
        <div class="container">
            {{-- Flash Alert Messages --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
                    <i class="bi bi-check-circle-fill me-2 fs-5 align-middle"></i>
                    <span>{{ session('success') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2 fs-5 align-middle"></i>
                    <span>{{ session('error') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="footer text-center">
        <div class="container">
            <span>Final Project Laravel 13 &bull; <strong>Hotel Management System</strong> &bull; Student: <strong>Rong Yuthsomrang</strong></span>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
