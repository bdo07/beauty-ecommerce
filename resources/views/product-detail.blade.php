<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Beauty Eco</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --main-bg: linear-gradient(135deg, #f8fafc 0%, #fceabb 100%);
            --card-bg: #fff;
            --text-main: #2c3e50;
            --text-muted: #7f8c8d;
            --navbar-bg: #fff;
            --footer-bg: #fff;
            --shadow: 0 8px 25px rgba(0,0,0,0.1);
            --category-bg: linear-gradient(45deg, #ff6b6b, #ee5a24);
            --price-bg: linear-gradient(45deg, #2ed573, #1e90ff);
        }
        body {
            background: var(--main-bg);
            color: var(--text-main);
            transition: background 0.4s, color 0.4s;
            min-height: 100vh;
        }
        .product-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 3rem 0 2rem 0;
            border-radius: 0 0 2rem 2rem;
            margin-bottom: 2rem;
        }
        .product-image {
            width: 100%;
            max-width: 400px;
            height: 400px;
            object-fit: cover;
            border-radius: 2rem;
            box-shadow: 0 8px 32px rgba(0,0,0,0.12);
            background: #f8fafc;
        }
        .category-badge {
            background: linear-gradient(45deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .price-tag {
            background: linear-gradient(45deg, #2ed573, #1e90ff);
            color: white;
            padding: 0.7rem 1.5rem;
            border-radius: 30px;
            font-weight: bold;
            font-size: 1.3rem;
            box-shadow: 0 4px 15px rgba(46, 213, 115, 0.3);
        }
        .stock-badge {
            background: rgba(46, 213, 115, 0.95);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 15px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-left: 1rem;
        }
        .stock-badge.out-of-stock {
            background: rgba(255, 107, 107, 0.95);
        }
        .btn-primary {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            border-radius: 30px;
            padding: 0.8rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #5a6fd8, #6a4190);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }
        .back-link {
            color: #764ba2;
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 2rem;
            display: inline-block;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        .card, .product-hero, .footer {
            background: var(--card-bg) !important;
            color: var(--text-main);
            transition: background 0.4s, color 0.4s;
        }
        .navbar, .bg-white, .footer {
            background: var(--navbar-bg) !important;
            transition: background 0.4s;
        }
        .category-badge, .price-tag {
            transition: background 0.4s, color 0.4s;
        }
        body.dark-mode {
            --main-bg: linear-gradient(135deg, #232526 0%, #414345 100%);
            --card-bg: #23272b;
            --text-main: #f8fafc;
            --text-muted: #b0b3b8;
            --navbar-bg: #18191a;
            --footer-bg: #18191a;
            --shadow: 0 8px 25px rgba(0,0,0,0.4);
            --category-bg: linear-gradient(45deg, #ff6b6b, #ee5a24);
            --price-bg: linear-gradient(45deg, #2ed573, #1e90ff);
        }
        body.dark-mode .navbar, body.dark-mode .bg-white, body.dark-mode .footer {
            background: var(--navbar-bg) !important;
        }
        body.dark-mode .card, body.dark-mode .product-hero, body.dark-mode .footer {
            background: var(--card-bg) !important;
            color: var(--text-main);
        }
        body.dark-mode .category-badge {
            background: var(--category-bg);
            color: #fff;
        }
        body.dark-mode .price-tag {
            background: var(--price-bg);
            color: #fff;
        }
        body.dark-mode .product-title, body.dark-mode .product-description {
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
        body.dark-mode .stock-badge {
            background: rgba(46, 213, 115, 0.85);
            color: #fff;
        }
        body.dark-mode .stock-badge.out-of-stock {
            background: rgba(255, 107, 107, 0.85);
        }
        body.dark-mode .form-control, body.dark-mode .form-select {
            background: #23272b;
            color: #f8fafc;
            border-color: #414345;
        }
        body.dark-mode .form-control:focus, body.dark-mode .form-select:focus {
            background: #23272b;
            color: #f8fafc;
            border-color: #667eea;
        }
        body.dark-mode .input-group-text {
            background: #23272b;
            color: #f8fafc;
        }
        body.dark-mode .footer {
            background: var(--footer-bg) !important;
            color: #f8fafc;
        }
    </style>
</head>
<body>
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
                    <li class="nav-item"><a class="nav-link active fw-bold" href="/products">Produits</a></li>
                    <li class="nav-item ms-3">
                        <button id="darkModeToggle" class="btn btn-outline-secondary btn-sm" title="Basculer le mode sombre" style="border-radius: 50%; width: 38px; height: 38px;">
                            <i class="fas fa-moon"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb bg-transparent px-0">
            <li class="breadcrumb-item"><a href="/">Accueil</a></li>
            <li class="breadcrumb-item"><a href="/products">Produits</a></li>
            @if($product->category)
                <li class="breadcrumb-item"><a href="/products?category={{ urlencode($product->category->name) }}">{{ $product->category->name }}</a></li>
            @endif
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>

    <section class="product-hero">
        <div class="container">
            <a href="/products" class="back-link"><i class="fas fa-arrow-left me-2"></i>Retour à la boutique</a>
            <div class="row align-items-center mt-4">
                <div class="col-md-5 text-center mb-4 mb-md-0">
                    <img src="https://source.unsplash.com/600x600/?cosmetics,{{ urlencode($product->name) }}" alt="{{ $product->name }}" class="product-image">
                </div>
                <div class="col-md-7">
                    <h1 class="display-5 fw-bold mb-3">{{ $product->name }}</h1>
                    @if($product->category)
                        <span class="category-badge">{{ $product->category->name }}</span>
                    @endif
                    <div class="d-flex align-items-center my-3">
                        <span class="price-tag">{{ number_format($product->price, 2) }} €</span>
                        @if($product->stock > 0)
                            <span class="stock-badge ms-3"><i class="fas fa-check me-1"></i>En stock</span>
                        @else
                            <span class="stock-badge out-of-stock ms-3"><i class="fas fa-times me-1"></i>Rupture</span>
                        @endif
                    </div>
                    <p class="fs-5 text-white-50 mb-4">{{ $product->description }}</p>
                    <div class="mb-4">
                        <span class="me-3"><i class="fas fa-box"></i> Stock: {{ $product->stock }}</span>
                        <span class="me-3"><i class="fas fa-star text-warning"></i> 4.5/5</span>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('cart.add') }}" method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-shopping-cart me-2"></i>Ajouter au panier</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Floating Back Button -->
    <a href="/products" class="btn btn-outline-primary position-fixed" style="bottom: 30px; left: 30px; z-index: 1000; border-radius: 30px; box-shadow: 0 4px 15px rgba(102,126,234,0.15);">
        <i class="fas fa-arrow-left me-2"></i>Retour aux produits
    </a>

    <footer class="bg-white text-center py-4 mt-5 shadow-sm">
        <div class="container">
            <div class="mb-2">
                <a href="/" class="mx-2 text-decoration-none text-secondary">Accueil</a>|
                <a href="/products" class="mx-2 text-decoration-none text-secondary">Produits</a>|
                <a href="/login" class="mx-2 text-decoration-none text-secondary">Connexion</a>|
                <a href="/register" class="mx-2 text-decoration-none text-secondary">Créer un compte</a>
            </div>
            <p class="mb-0">&copy; {{ date('Y') }} Beauty Eco. Tous droits réservés.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
</body>
</html> 