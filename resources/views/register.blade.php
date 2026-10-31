<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Somrang Eco Hotel & Suites</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --gradient-natural: linear-gradient(135deg, #064e3b 0%, #0d9488 60%, #10b981 100%);
            --eco-glow: rgba(16, 185, 129, 0.2);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f3f6f3;
            background-image: 
                radial-gradient(circle at 15% 20%, rgba(20, 184, 166, 0.12) 0%, transparent 40%),
                radial-gradient(circle at 85% 80%, rgba(16, 185, 129, 0.1) 0%, transparent 45%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            overflow-x: hidden;
            position: relative;
        }

        /* Ambient animated organic background blobs */
        .ambient-leaf-1 {
            position: absolute;
            top: 8%;
            left: 10%;
            font-size: 8rem;
            color: rgba(16, 185, 129, 0.05);
            pointer-events: none;
            animation: floatLeaf 8s ease-in-out infinite;
        }

        .ambient-leaf-2 {
            position: absolute;
            bottom: 8%;
            right: 10%;
            font-size: 10rem;
            color: rgba(13, 148, 136, 0.05);
            pointer-events: none;
            animation: floatLeaf 10s ease-in-out infinite reverse;
        }

        @keyframes floatLeaf {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(5deg); }
        }

        @keyframes cardEntrance {
            from {
                opacity: 0;
                transform: translateY(25px) scale(0.98);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .register-card {
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(226, 232, 240, 0.9);
            border-radius: 1.25rem;
            box-shadow: 0 20px 40px -10px rgba(6, 78, 59, 0.12), 0 1px 3px rgba(0,0,0,0.05);
            width: 100%;
            max-width: 500px;
            overflow: hidden;
            animation: cardEntrance 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            position: relative;
            z-index: 10;
        }

        .register-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: var(--gradient-natural);
        }

        .register-header {
            padding: 2.25rem 2rem 1.25rem;
            text-align: center;
        }

        .brand-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 52px;
            height: 52px;
            background: var(--gradient-natural);
            color: white;
            border-radius: 1rem;
            font-size: 1.6rem;
            margin-bottom: 1rem;
            box-shadow: 0 8px 18px rgba(13, 148, 136, 0.35);
        }

        .register-header h3 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.75rem;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
            letter-spacing: -0.02em;
        }

        .register-header p {
            color: #64748b;
            font-size: 0.9rem;
            margin-top: 0.35rem;
            margin-bottom: 0;
        }

        .register-body {
            padding: 1.5rem 2.25rem 2.25rem;
        }

        .form-label {
            font-size: 0.92rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.4rem;
        }

        .form-control {
            border: 1.5px solid #e2e8f0;
            background-color: #f8faf8;
            border-radius: 0.75rem;
            padding: 0.75rem 1.1rem;
            font-size: 0.95rem;
            color: #1e293b;
            transition: all 0.25s ease;
        }

        .form-control:focus {
            background-color: #ffffff;
            border-color: #14b8a6;
            box-shadow: 0 0 0 4px rgba(20, 184, 166, 0.15);
        }

        .btn-natural-register {
            background: var(--gradient-natural);
            border: none;
            color: #ffffff;
            font-family: 'Outfit', sans-serif;
            font-weight: 600;
            font-size: 1.05rem;
            padding: 0.85rem;
            border-radius: 0.75rem;
            width: 100%;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 6px 18px rgba(13, 148, 136, 0.3);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-natural-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(13, 148, 136, 0.42);
            color: #ffffff;
            filter: brightness(1.04);
        }

        .register-footer {
            padding: 1rem 2rem 1.5rem;
            text-align: center;
            font-size: 0.92rem;
            color: #64748b;
            border-top: 1px solid #f1f5f9;
            background: #fafcfb;
        }

        .register-footer a {
            color: #0d9488;
            text-decoration: none;
            font-weight: 600;
        }

        .register-footer a:hover {
            text-decoration: underline;
            color: #064e3b;
        }
    </style>
</head>
<body>

    <i class="bi bi-flower1 ambient-leaf-1"></i>
    <i class="bi bi-tree ambient-leaf-2"></i>

    <div class="register-card">
        <div class="register-header">
            <div class="brand-badge">
                <i class="bi bi-tree-fill"></i>
            </div>
            <h3>Register Form</h3>
            <p>Create staff or admin account</p>
        </div>

        <div class="register-body">
            @if($errors->any())
                <div class="alert alert-danger rounded-3 mb-3 border-0 bg-danger bg-opacity-10 text-danger">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="please input your name" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="adminwoman@gmail.com" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="•••••" required>
                </div>

                <button type="submit" class="btn btn-natural-register">
                    <span>Register</span>
                    <i class="bi bi-check2-circle"></i>
                </button>
            </form>
        </div>

        <div class="register-footer">
            Already have an account? <a href="{{ route('login') }}">Login here</a>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
