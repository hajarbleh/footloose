<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
  protected $primaryKey = 'id';

  protected $guarded = ['id','transaction_code','base_id','strap_id','tattoo_id','transaction_id','quantity','created_at','updated_at',];

  public function transaction()
  {
      return $this->belongsTo('App\Transaction');
  }

  public function base()
  {
      return $this->hasOne('App\Base');
  }

  public function tattoo()
  {
      return $this->hasOne('App\Tattoo');
  }

  public function strap()
  {
      return $this->hasOne('App\Strap');
  }

}
