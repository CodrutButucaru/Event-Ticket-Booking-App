<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_Entitites extends Model
{
    use HasFactory;

    protected $table = 'event__entitites';
    protected $fillable = ['nume', 'tip', 'idEvent'];

    public function event(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Event::class, 'idEvent');
    }
}

