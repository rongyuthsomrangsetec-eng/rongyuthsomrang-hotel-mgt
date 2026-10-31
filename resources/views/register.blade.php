<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - ផ្ទះសំណាក់ ចាន់ថន (SCT Resort)</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts: Kantumruy Pro & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;600;700&family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --sct-emerald-gradient: linear-gradient(145deg, #062c21 0%, #0d4637 55%, #155e4b 100%);
            --sct-gold-gradient: linear-gradient(135deg, #f6e27a 0%, #d4af37 50%, #aa771c 100%);
        }

        body {
            font-family: 'Kantumruy Pro', 'Plus Jakarta Sans', sans-serif;
            background-color: #062c21;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(212, 175, 55, 0.15) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(21, 94, 75, 0.4) 0%, transparent 50%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            position: relative;
        }

        @keyframes cardDrop {
            from { opacity: 0; transform: translateY(25px) scale(0.97); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .register-card-sct {
            background: #ffffff;
            border: 2px solid rgba(212, 175, 55, 0.4);
            border-radius: 1.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 480px;
            overflow: hidden;
            animation: cardDrop 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            position: relative;
            z-index: 10;
        }

        .register-card-sct::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: var(--sct-gold-gradient);
        }

        .register-header-sct {
            padding: 2.5rem 2rem 1.25rem;
            text-align: center;
            background: #fbfdfb;
            border-bottom: 1px solid #f1f5f9;
        }

        .sct-emblem {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: var(--sct-gold-gradient);
            border: 3px solid #ffffff;
            box-shadow: 0 6px 16px rgba(212, 175, 55, 0.5);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #062c21;
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 1.7rem;
            margin-bottom: 0.85rem;
        }

        .register-header-sct h3 {
            font-size: 1.6rem;
            font-weight: 700;
            color: #062c21;
            margin: 0;
        }

        .register-header-sct p {
            color: #64748b;
            font-size: 0.88rem;
            margin-top: 0.35rem;
            margin-bottom: 0;
        }

        .register-body-sct {
            padding: 2rem 2.25rem 2.25rem;
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
            border-color: #0b4233;
            box-shadow: 0 0 0 4px rgba(11, 66, 51, 0.15);
        }

        .btn-register-sct {
            background: var(--sct-gold-gradient);
            border: 1px solid #a67c1e;
            color: #062c21;
            font-family: 'Kantumruy Pro', 'Outfit', sans-serif;
            font-weight: 700;
            font-size: 1.05rem;
            padding: 0.85rem;
            border-radius: 0.75rem;
            width: 100%;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 6px 18px rgba(212, 175, 55, 0.4);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-register-sct:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(212, 175, 55, 0.6);
            color: #062c21;
            filter: brightness(1.05);
        }

        .register-footer-sct {
            padding: 1.1rem 2rem 1.4rem;
            text-align: center;
            font-size: 0.92rem;
            color: #64748b;
            border-top: 1px solid #f1f5f9;
            background: #fafcfb;
        }

        .register-footer-sct a {
            color: #0b4233;
            text-decoration: none;
            font-weight: 700;
        }

        .register-footer-sct a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="register-card-sct">
        <div class="register-header-sct">
            <div class="sct-emblem">SCT</div>
            <h3>ផ្ទះសំណាក់ ចាន់ថន</h3>
            <p>Register Form &bull; SCT Chan Thorn Guesthouse</p>
        </div>

        <div class="register-body-sct">
            @if($errors->any())
                <div class="alert alert-danger rounded-3 mb-3 border-0 bg-danger bg-opacity-10 text-danger small">
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
                    <label for="name" class="form-label">Name (ឈ្មោះបុគ្គលិក / អភិបាល)</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="please input your name" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address (អ៊ីមែល)</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="adminwoman@gmail.com" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Password (ពាក្យសម្ងាត់)</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="•••••" required>
                </div>

                <button type="submit" class="btn btn-register-sct">
                    <span>ចុះឈ្មោះគណនី (Register)</span>
                    <i class="bi bi-check2-circle"></i>
                </button>
            </form>
        </div>

        <div class="register-footer-sct">
            មានគណនីរួចហើយ? <a href="{{ route('login') }}">ចូលប្រើប្រព័ន្ធ (Login)</a>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
