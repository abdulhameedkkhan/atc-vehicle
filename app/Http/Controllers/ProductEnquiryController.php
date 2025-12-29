<?php

namespace App\Http\Controllers;

use App\Models\ProductEnquiry;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductEnquiryController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'message' => 'nullable|string|max:1000',
        ]);

        ProductEnquiry::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'message' => $request->message,
            'status' => 'pending',
        ]);

        return redirect()->route('products.show', $product->hashid)
            ->with('success', 'Your enquiry has been submitted successfully!');
    }

    public function index()
    {
        $enquiries = ProductEnquiry::where('user_id', Auth::id())
            ->with('product')
            ->latest()
            ->get();

        return view('enquiries.index', compact('enquiries'));
    }

    public function show(ProductEnquiry $enquiry)
    {
        // Ensure user can only view their own enquiries
        if ($enquiry->user_id !== Auth::id()) {
            abort(403);
        }

        $enquiry->load('product');

        return view('enquiries.show', compact('enquiry'));
    }
}
