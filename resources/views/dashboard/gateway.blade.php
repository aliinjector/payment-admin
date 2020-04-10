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
                        <li class="breadcrumb-item"><a href="">درگاه های پرداخت</a></li>
                        <li class="breadcrumb-item active">داشبورد امید شاپ</li>
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
                    <h4 class="title-text mt-0">تعداد درگاه های پرداختی ثبت شده </h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold"> {{ $gateways->count() }} </h3><i class="dripicons-user-group card-eco-icon text-pink align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">تعداد درگاه های پرداختی باز </h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">{{ $gateways->where('status', 'باز')->count() }}</h3><i class="dripicons-cart card-eco-icon text-secondary align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">تعداد درگاه های پرداختی در انتظار پاسخ </h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold"> {{ $gateways->where('status', 'در انتظار پاسخ')->count() }} </h3><i class="dripicons-jewel card-eco-icon text-warning align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">تعداد درگاه های پرداختی در بسته شده </h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold"> {{ $gateways->where('status', 'بسته شده')->count() }} </h3><i class="dripicons-wallet card-eco-icon text-success align-self-center"></i></div>
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
                    <h4 class="mt-0 header-title">لیست درگاه های پرداختی کاربران</h4>
                    <p class="text-muted mb-3">در این قسمت، لیست درگاه های پرداختی ارسال شده از طرق کاربران را مشاهده میکنید و با استفاده از گزینه پاسخ، میتوانید پاسخ آنرا در سیستم ثبت نمایید.</p>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;text-align: center">
                        <thead>
                        <tr>
                            <th>کد درگاه پرداخت</th>
                            <th>نام درگاه پرداخت</th>
                            <th>نام و نام خانوادگی</th>
                            <th>کد ملی</th>
                            <th>مبلغ تراکنش</th>
                            <th>تاریخ افزودن</th>
                            <th>تاریخ آخرین تغییر</th>
                            <th>جزییات</th>
                            <th>لیست تسویه ها</th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach ($gateways as $gateway)
                            <tr>
                                <td><span style="font-size: 15px;padding: 11px 10px 10px!important;" class="badge badge-primary">{{ $gateway->key }}</span></td>
                                <td> {{ $gateway->name }}</td>
                                <td>{{ $gateway->user->firstName . ' ' .$gateway->user->lastName }}</td>
                                <td class="byekan">{{ $gateway->user->userInformation->nationalCode }}</td>
                                <td class="byekan">{{ number_format($gateway->amount) }} تومان</td>
                                <td style="font-family: BYekan; direction: ltr">{{ jdate($gateway->created_at) }}</td>
                                <td style="font-family: BYekan; direction: ltr">{{ jdate($gateway->updated_at) }}</td>
                                <td><button type="button" class="btn btn-dark waves-effect success" data-toggle="modal" data-animation="bounce" data-target="#ticketDetail{{$gateway->id}}">ویرایش</button></td>
                                <td><button type="button" class="btn btn-dark waves-effect success" data-toggle="modal" data-animation="bounce" data-target="#ticketDetail{{$gateway->id}}">تاریخچه تسویه</button></td>
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
