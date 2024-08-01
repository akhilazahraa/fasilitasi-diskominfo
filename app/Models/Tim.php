<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_tim');
    }
}
