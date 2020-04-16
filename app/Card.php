<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Card extends Model
{
  use SoftDeletes, CascadeSoftDeletes;
  protected $dates = ['deleted_at'];
    protected $guarded = ['id'];

      public function checkouts()
      {
          return $this->hasMany('App\Checkout');
      }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function bank()
    {
        return $this->belongsTo('App\Bank');
    }



}
