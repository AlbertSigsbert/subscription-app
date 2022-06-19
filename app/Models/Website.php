<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    // Relationship (Website has many Posts)
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    //Relationship
    public function subscribers()
    {
        return $this->hasMany(Subscriber::class);
    }
}
