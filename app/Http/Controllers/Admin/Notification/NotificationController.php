<?php

namespace App\Http\Controllers\Admin\Notification;

use App\Repositories\Notification\NotificationRepositoryInterface;
use App\Http\Controllers\BaseController\BaseController;
use App\Http\Requests\Admin\Notification\NotificationStoreRequest;
use App\Http\Requests\Admin\Notification\NotificationUpdateRequest;
use App\Http\Resources\Admin\Notification\NotificationResource;

class NotificationController extends BaseController
{
    public function __construct(NotificationRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService(
            repository: $repository,
            collectionName: 'Notification'
        );

        $this->storeRequestClass = NotificationStoreRequest::class;
        $this->updateRequestClass = NotificationUpdateRequest::class;
        $this->resourceClass = NotificationResource::class;
    }
}
