<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Stat extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
