<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'country','province', 'sex', 'age', 'telephone', 'language', 'website', 'message', 'photo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $photoFolder = '/Users/';

    public static function photoFolder() {
      return User::$photoFolder;
    }

    public function getPhoto() {
      return '/storage' . User::$photoFolder . $this->photo;
    }

    public inscriptions(){
      return $this->hasMany(Inscription::class);
    }
}
