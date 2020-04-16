<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Answer extends Model
{
  use SoftDeletes, CascadeSoftDeletes;
  protected $dates = ['deleted_at'];
    protected $gaurded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function ticket(){
      return $this->belongsTo(Ticket::class);
    }
}
