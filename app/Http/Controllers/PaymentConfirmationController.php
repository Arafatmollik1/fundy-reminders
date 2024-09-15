<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participant;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PaymentConfirmationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $event, string $participant, Request $request)
    {
        try {
            $event = Event::where('id', $event)->firstOrFail();

            $participant = Participant::where('event_id', $event->id)
                ->where('id', $participant)
                ->firstOrFail();

            $participant->update([
                'last_payment_confirmed_at' => now(),
            ]);
        } catch (ModelNotFoundException $e) { // Model not found exceptions
            return redirect()->route('guest.paid.success')
                ->with("error", "Something went wrong. Please contact Arafat Mollik. {$e->getMessage()}");
        } catch (\Exception $e) { // All other exceptions
            return redirect()->route('guest.paid.success')
                ->with("error", "Something went wrong. Please contact Arafat Mollik. {$e->getMessage()}");
        }

        return redirect()->route('guest.paid.success')
            ->with('success', 'Payment confirmed successfully');
    }
}
