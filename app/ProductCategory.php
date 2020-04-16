<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use SoftDeletes, CascadeSoftDeletes;
    protected $cascadeDeletes = ['products', 'children', 'features'];

  protected $dates = ['deleted_at'];
  protected $guarded = ['id'];
  protected $casts = ['icon' => 'array'];

  protected static function boot() {
      parent::boot();
      self::restoring(function ($productCategory) {
        if($productCategory->products()->withTrashed()->first() != null){
          $productCategory->products()->withTrashed()->first()->restore();
        }
        if($productCategory->children()->withTrashed()->first() != null){
          $productCategory->children()->withTrashed()->first()->restore();
        }
          if($productCategory->features()->withTrashed()->first() != null){
        $productCategory->features()->withTrashed()->first()->restore();
      }

  });
}

  public function products()
   {
       return $this->hasMany('App\Product','productCat_id','id');
   }
  public function children()
   {
     return $this->hasMany($this, 'parent_id')->with('children');
   }
  public function parent()
   {
     return $this->belongsTo($this, 'parent_id')->with('parent');
   }
   public function shop()
  {
      return $this->belongsTo('App\Shop');
  }

  public function features()
  {
      return $this->hasMany('App\Feature','productCat_id');
  }

}
