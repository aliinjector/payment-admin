<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;


class Checkout extends Model
{
  use SoftDeletes, CascadeSoftDeletes;
  protected $dates = ['deleted_at'];

    protected $guarded = ['id'];


      public function card()
      {
          return $this->belongsTo('App\Card');
      }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function wallet()
      {
          return $this->belongsTo('App\Wallet');
      }




  }
