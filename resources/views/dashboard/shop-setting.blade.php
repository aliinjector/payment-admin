@extends('dashboard.layouts.master')
@section('content')
<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="{{ asset('/dashboard/assets/css/admin-shop-setting.css') }}" rel="stylesheet">
<link href="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">

<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">

<div class="page-content">
    <div class="container-fluid">
      @include('dashboard.layouts.errors')

        <div class="tab-pane fade in show active mt-5" id="info" role="tabpanel">
            <form method="post" action="{{ route('shops.update', ['id' =>$shopInformation->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="mt-0 header-title">مشخصات صاحب فروشگاه</h3>
                                <p class="text-muted mb-3">در این بخش مشخصات صاحب فروشگاه قابل مشاهده میباشد.</p><br>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label text-center">نام </label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="firstName" disabled value="{{ \Auth::user()->firstName }}" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نام خانوادگی</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="lastName" disabled value="{{ \Auth::user()->lastName }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="mt-0 header-title">اطلاعات فروشگاه</h3>
                                <p class="text-muted mb-3"></p><br>
                                <div class="row">
                                    <div class="col-lg-12">



                                        <div class="form-group row">
                                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نام فروشگاه</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="name" placeholder="" value="{{ old('title', $shopInformation->name) }}">
                                            </div>
                                        </div>
                                        <div class="form-group row  mb-0">
                                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نام فروشگاه(لاتین)
                                                <p class="text-muted mt-1" style="font-size: 11px;"></p>
                                            </label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="english_name" value="{{ old('english_name', $shopInformation->english_name) }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">دسته بندی فروشگاه</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="category_id">
                                                    @if($shopInformation->category_id != null)
                                                        <option value="">فاقد دسته بندی</option>
                                                        @endif
                                                        @foreach ($shopCategories as $shopCategory)
                                                        <option {{ $shopCategory->id == $shopInformation->category_id ? 'selected' : ''}} value="{{ $shopCategory->id }}">{{ $shopCategory->name }}</option>
                                                        @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">توضیحات فروشگاه </label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="description" placeholder="" value="{{ old('description', $shopInformation->description) }}">
                                            </div>
                                        </div>

                                    </div>

                                </div>


                            </div>

                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="mt-0 header-title">تنظیمات ثبت سفارش</h3>
                                <p class="text-muted mb-3">در این بخش میتوانید روش های ارسال کالا توسط فروشگاه خود را انتخاب کنید همچنین میتوانید روش های پرداختی را میتوانید فعال و یا غیر فعال کنید . توجه داشته باشید که با فعال کردن هر آیتم هنگام
                                    سفارش کاربر میتواند یکی از روش ها را انتخاب کند.</p><br>
                                <div class="row col-12 mt-4">
                                    <div class="col-lg-2 border-left p-3 m-4">
                                        <div class="media setting-card"><span class="sett-card-icon set-icon-purple" style="align-self: start;"><i class="fa fa-shipping-fast"></i></span>
                                            <div class="media-body align-self-center">
                                                <div class="setting-detail">
                                                    <h3 class="mb-0 mt-0 iranyekan">ارسال سریع</h3>

                                                </div>
                                                <div class="mt-3">
                                                    <div class="row">
                                                        <div class="custom-control custom-switch switch-blue mr-5 p-3 col-2">
                                                            <input type="checkbox" class="custom-control-input" id="quick_way_on" name="quick_way" @if($shopInformation->quick_way == 'enable') checked @endif>
                                                                <label class="custom-control-label iranyekan font-15" for="quick_way_on">فعال</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <button type="button" class="btn btn-outline-pink btn-sm mt-2" data-toggle="collapse" data-target="#quick_way_price">تعیین مبلغ (تومان)</button>
                                                    </div>
                                                    <div class="row">
                                                        <div id="quick_way_price" class="collapse mt-2 ml-2">
                                                            <input class="form-control border-custom" type="number" name="quick_way_price" value="{{ $shopInformation->quick_way_price }}"
                                                              style="position: relative;left: 9px;width: 116px;height: 32px;">
                                                        </div>
                                                    </div>

                                                </div>
                                                <!--end /div-->
                                            </div>
                                            <!--end media body-->
                                        </div>
                                        <!--end media-->

                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-2 border-left p-3 m-4">
                                        <div class="media setting-card"><span class="sett-card-icon set-icon-success" style="align-self: start;"><i class="fa fa-truck"></i></span>
                                            <div class="media-body align-self-center">
                                                <div class="setting-detail">
                                                    <h3 class="mb-0 mt-0 iranyekan">ارسال پستی</h3>

                                                </div>
                                                <div class="mt-3">
                                                    <div class="row">

                                                        <div class="custom-control custom-switch switch-blue mr-5 p-3 col-2">
                                                            <input type="checkbox" class="custom-control-input" id="posting_way_on" name="posting_way" @if($shopInformation->posting_way == 'enable') checked @endif>
                                                                <label class="custom-control-label iranyekan font-15" for="posting_way_on">فعال</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <button type="button" class="btn btn-outline-pink btn-sm mt-2" data-toggle="collapse" data-target="#posting_way_price">تعیین مبلغ (تومان) </button>
                                                    </div>
                                                    <div id="posting_way_price" class="collapse mt-2">
                                                        <input class="form-control border-custom" type="number" name="posting_way_price" value="{{ $shopInformation->posting_way_price }}"
                                                          style="position: relative;left: 9px;width: 116px;height: 32px;">
                                                    </div>

                                                </div>
                                                <!--end /div-->
                                            </div>
                                            <!--end media body-->
                                        </div>
                                        <!--end media-->

                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-2 border-left p-3 m-4">
                                        <div class="media setting-card"><span class="sett-card-icon set-icon-danger" style="align-self: start;"><i class="fas fa-people-carry"></i></span>
                                            <div class="media-body align-self-center">
                                                <div class="setting-detail">
                                                    <h3 class="mb-0 mt-0 iranyekan">دریافت حضوری</h3>

                                                </div>
                                                <div class="mt-3">
                                                    <div class="row">

                                                        <div class="custom-control custom-switch switch-blue mr-5 p-3 col-2">
                                                            <input type="checkbox" class="custom-control-input" id="person_way_on" name="person_way" @if($shopInformation->person_way == 'enable') checked @endif>
                                                                <label class="custom-control-label iranyekan font-15" for="person_way_on">فعال</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">


                                                    </div>

                                                </div>
                                                <!--end /div-->
                                            </div>
                                            <!--end media body-->
                                        </div>
                                        <!--end media-->
                                    </div>
                                    <div class="col-lg-2 border-left p-3 m-4">
                                        <div class="media setting-card"><span class="sett-card-icon set-icon-blue" style="align-self: start;"><i class="far fa-credit-card"></i></i></span>
                                            <div class="media-body align-self-center">
                                                <div class="setting-detail">
                                                    <h3 class="mb-0 mt-0 iranyekan">پرداخت آنلاین</h3>
                                                    <p class="text-muted mb-0">

                                                        میتوانید با دریافت درگاه مستقیم اقدام به دریافت وجه بصورت آنلاین کنید.</p>
                                                </div>
                                                <div class="mt-3 row">
                                                    <div class="custom-control custom-switch switch-blue mr-5 p-3 col-2">
                                                        <input type="checkbox" class="custom-control-input" id="online_payment_on" name="online_payment" @if($shopInformation->online_payment == 'enable') checked @endif>
                                                            <label class="custom-control-label iranyekan font-15" for="online_payment_on">فعال</label>
                                                    </div>

                                                </div>
                                                <!--end /div-->
                                            </div>
                                            <!--end media body-->
                                        </div>
                                        <!--end media-->
                                    </div>
                                    <div class="col-lg-2 m-4 p-3">
                                        <div class="media setting-card"><span class="sett-card-icon set-icon-lightpurple" style="align-self: start;"><i class="fas fa-money-bill-alt"></i></span>
                                            <div class="media-body align-self-center">
                                                <div class="setting-detail">
                                                    <h3 class="mb-0 mt-0 iranyekan">پرداخت نقدی</h3>
                                                    <p class="text-muted mb-0">

                                                        کاربر شما میتواند پس از دریافت کالا وجه را پرداخت کند.</p>
                                                </div>
                                                <div class="mt-3 row">
                                                    <div class="custom-control custom-switch switch-blue mr-5 p-3 col-2">
                                                        <input type="checkbox" class="custom-control-input" id="cash_payment_on" name="cash_payment" @if($shopInformation->cash_payment == 'enable') checked @endif>
                                                            <label class="custom-control-label iranyekan font-15" for="cash_payment_on">فعال</label>
                                                    </div>

                                                </div>
                                                <!--end /div-->
                                            </div>
                                            <!--end media body-->
                                        </div>
                                        <!--end media-->
                                    </div>
                                </div>

                            </div>

                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">آیکون فروشگاه</h4>
                                <a class="mr-2 font-15" href="" id="icon-delete" title="حذف" data-type="icon" data-name="{{ \Auth::user()->shop()->first()->english_name }}" data-id="{{ \Auth::user()->shop()->first()->id }}"><i
                                      class="far fa-trash-alt text-danger font-18 pl-2"></i>حذف</a>
                                <input type="file" id="input-file-now" name="icon" class="dropify" data-default-file="{{ \Auth::user()->shop()->first()->icon['original'] }}">
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">لوگوی فروشگاه</h4>
                                <a class="mr-2 font-15" href="" id="icon-delete" title="حذف" data-type="logo" data-name="{{ \Auth::user()->shop()->first()->english_name }}" data-id="{{ \Auth::user()->shop()->first()->id }}"><i
                                      class="far fa-trash-alt text-danger font-18 pl-2"></i>حذف</a>
                                <input type="file" id="input-file-now" name="logo" class="dropify" data-default-file="{{ \Auth::user()->shop()->first()->logo['original'] }}">
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                </div>
                <div class="text-right mb-3">
                    <button data-toggle="modal" data-target="#AddWalletModal" type="submit" class="btn btn-success px-5 py-2  iranyekan rounded ">ثبت تغییرات</button><br>
                </div>
            </form>
        </div>

        <div class="tab-pane fade in show active" id="contact" role="tabpanel">
      <form method="post" action="{{ route('shops.update', ['id' => \Auth::user()->shop()->first()->id, 'shop' => \Auth::user()->shop->english_name]) }}">
          @csrf
          @method('PUT')

          <div class="row">
              <div class="col-xl-12">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="mt-0 header-title"> اطلاعات ارتباطی فروشگاه</h4>
                      </div>


                      <div class="form-group">
                          <div class="col-sm-12 input-group">
                              <label for="example-password-input" class="col-sm-2 col-form-label text-center">ایمیل فروشگاه</label>
                              <input class="form-control" type="email" name="shop_email" style="direction: ltr" id="example-password-input" value="{{ old('shop_email', $shopContactInformation->shop_email) }}">
                              <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fas fa-envelope text-dark font-18"></i></span></div>
                          </div>
                      </div>


                      <div class="form-group">
                          <div class="col-sm-12 input-group">
                              <label for="example-password-input" class="col-sm-2 col-form-label text-center">تلفن ثابت فروشگاه</label>
                              <input class="form-control" type="text" name="tel" id="example-password-input" value="{{ old('tel', $shopContactInformation->tel) }}">
                              <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fas fa-phone text-dark font-18"></i></span></div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-12 input-group">
                              <label for="example-tel-input" class="col-sm-2 col-form-label text-center">تلفن همراه</label>
                              <input class="form-control" type="text" name="phone" disabled value="{{ \Auth::user()->mobile }}" id="example-tel-input">
                              <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fas fa-mobile-alt text-dark font-18"></i></span></div>
                          </div>
                      </div>
                      <!--end card-body-->
                  </div>
                  <!--end card-->
              </div>
              <div class="col-xl-12">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="mt-0 header-title">شبکه های اجتماعی</h4>
                          <p class="text-muted mb-3">در این بخش میتوانید شبکه های اجتماعی فروشگاه خود را ویرایش کنید . این شبکه های اجتماعی در صورت فعال بودن در صفحه ی اول فروشگاه برای کابران به نمایش در خواهد آمد.<p>
                      </div>




                      <div class="form-group">
                          <div class="col-sm-12 input-group">
                              <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">تلگرام</label>
                              <input type="text" class="form-control" name="telegram_url" value="{{ old('telegram_url', $shopContactInformation->telegram_url) }}">
                              <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fab fa-telegram text-dark font-18"></i></span></div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-12 input-group">
                              <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">اینستاگرام</label>
                              <input type="text" class="form-control" name="instagram_url"  value="{{ old('instagram_url', $shopContactInformation->instagram_url) }}">
                              <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fab fa-instagram text-dark font-18"></i></span></div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-12 input-group">
                              <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">فیسبوک</label>
                              <input type="text" class="form-control" name="facebook_url"  value="{{ old('facebook_url', $shopContactInformation->facebook_url) }}">
                              <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fab fa-facebook-f text-dark font-18"></i></span></div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-12 input-group">
                              <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">سروش</label>
                              <input type="text" class="form-control" name="soroush_url" value="{{ old('soroush_url', $shopContactInformation->soroush_url) }}">
                              <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fa fa-bullseye text-dark font-18"></i></span></div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-12 input-group">
                              <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">بیسفون</label>
                              <input type="text" class="form-control" name="bisphone_url"  value="{{ old('bisphone_url', $shopContactInformation->bisphone_url) }}">
                              <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fa fa-certificate	 text-dark font-18"></i></span></div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-12 input-group">
                              <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">آی گپ</label>
                              <input type="text" class="form-control" name="Igap_url" value="{{ old('Igap_url', $shopContactInformation->Igap_url) }}">
                              <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fa fa-check-circle text-dark font-18"></i></span></div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-12 input-group">
                              <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">گپ</label>
                              <input type="text" class="form-control" name="gap_url" value="{{ old('gap_url', $shopContactInformation->gap_url) }}">
                              <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fa fa-comment	 text-dark font-18"></i></span></div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-12 input-group">
                              <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">ویسپی</label>
                              <input type="text" class="form-control" name="wispi_url" value="{{ old('wispi_url', $shopContactInformation->wispi_url) }}">
                              <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fa fa-hashtag	 text-dark font-18"></i></span></div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-12 input-group">
                              <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">بله</label>
                              <input type="text" class="form-control" name="bale_url" value="{{ old('bale_url', $shopContactInformation->bale_url) }}">
                              <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fa fa-envelope-open	 text-dark font-18"></i></span></div>
                          </div>
                      </div>
                      <!--end card-body-->
                  </div>
                  <!--end card-->
              </div>
              <div class="col-xl-12">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="mt-0 header-title">موقعیت فروشگاه</h4>
                          <p class="text-muted mb-3">در این بخش میتوانید موقعیت مکانی فروشگاه خود را به صورت دقیق مشخص نمایید.<p>
                      </div>

                      <div class="form-group">
                          <div class="col-sm-12 input-group">
                              <label for="example-week-input" class="col-sm-2 col-form-label text-center">استان فروشگاه</label>
                              <input class="form-control" type="text" name="province"  id="example-week-input" value="{{ old('province', $shopContactInformation->province) }}">
                              <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fas fa-map text-dark font-18"></i></span></div>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-sm-12 input-group">
                              <label for="example-week-input" class="col-sm-2 col-form-label text-center">شهر فروشگاه</label>
                              <input class="form-control" type="text" name="city"  id="example-week-input" value="{{ old('city', $shopContactInformation->city) }}">
                              <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fas fa-city text-dark font-18"></i></span></div>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-sm-12 input-group">
                              <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">آدرس فروشگاه</label>
                              <input class="form-control" type="text" name="address"  id="example-datetime-local-input"
                                value="{{ old('address', $shopContactInformation->address) }}">
                              <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fas fa-address-card text-dark font-18"></i></span></div>
                          </div>
                      </div>


                      <!--end card-body-->
                  </div>
                  <!--end card-->
              </div>
              <!--end col-->

              <!--end col-->
          </div>
          <div class="text-right mb-3">
              <button data-toggle="modal" data-target="#AddWalletModal" type="submit" class="btn btn-success px-5 py-2  iranyekan rounded">ثبت تغییرات</button><br>
          </div>
      </form>
  </div>



    </div>
    @endsection
    @section('pageScripts')
    <script src="/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/jquery.datatable.init.js"></script>
    @stop
