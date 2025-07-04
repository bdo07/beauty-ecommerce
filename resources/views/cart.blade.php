@extends('layouts.app')

@section('content')
<style>
:root {
    /* الألوان الأساسية */
    --primary: #4CAF50;         /* الأخضر النضاري */
    --primary-light: #81C784;   /* أخضر فاتح */
    --primary-dark: #388E3C;    /* أخضر داكن */
    
    /* الألوان الترابية والعضوية */
    --accent: #FFAB91;          /* برتقالي ترابي */
    --accent-secondary: #FFD54F; /* أصفر عضوي */
    --earth-brown: #8D6E63;     /* بني محايد */
    
    /* الألوان المحايدة */
    --warm-beige: #F5F5DC;      /* بيج دافئ */
    --light-brown: #D7CCC8;     /* بني فاتح */
    --organic-gray: #CFD8DC;    /* رمادي عضوي */
    
    /* ألوان النص والخلفيات */
    --text-dark: #263238;       /* رمادي داكن للنص */
    --text-light: #ECEFF1;      /* رمادي فاتح للنص */
    --bg-light: #F5F7FA;        /* خلفية فاتحة */
    --bg-dark: #121212;         /* خلفية داكنة */
    --card-bg: #FFFFFF;         /* خلفية البطاقات */
    --card-dark: #1E1E1E;       /* خلفية البطاقات في الوضع الداكن */
    
    /* الزوايا والظلال */
    --border-radius: 16px;
    --shadow-light: 0 4px 20px rgba(0,0,0,0.05);
    --shadow-dark: 0 4px 20px rgba(0,0,0,0.2);
}

body {
    font-family: 'Inter', sans-serif;
    background-color: var(--bg-light);
    color: var(--text-dark);
    transition: all 0.3s ease;
}

body.dark-mode {
    background-color: var(--bg-dark);
    color: var(--text-light);
}

/* Cart Container */
.cart-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem 1rem;
}

.cart-header {
    text-align: center;
    margin-bottom: 3rem;
}

.cart-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--primary-dark);
    margin-bottom: 1rem;
}

body.dark-mode .cart-title {
    color: var(--primary-light);
}

/* Cart Items - Horizontal Scroll */
.cart-items-container {
    display: flex;
    gap: 1.5rem;
    padding: 1rem 0;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    scroll-padding: 0 1rem;
    margin-bottom: 2rem;
}

.cart-items-container::-webkit-scrollbar {
    height: 6px;
}

.cart-items-container::-webkit-scrollbar-track {
    background: rgba(0,0,0,0.05);
    border-radius: 10px;
}

.cart-items-container::-webkit-scrollbar-thumb {
    background: var(--primary);
    border-radius: 10px;
}

.cart-item {
    scroll-snap-align: start;
    min-width: 320px;
    background: var(--card-bg);
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-light);
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    border: 1px solid var(--organic-gray);
}

body.dark-mode .cart-item {
    background: var(--card-dark);
    box-shadow: var(--shadow-dark);
    border-color: #444;
}

.cart-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(76, 175, 80, 0.15);
}

.cart-item-image {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 1.5rem;
    background: var(--warm-beige);
}

body.dark-mode .cart-item-image {
    background: #2a2a2a;
}

.cart-item-details {
    flex: 1;
}

.cart-item-name {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: var(--text-dark);
}

body.dark-mode .cart-item-name {
    color: var(--text-light);
}

.cart-item-price {
    font-size: 1rem;
    color: var(--primary-dark);
    margin-bottom: 1rem;
    font-weight: 500;
}

body.dark-mode .cart-item-price {
    color: var(--primary-light);
}

.quantity-control {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
}

.quantity-btn {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    background: rgba(76, 175, 80, 0.1);
    color: var(--primary);
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
}

.quantity-btn:hover {
    background: var(--primary);
    color: white;
}

.quantity-input {
    width: 50px;
    text-align: center;
    margin: 0 0.5rem;
    border: 1px solid var(--organic-gray);
    border-radius: 8px;
    padding: 0.25rem;
    background: var(--card-bg);
    color: var(--text-dark);
}

body.dark-mode .quantity-input {
    background: #2a2a2a;
    border-color: #444;
    color: white;
}

.cart-item-subtotal {
    font-weight: 600;
    margin: 1rem 0;
    font-size: 1.1rem;
    color: var(--earth-brown);
}

body.dark-mode .cart-item-subtotal {
    color: var(--accent);
}

.remove-btn {
    background: rgba(239, 83, 80, 0.1);
    color: #EF5350;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    width: 100%;
}

.remove-btn:hover {
    background: #EF5350;
    color: white;
}

/* Empty Cart */
.empty-cart {
    text-align: center;
    padding: 4rem 2rem;
    background: var(--card-bg);
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-light);
    max-width: 600px;
    margin: 0 auto;
    border: 1px solid var(--light-brown);
}

body.dark-mode .empty-cart {
    background: var(--card-dark);
    box-shadow: var(--shadow-dark);
    border-color: #444;
}

