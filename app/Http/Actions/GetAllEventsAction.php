<?php

namespace App\Http\Actions;

use App\Models\Event;

class GetAllEventsAction
{
    public function execute()
    {
        return Event::where('admin_id', auth()->user()->id)->get();
    }
}
