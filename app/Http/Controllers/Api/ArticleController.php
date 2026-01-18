<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the articles.
     */
    public function index()
    {
        // Fetch all articles, ordered by newest first
        $articles = Article::latest()->get();

        // Map created_at to createdAt for frontend consistency
        $articles->transform(function ($article) {
            $article->createdAt = $article->created_at;
            return $article;
        });

        return response()->json($articles);
    }

    /**
     * Store a newly created article in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
            'featuredImage' => 'required|string',
            'author' => 'required|string|max:100',
            'videoUrl' => 'nullable|string|url',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation error', 'errors' => $validator->errors()], 422);
        }

        $article = Article::create($validator->validated());
        $article->createdAt = $article->created_at;

        return response()->json($article, 201);
    }

    /**
     * Display the specified article.
     */
    public function show(Article $article)
    {
        $article->createdAt = $article->created_at;
        return response()->json($article);
    }

    /**
     * Update the specified article in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validator = Validator::make($request->all(), [
            'title_en' => 'sometimes|string|max:255',
            'title_ar' => 'sometimes|string|max:255',
            'content_en' => 'sometimes|string',
            'content_ar' => 'sometimes|string',
            'featuredImage' => 'sometimes|string',
            'author' => 'sometimes|string|max:100',
            'videoUrl' => 'nullable|string|url',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation error', 'errors' => $validator->errors()], 422);
        }

        $article->update($validator->validated());
        $article->createdAt = $article->created_at;

        return response()->json($article);
    }

    /**
     * Remove the specified article from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return response()->json(null, 204);
    }
}
