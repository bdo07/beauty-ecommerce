<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Eco - Accueil</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #f8fafc 0%, #fceabb 100%);
        }
        .hero {
            background: url('https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=1200&q=80') center/cover no-repeat;
            color: #fff;
            min-height: 400px;
            display: flex;
            align-items: center;
            border-radius: 1rem;
        }
        .product-card {
            transition: box-shadow 0.2s;
        }
        .product-card:hover {
            box-shadow: 0 8px 32px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Beauty Eco</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/products">Produits</a></li>
                    <li class="nav-item"><a class="nav-link" href="/categories">Catégories</a></li>
                    <li class="nav-item"><a class="nav-link" href="/login">Connexion</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register">Créer un compte</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="container my-5">
        <div class="hero p-5 mb-5">
            <div>
                <h1 class="display-4 fw-bold">Sublimez votre beauté naturelle</h1>
                <p class="lead">Découvrez nos produits cosmétiques éco-responsables, pour une routine beauté saine et éclatante.</p>
                <a href="#products" class="btn btn-lg btn-warning fw-bold shadow">Voir les produits</a>
            </div>
        </div>

        <h2 class="mb-4 text-center" id="products">Nos Produits Vedettes</h2>
        <div class="row g-4 justify-content-center">
            @php
                $products = \App\Models\Product::with('category')->limit(6)->get();
            @endphp
            @forelse($products as $product)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100 border-0 shadow-sm">
                        <img src="https://source.unsplash.com/300x300/?cosmetics,{{ $product->name }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text small text-muted mb-1">{{ $product->category->name ?? 'Catégorie' }}</p>
                            <p class="card-text flex-grow-1">{{ Str::limit($product->description, 60) }}</p>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <span class="fw-bold text-success">{{ number_format($product->price, 2) }} €</span>
                                <a href="#" class="btn btn-sm btn-outline-primary">Ajouter au panier</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Aucun produit disponible pour le moment.</p>
                </div>
            @endforelse
        </div>

        <h2 class="mt-5 mb-4 text-center" id="categories">Catégories</h2>
        <div class="row g-4 justify-content-center">
            @php
                $categories = \App\Models\Category::limit(6)->get();
            @endphp
            @forelse($categories as $category)
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body">
                            <h6 class="fw-bold">{{ $category->name }}</h6>
                            <p class="small text-muted">{{ Str::limit($category->description, 40) }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Aucune catégorie disponible.</p>
                </div>
            @endforelse
        </div>
    </section>

    <footer class="bg-white text-center py-4 mt-5 shadow-sm">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Beauty Eco. Tous droits réservés.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
