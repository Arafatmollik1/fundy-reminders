<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Event $event)
    {
        return view('participants.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Event $event, Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'amount' => 'nullable|numeric',
            'date_of_month' => 'nullable|integer|min:1|max:31',
        ]);

        // Map the validated data to the appropriate columns
        $participantData = [
            'event_id' => $event->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'amount' => $validated['amount'],
            'date_of_month' => $validated['date_of_month'],
        ];

        // Create the new participant record
        Participant::create($participantData);

        // Redirect to the index page with a success message
        return redirect()->route('admin.events.show' , $event->id)->with('success', 'Participant created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event, Participant $participant)
    {
        return view('participants.edit', compact('event', 'participant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Event $event, Participant $participant, Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'amount' => 'nullable|numeric',
            'date_of_month' => 'nullable|integer|min:1|max:31',
        ]);

        // Map the validated data to the appropriate columns
        $participantData = [
            'event_id' => $event->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'amount' => $validated['amount'],
            'date_of_month' => $validated['date_of_month'],
        ];
        $participant->update($participantData);

        return redirect()->route('admin.events.show' , $event->id)->with('success', 'Participant updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event, Participant $participant)
    {
        $participant->delete();

        return redirect()->route('admin.events.show' , $event->id)->with('success', 'Participant removed successfully.');
    }
}
