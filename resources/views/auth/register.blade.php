<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar - Ruang Aduan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { min-height: 100vh; margin: 0; color: #28332d; background: #f5f6f5; font-family: system-ui, -apple-system, 'Segoe UI', sans-serif; }
        .auth-shell { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 24px; }
        .auth-form-wrap { width: 100%; max-width: 440px; padding: 30px; background: #fff; border: 1px solid #dee3df; border-radius: 5px; }
        .form-kicker { margin-bottom: 8px; color: #52685a; font-size: 12px; font-weight: 600; }
        .auth-form-wrap h2 { margin: 0 0 6px; color: #28332d; font-size: 25px; }
        .form-intro { margin-bottom: 20px; color: #6e7771; font-size: 14px; }
        .form-label { margin-bottom: 6px; font-size: 14px; }
        .form-control { min-height: 40px; border-color: #ced5d0; border-radius: 4px; }
        .form-control:focus { border-color: #719078; box-shadow: 0 0 0 2px rgba(49, 91, 67, .12); }
        .auth-submit { min-height: 42px; margin-top: 4px; color: #fff; background: #315b43; border: 1px solid #315b43; border-radius: 4px; }
        .auth-submit:hover { color: #fff; background: #274b36; border-color: #274b36; }
        .auth-switch { margin: 18px 0 0; color: #6e7771; font-size: 14px; text-align: center; }
        .auth-switch a { color: #315b43; }
        .alert { border-radius: 4px; font-size: 14px; }
        @media (max-width: 480px) { .auth-form-wrap { padding: 24px 20px; } }
    </style>
</head>
<body>
<div class="auth-shell">
    <main class="auth-main">
        <section class="auth-form-wrap">
            <div class="form-kicker">Ruang Aduan</div>
            <h2>Daftar sekarang</h2>
            <p class="form-intro">Lengkapi data berikut untuk memulai.</p>
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $e) <div>{{ $e }}</div> @endforeach
                    </div>
                @endif
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="name">Nama Lengkap</label>
                        <input id="name" type="text" name="name" class="form-control" autocomplete="name" required value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input id="email" type="email" name="email" class="form-control" autocomplete="email" required value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input id="password" type="password" name="password" class="form-control" autocomplete="new-password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" autocomplete="new-password" required>
                    </div>
                    <button class="btn auth-submit w-100">Daftar</button>
                </form>
                <p class="auth-switch">
                    Sudah punya akun? <a href="{{ route('login') }}">Login</a>
                </p>
        </section>
    </main>
</div>
</body>
</html>