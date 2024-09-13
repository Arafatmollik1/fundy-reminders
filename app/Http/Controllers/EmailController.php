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
        // Fetch the participant data
        $participantData = [
            'name' => $participant->name,
            'email' => $participant->email,
            'amount' => $participant->amount,
            'date_of_month' => $participant->date_of_month,
        ];

        // Create a new mailable instance with the participant data
        $mailable = new ParticipantMail($participantData);

        // Send the email using the email service
        $this->emailService->send($participant->email, $mailable);

        // Return a response (success message)
        return response()->json(['message' => 'Email sent successfully to ' . $participant->email]);
    }
}
