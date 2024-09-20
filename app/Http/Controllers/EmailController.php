<?php

namespace App\Http\Controllers;

use App\Mail\ParticipantMail;
use App\Models\Event;
use App\Models\Participant;
use App\Services\EmailService;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    protected EmailService $emailService;

    /**
     * Inject EmailService into the controller.
     */
    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    /**
     * Send an email to the specified participant.
     */
    public function __invoke(Request $request, Event $event, Participant $participant)
    {
        $eventData = [
            'id' => $event->id,
            'name' => $event->name,
            'message' => $event->message,
            'bank_id' => $event->bank_id,
            'recipient_name' => $event->recipient_name,
            'mobile_pay_number' => $event->mobile_pay_number,
        ];

        $participantData = [
            'id' => $participant->id,
            'name' => $participant->name,
            'amount' => $participant->amount,
        ];

        // Create a new mailable instance with the participant data
        $mailable = new ParticipantMail($eventData, $participantData);

        // Send the email using the email service
        $this->emailService->send($participant->email, $mailable);

        // Return a response (success message)
        return redirect()->route('admin.events.show', $event)->with('success', 'Email sent successfully');
    }
}
