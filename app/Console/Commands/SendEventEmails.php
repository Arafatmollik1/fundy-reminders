<?php

namespace App\Console\Commands;

use App\Mail\ParticipantMail;
use App\Models\Event;
use App\Services\EmailService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendEventEmails extends Command
{
    protected $signature = 'events:send-emails';
    protected $description = 'Send emails to participants of events scheduled for today';

    protected EmailService $emailService;

    public function __construct(EmailService $emailService)
    {
        parent::__construct();
        $this->emailService = $emailService;
    }

    public function handle()
    {
        $today = Carbon::now()->day;

        $events = Event::where('day_of_the_month', $today)->get();

        foreach ($events as $event) {
            $participants = $event->getAllParticipants();

            foreach ($participants as $participant) {
                try {
                    $eventData = [
                        'id' => $event->id,
                        'name' => $event->name,
                    ];

                    $participantData = [
                        'id' => $participant->id,
                        'message' => $event->message,
                        'name' => $participant->name,
                        'amount' => $participant->amount,
                        'bank_id' => $event->bank_id,
                        'recipient_name' => $event->recipient_name,
                        'mobile_pay_number' => $event->mobile_pay_number,
                    ];

                    $mailable = new ParticipantMail($eventData, $participantData);
                    $this->emailService->send($participant->email, $mailable);

                    $this->info("Email sent to {$participant->email} for event {$event->name}");
                } catch (\Exception $e) {
                    $this->error("Error sending email to {$participant->email} for event {$event->name}");
                }
            }
        }

        $this->info('Event emails sent successfully for today.');
    }
}
