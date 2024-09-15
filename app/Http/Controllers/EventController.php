<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allEvents = Event::all();
        return view('events.index' , compact('allEvents'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_name' => 'required|string|max:255',
            'event_date' => 'nullable|integer|min:1|max:31',
            'it_is_recurring' => 'nullable',
            'has_message' => 'nullable',
            'event_message' => 'nullable|string',
            'it_requires_payment' => 'nullable',
            'amount' => 'nullable|numeric',
            'bank_id' => 'nullable|string',
            'recipient_name' => 'nullable|string',
            'mobile_pay' => 'nullable|string',
        ]);

        $eventData = [
            'name' => $validated['event_name'],
            'day_of_the_month' => $validated['event_date'] ?? 'undefined',
            'recurring' => $validated['it_is_recurring'] ?? false,
            'has_message' => $validated['has_message'] ?? false,
            'message' => $validated['event_message'] ?? 'undefined',
            'has_payment' => $validated['it_requires_payment'] ?? false,
            'amount' => $validated['amount'] ?? 'undefined',
            'bank_id' => $validated['bank_id'] ?? 'undefined',
            'recipient_name' => $validated['recipient_name'] ?? 'undefined',
            'mobile_pay_number' => $validated['mobile_pay'] ?? 'undefined',
        ];

        // Create the new event record
        Event::create($eventData);

        // Redirect to the index page with a success message
        return redirect()->route('admin.dashboard')->with('success', 'Event created successfully.');
    }


    public function show(Event $event)
    {
        $participants = Participant::where('event_id', $event->id)->get();
        return view('events.show', compact('event', 'participants'));
    }

    // Show the form for editing the specified resource.
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'event_name' => 'required|string|max:255',
            'event_date' => 'nullable|integer|min:1|max:31',
            'it_is_recurring' => 'nullable',
            'has_message' => 'nullable',
            'event_message' => 'nullable|string',
            'it_requires_payment' => 'nullable',
            'amount' => 'nullable|numeric',
            'bank_id' => 'nullable|string',
            'recipient_name' => 'nullable|string',
            'mobile_pay' => 'nullable|string',
        ]);

        $eventData = [
            'name' => $validated['event_name'],
            'day_of_the_month' => $validated['event_date'] ?? 'undefined',
            'recurring' => $validated['it_is_recurring'] ?? false,
            'has_message' => $validated['has_message'] ?? false,
            'message' => $validated['event_message'] ?? 'undefined',
            'has_payment' => $validated['it_requires_payment'] ?? false,
            'amount' => $validated['amount'] ?? 'undefined',
            'bank_id' => $validated['bank_id'] ?? 'undefined',
            'recipient_name' => $validated['recipient_name'] ?? 'undefined',
            'mobile_pay_number' => $validated['mobile_pay'] ?? 'undefined',
        ];

        $event->update($eventData);

        return redirect()->route('admin.events.show' , $event->id)->with('success', 'Event updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index' , $event->id )->with('success', 'Event deleted successfully.');
    }
}
