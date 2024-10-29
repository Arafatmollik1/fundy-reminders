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
        'has_payment',
        'amount',
        'bank_id',
        'recipient_name',
        'mobile_pay_number',
        'admin_id',
    ];

    public static function findOrFail(string $event)
    {
        return self::where('id', $event)->firstOrFail();
    }

    public function getAllParticipants(){

        return $this->participants()->get();
    }

    /**
     * Define a one-to-many relationship with Participant.
     */
    public function participants(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Participant::class, 'event_id');
    }

}
