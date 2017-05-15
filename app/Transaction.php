<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
  protected $primaryKey = 'id';

  protected $guarded = ['id','user_id','coupon_id','total','timestamp','created_at','updated_at', ];

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function coupon()
  {
      return $this->hasOne('App\Coupon');
  }

  public function transaction_detail()
  {
      return $this->hasMany('App\TransacationDetail');
  }
}
