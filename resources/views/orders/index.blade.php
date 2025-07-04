@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Mes commandes</h2>
    @if($orders->isEmpty())
        <div class="alert alert-info">Vous n'avez pas encore passé de commande.</div>
        <a href="/products" class="btn btn-primary"><i class="fas fa-arrow-left me-2"></i>Voir les produits</a>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Articles</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ number_format($order->total, 2) }} €</td>
                            <td><span class="badge bg-secondary">{{ $order->status ?? 'En attente' }}</span></td>
                            <td>
                                <ul class="list-unstyled mb-0">
                                    @foreach($order->items as $item)
                                        <li>{{ $item->name }} <span class="badge bg-secondary">x{{ $item->quantity }}</span></li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection 