<?php

namespace App\Policies;

use App\Models\AdminUser;
use App\Models\Event;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EventPolicy
{
    public function view(AdminUser $user, Event $event)
    {
        return $user->id === $event->admin_id;
    }
}
