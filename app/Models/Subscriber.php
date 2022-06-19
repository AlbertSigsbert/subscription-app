<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subscriber extends Model
{
    use HasFactory;
    use Notifiable;


    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    public function routeNotificationForMail($notification)
    {
        // Return email only...
        return $this->email;

        // Return email address and name...
        return [$this->email => $this->name];
    }
}