.empty-cart-icon {
    font-size: 4rem;
    color: var(--primary);
    margin-bottom: 1.5rem;
}

.empty-cart-title {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--primary-dark);
}

body.dark-mode .empty-cart-title {
    color: var(--primary-light);
}

.empty-cart-text {
    color: var(--text-dark);
    opacity: 0.8;
    margin-bottom: 2rem;
}

body.dark-mode .empty-cart-text {
    color: var(--text-light);
}

/* Summary Section */
.cart-summary {
    background: var(--card-bg);
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-light);
    padding: 2rem;
    margin-top: 2rem;
    border: 1px solid var(--organic-gray);
}

body.dark-mode .cart-summary {
    background: var(--card-dark);
    box-shadow: var(--shadow-dark);
    border-color: #444;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid var(--organic-gray);
}

body.dark-mode .summary-row {
    border-bottom: 1px solid rgba(255,255,255,0.05);
}

.summary-total {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--primary-dark);
}

body.dark-mode .summary-total {
    color: var(--primary-light);
}

.checkout-btn {
    width: 100%;
    padding: 1rem;
    background: var(--primary);
    color: white;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    margin-top: 1.5rem;
}

.checkout-btn:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(76, 175, 80, 0.3);
}

/* Responsive */
@media (max-width: 768px) {
    .cart-title {
        font-size: 2rem;
    }
    
    .cart-item {
        min-width: 280px;
    }
    
    .cart-item-image {
        height: 150px;
    }
}

@media (max-width: 576px) {
    .cart-container {
        padding: 1.5rem 0.5rem;
    }
    
    .cart-header {
        margin-bottom: 2rem;
    }
    
    .cart-title {
        font-size: 1.8rem;
    }
    
    .empty-cart {
        padding: 3rem 1.5rem;
    }
    
    .empty-cart-icon {
        font-size: 3.5rem;
    }
}
</style>

<div class="cart-container">
    <div class="cart-header">
        <h1 class="cart-title">Votre Panier</h1>
        <p class="text-muted">Revoyez vos articles avant de passer commande</p>
    </div>

    @if(count($cart) === 0)
        <div class="empty-cart">
            <div class="empty-cart-icon">
                <i class="fas fa-shopping-basket"></i>
            </div>
            <h3 class="empty-cart-title">Votre panier est vide</h3>
            <p class="empty-cart-text">Commencez votre shopping pour découvrir nos produits naturels et éco-responsables</p>
            <a href="/products" class="btn btn-primary btn-lg" style="background-color: var(--primary); border-color: var(--primary-dark);">
                <i class="fas fa-arrow-left me-2"></i>Explorer les produits
            </a>
        </div>
    @else
        <div class="cart-items-container">
            @foreach($cart as $item)
            <div class="cart-item">
                <img src="https://source.unsplash.com/random/400x300/?cosmetic,{{ urlencode($item['name']) }}" alt="{{ $item['name'] }}" class="cart-item-image">
                <div class="cart-item-details">
                    <h3 class="cart-item-name">{{ $item['name'] }}</h3>
                    <div class="cart-item-price">{{ number_format($item['price'], 2) }} €</div>
                    
                    <form action="{{ route('cart.update') }}" method="POST" class="quantity-control">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                        <button type="button" class="quantity-btn minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown(); this.parentNode.submit()">
                            <i class="fas fa-minus"></i>
                        </button>
                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="quantity-input">
                        <button type="button" class="quantity-btn plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp(); this.parentNode.submit()">
                            <i class="fas fa-plus"></i>
                        </button>
                    </form>
                    
                    <div class="cart-item-subtotal">Sous-total : {{ number_format($item['price'] * $item['quantity'], 2) }} €</div>
                    
                    <form action="{{ route('cart.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                        <button type="submit" class="remove-btn">
                            <i class="fas fa-trash"></i> Retirer
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <div class="cart-summary">
            <div class="summary-row">
                <span>Sous-total</span>
                <span>{{ number_format($subtotal, 2) }} €</span>
            </div>
            <div class="summary-row">
                <span>Livraison</span>
                <span>Gratuite</span>
            </div>
            <div class="summary-row">
                <span class="summary-total">Total</span>
                <span class="summary-total">{{ number_format($total, 2) }} €</span>
            </div>
            
            <a href="{{ route('cart.checkout') }}" class="checkout-btn">
                <i class="fas fa-credit-card"></i> Passer la commande
            </a>
        </div>
    @endif
</div>

<script>
// Quantity input validation
document.querySelectorAll('.quantity-input').forEach(input => {
    input.addEventListener('change', function() {
        if (this.value < 1) this.value = 1;
        this.closest('form').submit();
    });
});

// Add animation to items when they come into view
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = 1;
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, { threshold: 0.1 });

document.querySelectorAll('.cart-item').forEach(item => {
    item.style.opacity = 0;
    item.style.transform = 'translateY(20px)';
    item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(item);
});
</script>
@endsection