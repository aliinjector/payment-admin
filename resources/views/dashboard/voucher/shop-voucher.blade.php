@extends('dashboard.layouts.master')
@section('content')
<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/css/search.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/css/btn.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/css/loader.css" rel="stylesheet" type="text/css">

<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item ">لیست محصولات</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">لیست محصولات</h4>
                </div>
                @include('dashboard.layouts.errors')

                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-12">


                <main>
                    <div class="row mt-5">
                        <div class="search-box">
                            <div class="search-icon"><i class="fa fa-search search-icon"></i></div>
                            <form action="{{ route('shops-vouchers.index') }}" class="search-form" method="get" id="srch">
                                <input type="text" placeholder="نام فروشگاه (لاتین)" id="search" name="q">
                            </form>
                            <svg class="search-border" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" viewBox="0 0 671 111"
                              style="enable-background:new 0 0 671 111;" xml:space="preserve">
                                <path class="border" d="M335.5,108.5h-280c-29.3,0-53-23.7-53-53v0c0-29.3,23.7-53,53-53h280" />
                                <path class="border" d="M335.5,108.5h280c29.3,0,53-23.7,53-53v0c0-29.3-23.7-53-53-53h-280" />
                            </svg>
                            <div class="go-icon"><i class="fa fa-arrow-right"></i></div>
                        </div>

                    </div>
                </main>

                <div class="ctn mb-5 mt-3 row justify-content-center">
                    <a href="javascript:$('#srch').submit();" id="showShops" class="button2 b-blue rot-135">جستجو</a>

                </div>

                @if(count(request()->all()) != 0 )
                    <div class="card search-result">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">لیست محصولات</h4>


                            <p class="text-muted mb-4 font-13">لیست تمامی محصولات شما</p>
                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">

                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">

                                            <table id="datatable" class="table table-bordered dt-responsive dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                              aria-describedby="datatable_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 405px;">
                                                            ردیف
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 148px;">نام کد تخفیف</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 104px;">وضعیت کد تخفیف</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">نام فروشگاه</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">کد</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">تعداد استفاده</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">میزان تخفیف</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">تاریخ شروع </th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">تاریخ انقضا</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="byekan">
                                                    @php
                                                    $id = 1;
                                                    @endphp
                                                    @foreach ($vouchers as $voucher)

                                                    <tr role="row" class="odd icon-hover hover-color" id="{{ $voucher->id }}">
                                                        <td>{{ $id }}</td>
                                                        <td>{{ $voucher->name }}</td>
                                                        <td class="font-18">
                                                            @csrf
                                                            {{ method_field('put') }}
                                                            <button class="btn btn-link p-0 change" type="submit" data-id="{{ $voucher->id }}">
                                                                @if($voucher->status == 1)
                                                                    <i class="fa fa-toggle-on text-success show{{ $voucher->id }}"></i>
                                                                    <i class="fa fa-toggle-off text-muted d-none {{ $voucher->id }}"></i>
                                                                    @else
                                                                    <i class="fa fa-toggle-on text-success d-none {{ $voucher->id }}"></i>
                                                                    <i class="fa fa-toggle-off text-muted show{{ $voucher->id }}"></i>
                                                                    @endif
                                                            </button>
                                                            @if ($voucher->status == 1)
                                                            <span class="badge badge-soft-success show{{ $voucher->id }}">
                                                                فعال
                                                            </span>
                                                            <span class="badge badge-soft-pink d-none {{ $voucher->id }}">
                                                                غیرفعال
                                                            </span>
                                                            @else
                                                            <span class="badge badge-soft-success d-none {{ $voucher->id }}">
                                                                فعال
                                                            </span>
                                                            <span class="badge badge-soft-pink show{{ $voucher->id }}">
                                                                غیرفعال
                                                            </span>
                                                            @endif
                                                            {{-- </form> --}}

                                                        </td>
                                                        <td>{{ $voucher->shop->english_name }}</td>
                                                        <td>{{ $voucher->code }}</td>
                                                        <td>{{ $voucher->uses }}</td>
                                                        <td>{{ $voucher->discount_amount }}</td>
                                                        <td>{{ jdate($voucher->starts_at) }}</td>
                                                        <td class=" p-3">{{ jdate($voucher->expires_at) }}
                                                            <div class="d-none icon-show">
                                                                <a href="{{ $voucher->id }}" title="ویرایش" id="editVoucher" data-toggle="modal" data-target="#UpdateVoucherModal{{ $voucher->id }}"><i
                                                                      class="far fa-edit text-info mr-1 button font-15"></i>
                                                                </a>

                                                                <a href="" id="removeVoucher" title="حذف" data-id="{{ $voucher->id }}" data-name="{{ $voucher->description }}"><i class="far fa-trash-alt text-danger font-15"></i></a>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    @php
                                                    $id ++
                                                    @endphp
                                                    @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite"></div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    @endif


                    <div class="shop-list"></div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- container -->
</div>

@endsection
@section('pageScripts')
<script src="/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/jquery.datatable.init.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#search").focus(function() {
            $(".search-box").addClass("border-searching");
            $(".search-icon").addClass("si-rotate");
        });
        $("#search").blur(function() {
            $(".search-box").removeClass("border-searching");
            $(".search-icon").removeClass("si-rotate");
        });
        $("#search").keyup(function() {
            if ($(this).val().length > 0) {
                $(".go-icon").addClass("go-in");
            } else {
                $(".go-icon").removeClass("go-in");
            }
        });
        $(".go-icon").click(function() {
            $(".search-form").submit();
        });
    });
</script>


@stop
