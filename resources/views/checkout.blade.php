@extends('layouts.app')

@section('content')
<style>
.checkout-bg {
    min-height: 100vh;
    background: linear-gradient(135deg, #f8fafc 0%, #fceabb 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}
body.dark-mode .checkout-bg {
    background: linear-gradient(135deg, #232526 0%, #414345 100%);
}
.checkout-card {
    border-radius: 1.5rem;
    box-shadow: 0 8px 32px rgba(44,62,80,0.10);
    background: var(--card-bg, #fff);
    padding: 2.5rem 2rem;
    max-width: 700px;
    width: 100%;
}
body.dark-mode .checkout-card {
    background: #23272b;
    color: #f8fafc;
}
.checkout-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-align: center;
    color: #764ba2;
}
body.dark-mode .checkout-title {
    color: #f8fafc;
}
.order-summary {
    background: var(--card-bg, #fff);
    border-radius: 1rem;
    box-shadow: 0 2px 12px rgba(44,62,80,0.06);
    padding: 1.5rem;
    margin-bottom: 2rem;
}
body.dark-mode .order-summary {
    background: #23272b;
    color: #f8fafc;
}
.form-control, .form-control:focus {
    border-radius: 0.75rem;
    box-shadow: none;
    border-color: #e0e0e0;
}
body.dark-mode .form-control, body.dark-mode .form-control:focus {
    background: #23272b;
    color: #f8fafc;
    border-color: #414345;
}
.input-group-text {
    background: #f8fafc;
    border-radius: 0.75rem 0 0 0.75rem;
    border-color: #e0e0e0;
}
body.dark-mode .input-group-text {
    background: #23272b;
    color: #f8fafc;
    border-color: #414345;
}
.checkout-btn {
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: #fff;
    font-weight: 600;
    border-radius: 0.75rem;
    padding: 0.75rem;
    font-size: 1.1rem;
    transition: background 0.3s, box-shadow 0.3s;
    box-shadow: 0 4px 16px rgba(102,126,234,0.10);
}
.checkout-btn:hover {
    background: linear-gradient(45deg, #5a6fd8, #6a4190);
    box-shadow: 0 8px 32px rgba(102,126,234,0.15);
}
@media (max-width: 768px) {
    .checkout-card {
        padding: 1.5rem 0.5rem;
    }
    .order-summary {
        padding: 1rem;
    }
}
</style>
<div class="checkout-bg">
    <div class="checkout-card">
        <div class="checkout-title">
            <i class="fas fa-credit-card me-2"></i>Caisse
        </div>
        @if(count($cart) === 0)
            <div class="cart-empty text-center">
                <i class="fas fa-shopping-cart fa-3x mb-3"></i>
                <h4>Votre panier est vide</h4>
                <p>Ajoutez des produits pour commencer vos achats.</p>
                <a href="/products" class="btn btn-primary mt-3"><i class="fas fa-arrow-left me-2"></i>Voir les produits</a>
            </div>
        @else
            <div class="order-summary mb-4">
                <h5 class="mb-3"><i class="fas fa-list me-2"></i>Résumé de la commande</h5>
                <ul class="list-group mb-3">
                    @foreach($cart as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $item['name'] }} <span class="badge bg-secondary ms-2">x{{ $item['quantity'] }}</span></span>
                            <span>{{ number_format($item['price'] * $item['quantity'], 2) }} €</span>
                        </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                        Total
                        <span>{{ number_format($total, 2) }} €</span>
                    </li>
                </ul>
            </div>
            <form action="{{ route('cart.processCheckout') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
                @csrf
                <h5 class="mb-3"><i class="fas fa-truck me-2"></i>Informations de livraison</h5>
                <div class="mb-3">
                    <label for="name" class="form-label">Nom complet</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Adresse</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Téléphone</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                </div>
                <button type="submit" class="btn checkout-btn w-100 mt-3">
                    <i class="fas fa-check me-2"></i>Confirmer la commande
                </button>
            </form>
        @endif
    </div>
</div>
@endsection   