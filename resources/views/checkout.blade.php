@extends('layouts.app')

@section('content')
<style>
.checkout-summary {
    background: var(--card-bg);
    border-radius: 16px;
    box-shadow: 0 4px 16px rgba(44,62,80,0.08);
    padding: 2rem;
    margin-bottom: 2rem;
}
</style>
<div class="container py-5">
    <h1 class="mb-4 text-center">Caisse</h1>
    @if(count($cart) === 0)
        <div class="cart-empty text-center">
            <i class="fas fa-shopping-cart fa-3x mb-3"></i>
            <h4>Votre panier est vide</h4>
            <p>Ajoutez des produits pour commencer vos achats.</p>
            <a href="/products" class="btn btn-primary mt-3"><i class="fas fa-arrow-left me-2"></i>Voir les produits</a>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="checkout-summary mb-4">
                    <h4 class="mb-3">Résumé de la commande</h4>
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
                <form action="#" method="POST" class="bg-white p-4 rounded shadow-sm">
                    @csrf
                    <h5 class="mb-3">Informations de livraison</h5>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom complet</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Téléphone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg w-100"><i class="fas fa-check me-2"></i>Confirmer la commande</button>
                </form>
            </div>
        </div>
    @endif
</div>
@endsection 