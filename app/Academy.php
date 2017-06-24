<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    //
    protected $fillable = [
        'namqe', 'address', 'owner', 'tel', 'course', 'subject', 'capacity', 'term', 'hours', 'price', 'option1', 'option2', 'option3', 'option4', 'option5', 'option6', 'option7', 'total_price', 'total_teachers',
    ];
}
