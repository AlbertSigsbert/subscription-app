<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Relationship (Post belongs to Website)

    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
