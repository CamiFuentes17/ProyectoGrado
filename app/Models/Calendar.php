<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;
    protected $fillable = [
        'requisitions_id',
        'title',
        'start',
        'end',
        'allDay',
        'url',
        'color'
    ];
}
