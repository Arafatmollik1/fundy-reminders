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
        // Validate the request data
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

        // Map the validated data to the appropriate columns
        $eventData = [
            'name' => $validated['event_name'],
            'day_of_the_month' => $validated['event_date'],
            'recurring' => $validated['it_is_recurring'] ?? false,
            'has_message' => $validated['has_message'] ?? false,
            'message' => $validated['event_message'],
            'has_payment' => (bool)$validated['it_requires_payment'] ?? false,
            'amount' => $validated['amount'],
            'bank_id' => $validated['bank_id'],
            'recipient_name' => $validated['recipient_name'],
            'mobile_pay_number' => $validated['mobile_pay'],
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
            'timestamp' => 'required|date',
            'name' => 'required|string|max:255',
            'day_of_the_month' => 'required|integer|min:1|max:31',
            'recurring' => 'required|boolean',
        ]);

        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }
}
