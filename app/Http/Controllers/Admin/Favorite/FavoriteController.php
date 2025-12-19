<?php

namespace App\Http\Controllers\Admin\Favorite;

use App\Repositories\Favorite\FavoriteRepositoryInterface;
use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\Favorite\FavoriteStoreRequest;
use App\Http\Requests\Admin\Favorite\FavoriteUpdateRequest;
use App\Http\Resources\Admin\Favorite\FavoriteResource;

class FavoriteController extends BaseController
{
    public function __construct(FavoriteRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'Favorite'
        );

        $this->storeRequestClass = FavoriteStoreRequest::class;
        $this->updateRequestClass = FavoriteUpdateRequest::class;
        $this->resourceClass = FavoriteResource::class;
    }
}
