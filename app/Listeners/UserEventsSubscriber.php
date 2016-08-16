<?php

namespace Vanguard\Listeners;

use Vanguard\Activity;
use Vanguard\Events\Settings\Updated as SettingsUpdated;
use Vanguard\Events\User\Banned;
use Vanguard\Events\User\ChangedAvatar;
use Vanguard\Events\User\Created;
use Vanguard\Events\User\Deleted;
use Vanguard\Events\User\LoggedIn;
use Vanguard\Events\User\LoggedOut;
use Vanguard\Events\User\Registered;
use Vanguard\Events\User\RequestedPasswordResetEmail;
use Vanguard\Events\User\ResetedPasswordViaEmail;
use Vanguard\Events\User\TwoFactorDisabled;
use Vanguard\Events\User\TwoFactorDisabledByAdmin;
use Vanguard\Events\User\TwoFactorEnabled;
use Vanguard\Events\User\TwoFactorEnabledByAdmin;
use Vanguard\Events\User\UpdatedByAdmin;
use Vanguard\Events\User\UpdatedProfileDetails;
use Vanguard\Events\User\UserEventContract;
use Vanguard\Services\Logging\UserActivity\Logger;

class UserEventsSubscriber
{
    /**
     * @var UserActivityLogger
     */
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function onLogin(LoggedIn $event)
    {
        $this->logger->log("Logged in.");
    }

    public function onLogout(LoggedOut $event)
    {
        $this->logger->log("Logged out.");
    }

    public function onRegister(Registered $event)
    {
        $this->logger->setUser($event->getRegisteredUser());
        $this->logger->log("Created an account.");
    }

    public function onAvatarChange(ChangedAvatar $event)
    {
        $this->logger->log("Updated profile avatar.");
    }

    public function onProfileDetailsUpdate(UpdatedProfileDetails $event)
    {
        $this->logger->log("Updated profile details.");
    }

    public function onDelete(Deleted $event)
    {
        $message = sprintf(
            "Deleted user %s.",
            $event->getDeletedUser()->present()->nameOrEmail
        );

        $this->logger->log($message);
    }

    public function onBan(Banned $event)
    {
        $message = sprintf(
            "Banned user %s.",
            $event->getBannedUser()->present()->nameOrEmail
        );

        $this->logger->log($message);
    }

    public function onUpdateByAdmin(UpdatedByAdmin $event)
    {
        $message = sprintf(
            "Updated profile details for %s.",
            $event->getUpdatedUser()->present()->nameOrEmail
        );

        $this->logger->log($message);
    }

    public function onCreate(Created $event)
    {
        $message = sprintf(
            "Created an account for user %s.",
            $event->getCreatedUser()->present()->nameOrEmail
        );

        $this->logger->log($message);
    }

    public function onSettingsUpdate(SettingsUpdated $event)
    {
        $this->logger->log("Updated website settings.");
    }

    public function onTwoFactorEnable(TwoFactorEnabled $event)
    {
        $this->logger->log("Enabled Two-Factor Authentication.");
    }

    public function onTwoFactorDisable(TwoFactorDisabled $event)
    {
        $this->logger->log("Disabled Two-Factor Authentication.");
    }

    public function onTwoFactorEnableByAdmin(TwoFactorEnabledByAdmin $event)
    {
        $message = sprintf(
            "Enabled Two-Factor Authentication for user %s.",
            $event->getUser()->present()->nameOrEmail
        );

        $this->logger->log($message);
    }

    public function onTwoFactorDisableByAdmin(TwoFactorDisabledByAdmin $event)
    {
        $message = sprintf(
            "Disabled Two-Factor Authentication for user %s.",
            $event->getUser()->present()->nameOrEmail
        );

        $this->logger->log($message);
    }

    public function onPasswordResetEmailRequest(RequestedPasswordResetEmail $event)
    {
        $this->logger->setUser($event->getUser());
        $this->logger->log("Requested password reset email.");
    }

    public function onPasswordReset(ResetedPasswordViaEmail $event)
    {
        $this->logger->setUser($event->getUser());
        $this->logger->log("Reseted password using \"Forgot Password\" option.");
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $class = 'Vanguard\Listeners\UserEventsSubscriber';

        $events->listen(LoggedIn::class, "{$class}@onLogin");
        $events->listen(LoggedOut::class, "{$class}@onLogout");
        $events->listen(Registered::class, "{$class}@onRegister");
        $events->listen(Created::class, "{$class}@onCreate");
        $events->listen(ChangedAvatar::class, "{$class}@onAvatarChange");
        $events->listen(UpdatedProfileDetails::class, "{$class}@onProfileDetailsUpdate");
        $events->listen(UpdatedByAdmin::class, "{$class}@onUpdateByAdmin");
        $events->listen(Deleted::class, "{$class}@onDelete");
        $events->listen(Banned::class, "{$class}@onBan");
        $events->listen(SettingsUpdated::class, "{$class}@onSettingsUpdate");
        $events->listen(TwoFactorEnabled::class, "{$class}@onTwoFactorEnable");
        $events->listen(TwoFactorDisabled::class, "{$class}@onTwoFactorDisable");
        $events->listen(TwoFactorEnabledByAdmin::class, "{$class}@onTwoFactorEnableByAdmin");
        $events->listen(TwoFactorDisabledByAdmin::class, "{$class}@onTwoFactorDisableByAdmin");
        $events->listen(RequestedPasswordResetEmail::class, "{$class}@onPasswordResetEmailRequest");
        $events->listen(ResetedPasswordViaEmail::class, "{$class}@onPasswordReset");
    }
}
