<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Shop extends Model
{
    protected $guarded = ['id'];

    public function shopContact()
    {
        return $this->hasOne('App\ShopContact');
    }

   public function ProductCategories()
    {
      return $this->hasMany('App\ProductCategory');
    }
    public function products()
   {
       return $this->hasMany('App\Product');
   }
   public function user()
   {
       return $this->belongsTo('App\User');
   }
   public function category()
   {
       return $this->belongsTo('App\ShopCategory');
   }


}
