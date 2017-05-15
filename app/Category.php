<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $primaryKey = 'id';

  protected $guarded = ['id','created_at','updated_at', ];

  public function ffotm()
  {
      return $this->belongsTo('App\FFoTM');
  }

  public function base()
  {
      return $this->belongsTo('App\Base');
  }

  public function strap()
  {
      return $this->belongsTo('App\Strap');
  }

  public function tattoo()
  {
      return $this->belongsTo('App\Tattoo');
  }
}
