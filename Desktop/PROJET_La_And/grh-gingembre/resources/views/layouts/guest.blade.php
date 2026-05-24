<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Malak AgroFood — Connexion</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">

    <style>
        * { font-family: 'Inter', sans-serif; box-sizing: border-box; }

        body, .login-page {
            background: #eef1f5 !important;
            min-height: 100vh !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 24px;
        }

        /* Wrapper */
        .malak-login-wrapper {
            display: flex;
            width: 920px;
            max-width: 100%;
            min-height: 540px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,0.16), 0 4px 16px rgba(0,0,0,0.08);
        }

        /* Panneau gauche */
        .malak-brand-panel {
            flex: 1;
            background: linear-gradient(160deg, #071811 0%, #0f2b1d 25%, #1a4731 60%, #1e6b45 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 52px 44px;
            position: relative;
            overflow: hidden;
        }
        /* Cercles décoratifs */
        .malak-brand-panel::before {
            content: '';
            position: absolute; top: -100px; right: -100px;
            width: 320px; height: 320px; border-radius: 50%;
            background: rgba(255,255,255,0.04);
            pointer-events: none;
        }
        .malak-brand-panel::after {
            content: '';
            position: absolute; bottom: -80px; left: -80px;
            width: 280px; height: 280px; border-radius: 50%;
            background: rgba(255,255,255,0.03);
            pointer-events: none;
        }
        .malak-brand-inner { position: relative; z-index: 1; text-align: center; width: 100%; }

        /* Logo */
        .malak-logo-box {
            width: 88px; height: 88px;
            border-radius: 20px;
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(4px);
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 20px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.15);
        }
        .malak-logo-box img {
            width: 68px; height: 68px;
            object-fit: contain;
        }
        .malak-logo-box .logo-icon {
            font-size: 2.2rem;
            color: rgba(255,255,255,0.85);
        }

        .malak-company-name {
            font-size: 2rem; font-weight: 700; color: #fff;
            letter-spacing: -0.5px; line-height: 1.1; margin-bottom: 6px;
        }
        .malak-company-sub {
            font-size: 0.73rem; color: rgba(255,255,255,0.4);
            letter-spacing: 2.5px; text-transform: uppercase;
            margin-bottom: 36px;
        }

        /* Séparateur */
        .malak-divider {
            width: 40px; height: 2px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.25), transparent);
            margin: 0 auto 28px;
        }

        /* Liste modules */
        .malak-features {
            list-style: none; padding: 0; margin: 0;
            text-align: left; display: inline-block;
        }
        .malak-features li {
            display: flex; align-items: center; gap: 12px;
            color: rgba(255,255,255,0.65);
            font-size: 0.8rem; font-weight: 400;
            margin-bottom: 11px;
            line-height: 1.3;
        }
        .malak-features li .feat-icon {
            width: 30px; height: 30px; border-radius: 8px;
            background: rgba(255,255,255,0.1);
            display: flex; align-items: center; justify-content: center;
            font-size: 0.75rem; color: rgba(255,255,255,0.8);
            flex-shrink: 0;
        }

        /* Panneau droit */
        .malak-form-panel {
            width: 420px;
            flex-shrink: 0;
            background: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 52px 48px;
        }
        .malak-form-header { margin-bottom: 30px; }
        .malak-form-header h2 {
            font-size: 1.55rem; font-weight: 700;
            color: #111827; margin-bottom: 5px;
        }
        .malak-form-header p {
            font-size: 0.82rem; color: #9aacbc; margin: 0;
        }

        /* Override styles AdminLTE dans le panneau droit */
        .malak-form-panel .login-box { width: 100% !important; margin: 0 !important; }
        .malak-form-panel .login-logo { display: none !important; }
        .malak-form-panel .card { border: none !important; box-shadow: none !important; border-radius: 0 !important; }
        .malak-form-panel .card-body { padding: 0 !important; }
        .malak-form-panel .login-card-body { padding: 0 !important; }
        .malak-form-panel .login-box-msg { display: none; }

        .malak-form-panel .form-control {
            border-radius: 9px !important;
            border: 1px solid #e0e7ef !important;
            font-size: 0.84rem !important;
            padding: 9px 12px !important;
            transition: border-color 0.15s, box-shadow 0.15s;
        }
        .malak-form-panel .form-control:focus {
            border-color: #1e6b45 !important;
            box-shadow: 0 0 0 3px rgba(30,107,69,0.11) !important;
        }
        .malak-form-panel .input-group-text {
            border-radius: 0 9px 9px 0 !important;
            border-color: #e0e7ef !important;
            background: #f8fafc !important;
            color: #9aacbc;
        }
        .malak-form-panel .btn-primary {
            background: linear-gradient(135deg, #1e6b45, #2d9e6e) !important;
            border: none !important;
            border-radius: 9px !important;
            font-size: 0.86rem !important;
            font-weight: 600 !important;
            padding: 10px !important;
            letter-spacing: 0.2px;
            transition: opacity 0.18s, transform 0.18s;
        }
        .malak-form-panel .btn-primary:hover {
            opacity: 0.88; transform: translateY(-1px);
        }
        .malak-form-panel label { font-size: 0.8rem; color: #374151; font-weight: 500; }

        /* Comptes démo */
        .demo-accounts {
            background: #f7f9fb;
            border-radius: 10px;
            padding: 12px 14px;
            margin-top: 20px;
            border: 1px solid #edf0f4;
        }
        .demo-accounts p { font-size: 0.76rem; margin-bottom: 4px; color: #4b5563; }
        .demo-accounts code {
            background: #e9eef4; border-radius: 4px;
            padding: 1px 5px; font-size: 0.73rem; color: #1e6b45;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .malak-login-wrapper { flex-direction: column; border-radius: 16px; }
            .malak-brand-panel { padding: 36px 28px; }
            .malak-features { display: none; }
            .malak-form-panel { width: 100%; padding: 36px 28px; }
        }
    </style>
</head>
<body class="hold-transition login-page">

    <div class="malak-login-wrapper">

        <!-- Panneau gauche -->
        <div class="malak-brand-panel">
            <div class="malak-brand-inner">

                <div class="malak-logo-box">
                    <img src="{{ asset('images/logo.png') }}"
                         alt="Malak AgroFood"
                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                    <span class="logo-icon" style="display:none;">
                        <i class="fas fa-seedling"></i>
                    </span>
                </div>

                <div class="malak-company-name">Malak AgroFood</div>
                <div class="malak-company-sub">Système de Gestion RH</div>
                <div class="malak-divider"></div>

                <ul class="malak-features">
                    <li>
                        <span class="feat-icon"><i class="fas fa-users"></i></span>
                        Gestion des employés
                    </li>
                    <li>
                        <span class="feat-icon"><i class="fas fa-clock"></i></span>
                        Présences & Pointage
                    </li>
                    <li>
                        <span class="feat-icon"><i class="fas fa-calendar-alt"></i></span>
                        Congés & Absences
                    </li>
                    <li>
                        <span class="feat-icon"><i class="fas fa-money-bill-wave"></i></span>
                        Paie & Bulletins PDF
                    </li>
                    <li>
                        <span class="feat-icon"><i class="fas fa-industry"></i></span>
                        Lignes de Production
                    </li>
                </ul>
            </div>
        </div>

        <!-- Panneau droit -->
        <div class="malak-form-panel">
            <div class="malak-form-header">
                <h2>Bon retour !</h2>
                <p>Connectez-vous à votre espace GRH</p>
            </div>
            {{ $slot }}
        </div>

    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
