@extends('dashboard.layouts.master')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol style="direction: ltr" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">تنظیمات و پروفایل کاربری</a></li>
                        <li class="breadcrumb-item active">داشبورد پین پی</li>
                    </ol>
                </div>
                <h4 class="page-title">داشبورد اصلی</h4></div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body met-pro-bg">
                        <div class="met-profile">
                            <div class="row">
                                <div class="col-lg-4 mb-3 mb-lg-0 align-self-center">
                                    <div class="met-profile-main">
                                        <div class="met-profile-main-pic"><img style="width: 100px;" src="{{ asset($user->avatar) }}" alt="" class="rounded-circle"></div>
                                        <div class="met-profile_user-detail">
                                            <h5 class="met-user-name"> {{ $user->firstName . ' ' . $user->lastName }} </h5>
                                            <p class="mb-0 met-user-name-post">عضو از تاریخ :  {{ jdate($user->created_at) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4 ml-auto">
                                    <ul class="list-unstyled personal-detail">
                                        <li class=""><i class="dripicons-phone mr-2 text-info font-18"></i><b>تلفن همراه </b>: {{ $user->mobile }}</li>
                                        <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i><b>آدرس ایمیل </b>: {{ $user->email }}</li>
                                        <li class="mt-2"><i class="dripicons-location text-info font-18 mt-2 mr-2"></i><b>شهر: </b>{{ $user->userInformation->city }}</li>
                                    </ul>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end f_profile-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @include('dashboard.layouts.errors')

                        <form method="POST" action="{{ route('user.user-edit.update', $user->id ) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                            <!--end form-group-->

                            <!--end form-group-->
                            <div class="form-group">
                                <label for="setPassword">نام</label>
                                <input type="text" class="form-control" name="firstName" id="current-password" value={{ old('firstName',  $user->firstName ) }}>
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                            </div>

                            <div class="form-group">
                                <label for="setPassword">نام خانوادگی</label>
                                <input type="text" class="form-control" name="lastName" id="new-password" value={{ old('lastName',  $user->lastName) }}>
                            </div>
                            <div class="form-group">
                                <label for="setEmail">آدرس ایمیل</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email',  $user->email) }}" id="setEmail">
                            </div>
                            <div class="form-group">
                                <label for="setPassword">شماره موبایل </label>
                                <input type="text" class="form-control" name="mobile" id="new-password_confirmation" value={{ old('mobile',  $user->mobile ) }}>
                            </div>
                            <div class="form-group">
                              <label for="setPassword">وضعیت کاربر</label>
                                             <select class="form-control" name="info_status">
                                                     @for ($i=1; $i <= 5; $i++)
                                                     <option {{ $user->userInformation->status == $i ? 'selected' : ''}} value="{{ $i }}">@if($i == 1)درانتظار تایید شماره موبایل @elseif($i == 2)درانتظار تایید ایمیل @elseif($i == 3) درانتظار بارگذاری اطلاعات فردی و آپلود مدارک @elseif($i == 4) درانتظار تایید اطلاعات فردی و آپلود مدارک @elseif($i == 5) تایید شده @endif</option>
                                                   @endfor
                                             </select>
                                         </div>
                            <div class="form-group">
                              <label for="setPassword">وضعیت فعالیت کاربر</label>
                                             <select class="form-control" name="status">

                                                     <option {{ $user->status == 'active' ? 'selected' : ''}} value="active">فعال</option>
                                                     <option {{ $user->status == 'inActive' ? 'selected' : ''}} value="inActive">غیرفعال</option>

                                             </select>
                                         </div>
                            {{-- <div class="form-group">
                              <div class="card mt-3">
                                  <div class="card-body">
                                      <h4 class="mt-0 header-title">آواتار</h4>
                                      <input type="file" id="input-file-now" name="avatar" class="dropify" data-default-file="{{ asset($user->avatar) }}">
                                  </div>
                              </div>
                            </div> --}}
                            <!--end form-group-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->

            <!--end col-->

            <!--end col-->
        </div>

    <center><button type="submit" class="btn btn-success">ثبت تنظیمات</button></center>

    </form>
    <!--end form-->


    <!--end row-->

        <!--end row-->
@endsection


@section('pageScripts')
@stop
