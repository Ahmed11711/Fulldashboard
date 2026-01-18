<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

trait FileUploadPublicTrait
{
    protected function handleFileUploads(Request $request, array $validated, array $fileFields, string $collectionName, $existingRecord = null): array
    {
        foreach ($fileFields as $field) {

            if ($request->hasFile($field)) {

                $files = $request->file($field);

                // لو حقل متعدد الملفات
                if (is_array($files)) {
                    $paths = [];
                    foreach ($files as $file) {
                        $filename = time() . '_' . $file->getClientOriginalName();
                        $path = $file->storeAs("uploads/{$collectionName}", $filename, 'public');
                        $paths[] = config('app.url') . '/storage/' . $path;
                    }

                    // حذف الملفات القديمة لو موجودة
                    if ($existingRecord && !empty($existingRecord->$field)) {
                        foreach (json_decode($existingRecord->$field, true) as $oldFile) {
                            Storage::disk('public')->delete('uploads/' . $collectionName . '/' . basename($oldFile));
                        }
                    }

                    $validated[$field] = json_encode($paths);
                } elseif ($files instanceof \Illuminate\Http\UploadedFile) { // ملف واحد
                    $file = $files;
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $path = $file->storeAs("uploads/{$collectionName}", $filename, 'public');

                    if ($existingRecord && !empty($existingRecord->$field)) {
                        Storage::disk('public')->delete('uploads/' . $collectionName . '/' . basename($existingRecord->$field));
                    }

                    $validated[$field] = config('app.url') . '/storage/' . $path;
                }
            } else {
                // لو ما فيش رفع جديد وده field موجود في edit
                if ($existingRecord && isset($existingRecord->$field)) {
                    $validated[$field] = $existingRecord->$field;
                }
            }
        }

        return $validated;
    }
}
