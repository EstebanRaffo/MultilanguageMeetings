<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $table = 'inscriptions';

    protected $fillable = ['user_id', 'event_id'];

    public function user(){
      return $this->belongsTo(User::class, 'inscriptions', 'user_id', 'event_id');
    }

    public function event(){
      return $this->belongsTo(Event::class, 'inscriptions', 'event_id', 'user_id');
    }
}
