<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class ShopSetting extends Model
{
  use SoftDeletes, CascadeSoftDeletes;

protected $dates = ['deleted_at'];
  protected $guarded = ['id'];
}
