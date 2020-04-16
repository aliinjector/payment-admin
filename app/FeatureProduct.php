<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class FeatureProduct extends Model
{
  use SoftDeletes, CascadeSoftDeletes;
  protected $dates = ['deleted_at'];

  public function product()
  {
      return $this->belongsTo('App\Product');
  }

  public function feature()
  {
      return $this->belongsTo('App\Feature');
  }
}
