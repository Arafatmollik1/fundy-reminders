<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'day_of_the_month',
        'recurring',
        'has_message',
        'message',
        'hasPayment',
        'amount',
        'bank_id',
        'recipient_name',
        'mobile_pay_number',
    ];
}
