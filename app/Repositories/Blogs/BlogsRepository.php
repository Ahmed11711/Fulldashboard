<?php

namespace App\Repositories\Blogs;

use App\Repositories\Blogs\BlogsRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\Blogs;

class BlogsRepository extends BaseRepository implements BlogsRepositoryInterface
{
    public function __construct(Blogs $model)
    {
        parent::__construct($model);
    }
}
