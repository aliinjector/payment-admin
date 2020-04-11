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
                        <li class="breadcrumb-item active">پنل مدیریت امید شاپ</li>
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
                        <h3 class="font-weight-bold"> {{ $users->count() }} </h3><i class="dripicons-user-group card-eco-icon text-pink align-self-center"></i></div>
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
                    <h4 class="title-text mt-0">تعداد کاربران فعال (تراکنش هفته) </h4>
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
                    <h4 class="mt-0 header-title">لیست کاربران شما</h4>
                    <p class="text-muted mb-3">در این قسمت، میتوانید لیست کاربران امید شاپ را مشاهده و با استفاده از قسمت ویرایش، اطلاعات کاربر را ویرایش و حذف نمایید.</p>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;text-align: center">
                        <thead>
                        <tr>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>ایمیل</th>
                            <th>موبایل</th>
                            <th>وضعیت</th>
                            <th>نوع</th>
                            <th>تاریخ ایجاد</th>
                            <th>تاریخ آخرین ویرایش</th>
                            <th>وضعیت احراز هویت</th>
                            <th>ویرایش</th>
                        </tr>

                        </thead>
                        <tbody>
                          {{-- {{ dd($users) }} --}}
                        @foreach ($users->where('id', 1) as $user)
                            <tr>
                                <td>{{ $user->firstName }}</td>
                                <td>{{ $user->lastName }}</td>
                                <td>{{ $user->email }}</td>
                                <td style="font-family: BYekan!important;">{{ $user->mobile }}</td>
                                <td><span class="badge badge-primary">{{ $user->status }}</span></td>
                                <td><span class="badge badge-primary">{{ $user->type }}</span></td>
                                <td style="font-family: BYekan; direction: ltr">{{ jdate($user->created_at) }}</td>
                                <td style="font-family: BYekan; direction: ltr">{{ jdate($user->updated_at) }}</td>
                                <td><span class="badge badge-primary">{{ $user->userInformation->status }}</span></td>
                               <td><a href="{{ route('user.show', $user->id) }}"> <button type="button" class="btn btn-dark waves-effect success" data-toggle="modal" data-animation="bounce" data-target="#ticketDetail{{$user->id}}">ویرایش و حذف</button></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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


@stop
