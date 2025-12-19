<?php

namespace App\Repositories\Favorite;

use App\Repositories\Favorite\FavoriteRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\Favorite;

class FavoriteRepository extends BaseRepository implements FavoriteRepositoryInterface
{
    public function __construct(Favorite $model)
    {
        parent::__construct($model);
    }
}
