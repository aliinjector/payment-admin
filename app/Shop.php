<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Shop extends Model
{
    use SoftDeletes, CascadeSoftDeletes;
    protected $cascadeDeletes = ['ProductCategories' , 'products', 'slideshows', 'purchases', 'vouchers', 'brands', 'feedbacks', 'tags', 'subscribers', 'invoice', 'donwloadLinkRequests', 'stats', 'compares', 'wishlists', 'faqs','shopContact','carts', 'tickets', 'comments', 'specifications'];
    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];
    protected $casts = [
        'slide_category' => 'array',
        'logo' => 'array',
        'icon' => 'array'
    ];
    protected static function boot() {
        parent::boot();
        self::restoring(function ($shop) {
          if($shop->ProductCategories()->withTrashed()->first() != null){
            $shop->ProductCategories()->withTrashed()->first()->restore();
          }
          if($shop->purchases()->withTrashed()->first() != null){
            $shop->purchases()->withTrashed()->first()->restore();
          }
            if($shop->products()->withTrashed()->first() != null){
          $shop->products()->withTrashed()->first()->restore();
        }
          if($shop->slideshows()->withTrashed()->first() != null){
          $shop->slideshows()->withTrashed()->first()->restore();
        }
          if($shop->brands()->withTrashed()->first() != null){
          $shop->brands()->withTrashed()->first()->restore();
          }
            if($shop->vouchers()->withTrashed()->first() != null){
          $shop->vouchers()->withTrashed()->first()->restore();
          }
            if($shop->feedbacks()->withTrashed()->first() != null){
          $shop->feedbacks()->withTrashed()->first()->restore();
        }
          if($shop->tags()->withTrashed()->first() != null){
          $shop->tags()->withTrashed()->first()->restore();
          }
            if($shop->subscribers()->withTrashed()->first() != null){
          $shop->subscribers()->withTrashed()->first()->restore();
        }
            if($shop->invoice()->withTrashed()->first() != null){
          $shop->invoice()->withTrashed()->first()->restore();
        }
            if($shop->donwloadLinkRequests()->withTrashed()->first() != null){
          $shop->donwloadLinkRequests()->withTrashed()->first()->restore();
        }
            if($shop->compares()->withTrashed()->first() != null){
          $shop->compares()->withTrashed()->first()->restore();
        }
            if($shop->wishlists()->withTrashed()->first() != null){
          $shop->wishlists()->withTrashed()->first()->restore();
        }
            if($shop->faqs()->withTrashed()->first() != null){
          $shop->faqs()->withTrashed()->first()->restore();
        }
            if($shop->shopContact()->withTrashed()->first() != null){
          $shop->shopContact()->withTrashed()->first()->restore();
        }
            if($shop->carts()->withTrashed()->first() != null){
          $shop->carts()->withTrashed()->first()->restore();
        }
        //     if($shop->tickets()->withTrashed()->first() != null){
        //   $shop->tickets()->withTrashed()->first()->restore();
        // }
            if($shop->comments()->withTrashed()->first() != null){
          $shop->comments()->withTrashed()->first()->restore();
        }
            if($shop->specifications()->withTrashed()->first() != null){
          $shop->specifications()->withTrashed()->first()->restore();
        }

    });
}
    public function shopContact()
    {
        return $this->hasOne('App\ShopContact','shop_id');
    }
    public function application()
    {
        return $this->hasOne('App\Application');
    }
    public function slideshows()
    {
        return $this->hasMany('App\Slideshow', 'shop_id');
    }
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

   public function ProductCategories()
    {
      return $this->hasMany('App\ProductCategory');
    }
    public function products()
   {
       return $this->hasMany('App\Product');
   }
    public function purchases()
   {
       return $this->hasMany('App\UserPurchase');
   }
    public function users()
   {
       return $this->hasMany('App\User');
   }
    public function vouchers()
   {
       return $this->hasMany('App\Voucher');
   }
   public function shopCategory()
   {
       return $this->belongsTo('App\ShopCategory' , 'category_id');
   }
   public function user()
   {
       return $this->belongsTo('App\User');
   }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function userVoucher()
    {
        return $this->hasMany('App\UserVoucher');
    }
    public function brands()
    {
        return $this->hasMany('App\Brand');
    }
    public function specifications()
    {
        return $this->hasMany('App\Specification');
    }
    public function feedbacks()
    {
        return $this->hasMany('App\Feedback');
    }
    public function template()
    {
        return $this->belongsTo('App\Template');
    }
    public function tags()
    {
        return $this->hasMany('App\Tag');
    }

    public function subscribers()
    {
        return $this->hasMany('App\Subscriber');
    }

    public function newsletters()
    {
        return $this->hasMany('App\Newsletter');
    }
    public function faqs()
    {
        return $this->hasMany('App\FAQ');
    }
    public function wishlists()
    {
        return $this->hasMany('App\Wishlist');
    }
    public function compares()
    {
        return $this->hasMany('App\Compare');
    }

    public function stats()
    {
        return $this->hasMany('App\Stat');
    }
    public function carts()
    {
        return $this->hasMany('App\Cart');
    }
    public function donwloadLinkRequests()
    {
        return $this->hasMany('App\ProductDownloadStatus');
    }

    public function invoice()
    {
        return $this->hasOne('App\Invoice','shop_id');
    }


}
