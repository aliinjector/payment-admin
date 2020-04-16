<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
  use SoftDeletes, CascadeSoftDeletes;
  protected $cascadeDeletes = ['items'];
  protected $dates = ['deleted_at'];
  protected $guarded = ['id'];

  protected static function boot() {
      parent::boot();
      self::restoring(function ($specification) {
        if($specification->items()->withTrashed()->first() != null){
          $specification->items()->withTrashed()->first()->restore();
        }
  });
}

  public function shop()
  {
      return $this->belongsTo('App\Shop');
  }
  public function products() {
      return $this->belongsToMany('App\Product');
  }

  public function items()
  {
      return $this->hasMany('App\SpecificationItem');
  }
}
