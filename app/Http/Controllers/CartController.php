<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
} 