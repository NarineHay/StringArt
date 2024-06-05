<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
  use Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password'
    ];



  public function getJWTIdentifier()
  {
    return $this->getKey();
  }

  public function getJWTCustomClaims()
  {
    return [];
  }





}
