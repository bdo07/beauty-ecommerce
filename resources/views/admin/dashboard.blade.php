@extends('layouts.app')

@section('content')
<style>
:root {
    --main-bg: linear-gradient(135deg, #f8fafc 0%, #fceabb 100%);
    --card-bg: #fff;
    --text-main: #2c3e50;
    --navbar-bg: #fff;
    --footer-bg: #fff;
}
body {
    background: var(--main-bg);
    color: var(--text-main);
    transition: background 0.4s, color 0.4s;
}
.card, .bg-white, .footer {
    background: var(--card-bg) !important;
    color: var(--text-main);
    transition: background 0.4s, color 0.4s;
}
.navbar, .bg-white, .footer {
    background: var(--navbar-bg) !important;
    transition: background 0.4s;
}
body.dark-mode {
    --main-bg: linear-gradient(135deg, #232526 0%, #414345 100%);
    --card-bg: #23272b;
    --text-main: #f8fafc;
    --navbar-bg: #18191a;
    --footer-bg: #18191a;
}
body.dark-mode .navbar, body.dark-mode .bg-white, body.dark-mode .footer {
    background: var(--navbar-bg) !important;
}
body.dark-mode .card, body.dark-mode .bg-white, body.dark-mode .footer {
    background: var(--card-bg) !important;
    color: var(--text-main);
}
body.dark-mode .nav-link, body.dark-mode .navbar-brand {
    color: #f8fafc !important;
}
body.dark-mode .btn-outline-secondary {
    color: #f8fafc;
    border-color: #b0b3b8;
}
body.dark-mode .btn-outline-secondary:hover {
    background: #23272b;
    color: #fff;
}
body.dark-mode .btn-primary {
    background: linear-gradient(45deg, #232526, #414345);
    color: #fff;
}
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top" id="mainNavbar">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="fas fa-spa me-2"></i>Beauty Eco
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link" href="/">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="/products">Produits</a></li>
                <li class="nav-item ms-3">
                    <button id="darkModeToggle" class="btn btn-outline-secondary btn-sm" title="Basculer le mode sombre" style="border-radius: 50%; width: 38px; height: 38px;">
                        <i class="fas fa-moon"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h1 class="card-title mb-4">Bienvenue sur le tableau de bord Admin</h1>
                    <div class="row text-center mb-4">
                        <div class="col-6 col-md-3 mb-3">
                            <div class="bg-primary text-white rounded p-3">
                                <div class="fs-3 fw-bold">{{ \App\Models\Product::count() }}</div>
                                <div>Produits</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="bg-success text-white rounded p-3">
                                <div class="fs-3 fw-bold">{{ \App\Models\Category::count() }}</div>
                                <div>Catégories</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="bg-warning text-white rounded p-3">
                                <div class="fs-3 fw-bold">{{ \App\Models\Order::count() }}</div>
                                <div>Commandes</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="bg-info text-white rounded p-3">
                                <div class="fs-3 fw-bold">{{ \App\Models\User::count() }}</div>
                                <div>Utilisateurs</div>
                            </div>
                        </div>
                    </div>
                    <p class="lead">Gérez vos produits, catégories, commandes et utilisateurs depuis ce tableau de bord.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="bg-white text-center py-4 mt-5 shadow-sm">
    <div class="container">
        <p class="mb-0">&copy; {{ date('Y') }} Beauty Eco. Tous droits réservés.</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
<script>
// Dark mode toggle logic
const darkModeToggle = document.getElementById('darkModeToggle');
const body = document.body;
const moonIcon = '<i class="fas fa-moon"></i>';
const sunIcon = '<i class="fas fa-sun"></i>';

function setDarkMode(enabled) {
    if (enabled) {
        body.classList.add('dark-mode');
        darkModeToggle.innerHTML = sunIcon;
        localStorage.setItem('darkMode', '1');
    } else {
        body.classList.remove('dark-mode');
        darkModeToggle.innerHTML = moonIcon;
        localStorage.setItem('darkMode', '0');
    }
}

darkModeToggle.addEventListener('click', function() {
    setDarkMode(!body.classList.contains('dark-mode'));
});

// On page load, set dark mode if user previously enabled it
if (localStorage.getItem('darkMode') === '1') {
    setDarkMode(true);
} else {
    setDarkMode(false);
}
</script>
@endsection 