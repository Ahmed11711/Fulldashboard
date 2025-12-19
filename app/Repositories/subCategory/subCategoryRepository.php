<?php

namespace App\Repositories\subCategory;

use App\Repositories\subCategory\subCategoryRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\subCategory;

class subCategoryRepository extends BaseRepository implements subCategoryRepositoryInterface
{
    public function __construct(subCategory $model)
    {
        parent::__construct($model);
    }
}
