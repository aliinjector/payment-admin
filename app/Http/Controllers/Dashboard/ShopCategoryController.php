<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ShopCategory;



class ShopCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
  {

    $shopCategoires = ShopCategory::all();
    $parentCategories = ShopCategory::all()->where('parent_id', null);
      return view('dashboard.shop-category.index', compact('shopCategoires' ,'parentCategories'));

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

    //check if icon is null or not
    // if($request->file('icon') == null){
    //   $image = null;
    // }
    // else{
    //   $image = $this->uploadFile($request->file('icon'), false, true);
    // }
      switch ($request->input('action')) {
        //save and close modal
          case 'justSave':
                  $shopCategory = new ShopCategory;
                  $shopCategory->name = $request->name;
                  if($request->parent_id == 'null')
                    $shopCategory->parent_id = null;
                  else
                  $shopCategory->parent_id = $request->parent_id;
                  $shopCategory->description = $request->description;
                  // $shopCategory->icon = $image;
                  // $shopCategory->shop_id = \Auth::user()->shop()->first()->id;
                  $shopCategory->save();
                  alert()->success('دسته بندی جدید شما باموفقیت اضافه شد.', 'ثبت شد');
                  return redirect()->back();
              break;
          //save and open new modal
          case 'saveAndContinue':
                  $shopCategory = new ProductCategory;
                  $shopCategory->name = $request->name;
                  if($request->parent_id == 'null')
                    $shopCategory->parent_id = null;
                  else
                  $shopCategory->parent_id = $request->parent_id;
                  $shopCategory->description = $request->description;
                  // $shopCategory->icon = $image;
                  // $shopCategory->shop_id = \Auth::user()->shop()->first()->id;
                  $shopCategory->save();
                  session()->flash('flashModal');
                  alert()->success('دسته بندی جدید شما باموفقیت اضافه شد.', 'ثبت شد');
                  return redirect()->back();
              break;

      }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\ProductCategory  $productCategory
   * @return \Illuminate\Http\Response
   */
  public function show(ProductCategoryRequest $productCategory)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\ProductCategory  $productCategory
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $category = ProductCategory::find($id);
    $shop = \Auth::user()->shop()->first();
    $categoires = \Auth::user()->shop()->first()->ProductCategories()->get();
    $parentCategories = \Auth::user()->shop()->first()->ProductCategories()->get()->where('parent_id', null);
    SEOTools::setTitle($shop->name . ' | ویرایش دسته بندی ' . $category->name );
    SEOTools::setDescription($shop->name);
    SEOTools::opengraph()->addProperty('type', 'website');
    return view('dashboard.shop.product-category.edit', compact('categoires', 'shop', 'parentCategories', 'category'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\ProductCategory  $productCategory
   * @return \Illuminate\Http\Response
   */
  public function update(ProductCategoryRequest $request, $id)
  {
    //check if icon is null or not
    if($request->file('icon') == null){
      $image = \Auth::user()->shop()->first()->ProductCategories()->where('id',$id)->get()->first()->icon;
    }
    else{
      $image = $this->uploadFile($request->file('icon'), false, true);
    }
    if($request->parent_id == 'null'){
      $request->parent_id = null;
      }
      $productCategory = \Auth::user()->shop()->first()->ProductCategories()->where('id',$id)->get()->first()->update([
          'name' => $request->name,
          'parent_id' => $request->parent_id,
          'description' => $request->description,
          'icon' => $image
      ]);


      alert()->success(' دسته بندی شما با موفقیت ویرایش شد.', 'ثبت شد');
      return redirect()->route('product-category.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\ProductCategory  $productCategory
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request)
  {
    $request->validate([
      'id' => 'required|numeric|min:1|max:10000000000',
]);
    $shopCategory = ShopCategory::find($request->id);

             $shopCategory->delete();
             alert()->success('درخواست شما با موفقیت انجام شد.', 'انجام شد');
             return redirect()->back();
         }

 //   public function destroyIcon(Request $request){
 //     $request->validate([
 //       'id' => 'required|numeric|min:1|max:10000000000',
 // ]);
 //     $productCategory = ProductCategory::find($request->id);
 //     if ($productCategory->shop->user_id !== \Auth::user()->id) {
 //             alert()->error('شما مجوز مورد نظر را ندارید.', 'انجام نشد');
 //             return redirect()->back();
 //           }
 //     foreach($productCategory->icon as $icon){
 //       $icon = ltrim($icon, '/');
 //       unlink($icon);
 //     }
 //     $productCategory->update([
 //         'icon' => null
 //     ]);
 //   }
}
