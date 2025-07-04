<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Produits - Beauty Eco</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --main-bg: linear-gradient(135deg, #f8fafc 0%, #fceabb 100%);
            --card-bg: #fff;
            --text-main: #2c3e50;
            --text-muted: #7f8c8d;
            --navbar-bg: #fff;
            --footer-bg: #fff;
            --sidebar-bg: #fff;
            --shadow: 0 8px 25px rgba(0,0,0,0.1);
            --overlay-bg: rgba(102,126,234,0.85);
            --category-bg: linear-gradient(45deg, #ff6b6b, #ee5a24);
            --price-bg: linear-gradient(45deg, #2ed573, #1e90ff);
        }
        body {
            background: var(--main-bg);
            color: var(--text-main);
            transition: background 0.4s, color 0.4s;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 5rem 0;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
        }
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }
        .hero-section .container {
            position: relative;
            z-index: 1;
        }
        .product-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            background: white;
            position: relative;
        }
        .product-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        .product-image {
            height: 280px;
            object-fit: cover;
            background: linear-gradient(45deg, #f0f0f0, #e0e0e0);
            transition: transform 0.3s ease;
        }
        .product-card:hover .product-image {
            transform: scale(1.05);
        }
        .category-badge {
            background: linear-gradient(45deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 25px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .price-tag {
            background: linear-gradient(45deg, #2ed573, #1e90ff);
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 30px;
            font-weight: bold;
            font-size: 1.1rem;
            box-shadow: 0 4px 15px rgba(46, 213, 115, 0.3);
        }
        .filter-section {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 3rem;
            border: 1px solid rgba(255,255,255,0.2);
        }
        .search-box {
            border-radius: 30px;
            border: 2px solid #e9ecef;
            padding: 1rem 1.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        .search-box:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.3rem rgba(102, 126, 234, 0.25);
            transform: scale(1.02);
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
        .btn-outline-secondary {
            border-radius: 25px;
            padding: 0.5rem 1.5rem;
            transition: all 0.3s ease;
        }
        .btn-outline-secondary:hover {
            transform: translateY(-1px);
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.8rem;
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .stock-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(46, 213, 115, 0.95);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
            backdrop-filter: blur(10px);
        }
        .stock-badge.out-of-stock {
            background: rgba(255, 107, 107, 0.95);
        }
        .product-stats {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
        .rating {
            color: #ffc107;
        }
        .product-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #2c3e50;
        }
        .product-description {
            color: #7f8c8d;
            font-size: 0.9rem;
            line-height: 1.5;
        }
        .stats-section {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        .stat-card {
            text-align: center;
            padding: 1.5rem;
            border-radius: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            margin-bottom: 1rem;
        }
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        .stat-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }
        .floating-cart {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
            z-index: 1000;
        }
        .floating-cart:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.6);
        }
        .loading-spinner {
            display: none;
            text-align: center;
            padding: 2rem;
        }
        .no-products {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        .no-products i {
            font-size: 4rem;
            color: #bdc3c7;
            margin-bottom: 1rem;
        }
        .product-card .product-overlay-actions {
            pointer-events: none;
        }
        .product-card:hover .product-overlay-actions {
            opacity: 1;
            pointer-events: auto;
        }
        .card, .stats-section, .filter-section, .footer, .sidebar, .product-card {
            background: var(--card-bg) !important;
            color: var(--text-main);
            transition: background 0.4s, color 0.4s;
        }
        .navbar, .bg-white, .footer {
            background: var(--navbar-bg) !important;
            transition: background 0.4s;
        }
        .sidebar {
            background: var(--sidebar-bg) !important;
        }
        .breadcrumb, .category-badge, .price-tag {
            transition: background 0.4s, color 0.4s;
        }
        body.dark-mode {
            --main-bg: linear-gradient(135deg, #232526 0%, #414345 100%);
            --card-bg: #23272b;
            --text-main: #f8fafc;
            --text-muted: #b0b3b8;
            --navbar-bg: #18191a;
            --footer-bg: #18191a;
            --sidebar-bg: #23272b;
            --shadow: 0 8px 25px rgba(0,0,0,0.4);
            --overlay-bg: rgba(46,213,115,0.85);
            --category-bg: linear-gradient(45deg, #ff6b6b, #ee5a24);
            --price-bg: linear-gradient(45deg, #2ed573, #1e90ff);
        }
        body.dark-mode .navbar, body.dark-mode .bg-white, body.dark-mode .footer {
            background: var(--navbar-bg) !important;
        }
        body.dark-mode .card, body.dark-mode .stats-section, body.dark-mode .filter-section, body.dark-mode .footer, body.dark-mode .sidebar, body.dark-mode .product-card {
            background: var(--card-bg) !important;
            color: var(--text-main);
        }
        body.dark-mode .breadcrumb {
            background: transparent;
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
        body.dark-mode .product-overlay-actions {
            background: rgba(36, 37, 38, 0.92) !important;
        }
        body.dark-mode .stat-card {
            background: linear-gradient(135deg, #232526 0%, #414345 100%);
            color: #f8fafc;
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
    <!-- Navigation -->
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
                    <li class="nav-item position-relative mx-2">
                        <a href="#" class="nav-link position-relative">
                            <i class="fas fa-shopping-cart fa-lg"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:0.7rem;">0</span>
                        </a>
                    </li>
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i>{{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#">Mon profil</a></li>
                            <li><a class="dropdown-item" href="#">Mes commandes</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Déconnexion</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item"><a class="nav-link" href="/login">Connexion</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register">Créer un compte</a></li>
                    @endauth
                    <li class="nav-item ms-3">
                        <button id="darkModeToggle" class="btn btn-outline-secondary btn-sm" title="Basculer le mode sombre" style="border-radius: 50%; width: 38px; height: 38px;">
                            <i class="fas fa-moon"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Breadcrumbs -->
    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent px-0">
                <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Produits</li>
                @if(request('category'))
                    <li class="breadcrumb-item active" aria-current="page">{{ request('category') }}</li>
                @endif
            </ol>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <!-- Sticky Category Sidebar (desktop) -->
            <aside class="col-lg-3 d-none d-lg-block">
                <div class="sticky-top" style="top: 100px;">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="mb-3"><i class="fas fa-list me-2"></i>Catégories</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2">
                                    <a href="/products" class="nav-link px-0 {{ request('category') ? '' : 'active fw-bold text-primary' }}">Toutes</a>
                                </li>
                                @foreach($categories as $category)
                                    <li class="nav-item mb-2">
                                        <a href="/products?category={{ urlencode($category->name) }}" class="nav-link px-0 {{ request('category') == $category->name ? 'active fw-bold text-primary' : '' }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
            <!-- Main Product Grid -->
            <main class="col-lg-9">
                <!-- Pills for mobile/tablet -->
                <div class="d-lg-none mb-4">
                    <div class="d-flex flex-wrap gap-2 justify-content-center">
                        <a href="/products" class="btn btn-outline-primary btn-sm px-4 {{ request('category') ? '' : 'active' }}">Toutes</a>
                        @foreach($categories as $category)
                            <a href="/products?category={{ urlencode($category->name) }}" class="btn btn-outline-primary btn-sm px-4 {{ request('category') == $category->name ? 'active' : '' }}">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>
                <!-- Stats Section -->
                <div class="stats-section">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="stat-card">
                                <div class="stat-number">{{ $products->total() }}</div>
                                <div class="stat-label">Produits</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-card">
                                <div class="stat-number">{{ $categories->count() }}</div>
                                <div class="stat-label">Catégories</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-card">
                                <div class="stat-number">{{ $products->where('stock', '>', 0)->count() }}</div>
                                <div class="stat-label">En Stock</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-card">
                                <div class="stat-number">{{ number_format($products->avg('price'), 2) }}€</div>
                                <div class="stat-label">Prix Moyen</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters Section -->
                <div class="filter-section">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <h5 class="mb-3"><i class="fas fa-filter me-2"></i>Filtres</h5>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="categoryFilter">
                                <option value="">Toutes les catégories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="sortFilter">
                                <option value="latest">Plus récents</option>
                                <option value="price_low">Prix croissant</option>
                                <option value="price_high">Prix décroissant</option>
                                <option value="name">Nom A-Z</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-outline-secondary w-100" onclick="resetFilters()">
                                <i class="fas fa-refresh me-2"></i>Réinitialiser
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Loading Spinner -->
                <div class="loading-spinner" id="loadingSpinner">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Chargement...</span>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="row g-4" id="productsGrid">
                    @forelse($products as $product)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 product-item" 
                             data-category="{{ $product->category->name ?? '' }}"
                             data-name="{{ strtolower($product->name) }}"
                             data-price="{{ $product->price }}">
                            <div class="card product-card h-100 position-relative overflow-hidden">
                                <div class="position-relative">
                                    <img src="https://source.unsplash.com/400x400/?cosmetics,{{ urlencode($product->name) }}" 
                                         class="card-img-top product-image" 
                                         alt="{{ $product->name }}">
                                    @if($product->stock > 0)
                                        <span class="stock-badge">
                                            <i class="fas fa-check me-1"></i>En stock
                                        </span>
                                    @else
                                        <span class="stock-badge out-of-stock">
                                            <i class="fas fa-times me-1"></i>Rupture
                                        </span>
                                    @endif
                                    <!-- Animated Overlay Actions -->
                                    <div class="product-overlay-actions d-flex flex-column justify-content-center align-items-center w-100 h-100 position-absolute top-0 start-0" style="background:rgba(102,126,234,0.85);opacity:0;transition:opacity 0.3s;">
                                        <button class="btn btn-light mb-2 px-4" onclick="addToCart({{ $product->id }})"><i class="fas fa-shopping-cart me-2"></i>Ajouter au panier</button>
                                        <button class="btn btn-outline-light px-4" onclick="window.location.href='{{ route('product.detail', $product->id) }}'"><i class="fas fa-eye me-1"></i>Voir détails</button>
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <div class="mb-2">
                                        @if($product->category)
                                            <span class="category-badge">{{ $product->category->name }}</span>
                                        @endif
                                    </div>
                                    <h5 class="product-title">{{ $product->name }}</h5>
                                    <p class="product-description flex-grow-1">{{ Str::limit($product->description, 80) }}</p>
                                    <div class="product-stats">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span class="ms-1 text-muted">(4.5)</span>
                                        </div>
                                        <small class="text-muted">
                                            <i class="fas fa-box me-1"></i>{{ $product->stock }}
                                        </small>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <span class="fw-bold text-success">{{ number_format($product->price, 2) }} €</span>
                                        <form action="{{ route('cart.add') }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-shopping-cart me-1"></i>Ajouter au panier
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="no-products">
                                <i class="fas fa-box-open"></i>
                                <h4 class="text-muted">Aucun produit trouvé</h4>
                                <p class="text-muted">Essayez de modifier vos filtres de recherche.</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if($products->hasPages())
                    <div class="d-flex justify-content-center mt-5">
                        {{ $products->links() }}
                    </div>
                @endif
            </main>
        </div>
    </div>

    <!-- Floating Cart Button -->
    <a href="/cart" class="floating-cart">
        <i class="fas fa-shopping-cart"></i>
    </a>

    <!-- Footer -->
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript for filtering -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const categoryFilter = document.getElementById('categoryFilter');
            const sortFilter = document.getElementById('sortFilter');
            const productsGrid = document.getElementById('productsGrid');
            const productItems = document.querySelectorAll('.product-item');
            const loadingSpinner = document.getElementById('loadingSpinner');

            function showLoading() {
                loadingSpinner.style.display = 'block';
                productsGrid.style.opacity = '0.5';
            }

            function hideLoading() {
                loadingSpinner.style.display = 'none';
                productsGrid.style.opacity = '1';
            }

            function filterProducts() {
                showLoading();
                
                setTimeout(() => {
                    const searchTerm = searchInput.value.toLowerCase();
                    const selectedCategory = categoryFilter.value;
                    const sortBy = sortFilter.value;

                    let visibleProducts = Array.from(productItems).filter(item => {
                        const name = item.dataset.name;
                        const category = item.dataset.category;
                        
                        const matchesSearch = name.includes(searchTerm);
                        const matchesCategory = !selectedCategory || category === selectedCategory;
                        
                        return matchesSearch && matchesCategory;
                    });

                    // Sort products
                    visibleProducts.sort((a, b) => {
                        switch(sortBy) {
                            case 'price_low':
                                return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
                            case 'price_high':
                                return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
                            case 'name':
                                return a.dataset.name.localeCompare(b.dataset.name);
                            default:
                                return 0;
                        }
                    });

                    // Hide all products first
                    productItems.forEach(item => item.style.display = 'none');
                    
                    // Show filtered and sorted products
                    visibleProducts.forEach(item => item.style.display = 'block');
                    
                    hideLoading();
                }, 300);
            }

            function resetFilters() {
                searchInput.value = '';
                categoryFilter.value = '';
                sortFilter.value = 'latest';
                filterProducts();
            }

            // Add event listeners
            searchInput.addEventListener('input', filterProducts);
            categoryFilter.addEventListener('change', filterProducts);
            sortFilter.addEventListener('change', filterProducts);

            // Global functions
            window.resetFilters = resetFilters;
            window.addToCart = function(productId) {
                alert('Produit ajouté au panier! (ID: ' + productId + ')');
            };
            window.showCart = function() {
                alert('Fonctionnalité panier à venir!');
            };
        });
    </script>

    <!-- Dark mode toggle logic -->
    <script>
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

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</body>
</html> 