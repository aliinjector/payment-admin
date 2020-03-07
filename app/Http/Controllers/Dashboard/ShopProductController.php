<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Product;
use App\Shop;
use App\Http\Controllers\Controller;

class ShopProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
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
       $action = ['name' => 'محصولات', 'url' => 'shops-products.products'];
       return view('dashboard.shops' , compact('shops', 'action'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
