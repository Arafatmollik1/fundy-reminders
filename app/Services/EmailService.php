<?php

  namespace App\Services;
  use Illuminate\Support\Facades\Mail;

  class EmailService
  {
      public function send($email, $mailable): void
      {
          $response=Mail::to($email)->send($mailable);
          dd($response);
      }
  }
