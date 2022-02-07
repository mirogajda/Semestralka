<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'user_id', 'picture_id', 'from', 'to', 'price', 'countOfParticipant'];
}
