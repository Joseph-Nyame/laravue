<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
        ]);

        $user = auth()->user();

        $existingCartItem = Cart::where('property_id', $request->property_id)
            ->where('user_id', $user ? $user->id : null)
            ->first();

        if ($existingCartItem) {
            return back()->with('flash', [
                'message' => 'Property already in cart.',
                'status' => 'error',
            ]);
        }

        Cart::create([
            'user_id' => $user ? $user->id : null,
            'property_id' => $request->property_id,
        ]);

        return back()->with('flash', [
            'message' => 'Property added to cart!',
            'status' => 'success',
        ]);
    }
}