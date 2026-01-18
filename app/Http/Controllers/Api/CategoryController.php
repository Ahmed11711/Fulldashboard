<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\ApiResponseTrait;
use App\Traits\FileUploadPublicTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ApiResponseTrait, FileUploadPublicTrait;
    protected $collectionName = 'categories';
    protected $fileFields = ['image'];
    public function index()
    {
        return response()->json(Category::all());
    }

    public function show(Category $category)
    {
        return $this->successResponse($category);

        return response()->json($category);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'image' => 'nullable|file|image|max:5120',
        ]);

        $data = $this->handleFileUploads($request, $data, $this->fileFields, $this->collectionName);

        $category = Category::create($data);

        return response()->json($category, 201);
    }


    public function update(Request $request, Category $category)
    {
        $rules = [
            'name_en' => 'string',
            'name_ar' => 'string',
        ];

        if ($request->hasFile('image')) {
            $rules['image'] = 'nullable|file|image|max:5120';
        }

        $data = $request->validate($rules);
        $data = $this->handleFileUploads(
            $request,
            $data,
            $this->fileFields ?? ['image'],
            $this->collectionName ?? 'categories'
        );
        $category->update($data);
        return response()->json($category);
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(null, 204);
    }
}
