<?php

namespace App\Http\Controllers\dashboard;

use App\Dashboard;
use Illuminate\Http\Request;
use App\Http\Requests\ShopSettingRequest;
use App\Http\Requests\ShopContactRequest;
use App\Http\Requests\ShopThemeRequest;
use App\ErrorLog;
use App\Http\Controllers\Controller;
use App\Shop;
use App\Template;
use App\Invoice;
use App\ShopCategory;
use App\ShopContact;


class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::all();
        return view('dashboard.shops' , compact('shops'));
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
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $templates = Template::all();
          $shopInformation = Shop::find($id);
          $shopCategories = ShopCategory::all();
          $shopContactInformation = $shopInformation->shopContact()->first();
          return view('dashboard.shop-setting', compact('shopInformation','shopContactInformation','shopCategories', 'templates'));
        }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(ShopSettingRequest $request, $id)
    {
      $shop = Shop::find($id);
      if ($shop->english_name == $request->english_name) {
              //check for unique name for shop
                $request->validate([
                  'english_name' => 'required|regex:/^[a-zA-Z0-9]+-?[a-zA-Z0-9]+-?[a-zA-Z0-9]+$/'
            ]);
            }
            else{
                $request->validate([
                      'english_name' => 'required|unique:shops|regex:/^[a-zA-Z0-9]+-?[a-zA-Z0-9]+-?[a-zA-Z0-9]+$/'
                ]);
            }
            if(!isset($request->quick_way) and !isset($request->posting_way) and !isset($request->person_way)){
              return redirect()->back()->withErrors(['باید حداقل یک روش ارسال انتخاب شود']);
             }
              else{
            if ( $request->quick_way != "on")
            $request->quick_way = 'disable';
         else
         $request->quick_way = 'enable';

            if ( $request->posting_way != "on")
            $request->posting_way = 'disable';
         else
         $request->posting_way = 'enable';

            if ( $request->person_way != "on")
            $request->person_way = 'disable';
         else
         $request->person_way = 'enable';
         }


            if ( $request->online_payment != "on")
            $request->online_payment = 'disable';
         else
         $request->online_payment = 'enable';

            if ( $request->cash_payment != "on")
            $request->cash_payment = 'disable';
         else
         $request->cash_payment = 'enable';

         if(!isset($request->icon)){
         $icon = $shop->icon;
         }
         else{
          $icon = $this->uploadFile($request->file('icon'), false, true);
         }
         if(!isset($request->logo)){
         $logo = $shop->logo;
         }
         else{
         $logo = $this->uploadFile($request->file('logo'), false, true);
         }

          $shop = $shop->update([
            'name' => $request->name,
            'english_name' => $request->english_name,
            'user_id' => \Auth::user()->id,
            'status' => 0,
            'quick_way' => $request->quick_way,
            'quick_way_price' => $this->fa_num_to_en($request->quick_way_price),
            'posting_way' => $request->posting_way,
            'posting_way_price' => $this->fa_num_to_en($request->posting_way_price),
            'person_way' => $request->person_way,
            'person_way_price' => 0,
            'cash_payment' => $request->cash_payment,
            'online_payment' => $request->online_payment,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'icon' => $icon,
            'logo' => $logo,
          ]);
          alert()->success('تغییرات شما باموفقیت اضافه شد.', 'ثبت شد');
          return redirect()->back();
        }




        public function updateContact(ShopContactRequest $request, $id){

          $shopOrg = Shop::find($id);

    $shop = $shopOrg->shopContact()->get()->first()->update([
    'tel' => $this->fa_num_to_en($request->tel),
    'shop_email' => $request->shop_email,
    'address' => $request->address,
    'city' => $request->city,
    'province' => $request->province,
    'telegram_url' => $request->telegram_url,
    'instagram_url' => $request->instagram_url,
    'facebook_url' => $request->facebook_url,
    'soroush_url' => $request->soroush_url,
    'bisphone_url' => $request->bisphone_url,
    'Igap_url' => $request->Igap_url,
    'gap_url' => $request->gap_url,
    'wispi_url' => $request->wispi_url,
    'bale_url' => $request->bale_url,
  ]);

  alert()->success('تغییرات شما باموفقیت اضافه شد.', 'ثبت شد');
  return redirect()->back();
}


public function changeStatus(Request $request){

    $shop = Shop::find($request->id);

    if($shop->status == 0)
      $shop->status = 1;
      else
      $shop->status = 0;
      $shop->save();
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
