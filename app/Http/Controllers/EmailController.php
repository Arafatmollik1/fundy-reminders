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
    public function single(Request $request, Event $event, Participant $participant)
    {
        $eventData = [
            'id' => $event->id,
            'name' => $event->name,
        ];

        $participantData = [
            'id' => $participant->id,
            'message' => $request->input('event_message') ?: $event->message,
            'name' => $participant->name,
            'amount' => $request->input('amount') ?: $participant->amount,
            'bank_id' => $request->input('bank_id') ?: $event->bank_id,
            'recipient_name' => $request->input('recipient_name') ?: $event->recipient_name,
            'mobile_pay_number' => $request->input('mobile_pay_number') ?: $event->mobile_pay_number,
        ];

        // Create a new mailable instance with the participant data
        $mailable = new ParticipantMail($eventData, $participantData);

        // Send the email using the email service
        $this->emailService->send($participant->email, $mailable);

        // Return a response (success message)
        return redirect()->route('admin.events.show', $event)->with('success', 'Email sent successfully');
    }

    public function all(Request $request, Event $event)
    {
        $eventData = [
            'id' => $event->id,
            'name' => $event->name,
        ];

        $participants= $event->getAllParticipants();

        if (!empty($participants)) {
            foreach ($participants as $participant) {
                $participantData = [
                    'id' => $participant->id,
                    'message' => $event->message,
                    'name' => $participant->name,
                    'amount' => $request->input('amount') ?: $participant->amount,
                    'bank_id' => $request->input('bank_id') ?: $event->bank_id,
                    'recipient_name' => $request->input('recipient_name') ?: $event->recipient_name,
                    'mobile_pay_number' => $request->input('mobile_pay_number') ?: $event->mobile_pay_number,
                ];

                // Create a new mailable instance with the participant data
                $mailable = new ParticipantMail($eventData, $participantData);

                // Send the email using the email service
                $this->emailService->send($participant->email, $mailable);
            }
        }

        // Return a response (success message)
        return redirect()->route('admin.events.show', $event)->with('success', 'Email sent successfully to everyone');
    }
}
