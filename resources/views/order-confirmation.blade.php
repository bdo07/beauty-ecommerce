@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-lg">
                <div class="card-body">
                    <h2 class="text-center mb-4 text-success"><i class="fas fa-check-circle me-2"></i>Merci pour votre commande !</h2>
                    <p class="text-center">Votre commande a été passée avec succès. Un email de confirmation vous a été envoyé.</p>
                    <hr>
                    <h5 class="mb-3">Détails de la commande</h5>
                    <ul class="list-group mb-3">
                        <li class="list-group-item"><strong>Numéro de commande :</strong> #{{ $order->id }}</li>
                        <li class="list-group-item"><strong>Nom :</strong> {{ $order->name }}</li>
                        <li class="list-group-item"><strong>Email :</strong> {{ $order->email }}</li>
                        <li class="list-group-item"><strong>Adresse :</strong> {{ $order->address }}</li>
                        <li class="list-group-item"><strong>Téléphone :</strong> {{ $order->phone }}</li>
                        <li class="list-group-item"><strong>Total :</strong> {{ number_format($order->total, 2) }} €</li>
                    </ul>
                    <h5 class="mt-4 mb-3">Articles commandés</h5>
                    <ul class="list-group mb-4">
                        @foreach($order->items as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>{{ $item->name }} <span class="badge bg-secondary ms-2">x{{ $item->quantity }}</span></span>
                                <span>{{ number_format($item->price * $item->quantity, 2) }} €</span>
                            </li>
                        @endforeach
                    </ul>
                    <div class="text-center">
                        <a href="/products" class="btn btn-primary"><i class="fas fa-arrow-left me-2"></i>Continuer vos achats</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 