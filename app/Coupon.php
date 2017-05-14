<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
  protected $primaryKey = 'id';

  protected $guarded = ['id','created_at','updated_at', ];

  public function transaction()
  {
      return $this->belongsTo('App\Transaction');
  }
}
