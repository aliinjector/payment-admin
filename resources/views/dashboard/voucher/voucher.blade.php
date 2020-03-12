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
                            <li class="breadcrumb-item ">لیست کد های تخفیف</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">کد های تخفیف </h4>
                </div>
                @include('dashboard.layouts.errors')

                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-12">
                    <div class="card search-result">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">لیست کد های تخفیف</h4>


                            <p class="text-muted mb-4 font-13">لیست تمامی کد های تخفیف فروشگاه</p>
                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">

                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">

                                            <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                              aria-describedby="datatable_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 405px;">
                                                            ردیف
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 148px;">نام کد تخفیف</th>

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
                              @foreach($vouchers as $voucher)
                              <tr role="row" class="odd icon-hover hover-color" id="{{ $voucher->id }}">
                                  <td>{{ $id }}</td>
                                  <td>{{ $voucher->name }}</td>
                                  <td>{{ $voucher->shop->english_name }}</td>
                                  <td>{{ $voucher->code }}</td>
                                  <td>{{ $voucher->uses }}</td>
                                  <td>{{ $voucher->discount_amount }}</td>
                                  <td>{{ jdate($voucher->starts_at) }}</td>
                                  <td class=" p-3">{{ jdate($voucher->expires_at) }}
                                      <div class="d-none icon-show">
                                          <a href="{{ $voucher->id }}" title="ویرایش" id="editVoucher" data-toggle="modal" data-target="#UpdateVoucherModal{{ $voucher->id }}"><i class="far fa-edit text-info mr-1 button font-15"></i>
                                          </a>
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
