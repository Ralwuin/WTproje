<?php
// Session Management
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitLife - Sağlıklı Yaşam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #14b8a6;
            --primary-dark: #0f766e;
            --primary-light: #ccfbf1;
            --bg-body: #f0fdfa;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --sidebar-width: 260px;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: background-color 0.3s, color 0.3s;
        }

        .marquee-header {
            background: linear-gradient(to right, #0f766e, #0369a1);
            color: white;
            font-size: 0.9rem;
            padding: 8px 0;
            font-weight: 500;
        }

        .navbar {
            background-color: #ffffff;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            padding: 0.75rem 1.5rem;
        }
        .navbar-brand {
            font-weight: 700;
            color: var(--text-dark) !important;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .navbar-brand i { color: var(--primary); }

        .main-layout { display: flex; flex: 1; }
        .sidebar {
            width: var(--sidebar-width);
            background-color: #ffffff;
            border-right: 1px solid #e2e8f0;
            padding: 1.5rem 1rem;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
        }
        .nav-link {
            color: var(--text-muted);
            font-weight: 500;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 0.25rem;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }
        .nav-link:hover, .nav-link.active {
            background-color: var(--primary-light);
            color: var(--primary-dark);
        }

        .content-wrapper { flex: 1; padding: 2rem; overflow-y: auto; }

        .modern-card {
            background: white;
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 1.5rem;
            transition: background-color 0.3s;
        }
        .modern-card-header {
            background-color: transparent;
            border-bottom: 1px solid #f1f5f9;
            padding: 1.25rem 1.5rem;
            font-weight: 600;
            color: var(--text-dark);
        }
        .modern-card-body { padding: 1.5rem; }

        /* --- DARK MODE CONFIGURATION --- */
        body.dark-mode { background-color: #0f172a; color: #f1f5f9; }
        
        body.dark-mode .navbar, 
        body.dark-mode .sidebar, 
        body.dark-mode .modern-card,
        body.dark-mode .card,
        body.dark-mode .list-group-item { 
            background-color: #1e293b !important; 
            border-color: #334155; 
            color: #f1f5f9;
        }

        /* Typography Colors in Dark Mode */
        body.dark-mode h1, body.dark-mode h2, body.dark-mode h3, 
        body.dark-mode h4, body.dark-mode h5, body.dark-mode h6,
        body.dark-mode .text-dark, 
        body.dark-mode .navbar-brand { 
            color: #f1f5f9 !important; 
        }
        
        body.dark-mode .text-muted { color: #94a3b8 !important; }
        body.dark-mode .nav-link { color: #cbd5e1; }
        body.dark-mode .nav-link:hover { background-color: #334155; color: var(--primary); }
        
        /* Form Elements Dark Mode */
        body.dark-mode .form-control, body.dark-mode .form-select { 
            background-color: #334155; border-color: #475569; color: white; 
        }
        body.dark-mode .form-control::placeholder { color: #cbd5e1; }
        
        /* Accordion (Hakkımızda Sayfası) Fix */
        body.dark-mode .accordion-item { background-color: #1e293b; border-color: #334155; color: #f1f5f9; }
        body.dark-mode .accordion-button { background-color: #1e293b; color: #f1f5f9; }
        body.dark-mode .accordion-button:not(.collapsed) { 
            background-color: #334155; color: var(--primary) !important; box-shadow: none;
        }

        /* Table (Besinler Sayfası) Fix */
        body.dark-mode .table { color: #f1f5f9 !important; border-color: #334155; }
        body.dark-mode .table thead th { 
            background-color: #0f172a; color: #f1f5f9; border-color: #334155; 
        }
        body.dark-mode .table tbody td { 
            background-color: #1e293b; color: #f1f5f9; border-color: #334155; 
        }
        body.dark-mode .table-hover tbody tr:hover td { 
            background-color: #334155; color: #fff;
        }

        @media (max-width: 768px) { .sidebar { display: none; } }
    </style>
</head>
<body id="body">

    <div class="marquee-header">
        <marquee behavior="scroll" direction="left">Günün İpucu: Günde en az 2.5 litre su içmeyi ve hareket etmeyi unutmayın! Sağlıklı yaşam FitLife ile başlar...</marquee>
    </div>

    <nav class="navbar navbar-expand-md sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><i class="fa-solid fa-heart-pulse"></i> FitLife</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mobileMenu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-md-none">
                     <li class="nav-item"><a href="index.php" class="nav-link"><i class="fa-solid fa-house"></i> Anasayfa</a></li>
                     <li class="nav-item"><a href="hakkimda.php" class="nav-link"><i class="fa-solid fa-circle-info"></i> Hakkımızda</a></li>
                     <li class="nav-item"><a href="besinler.php" class="nav-link"><i class="fa-solid fa-utensils"></i> Besin Değerleri</a></li>
                     <li class="nav-item"><a href="vucut_haritasi.php" class="nav-link"><i class="fa-solid fa-person"></i> Vücut Haritası</a></li>
                     <li class="nav-item"><a href="egzersiz.php" class="nav-link"><i class="fa-solid fa-dumbbell"></i> Egzersizler</a></li>
                     <li class="nav-item"><a href="panel.php" class="nav-link"><i class="fa-solid fa-calendar-check"></i> Günlüğüm</a></li>
                     <li class="nav-item"><a href="iletisim.php" class="nav-link"><i class="fa-solid fa-envelope"></i> İletişim</a></li>
                </ul>
                <div class="d-flex align-items-center ms-auto gap-3">
                    <button class="btn btn-light border text-secondary btn-sm" onclick="toggleDarkMode()">
                        <i class="fa-solid fa-moon"></i> Mod
                    </button>
                    
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <span class="text-muted small fw-bold d-none d-lg-block">
                            Merhaba, <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'Sporcu'); ?>
                        </span>
                        <a href="logout.php" class="btn btn-outline-danger btn-sm px-3 rounded-3">Çıkış Yap</a>
                    <?php else: ?>
                        <a href="login.php" class="btn btn-outline-primary btn-sm px-3 rounded-3">Giriş</a>
                        <a href="register.php" class="btn btn-primary btn-sm px-3 rounded-3">Kayıt Ol</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="main-layout">
        <div class="sidebar d-none d-md-flex">
            <h6 class="text-uppercase text-muted small fw-bold mb-3 px-3 mt-2">Menüler</h6>
            <nav class="nav flex-column">
                <a href="index.php" class="nav-link"><i class="fa-solid fa-house"></i> Anasayfa</a>
                <a href="hakkimda.php" class="nav-link"><i class="fa-solid fa-circle-info"></i> Hakkımızda</a>
                <a href="besinler.php" class="nav-link"><i class="fa-solid fa-utensils"></i> Besin Değerleri</a>
                <a href="vucut_haritasi.php" class="nav-link"><i class="fa-solid fa-person"></i> Vücut Haritası</a>
                <a href="egzersiz.php" class="nav-link"><i class="fa-solid fa-dumbbell"></i> Egzersizler</a>
                <a href="panel.php" class="nav-link"><i class="fa-solid fa-calendar-check"></i> Günlüğüm</a>
                <a href="iletisim.php" class="nav-link"><i class="fa-solid fa-envelope"></i> İletişim</a>
            </nav>
        </div>
        <div class="content-wrapper">