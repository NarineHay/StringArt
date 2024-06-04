<?php

namespace App\Models;

use App\Traits\Reports\ReportFilterTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail, JWTSubject
{
  use HasFactory, Notifiable, HasRoles, SoftDeletes, ReportFilterTrait;


    protected $fillable = [
        'name',
        'surname',
        'email',
        'status',
        'phone',
        'password',
        'gender',
        'google_id',
        'birth_date',
        'country_id',
    ];


  protected $hidden = ['password', 'google_id'];

  protected $defaultFields = ['gender', 'country_id'];
  public function getJWTIdentifier()
  {
    return $this->getKey();
  }

  public function getJWTCustomClaims()
  {
    return [];
  }





}
