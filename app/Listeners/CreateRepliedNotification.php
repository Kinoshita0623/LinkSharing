<?php

namespace App\Listeners;

use App\Events\Replied;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\NotificationService;

class CreateRepliedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(NotificationService $notificationService)
    {
        //
        $this->notificationService = $notificationService;
    }

    /**
     * Handle the event.
     *
     * @param  Replied  $event
     * @return void
     */
    public function handle(Replied $event)
    {
        //
        $notificationService->create($event->publisher, $event->comment);
    }
}