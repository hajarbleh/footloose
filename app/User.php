<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;

  protected $primaryKey = 'id';

  protected $guarded = [
    'id','timestamp','created_at','updated_at',
  ];

  protected $hidden = [
    'password',
  ];

  public function transaction(){
    return $this->hasMany('App\Transaction');
  }

  public function isUser() {
    return $this->role == 'User';
  }

  public function isAdmin() {
    return $this->role == 'Admin';
  }

  public function isComplete() {
    if($this->address == null || $this->city_id == null || $this->city == null
        || $this->state == null || $this->postal_code == null || $this->phone == null) {
        return false;
    }
    return true;
  }
}