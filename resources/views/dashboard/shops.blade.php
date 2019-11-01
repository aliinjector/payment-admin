@extends('dashboard.layouts.master')
@section('content')
<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">

<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">

<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item ">لیست فروشگاه ها</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title"></h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>



        @include('dashboard.layouts.errors')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">لیست فروشگاه ها</h4>


                    <p class="text-muted mb-4 font-13">لیست تمامی فروشگاه های موجود در سیستم</p>
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">نام</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">آدرس</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">ایمیل صاحب فروشگاه</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">دسته بندی فروشگاه</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">وضعیت</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">تاریخ ایجاد فروشگاه</th>
                                        </tr>
                                    </thead>
                                    <tbody class="byekan">

                                        @foreach($shops as $shop)
                                        <tr role="row" class="odd">
                                          <td class="iranyekan"><a href="{{ route('shops.show' , $shop->id) }}">{{ $shop->name }}</a></td>
                                            <td class="iranyekan"><a href="{{Request::root() . "/" . $shop->english_name }}" target="_blank">{{Request::root() . "/" . $shop->english_name }}</a></td>
                                            <td class="iranyekan">{{ $shop->user()->get()->first()->email }}</td>
                                            <td class="iranyekan">{{ $shop->category()->get()->first()->name }}</td>
                                            @if ($shop->status == 1)
                                            <td class="iranyekan"><span class="badge badge-soft-success">
                                                    فعال
                                                </span></td>
                                            @else
                                            <td class="iranyekan"><span class="badge badge-soft-pink">
                                                    غیرفعال
                                                </span></td>

                                            @endif
                                             <td>{{ jdate($shop->created_at) }}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                @if ($shops->count() == 0)
                                  <p class="font-17 text-center font-weight-bold"> دسته بندی وجود ندارد
                                  </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
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
