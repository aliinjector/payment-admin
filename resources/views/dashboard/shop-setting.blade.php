@extends('dashboard.layouts.master')
@section('content')
<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <ol style="direction: ltr" class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">احراز هویت</a></li>
                    <li class="breadcrumb-item active">داشبورد پین پی</li>
                </ol>
            </div>
            <h4 class="page-title">تنظیمات فروشگاه</h4>
        </div>
        <!--end page-title-box-->
    </div>
    <!--end col-->
</div>
@include('dashboard.layouts.errors')

<form method="post" action="{{ route('shop-setting.update', \Auth::user()->id) }}"  enctype="multipart/form-data">
  @csrf
  @method('PUT')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mt-0 header-title">اطلاعات فروشگاه</h3>
                    <p class="text-muted mb-3">در این قسمت اطلاعات فروشگاه خود وارد نموده و موارد درخواستی را آپلود نمایید سپس منتظر تایید اطلاعات توسط تیم پایان پی باشید.</p><br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-center">نام</label>
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

                            <div class="form-group row">
                                <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">عنوان فروشگاه</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="title" placeholder="مثال: پایان پی"                                                value="{{ old('title', $shopInformation->title) }}"
                                    >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">توضیحات فروشگاه </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="description" placeholder="مثال: فروش و توضیع محصولات با کیفیت" value="{{ old('description', $shopInformation->description) }}">
                                </div>
                            </div>
                  
                        </div>

                    </div>
    <div class="row mt-4">
        <div class="col-lg-4 border-left p-3">
                    <div class="media setting-card"><span class="sett-card-icon set-icon-purple"><i class="fa fa-shipping-fast"></i></span>
                        <div class="media-body align-self-center">
                            <div class="setting-detail">
                                <h3 class="mb-0 mt-0 iranyekan">ارسال سریع</h3>
                                <p class="text-muted mb-0">
                                    حداقل مبلغ سبد خرید فقط برای تهران ۰ تومان.</p>
                            </div>
                            <div class="mt-3">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons1">
                                    <button type="button" class="btn btn-soft-success btn-round waves-effect waves-light mr-2 iranyekan"><i class="mdi mdi-check-all mr-2 "></i>فعال</button>
                                    <button type="button" class="btn btn-soft-pink btn-round waves-effect waves-light iranyekan"><i class="mdi mdi-power mr-2"></i>غیرفعال</button>
                                </div>
                                <!--end btn-group-->
                            </div>
                            <!--end /div-->
                        </div>
                        <!--end media body-->
                    </div>
                    <!--end media-->

        </div>
        <!--end col-->
        <div class="col-lg-4 border-left p-3">
                    <div class="media setting-card"><span class="sett-card-icon set-icon-success"><i class="fa fa-truck"></i></span>
                        <div class="media-body align-self-center">
                            <div class="setting-detail">
                                <h3 class="mb-0 mt-0 iranyekan"> ارسال پستی</h3>
                                <p class="text-muted mb-0">

                                    هزینه ارسال برای تهران ۵٫۰۰۰ تومان.</p>
                            </div>
                            <div class="mt-3">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons2">
                                    <button type="button" class="btn btn-soft-success btn-round waves-effect waves-light mr-2 iranyekan"><i class="mdi mdi-check-all mr-2"></i>فعال</button>
                                    <button type="button" class="btn btn-soft-pink btn-round waves-effect waves-light iranyekan"><i class="mdi mdi-power mr-2"></i>غیرفعال</button>
                                </div>
                                <!--end btn-group-->
                            </div>
                            <!--end /div-->
                        </div>
                        <!--end media body-->
                    </div>
                    <!--end media-->

        </div>
        <!--end col-->
        <div class="col-lg-4  p-3">
                    <div class="media setting-card"><span class="sett-card-icon set-icon-danger"><i class="fa fa-people-carry"></i></span>
                        <div class="media-body align-self-center">
                            <div class="setting-detail">
                                <h3 class="mb-0 mt-0 iranyekan">دریافت حضوری</h3>
                                <p class="text-muted mb-0">

                                    در صورتی که امکان دریافت حضوری محصولات توسط مشتری وجود دارد.</p>
                            </div>
                            <div class="mt-3">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons3">
                                    <button type="button" class="btn btn-soft-success btn-round waves-effect waves-light mr-2 iranyekan"><i class="mdi mdi-check-all mr-2"></i>فعال</button>
                                    <button type="button" class="btn btn-soft-pink btn-round waves-effect waves-light iranyekan"><i class="mdi mdi-power mr-2"></i>غیرفعال</button>
                                </div>
                                <!--end btn-group-->
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
                    <h4 class="mt-0 header-title">ایکون فروشگاه</h4>
                    <p class="text-muted mb-3">لطفا ایکون فروشگاه خود را آپلود نمایید.</p>
                    <div class="dropify-wrapper has-preview">
                        <div class="dropify-message"><span class="file-icon"></span>
                            <p>با استفاده از درگ دراپ ویا کلیک برروی کادر زیر فایل را آپلود نمایید.</p>
                            <p class="dropify-error">خطا</p>
                        </div>
                        <div class="dropify-loader" style="display: none;"></div>
                        <div class="dropify-errors-container">
                            <ul></ul>
                        </div>
                        <input name="icon" type="file" id="input-file-now-custom-1" class="dropify" data-default-file="/dashboard/assets/images/BrandNameHere.jpg">
                        <button type="button" class="dropify-clear">حذف</button>
                        <div class="dropify-preview" style="display: block;"><span class="dropify-render"><img src="/dashboard/assets/images/BrandNameHere.jpg"></span>
                            <div class="dropify-infos">
                                <div class="dropify-infos-inner">
                                    <p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner">نمونه ایکون</span></p>
                                    <p class="dropify-infos-message">با استفاده از درگ دراپ ویا کلیک برروی کادر زیر فایل را آپلود نمایید</p>
                                </div>
                            </div>
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
                    <h4 class="mt-0 header-title">لوگوی فروشگاه</h4>
                    <p class="text-muted mb-3">لطفا لوگوی فروشگاه خود را آپلود نمایید.</p>
                    <div class="dropify-wrapper has-preview">
                        <div class="dropify-message"><span class="file-icon"></span>
                            <p>با استفاده از درگ دراپ ویا کلیک برروی کادر زیر فایل را آپلود نمایید.</p>
                            <p class="dropify-error">خطا</p>
                        </div>
                        <div class="dropify-loader" style="display: none;"></div>
                        <div class="dropify-errors-container">
                            <ul></ul>
                        </div>
                        <input name="logo" type="file" id="input-file-now-custom-1" class="dropify" data-default-file="/dashboard/assets/images/BrandNameHere.jpg">
                        <button type="button" class="dropify-clear">حذف</button>
                        <div class="dropify-preview" style="display: block;"><span class="dropify-render"><img src="/dashboard/assets/images/BrandNameHere.jpg"></span>
                            <div class="dropify-infos">
                                <div class="dropify-infos-inner">
                                    <p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner">نمونه لوگو</span></p>
                                    <p class="dropify-infos-message">با استفاده از درگ دراپ ویا کلیک برروی کادر زیر فایل را آپلود نمایید</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
    </div>

    <div class="row comming-soon" >
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">اطلاعات حساب جهت تسویه</h4>
                    <p class="text-muted mb-3">لطفا شماره شبای حسابی که تمایل دارید درآمد شما از فروشگاه به آن واریز شود را وارد کنید. در صورتی که شماره شبای حساب خود را ندارید، می‌توانید از سایت بانکی که در آن حساب باز کرده‌اید اقدام به دریافت شماره
                        شبا نمایید.

                        توجه کنید که شماره شبای وارد شده باید به نام صاحب فروشگاه باشد. در صورت وجود هرگونه مغایرت تسویه انجام نخواهد شد.<p>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 input-group">
                        <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">شماره شبا</label>

                        <input type="text" class="form-control" placeholder="مثال: 49489415618941894125649653">
                        <div class="input-group-append"><span class="input-group-text bg-secondary text-white font-weight-bold" id="basic-addon8"> IR</span></div>
                    </div>
                </div>

                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->

        <!--end col-->
    </div>
  </div>

    <div class="text-right mb-3">
            <button data-toggle="modal" data-target="#AddWalletModal" type="submit" class="btn btn-success px-5 py-2  iranyekan ">ثبت تغییرات</button><br>
        </div>
      </form>

