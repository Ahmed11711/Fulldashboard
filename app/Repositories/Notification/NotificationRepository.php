<?php

namespace App\Repositories\Notification;

use App\Repositories\Notification\NotificationRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\Notification;

class NotificationRepository extends BaseRepository implements NotificationRepositoryInterface
{
    public function __construct(Notification $model)
    {
        parent::__construct($model);
    }
}
