@extends('layouts.app')

@section('content')
<style>
.confirm-bg {
    min-height: 100vh;
    background: linear-gradient(135deg, #f8fafc 0%, #e0c3fc 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}
body.dark-mode .confirm-bg {
    background: linear-gradient(135deg, #232526 0%, #414345 100%);
}
.confirm-card {
    border-radius: 1.5rem;
    box-shadow: 0 8px 32px rgba(44,62,80,0.10);
    background: var(--card-bg, #fff);
    padding: 2.5rem 2rem;
    max-width: 600px;
    width: 100%;
}
body.dark-mode .confirm-card {
    background: #23272b;
    color: #f8fafc;
}
.confirm-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-align: center;
    color: #38c172;
}
body.dark-mode .confirm-title {
    color: #38c172;
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
</style>
<div class="confirm-bg">
    <div class="confirm-card">
        <div class="confirm-title">
            <i class="fas fa-check-circle me-2"></i>Merci pour votre commande !
        </div>
        <p class="text-center mb-4">Votre commande a été passée avec succès.<br>Un email de confirmation vous a été envoyé.</p>
        <div class="order-summary mb-4">
            <h5 class="mb-3"><i class="fas fa-receipt me-2"></i>Détails de la commande</h5>
            <ul class="list-group mb-3">
                <li class="list-group-item"><strong>Numéro :</strong> #{{ $order->id }}</li>
                <li class="list-group-item"><strong>Nom :</strong> {{ $order->name }}</li>
                <li class="list-group-item"><strong>Email :</strong> {{ $order->email }}</li>
                <li class="list-group-item"><strong>Adresse :</strong> {{ $order->address }}</li>
                <li class="list-group-item"><strong>Téléphone :</strong> {{ $order->phone }}</li>
                <li class="list-group-item"><strong>Total :</strong> {{ number_format($order->total, 2) }} €</li>
            </ul>
            <h6 class="mt-3 mb-2">Articles commandés :</h6>
            <ul class="list-group">
                @foreach($order->items as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>{{ $item->name }} <span class="badge bg-secondary ms-2">x{{ $item->quantity }}</span></span>
                        <span>{{ number_format($item->price * $item->quantity, 2) }} €</span>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="text-center">
            <a href="/products" class="btn btn-success"><i class="fas fa-arrow-left me-2"></i>Continuer vos achats</a>
        </div>
    </div>
</div>
@endsection 