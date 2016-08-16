<?php

namespace Vanguard\Listeners;

use Vanguard\Activity;
use Vanguard\Events\Role\Created;
use Vanguard\Events\Role\PermissionsUpdated;
use Vanguard\Events\Role\Updated;
use Vanguard\Events\Role\Deleted;
use Vanguard\Events\User\UserEventContract;
use Vanguard\Services\Logging\UserActivity\Logger;

class RoleEventsSubscriber
{
    /**
     * @var UserActivityLogger
     */
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function onCreate(Created $event)
    {
        $message = sprintf(
            "Created new role called %s.",
            $event->getRole()->display_name
        );

        $this->logger->log($message);
    }

    public function onUpdate(Updated $event)
    {
        $message = sprintf(
            "Updated role with name %s.",
            $event->getRole()->display_name
        );

        $this->logger->log($message);
    }

    public function onDelete(Deleted $event)
    {
        $message = sprintf(
            "Deleted role named %s.",
            $event->getRole()->display_name
        );

        $this->logger->log($message);
    }

    public function onPermissionsUpdate(PermissionsUpdated $event)
    {
        $this->logger->log("Updated role permissions.");
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $class = 'Vanguard\Listeners\RoleEventsSubscriber';

        $events->listen(Created::class, "{$class}@onCreate");
        $events->listen(Updated::class, "{$class}@onUpdate");
        $events->listen(Deleted::class, "{$class}@onDelete");
        $events->listen(PermissionsUpdated::class, "{$class}@onPermissionsUpdate");
    }
}
