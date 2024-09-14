<?php

  namespace App\Services;
  use Illuminate\Support\Facades\Mail;

  class EmailService
  {
      public function send($email, $mailable): void
      {
          Mail::to($email)->send($mailable);
      }
  }
