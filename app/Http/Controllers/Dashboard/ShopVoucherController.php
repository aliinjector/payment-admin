<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Voucher;
use App\Shop;
use App\Http\Controllers\Controller;


class ShopVoucherController extends Controller
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
              $vouchers = $shop->first()->vouchers()->orderBy('created_at', 'desc')->get();
              return view('dashboard.voucher.shop-voucher', compact('vouchers'));
            }
            else{
              $vouchers = [];
              return view('dashboard.voucher.shop-voucher', compact('vouchers'))->withErrors(['فروشگاه مورد نظر پیدا نشد']);
            }
        }else{
          return view('dashboard.voucher.shop-voucher');
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
      $action = ['name' => 'کدهای تخفیف', 'url' => 'shops-vouchers.vochers'];
      return view('dashboard.shops' , compact('shops', 'action'));
    }



    public function showVouchers($shopId){
      $shop = Shop::find($shopId);
      $vouchers = $shop->vouchers;
      return view('dashboard.voucher.voucher' , compact('vouchers'));

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
