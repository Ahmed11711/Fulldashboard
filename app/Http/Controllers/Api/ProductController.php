<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Traits\ApiResponseTrait;
use App\Traits\FileUploadPublicTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ApiResponseTrait, FileUploadPublicTrait;
    protected array $fileFields = ['mainImage', 'additionalImages'];
    protected string $collectionName = 'products';
    public function index()
    {
        return response()->json(Product::all());
    }

    public function show(Product $product)
    {
        return $this->successResponse($product);
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'price' => 'required|numeric',
            'categoryId' => 'required|exists:categories,id',
            'stock' => 'required|integer',
            'sku' => 'required|string',
            'mainImage' => 'nullable|image|',
            'additionalImages' => 'nullable',
            'videoUrl' => 'nullable|string',
        ]);

        $data = $this->handleFileUploads($request, $data, $this->fileFields, $this->collectionName);
        $product = Product::create($data);
        return response()->json($product, 201);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name_en' => 'string',
            'name_ar' => 'string',
            'price' => 'numeric',
            'categoryId' => 'exists:categories,id',
            'stock' => 'integer',
            'sku' => 'string',
            'mainImage' => 'nullable|file|image|',
            'additionalImages' => 'nullable',
        ]);
        $data = $this->handleFileUploads($request, $data, $this->fileFields, $this->collectionName);

        $product->update($data);
        return response()->json($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, 204);
    }
}
