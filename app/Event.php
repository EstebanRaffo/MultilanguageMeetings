<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = ['name', 'site', 'language', 'status', 'photo'];

    public function inscriptions(){
      return $this->hasMany(Inscription::class);
    }
}
