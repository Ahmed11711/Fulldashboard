<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReviewController extends Controller
{
    public function index()
    {
        return response()->json(Review::with('product')->latest()->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'productId' => 'required|exists:products,id',
            'customerName' => 'required|string|max:255',
            'customerEmail' => 'required|email',
            'rating' => 'required|integer|min:1|max:5',
            'comment_en' => 'required|string',
            'comment_ar' => 'required|string',
            'status' => ['sometimes', Rule::in(['approved', 'pending', 'hidden'])],
        ]);

        $review = Review::create($data);
        return response()->json($review, 201);
    }

    public function show(Review $review)
    {
        return response()->json($review->load('product'));
    }

    public function update(Request $request, Review $review)
    {
        $data = $request->validate([
            'rating' => 'sometimes|integer|min:1|max:5',
            'comment_en' => 'sometimes|string',
            'comment_ar' => 'sometimes|string',
            'reply' => 'nullable|string',
            'status' => ['sometimes', Rule::in(['approved', 'pending', 'hidden'])],
        ]);

        $review->update($data);
        return response()->json($review);
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return response()->json(null, 204);
    }
}
