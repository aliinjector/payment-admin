<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;


class ShopCategory extends Model
{
    // use SoftDeletes, CascadeSoftDeletes;
    protected $cascadeDeletes = ['shops'];
    protected $dates = ['deleted_at'];

    public function shops()
    {
        return $this->hasMany('App\Shop');
    }
    public function children()
   {
     return $this->hasMany($this, 'parent_id')->with('children');
   }
  public function parent()
   {
     return $this->belongsTo($this, 'parent_id')->with('parent');
   }
}
