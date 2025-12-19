<?php

namespace App\Http\Controllers\Admin\subCategory;

use App\Repositories\subCategory\subCategoryRepositoryInterface;
use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\subCategory\subCategoryStoreRequest;
use App\Http\Requests\Admin\subCategory\subCategoryUpdateRequest;
use App\Http\Resources\Admin\subCategory\subCategoryResource;

class subCategoryController extends BaseController
{
    public function __construct(subCategoryRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'subCategory',
            fileFields: ['image']
        );

        $this->storeRequestClass = subCategoryStoreRequest::class;
        $this->updateRequestClass = subCategoryUpdateRequest::class;
        $this->resourceClass = subCategoryResource::class;
    }
}
