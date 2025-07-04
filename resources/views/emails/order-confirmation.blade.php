<x-mail::message>
# Merci pour votre commande !

Votre commande a été passée avec succès. Voici le récapitulatif :

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

<x-mail::button :url="url('/products')">
Continuer vos achats
</x-mail::button>

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
