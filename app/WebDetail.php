<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebDetail extends Model
{
  protected $primaryKey = 'id';

  protected $guarded = ['id','created_at','updated_at', ];

}
