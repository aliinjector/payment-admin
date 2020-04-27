@extends('dashboard.layouts.master')




@section('content')
    <link href="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">






    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol style="direction: ltr" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">مدیریت کاربران</a></li>
                        <li class="breadcrumb-item active">پنل مدیریت پایان پی</li>
                    </ol>
                </div>
                <h4 class="page-title">داشبورد اصلی</h4></div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">تعداد کل کاربران</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold"> {{ $userInformations->count() }} </h3><i class="dripicons-user-group card-eco-icon text-pink align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">تعداد کاربران احراز هویت شده</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">{{ $userInformations->where('status', '4')->count() }}</h3><i class="dripicons-cart card-eco-icon text-secondary align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">تعداد کاربران فعال</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold"> {{ $userInformations->where('status', '4')->count() }} </h3><i class="dripicons-jewel card-eco-icon text-warning align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">تعداد کاربران فروشگاه ساز </h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold"> {{ $userInformations->where('status', '4')->count() }} </h3><i class="dripicons-wallet card-eco-icon text-success align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">لیست کاربران سامانه (احراز هویت)</h4>
                    <p class="text-muted mb-3">در این قسمت، میتوانید لیست کاربران پایان پی را مشاهده و با استفاده از قسمت ویرایش، اطلاعات کاربر را ویرایش و حذف نمایید.</p>
                    <div class="table-responsive">
                            <table id="datatable" class="table table-bordered dt-responsive dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%; text-align: center" role="grid">
                            <thead>
                            <tr>
                                <th>شناسه</th>
                                <th>نام</th>
                                <th>نام خانوادگی</th>
                                <th>نام پدر</th>
                                <th>موبایل</th>
                                <th>تلفن ثابت</th>
                                <th>شهر</th>
                                <th>آدرس</th>
                                {{--<th>کد ملی</th>--}}
                                {{--<th>شماره شناسنامه</th>--}}
                                {{--<th>محل صدور</th>--}}
                                {{--<th>تاریخ تولد</th>--}}
                                {{--<th>کد پستی</th>--}}
                                <th>مشاهده تصویر کارت ملی</th>
                                <th>مشاهده تصویر شناسنامه</th>
                                <th>وضعیت</th>
                                <th>تاریخ ایجاد</th>
                                <th>تاریخ آخرین ویرایش</th>
                                <th>ویرایش</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->firstName }}</td>
                                    <td>{{ $user->lastName }}</td>
                                    <td>{{ $user->userInformation->fatherName }}</td>
                                    <td>{{ $user->mobile }}</td>
                                    <td style="font-family: BYekan!important;">{{ $user->userInformation->tel }}</td>
                                    <td><span class="badge badge-primary">{{ $user->userInformation->city }}</span></td>
                                    <td><span class="badge badge-primary">{{ $user->userInformation->address }}</span></td>

                                    {{--<td>{{ $user->userInformation->nationalCode }}</td>--}}
                                    {{--<td>{{ $user->userInformation->shenasnamehCode }}</td>--}}
                                    {{--<td>{{ $user->userInformation->placeOfIssue }}</td>--}}
                                    {{--<td>{{ $user->userInformation->birthDate }}</td>--}}
                                    {{--<td>{{ $user->userInformation->zipCode }}</td>--}}


                                    <td>{{ $user->userInformation->shenasnamehPic }}</td>
                                    <td>{{ $user->userInformation->melliCardPic }}</td>

                                    <td><span class="badge badge-primary">@if($user->userInformation->status == 1)درانتظار تایید شماره موبایل @elseif($user->userInformation->status == 2)درانتظار تایید ایمیل @elseif($user->userInformation->status == 3) درانتظار بارگذاری اطلاعات فردی و آپلود مدارک @elseif($user->userInformation->status == 4) درانتظار تایید اطلاعات فردی و آپلود مدارک @elseif($user->userInformation->status == 5) تایید شده @endif  </span></td>

                                    <td style="font-family: BYekan; direction: ltr">{{ jdate($user->userInformation->created_at) }}</td>
                                    <td style="font-family: BYekan; direction: ltr">{{ jdate($user->userInformation->updated_at) }}</td>
                                    <td><a href="{{ route('UserInformation.edit', $user->id) }}"><button type="button" class="btn btn-dark waves-effect success" data-toggle="modal" data-animation="bounce" data-target="#ticketDetail{{$user->userInformation->id}}">ویرایش</button></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>



    <!--end row-->

@endsection


@section('pageScripts')

    <script src="/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/jquery.datatable.init.js"></script>

    <script>
        oTable = $('#datatable').DataTable(); //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
    </script>

@stop
