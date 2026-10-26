<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard') - Ruang Aduan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --ink: #28332d;
            --forest: #315b43;
            --forest-soft: #edf2ee;
            --lime: #e5eee5;
            --paper: #f5f6f5;
            --muted: #6e7771;
            --line: #dee3df;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            color: var(--ink);
            background-color: var(--paper);
            font-family: system-ui, -apple-system, 'Segoe UI', sans-serif;
        }

        .app-shell {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 235px minmax(0, 1fr);
        }

        .sidebar {
            position: sticky;
            top: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 22px 16px 18px;
            color: var(--ink);
            background: #fff;
            border-right: 1px solid var(--line);
            overflow-y: auto;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 6px 22px;
        }

        .brand-mark {
            display: grid;
            place-items: center;
            width: 34px;
            height: 34px;
            color: #fff;
            background: var(--forest);
            border-radius: 4px;
            font-size: 16px;
        }

        .brand-name {
            display: block;
            font-size: 16px;
            font-weight: 700;
            line-height: 1.1;
        }

        .brand-caption {
            display: block;
            margin-top: 4px;
            color: #a7b8ad;
            font-size: 11px;
        }

        .sidebar-account {
            padding: 12px 7px;
            margin-bottom: 18px;
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
        }

        .sidebar-account small,
        .nav-caption {
            display: block;
            color: var(--muted);
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .08em;
        }

        .sidebar-account strong {
            display: block;
            margin-top: 5px;
            overflow: hidden;
            color: var(--ink);
            font-size: 13px;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .role-label {
            display: inline-block;
            margin-top: 8px;
            padding: 3px 8px;
            color: var(--muted);
            font-size: 10px;
        }

        .side-nav {
            flex: 1;
        }

        .nav-caption {
            padding: 0 12px;
            margin: 0 0 8px;
        }

        .sidebar a {
            position: relative;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            margin: 3px 0;
            color: #414b45;
            border-radius: 4px;
            text-decoration: none;
            font-size: 13px;
            transition: background .15s ease, color .15s ease;
        }

        .sidebar a:hover,
        .sidebar a.active {
            color: var(--forest);
            background: var(--forest-soft);
        }

        .sidebar a i {
            width: 17px;
            color: #657d6b;
            font-size: 15px;
        }

        .card-stat {
            border: 0;
            border-radius: 5px;
            box-shadow: none;
        }

        .card-stat.bg-primary { background-color: #285a4b !important; }
        .card-stat.bg-warning { background-color: #c77842 !important; }
        .card-stat.bg-success { background-color: #637b3d !important; }
        .card-stat.bg-info { background-color: #39777a !important; }

        .main-panel {
            min-width: 0;
            padding: 0 28px 36px;
        }

        .topbar {
            min-height: 78px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 24px;
            border-bottom: 1px solid var(--line);
        }

        .topbar-label {
            color: var(--muted);
            font-size: 12px;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--ink);
            font-size: 12px;
            font-weight: 600;
        }

        .user-dot {
            display: grid;
            place-items: center;
            width: 30px;
            height: 30px;
            color: var(--forest);
            background: #e8eee9;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 700;
        }

        .page-content {
            width: 100%;
            max-width: 1360px;
            margin: 0 auto;
        }

        .badge-status {
            padding: 6px 12px;
            border-radius: 4px;
        }

        .sidebar-logout {
            padding-top: 12px;
            margin-top: 12px;
            border-top: 1px solid var(--line);
        }

        .sidebar-logout .btn {
            padding: 9px 12px;
            color: var(--forest);
            border-color: #b8c7bb;
            border-radius: 4px;
            font-size: 12px;
        }

        .sidebar-logout .btn:hover {
            color: #fff;
            background: var(--forest);
            border-color: var(--forest);
        }

        h1, h2, h3, h4, h5 {
            color: var(--ink);
        }

        .page-content h2 { font-size: 24px; }

        .page-content .table {
            --bs-table-bg: rgba(255, 255, 255, .82);
            --bs-table-color: var(--ink);
        }

        @media (max-width: 767.98px) {
            .app-shell {
                display: block;
            }

            .sidebar { position: static; height: auto; padding: 14px; }

            .brand {
                padding: 0 2px 14px;
            }

            .sidebar-account {
                display: none;
            }

            .side-nav {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 2px 6px;
            }

            .nav-caption,
            .side-nav hr {
                grid-column: 1 / -1;
            }

            .nav-caption:not(:first-child) {
                margin-top: 8px;
            }

            .sidebar a {
                padding: 9px 8px;
                font-size: 12px;
            }

            .sidebar-logout {
                padding-top: 10px;
                margin-top: 10px;
            }

            .main-panel {
                padding: 0 16px 26px;
            }

            .topbar {
                min-height: 58px;
                margin-bottom: 23px;
            }

            .topbar-user {
                font-size: 11px;
            }

            .page-content h2 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="app-shell">
        <aside class="sidebar">
            <div class="brand">
                <span class="brand-mark"><i class="bi bi-chat-square-heart-fill"></i></span>
                <span>
                    <span class="brand-name">Ruang Aduan</span>
                    <span class="brand-caption">Layanan masyarakat</span>
                </span>
            </div>

            <div class="sidebar-account">
                <small>AKUN AKTIF</small>
                <strong>{{ auth()->user()->name }}</strong>
                <span class="role-label">{{ auth()->user()->isAdmin() ? 'Admin' : 'Customer' }}</span>
            </div>

            <nav class="side-nav" aria-label="Navigasi utama">
                <span class="nav-caption">RUANG KERJA</span>
                <a class="{{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="bi bi-grid-1x2-fill"></i> Dashboard</a>
                <a class="{{ request()->routeIs('profil.*') ? 'active' : '' }}" href="{{ route('profil.edit') }}"><i class="bi bi-person-vcard"></i> Profil Saya</a>

                @if(auth()->user()->isAdmin())
                <span class="nav-caption">ADMINISTRASI</span>
                <a class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}"><i class="bi bi-people"></i> Data User</a>
                <a class="{{ request()->routeIs('admin.pengaduan.*') ? 'active' : '' }}" href="{{ route('admin.pengaduan.index') }}"><i class="bi bi-chat-dots"></i> Pengaduan</a>
                @endif

                @if(auth()->user()->isCustomer())
                <span class="nav-caption">PENGADUAN</span>
                <a class="{{ request()->routeIs('customer.pengaduan.index') ? 'active' : '' }}" href="{{ route('customer.pengaduan.index') }}"><i class="bi bi-chat-dots"></i> Pengaduan Saya</a>
                <a class="{{ request()->routeIs('customer.pengaduan.create') ? 'active' : '' }}" href="{{ route('customer.pengaduan.create') }}"><i class="bi bi-plus-circle"></i> Buat Pengaduan</a>
                @endif
            </nav>

            <div class="sidebar-logout">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-light w-100">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="main-panel">
            <header class="topbar">
                <span class="topbar-label">Portal layanan pengaduan</span>
                <span class="topbar-user">
                    <span class="user-dot">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                    {{ auth()->user()->name }}
                </span>
            </header>

            <div class="page-content">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @yield('content')
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>