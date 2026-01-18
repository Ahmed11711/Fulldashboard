<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Category;
use App\Models\Product;
use App\Traits\ApiResponseTrait;
use Google\Service\Blogger\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FrontController extends Controller
{
    use ApiResponseTrait;
    public function categories()
    {
        $categories = Category::with('products')->get();
        return response()->json($categories);
    }

    public function products()
    {
        return response()->json(Product::all());
    }
    public function productDetails(Product $product)
    {
        return response()->json($product);
    }

    public function createOrder(Request $request)
    {
        $data = $request->all();
        Log::alert("Sss", [$data]);
    }

    public function articles()
    {
        return response()->json(Blogs::all());
    }

    public function articleDetails($article)
    {
        // جلب المقال بالـ id
        $oneBlog = Blogs::where('id', $article)->first();

        if (!$oneBlog) {
            return response()->json(['error' => 'Article not found'], 404);
        }

        return response()->json($oneBlog);
    }
}
