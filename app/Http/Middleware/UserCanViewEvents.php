<?php

namespace App\Http\Middleware;

use App\Models\Event;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserCanViewEvents
{
    public function handle(Request $request, Closure $next)
    {
        $event = $request->route('event');
        $user = auth()->user();

        if ($user->can('view', $event)) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
