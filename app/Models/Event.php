<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $fillable = ['nume', 'data_ora', 'descriere', 'locatie', 'nr_bilete', 'pret','agenda', 'afis', 'contact','speaker','parteneri','sponsori'];

    public function entities(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Event_Entitites::class, 'idEvent');
    }
}
