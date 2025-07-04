<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class CartController extends Controller
{
    // View cart
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = collect($cart)->sum(function($item) {
            return $item['price'] * $item['quantity'];
        });
        $subtotal = $total; // For now, subtotal = total
        return view('cart', compact('cart', 'total', 'subtotal'));
    }

    // Add to cart
    public function add(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('register')->with('error', 'Vous devez créer un compte pour ajouter un produit au panier.');
        }
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
        ]);
        $product = Product::findOrFail($request->product_id);
        $quantity = $request->input('quantity', 1);
        $cart = session()->get('cart', []);
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => '', // Add image if available
                'quantity' => $quantity,
            ];
        }
        session(['cart' => $cart]);
        return redirect()->back()->with('success', 'Produit ajouté au panier!');
    }

    // Update quantity
    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
        $cart = session()->get('cart', []);
        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity'] = $request->quantity;
            session(['cart' => $cart]);
        }
        return redirect()->back()->with('success', 'Quantité mise à jour!');
    }

    // Remove item
    public function remove(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);
        $cart = session()->get('cart', []);
        if (isset($cart[$request->product_id])) {
            unset($cart[$request->product_id]);
            session(['cart' => $cart]);
        }
        return redirect()->back()->with('success', 'Produit retiré du panier!');
    }

    // Show checkout page
    public function checkout()
    {
        $cart = session()->get('cart', []);
        $total = collect($cart)->sum(function($item) {
            return $item['price'] * $item['quantity'];
        });
        return view('checkout', compact('cart', 'total'));
    }

    public function processCheckout(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:30',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.checkout')->with('error', 'Votre panier est vide.');
        }

        $total = collect($cart)->sum(function($item) {
            return $item['price'] * $item['quantity'];
        });

        $order = new Order();
        $order->user_id = auth()->check() ? auth()->id() : null;
        $order->name = $validated['name'];
        $order->email = $validated['email'];
        $order->address = $validated['address'];
        $order->phone = $validated['phone'];
        $order->total = $total;
        $order->save();

        foreach ($cart as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['id'];
            $orderItem->name = $item['name'];
            $orderItem->price = $item['price'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->save();
        }

        // Send confirmation email
        \Mail::to($order->email)->send(new \App\Mail\OrderConfirmationMail($order->load('items')));

        session()->forget('cart');
        return redirect()->route('order.confirmation', ['order' => $order->id]);
    }

    public function orderConfirmation($orderId)
    {
        $order = \App\Models\Order::with('items')->findOrFail($orderId);
        return view('order-confirmation', compact('order'));
    }
} 