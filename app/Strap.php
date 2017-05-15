<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Strap extends Model
{
  protected $primaryKey = 'id';

  protected $guarded = ['id','created_at','updated_at',];

  public function transaction_detail()
  {
      return $this->belongsTo('App\TransactionDetail');
  }

  public function category()
  {
      return $this->hasOne('App\Category');
  }

  public function ffotm()
  {
      return $this->belongsTo('App\FFoTM');
  }
}
