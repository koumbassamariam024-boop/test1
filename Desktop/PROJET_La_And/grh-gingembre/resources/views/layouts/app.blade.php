<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'GRH') — Malak AgroFood</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        :root {
            --malak-dark:    #0a1f14;
            --malak-primary: #1a4731;
            --malak-medium:  #1e6b45;
            --malak-light:   #2d9e6e;
            --malak-accent:  #c9961a;
            --malak-bg:      #f2f5f7;
            --malak-text:    #1a2530;
        }

        * { font-family: 'Inter', sans-serif; }
        body { background-color: var(--malak-bg) !important; }

        /* Sidebar avatar photo */
        .sidebar-user-avatar img {
            width: 100%; height: 100%; object-fit: cover; border-radius: 50%;
        }

        /* Sidebar */
        .main-sidebar {
            background: linear-gradient(180deg, var(--malak-dark) 0%, var(--malak-primary) 100%) !important;
            box-shadow: 4px 0 24px rgba(0,0,0,0.22) !important;
        }

        .brand-link {
            background: rgba(0,0,0,0.28) !important;
            border-bottom: 1px solid rgba(255,255,255,0.07) !important;
            padding: 13px 16px !important;
            display: flex !important;
            align-items: center !important;
            min-height: 60px;
            text-decoration: none !important;
        }
        .brand-logo-img {
            width: 36px; height: 36px;
            border-radius: 8px;
            object-fit: contain;
            background: #fff;
            padding: 3px;
            margin-right: 10px;
            flex-shrink: 0;
        }
        .brand-logo-fallback {
            width: 36px; height: 36px;
            border-radius: 8px;
            background: linear-gradient(135deg, var(--malak-medium), var(--malak-accent));
            display: flex; align-items: center; justify-content: center;
            margin-right: 10px;
            flex-shrink: 0;
        }
        .brand-text-block {
            display: flex; flex-direction: column; line-height: 1.25;
            overflow: hidden;
        }
        .brand-name {
            font-size: 0.92rem; font-weight: 700;
            color: #fff; letter-spacing: 0.2px;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .brand-tagline {
            font-size: 0.63rem; color: rgba(255,255,255,0.45);
            letter-spacing: 1.2px; text-transform: uppercase;
        }

        /* User panel */
        .user-panel {
            border-bottom: 1px solid rgba(255,255,255,0.07) !important;
            padding: 13px 16px !important;
            margin: 0 !important;
        }
        .sidebar-user-avatar {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--malak-light), var(--malak-accent));
            display: flex; align-items: center; justify-content: center;
            font-weight: 700; font-size: 0.9rem; color: #fff;
            flex-shrink: 0; text-transform: uppercase;
        }
        .user-panel .info { padding-left: 10px; }
        .user-panel .info a {
            font-size: 0.82rem; font-weight: 600;
            color: #fff !important; display: block;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 160px;
        }
        .user-panel .info .sidebar-user-role {
            font-size: 0.63rem; color: rgba(255,255,255,0.45);
            text-transform: uppercase; letter-spacing: 0.8px; margin-top: 1px; display: block;
        }

        /* Nav */
        .nav-sidebar .nav-header {
            color: rgba(255,255,255,0.28) !important;
            font-size: 0.6rem !important;
            letter-spacing: 1.8px; padding: 16px 18px 5px !important;
            text-transform: uppercase;
        }
        .nav-sidebar > .nav-item > .nav-link {
            color: rgba(255,255,255,0.62) !important;
            border-radius: 8px !important;
            margin: 1px 10px !important;
            padding: 9px 12px !important;
            transition: all 0.18s ease;
            font-size: 0.82rem; font-weight: 500;
        }
        .nav-sidebar > .nav-item > .nav-link:hover {
            background: rgba(255,255,255,0.09) !important;
            color: #fff !important;
        }
        .nav-sidebar > .nav-item > .nav-link.active {
            background: linear-gradient(135deg, var(--malak-medium), var(--malak-light)) !important;
            color: #fff !important;
            box-shadow: 0 3px 10px rgba(30,107,69,0.45);
        }
        .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link .nav-icon {
            color: rgba(255,255,255,0.55) !important;
        }
        .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active .nav-icon {
            color: #fff !important;
        }
        .nav-sidebar > .nav-item > .nav-link:hover .nav-icon {
            color: rgba(255,255,255,0.9) !important;
        }
        .nav-icon { font-size: 0.88rem !important; width: 18px !important; }

        .sidebar::-webkit-scrollbar { width: 4px; }
        .sidebar::-webkit-scrollbar-track { background: transparent; }
        .sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.12); border-radius: 4px; }

        /* Navbar */
        .main-header.navbar {
            background: #fff !important;
            border-bottom: 1px solid #e5eaef !important;
            box-shadow: 0 1px 6px rgba(0,0,0,0.06) !important;
            min-height: 60px;
        }
        .main-header .nav-link { color: #6b7a8d !important; padding: 0 10px !important; }
        .main-header .nav-link:hover { color: var(--malak-medium) !important; }
        .navbar-badge { font-size: 0.58rem !important; padding: 2px 5px !important; }

        /* Dropdown menus */
        .navbar .dropdown-menu {
            border: none !important;
            border-radius: 12px !important;
            box-shadow: 0 8px 32px rgba(0,0,0,0.12) !important;
            padding: 6px 0 !important;
            min-width: 190px;
        }
        .navbar .dropdown-item {
            font-size: 0.82rem; padding: 8px 16px !important;
            color: #374151; transition: background 0.15s;
        }
        .navbar .dropdown-item:hover { background: #f8fafc !important; color: var(--malak-medium); }

        /* User pill in navbar */
        .navbar-user-pill {
            display: flex; align-items: center; gap: 8px;
            padding: 4px 12px 4px 4px;
            border-radius: 40px;
            border: 1px solid #e5eaef;
            transition: border-color 0.15s, background 0.15s;
            cursor: pointer;
        }
        .navbar-user-pill:hover { background: #f8fafc; border-color: #c9d3dc; }
        .navbar-avatar {
            width: 32px; height: 32px; border-radius: 50%;
            background: linear-gradient(135deg, var(--malak-medium), var(--malak-accent));
            display: flex; align-items: center; justify-content: center;
            font-weight: 700; font-size: 0.8rem; color: #fff;
            flex-shrink: 0; text-transform: uppercase;
            overflow: hidden;
        }
        .navbar-avatar img {
            width: 100%; height: 100%; object-fit: cover; border-radius: 50%;
        }
        .navbar-user-name {
            font-size: 0.82rem; font-weight: 600; color: var(--malak-text); line-height: 1.1;
        }
        .navbar-user-role {
            font-size: 0.68rem; color: #94a3b8; line-height: 1.1;
        }

        /* Content */
        .content-wrapper { background: var(--malak-bg) !important; }

        .content-header {
            background: #fff;
            border-bottom: 1px solid #e5eaef;
            padding: 18px 24px 0 !important;
            margin-bottom: 0 !important;
        }
        .content-header h1 {
            font-size: 1.25rem !important; font-weight: 700; color: var(--malak-text);
        }
        .breadcrumb {
            background: transparent !important; padding: 4px 0 !important;
            font-size: 0.77rem; margin-bottom: 0 !important;
        }
        .breadcrumb-item a { color: var(--malak-medium); }
        .breadcrumb-item.active { color: #9aacbc; }
        .breadcrumb-item + .breadcrumb-item::before { color: #cbd5e1; }

        .content { padding: 22px 24px !important; }

        /* Cards */
        .card {
            border: none !important;
            border-radius: 12px !important;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 4px 14px rgba(0,0,0,0.04) !important;
            transition: box-shadow 0.2s ease;
        }
        .card:hover { box-shadow: 0 4px 22px rgba(0,0,0,0.09) !important; }
        .card-header {
            background: #fff !important;
            border-bottom: 1px solid #f0f4f7 !important;
            border-radius: 12px 12px 0 0 !important;
            padding: 14px 20px !important;
        }
        .card-header .card-title { font-size: 0.88rem !important; font-weight: 700; color: var(--malak-text); }
        .card-body { padding: 20px !important; }

        /* Info boxes */
        .info-box {
            border-radius: 12px !important;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06) !important;
            min-height: 82px;
            transition: transform 0.18s ease, box-shadow 0.18s ease;
        }
        .info-box:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 22px rgba(0,0,0,0.1) !important;
        }
        .info-box-icon { border-radius: 12px 0 0 12px !important; }
        .info-box-number { font-size: 1.4rem !important; font-weight: 700; }
        .info-box-text { font-size: 0.8rem !important; font-weight: 500; }

        /* Buttons */
        .btn { border-radius: 8px !important; font-weight: 500 !important; font-size: 0.83rem !important; }
        .btn-primary  { background: var(--malak-medium) !important; border-color: var(--malak-medium) !important; }
        .btn-primary:hover  { background: var(--malak-primary) !important; border-color: var(--malak-primary) !important; }
        .btn-sm { font-size: 0.76rem !important; padding: 4px 10px !important; }

        /* Tables */
        .table { font-size: 0.82rem; }
        .table thead th {
            border-top: none; border-bottom: 2px solid #edf0f4;
            color: #6b7a8d; font-weight: 600; font-size: 0.73rem;
            text-transform: uppercase; letter-spacing: 0.5px;
            padding: 10px 12px;
        }
        .table tbody td { padding: 10px 12px; vertical-align: middle; }
        .table-hover tbody tr:hover { background: #f7faf8; }

        /* Badges */
        .badge { border-radius: 6px !important; font-weight: 500 !important; padding: 3px 8px !important; font-size: 0.71rem !important; }
        .badge-poudre { background: #f59e0b !important; color:#fff !important; }
        .badge-jus    { background: #10b981 !important; color:#fff !important; }
        .badge-chips  { background: #f97316 !important; color:#fff !important; }
        .badge-the    { background: #8b5cf6 !important; color:#fff !important; }

        /* Alerts */
        .alert { border-radius: 10px !important; border: none !important; font-size: 0.83rem !important; font-weight: 500; }
        .alert-success { background: #ecfdf5 !important; color: #065f46 !important; }
        .alert-danger  { background: #fef2f2 !important; color: #991b1b !important; }
        .alert-warning { background: #fffbeb !important; color: #92400e !important; }

        /* Forms */
        .form-control {
            border-radius: 8px !important;
            border: 1px solid #dde3e9 !important;
            font-size: 0.83rem !important;
            padding: 8px 12px !important;
            transition: border-color 0.15s, box-shadow 0.15s;
            color: var(--malak-text);
        }
        .form-control:focus {
            border-color: var(--malak-medium) !important;
            box-shadow: 0 0 0 3px rgba(30,107,69,0.12) !important;
        }
        .form-group label { font-size: 0.8rem !important; font-weight: 600; color: #374151; margin-bottom: 4px; }
        .input-group-text { border-radius: 0 8px 8px 0 !important; border-color: #dde3e9 !important; background: #f8fafc !important; }

        /* Footer */
        .main-footer {
            background: #fff !important;
            border-top: 1px solid #e5eaef !important;
            color: #94a3b8 !important;
            font-size: 0.77rem !important;
            padding: 12px 24px !important;
        }
        .main-footer strong { color: var(--malak-medium) !important; }
    </style>
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto align-items-center pr-2">

            {{-- Notifications --}}
            <li class="nav-item dropdown mr-1">
                <a class="nav-link position-relative" data-toggle="dropdown" href="#" role="button">
                    <i class="far fa-bell fa-lg"></i>
                    @php
                        $nbAlertes = \App\Models\Employe::where('statut','actif')
                            ->whereNotNull('date_fin_contrat')
                            ->whereDate('date_fin_contrat','<=',now()->addDays(30))
                            ->count();
                    @endphp
                    @if($nbAlertes > 0)
                    <span class="badge badge-danger navbar-badge">{{ $nbAlertes }}</span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-item" style="border-bottom:1px solid #f0f4f7;pointer-events:none;">
                        <span style="font-size:0.77rem;font-weight:700;color:#374151;text-transform:uppercase;letter-spacing:0.5px;">
                            <i class="fas fa-bell mr-1" style="color:var(--malak-medium);"></i> Alertes RH
                        </span>
                    </div>
                    @if($nbAlertes > 0)
                    <a href="{{ route('employes.index') }}" class="dropdown-item">
                        <i class="fas fa-file-contract mr-2 text-danger"></i>
                        {{ $nbAlertes }} contrat(s) à renouveler
                    </a>
                    @else
                    <div class="dropdown-item text-muted" style="pointer-events:none;">
                        <i class="fas fa-check-circle mr-2 text-success"></i> Aucune alerte
                    </div>
                    @endif
                    <div style="border-top:1px solid #f0f4f7;">
                        <a href="{{ route('dashboard') }}" class="dropdown-item text-center" style="color:var(--malak-medium);font-size:0.78rem;">
                            Voir le tableau de bord
                        </a>
                    </div>
                </div>
            </li>

            {{-- Séparateur --}}
            <li class="d-none d-md-flex align-items-center mx-2" style="height:28px;border-left:1px solid #e5eaef;"></li>

            {{-- Utilisateur --}}
            <li class="nav-item dropdown">
                <a class="nav-link p-0" data-toggle="dropdown" href="#" role="button">
                    <div class="navbar-user-pill">
                        <div class="navbar-avatar">
                            @php
                                $avatar = file_exists(public_path('images/photo_mariam.jpg'))  ? 'images/photo_mariam.jpg'
                                        : (file_exists(public_path('images/photo_mariam.jpeg')) ? 'images/photo_mariam.jpeg' : null);
                            @endphp
                            @if($avatar)
                                <img src="{{ asset($avatar) }}" alt="{{ auth()->user()->name }}">
                            @else
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            @endif
                        </div>
                        <div class="d-none d-md-block">
                            <div class="navbar-user-name">{{ auth()->user()->name }}</div>
                            <div class="navbar-user-role">{{ ucfirst(str_replace('_',' ', auth()->user()->getRoleNames()->first() ?? '')) }}</div>
                        </div>
                        <i class="fas fa-chevron-down ml-1" style="font-size:0.6rem;color:#94a3b8;"></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="fas fa-user-edit mr-2 text-muted"></i> Mon profil
                    </a>
                    <div class="dropdown-divider m-1"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item" style="color:#ef4444;background:none;border:none;width:100%;text-align:left;cursor:pointer;">
                            <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar elevation-0">

        {{-- Logo & Nom société --}}
        <a href="{{ route('dashboard') }}" class="brand-link">
            <img src="{{ asset('images/logo.png') }}"
                 alt="Malak AgroFood"
                 class="brand-logo-img"
                 onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
            <div class="brand-logo-fallback" style="display:none;">
                <i class="fas fa-seedling text-white" style="font-size:1rem;"></i>
            </div>
            <div class="brand-text-block">
                <span class="brand-name">Malak AgroFood</span>
                <span class="brand-tagline">Gestion RH</span>
            </div>
        </a>

        <div class="sidebar">
            {{-- Panel utilisateur --}}
            <div class="user-panel d-flex align-items-center">
                <div class="sidebar-user-avatar">
                    @php
                        $sidebarAvatar = file_exists(public_path('images/photo_mariam.jpg'))  ? 'images/photo_mariam.jpg'
                                       : (file_exists(public_path('images/photo_mariam.jpeg')) ? 'images/photo_mariam.jpeg' : null);
                    @endphp
                    @if($sidebarAvatar)
                        <img src="{{ asset($sidebarAvatar) }}" alt="{{ auth()->user()->name }}">
                    @else
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    @endif
                </div>
                <div class="info">
                    <a href="{{ route('profile.edit') }}">{{ auth()->user()->name }}</a>
                    <span class="sidebar-user-role">{{ str_replace('_',' ', auth()->user()->getRoleNames()->first() ?? 'Utilisateur') }}</span>
                </div>
            </div>

            <nav class="mt-2 pb-4">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>Tableau de bord</p>
                        </a>
                    </li>

                    <li class="nav-header">Ressources Humaines</li>

                    <li class="nav-item">
                        <a href="{{ route('employes.index') }}" class="nav-link {{ request()->routeIs('employes.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Employés</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('presences.index') }}" class="nav-link {{ request()->routeIs('presences.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-clock"></i>
                            <p>Présences & Pointage</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('conges.index') }}" class="nav-link {{ request()->routeIs('conges.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>Congés & Absences
                                @php $nbCongesAttente = \App\Models\Conge::where('statut','en_attente')->count(); @endphp
                                @if($nbCongesAttente > 0)
                                <span class="badge badge-warning right" style="background:#f59e0b;font-size:0.62rem;">{{ $nbCongesAttente }}</span>
                                @endif
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('salaires.index') }}" class="nav-link {{ request()->routeIs('salaires.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-money-bill-wave"></i>
                            <p>Paie & Bulletins</p>
                        </a>
                    </li>

                    <li class="nav-header">Production & Sécurité</li>

                    <li class="nav-item">
                        <a href="{{ route('production.index') }}" class="nav-link {{ request()->routeIs('production.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-industry"></i>
                            <p>Lignes de Production</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('epis.index') }}" class="nav-link {{ request()->routeIs('epis.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-hard-hat"></i>
                            <p>EPI & Sécurité</p>
                        </a>
                    </li>

                    <li class="nav-header">Recrutement</li>

                    <li class="nav-item">
                        <a href="{{ route('recrutements.index') }}" class="nav-link {{ request()->routeIs('recrutements.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-plus"></i>
                            <p>Recrutement</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>

    <!-- Contenu -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid px-0">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('page-title', 'Dashboard')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}"><i class="fas fa-home mr-1"></i>Accueil</a>
                            </li>
                            @yield('breadcrumb')
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid px-0">

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                    <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="main-footer">
        <strong>© {{ date('Y') }} Malak AgroFood</strong> — Système de Gestion des Ressources Humaines
        <div class="float-right d-none d-sm-inline-block">Licence Informatique</div>
    </footer>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
$(document).ready(function () {
    $('.datatable').DataTable({
        language: { url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json' },
        responsive: true,
        pageLength: 15,
    });

    $(document).on('submit', '.form-delete', function (e) {
        e.preventDefault();
        const form = this;
        Swal.fire({
            title: 'Confirmer la suppression',
            text: 'Cette action est irréversible.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Supprimer',
            cancelButtonText: 'Annuler',
        }).then((r) => { if (r.isConfirmed) form.submit(); });
    });
});
</script>
@stack('scripts')
</body>
</html>
