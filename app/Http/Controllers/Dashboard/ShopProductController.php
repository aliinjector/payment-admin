<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Product;
use App\Shop;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShopProductRequest;


class ShopProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(ShopProductRequest $request)
     {
         if($request->has('q'))
         {
             $shop = Shop::where('english_name','LIKE','%'.$request->q.'%')->get();
             if($shop->count() > 0){
               $products = $shop->first()->products()->orderBy('created_at', 'desc')->get();
               return view('dashboard.product.shop-product', compact('products'));
             }
             else{
               $products = [];
               return view('dashboard.product.shop-product', compact('products'))->withErrors(['فروشگاه مورد نظر پیدا نشد']);
             }
         }else{
           return view('dashboard.product.shop-product');
         }

     }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show()
     {
       $shops = Shop::all();
       $action = ['name' => 'محصولات', 'url' => 'shops-products.products', 'trashed' => 'محصولات حذف شده', 'trashedUrl' => 'shops-products.trashed-product'];
       return view('dashboard.shops' , compact('shops', 'action'));
     }


    public function search(Request $request)
    {
        $request->validate([
            'title' => 'required|min:1|max:1000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
        ]);

        $title = $request->title;
        $shops = Shop::all();
        $action = ['name' => 'محصولات', 'url' => 'shops-products.products', 'trashed' => 'محصولات حذف شده', 'trashedUrl' => 'shops-products.trashed-product'];
        return view('dashboard.shops' , compact('shops', 'action', 'title'));

    }

     public function showProducts($shopId){
       $shop = Shop::find($shopId);
       $products = $shop->products;
       return view('dashboard.product.product' , compact('products', 'shop'));

     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShopProductRequest $request, $id)
    {
        //
    }

    public function trashedProduct($shopId){
      $shop = Shop::find($shopId);
      $products = $shop->products()->onlyTrashed()->get();
      return view('dashboard.product.trashed-product' ,  compact('products', 'shop'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function restore(ShopProductRequest $request)
    {
    $product = Product::withTrashed()->where('id' , $request->id)->get()->first()->update([
      'deleted_at' => null
    ]);
          }




     public function destroy(ShopProductRequest $request)
    {
      $product = Product::withTrashed()->where('id' , $request->id)->get()->first()->forceDelete();

          }
}
