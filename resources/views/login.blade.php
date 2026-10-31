<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hotel Management System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            width: 100%;
            max-width: 520px;
            padding: 0;
            overflow: hidden;
        }

        .login-header {
            padding: 1.5rem 2rem;
            text-align: center;
            border-bottom: 1px solid #f1f5f9;
        }

        .login-header h3 {
            font-size: 1.6rem;
            font-weight: 600;
            color: #1e293b;
            margin: 0;
        }

        .login-body {
            padding: 2rem;
        }

        .form-label {
            font-size: 0.95rem;
            font-weight: 500;
            color: #334155;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 1px solid #cbd5e1;
            background-color: #f8fafc;
            border-radius: 6px;
            padding: 0.7rem 1rem;
            font-size: 0.95rem;
            color: #1e293b;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            background-color: #ffffff;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        .btn-login {
            background-color: #1b68ff;
            border: none;
            color: #ffffff;
            font-weight: 500;
            font-size: 1rem;
            padding: 0.75rem;
            border-radius: 6px;
            width: 100%;
            transition: background-color 0.2s ease;
        }

        .btn-login:hover {
            background-color: #1455d9;
            color: #ffffff;
        }

        .login-footer {
            padding: 1rem 2rem 1.5rem;
            text-align: center;
            font-size: 0.9rem;
            color: #64748b;
        }

        .login-footer a {
            color: #1b68ff;
            text-decoration: none;
            font-weight: 600;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-header">
            <h3>Login Form</h3>
        </div>

        <div class="login-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger mb-3">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', 'adminwoman@gmail.com') }}" placeholder="adminwoman@gmail.com" required autofocus>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="•••••" value="password" required>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label text-muted small" for="remember">Remember me on this computer</label>
                </div>

                <button type="submit" class="btn btn-login">Login</button>
            </form>
        </div>

        <div class="login-footer">
            Don't have an account? <a href="{{ route('register') }}">Register here</a>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
