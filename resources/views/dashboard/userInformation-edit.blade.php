@extends('dashboard.layouts.master')
@section('content')
    <link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol style="direction: ltr" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">احراز هویت</a></li>
                        <li class="breadcrumb-item active">داشبورد پایان پی</li>
                    </ol>
                </div>
                <h4 class="page-title">تکمیل مدارک و احراز هویت </h4></div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>


    @include('dashboard.layouts.errors')




    <form method="POST" action="{{ route('UserInformation.update', $user->userInformation->id ) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">مرحله سوم: اطلاعات کاربری</h4>
                        <p class="text-muted mb-3">در این قسمت اطلاعات شخصی و هویتی خود را وارد نموده و مدارک درخواستی
                            را آپلود نمایید سپس منتظر تایید مدارک و اطلاعات توسط تیم پایان پی باشید.</p><br>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="example-text-input"
                                           class="col-sm-2 col-form-label text-center">نام</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="firstName" disabled
                                               value="{{ $user->firstName }}" id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label style="text-align: center" for="example-email-input"
                                           class="col-sm-2 col-form-label text-center">نام خانوادگی</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="lastName" disabled
                                               value="{{ $user->lastName }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label style="text-align: center" for="example-email-input"
                                           class="col-sm-2 col-form-label text-center">نام پدر</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="fatherName"
                                               value="{{ old('fatherName', $user->userInformation->fatherName) }}"
                                               placeholder="مثال: رضا">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-sm-2 col-form-label text-center">تلفن
                                        همراه</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="mob"
                                               value="{{ $user->mobile }}" disabled id="example-tel-input">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-week-input"
                                           class="col-sm-2 col-form-label text-center">شهر</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="city"
                                               value="{{ old('city', $user->userInformation->city) }}"
                                               placeholder=" مثال: تهران" id="example-week-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-datetime-local-input"
                                           class="col-sm-2 col-form-label text-center">آدرس</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="address"
                                               value="{{ old('address', $user->userInformation->address) }}"
                                               placeholder="مثال: خیابان پاسداران - گلستان چهارم - پلاک ۲۱ - واحد ۱۱"
                                               id="example-datetime-local-input">
                                    </div>
                                </div>


                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-sm-2 col-form-label text-center">کد
                                        ملی</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="nationalCode"
                                               value="{{ old('nationalCode', $user->userInformation->nationalCode) }}"
                                               placeholder="مثال: ۰۹۲۴۲۴۳۴۴۴" id="example-search-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-2 col-form-label text-center">شماره
                                        شناسنامه</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="shenasnamehCode"
                                               value="{{ old('shenasnamehCode', $user->userInformation->shenasnamehCode) }}"
                                               placeholder="مثال: ۰۹۲۴۲۴۳۴۴۴" id="example-url-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-password-input" class="col-sm-2 col-form-label text-center">تلفن
                                        ثابت</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="tel"
                                               value="{{ old('tel', $user->userInformation->tel) }}"
                                               placeholder="مثال: 02122222222" id="example-password-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-2 col-form-label text-center">محل
                                        صدور</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="placeOfIssue"
                                               value="{{ old('placeOfIssue', $user->userInformation->placeOfIssue) }}"
                                               placeholder="مثال: تهران" id="example-url-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-date-input" class="col-sm-2 col-form-label text-center">تاریخ
                                        تولد</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="birthDate"
                                               value="{{ old('birthDate', $user->userInformation->birthDate) }}"
                                               placeholder="مثال: ۱۳۶۶/۰۷/۲۷" id="example-date-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-week-input" class="col-sm-2 col-form-label text-center">کد
                                        پستی</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text " name="zipCode"
                                               value="{{ old('zipCode', $user->userInformation->zipCode) }}"
                                               placeholder="مثال: ۱۶۶۵۶۶۵۶۶" id="example-week-input">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-week-input" class="col-sm-2 col-form-label text-center">
                                        وضعیت کاربر</label>
                                    <div class="col-sm-10">
                                      <select class="form-control" name="status">
                                              @for ($i=1; $i <= 5; $i++)
                                              <option {{ $user->userInformation->status == $i ? 'selected' : ''}} value="{{ $i }}">@if($i == 1)درانتظار تایید شماره موبایل @elseif($i == 2)درانتظار تایید ایمیل @elseif($i == 3) درانتظار بارگذاری اطلاعات فردی و آپلود مدارک @elseif($i == 4) درانتظار تایید اطلاعات فردی و آپلود مدارک @elseif($i == 5) تایید شده @endif</option>
                                            @endfor
                                      </select>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                    <div class="form-actions text-center  pb-3  ">
                        <button style="font-family: iranyekan!important;" type="submit" class="btn btn-success">
                            <i class="fa fa-check-square-o"></i> ارسال اطلاعات
                        </button>
                    </div>
                 </form>

    <!--end card-body-->
                </div>

                <!--end card-->
            </div>
            <!--end col-->
        </div>




    </div>




@endsection


@section('pageScripts')

@stop