<form method="post" action="{{ route('shop.setting.updateContact', \Auth::user()->shop()->first()->id) }}">
  @csrf
  @method('PUT')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title"> اطلاعات ارتباطی فروشگاه</h4>
                    <p class="text-muted mb-3">در این بخش میتوانید اطلاعات ارتباط فروشگاه خود را وارد کنید.<p>
                </div>

                <div class="form-group">
                    <div class="col-sm-12 input-group">
                        <label for="example-password-input" class="col-sm-2 col-form-label text-center">ایمیل فروشگاه</label>
                        <input class="form-control" type="email" name="shop_email" placeholder="مثال: example@gmail.com" id="example-password-input"                                                value="{{ old('shop_email', $shopContactInformation->shop_email) }}">
                        <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fas fa-envelope text-dark font-18"></i></span></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 input-group">
                        <label for="example-password-input" class="col-sm-2 col-form-label text-center">تلفن ثابت فروشگاه</label>
                        <input class="form-control" type="text" name="tel" placeholder="مثال: example@gmail.com" id="example-password-input" value="{{ old('tel', $shopContactInformation->tel) }}">
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
                <div class="form-group">
                    <div class="col-sm-12 input-group">
                        <label for="example-week-input" class="col-sm-2 col-form-label text-center">شهر فروشگاه</label>
                        <input class="form-control" type="text" name="city" placeholder=" مثال: تهران" id="example-week-input" value="{{ old('city', $shopContactInformation->city) }}">
                        <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fas fa-city text-dark font-18"></i></span></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12 input-group">
                        <label for="example-week-input" class="col-sm-2 col-form-label text-center">استان فروشگاه</label>
                        <input class="form-control" type="text" name="province" placeholder=" مثال: تهران" id="example-week-input" value="{{ old('province', $shopContactInformation->province) }}">
                        <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fas fa-map text-dark font-18"></i></span></div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-sm-12 input-group">
                        <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">آدرس فروشگاه</label>
                        <input class="form-control" type="text" name="address" placeholder="مثال: خیابان پاسداران - گلستان چهارم - پلاک ۲۱ - واحد ۱۱" id="example-datetime-local-input" value="{{ old('address', $shopContactInformation->address) }}">
                        <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fas fa-address-card text-dark font-18"></i></span></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 input-group">
                        <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">تلگرام</label>
                        <input type="text" class="form-control" name="telegram_url" placeholder="مثال: tg://msg?text = www.example.com?t=12" value="{{ old('telegram_url', $shopContactInformation->telegram_url) }}">
                        <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fab fa-telegram text-dark font-18"></i></span></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 input-group">
                        <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">اینستاگرام</label>
                        <input type="text" class="form-control" name="instagram_url" placeholder="مثال: https://www.instagram.com/john_doe" value="{{ old('instagram_url', $shopContactInformation->instagram_url) }}">
                        <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fab fa-instagram text-dark font-18"></i></span></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 input-group">
                        <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">فیسبوک</label>
                        <input type="text" class="form-control" name="facebook_url" placeholder="مثال: https://www.facebook.com/ZambianWatchdog" value="{{ old('facebook_url', $shopContactInformation->facebook_url) }}">
                        <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fab fa-facebook-f text-dark font-18"></i></span></div>
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
            <button data-toggle="modal" data-target="#AddWalletModal" type="submit" class="btn btn-success px-5 py-2  iranyekan ">ثبت تغییرات</button><br>
        </div>
  </form>




    {{-- <div class="row">
                                <div class="card col-6">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">نماد الکترونیک</h4>
                                        <p class="text-muted mb-3">لطفا تصویر اسکن شده نماد الکترونیک خود را آپلود نمایید.</p>
                                        <div class="dropify-wrapper has-preview">
                                            <div class="dropify-message"><span class="file-icon"></span>
                                                <p>با استفاده از درگ دراپ ویا کلیک برروی کادر زیر فایل را آپلود نمایید.</p>
                                                <p class="dropify-error">خطا</p>
                                            </div>
                                            <div class="dropify-loader"></div>
                                            <div class="dropify-errors-container">
                                                <ul></ul>
                                            </div>
                                            <input type="file" id="input-file-now" class="dropify">
                                            <button type="button" class="dropify-clear">حذف</button>
                                            <div class="dropify-preview"><span class="dropify-render"></span>
                                                <div class="dropify-infos">
                                                    <div class="dropify-infos-inner">
                                                        <p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>
                                                        <p class="dropify-infos-message">با استفاده از درگ دراپ ویا کلیک برروی کادر زیر فایل را آپلود نمایید</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            <!--end col-->
                                <div class="card col-6">
                                    <div class="form-group mt-5">
                                        <label for="message" class="text-muted mt-2">کد نماد الکترونیک</label>
                                        <textarea class="form-control border-muted" rows="10" id="message" placeholder="کد نماد الکترونیک را وارد کنید"></textarea>
                                    </div>
                                </div>
                                <!--end card-->
                            <!--end col-->
                        </div> --}}


@endsection


@section('pageScripts')
<script src="/dashboard/assets/js/dropify.min.js"></script>
@stop
