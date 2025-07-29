<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::query()->with('images');

        // Apply filters
        if ($request->has('price_min')) {
            $query->where('price', '>=', $request->input('price_min'));
        }
        if ($request->has('price_max')) {
            $query->where('price', '<=', $request->input('price_max'));
        }
        if ($request->has('state')) {
            $query->where('state', $request->input('state'));
        }
        if ($request->has('bedrooms')) {
            $query->where('bedrooms', $request->input('bedrooms'));
        }

        $properties = $query->get();

        return Inertia::render('Properties/Index', [
            'properties' => $properties,
            'filters' => $request->only(['price_min', 'price_max', 'state', 'bedrooms']),
        ]);
    }
}