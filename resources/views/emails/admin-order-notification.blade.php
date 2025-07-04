<x-mail::message>
# Nouvelle commande reçue

Une nouvelle commande vient d'être passée sur Beauty Eco.

**Numéro de commande :** #{{ $order->id }}  
**Nom :** {{ $order->name }}  
**Email :** {{ $order->email }}  
**Adresse :** {{ $order->address }}  
**Téléphone :** {{ $order->phone }}  
**Total :** {{ number_format($order->total, 2) }} €

---

## Articles commandés
@foreach($order->items as $item)
- **{{ $item->name }}** x{{ $item->quantity }} — {{ number_format($item->price * $item->quantity, 2) }} €
@endforeach

<x-mail::button :url="url('/admin/orders')">
Voir dans l'administration
</x-mail::button>

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
