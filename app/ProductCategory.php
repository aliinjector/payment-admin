<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class ProductCategory extends Model
{
  protected $guarded = ['id'];
  public function products()
   {
       return $this->hasMany('App\Product');
   }
   public function shop()
  {
      return $this->belongsTo('App\Shop');
  }

}
