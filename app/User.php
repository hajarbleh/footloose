<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
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
}
