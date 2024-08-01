<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function instansi(){
        return $this->belongsTo(Instansi::class, 'opd_id');
    }

    public function providers(){
        return $this->belongsTo(Provider::class);
    }

    public function tim(){
        return $this->belongsToMany(Tim::class, 'event_tim');
    }
}
