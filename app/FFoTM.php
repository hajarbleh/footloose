<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FFoTM extends Model
{
  protected $primaryKey = 'id';

  protected $guarded = ['id','created_at','updated_at', ];

  public function category()
  {
      return $this->hasOne('App\Category');
  }

  public function base()
  {
      return $this->hasOne('App\Base');
  }

  public function strap()
  {
      return $this->hasOne('App\Strap');
  }

  public function tattoo()
  {
      return $this->hasOne('App\Tattoo');
  }
}
