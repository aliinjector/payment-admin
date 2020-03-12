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
                              <div class="table-responsive">

                                <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">نام</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">آدرس</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">ایمیل صاحب فروشگاه</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">دسته بندی فروشگاه</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">وضعیت</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">تاریخ ایجاد فروشگاه</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody class="byekan">

                                        @foreach($shops as $shop)
                                        <tr role="row" class="odd">
                                          <td class="iranyekan">{{ $shop->name }}</td>
                                            <td class="iranyekan"><a href="{{Request::root() . "/" . $shop->english_name }}" target="_blank">{{Request::root() . "/" . $shop->english_name }}</a></td>
                                            <td class="iranyekan">{{ isset($shop->user->email) ? $shop->user->email : '' }}</td>
                                            <td class="iranyekan">{{ $shop->shopCategory()->get()->first()->name }}</td>
                                            <td>
                                      @csrf {{ method_field('put') }}
                                      <button class="btn btn-link change" type="submit" data-id="{{ $shop->id }}">
                                      @if($shop->status == 1)
                                      <i class="fa fa-toggle-on text-success show{{ $shop->id }}"></i>
                                      <i class="fa fa-toggle-off text-muted d-none {{ $shop->id }}"></i>
                                      @else
                                      <i class="fa fa-toggle-on text-success d-none {{ $shop->id }}"></i>
                                      <i class="fa fa-toggle-off text-muted show{{ $shop->id }}"></i>
                                      @endif
                                      </button>
                                      @if ($shop->status == 1)
                                      <span class="badge badge-soft-success show{{ $shop->id }}">
                                      {{ __('dashboard-shop-product-index.ListMahsoolatTableStatusEnable') }}
                                      </span>
                                      <span class="badge badge-soft-pink d-none {{ $shop->id }}">
                                      {{ __('dashboard-shop-product-index.ListMahsoolatTableStatusDisable') }}
                                      </span>
                                      @else
                                      <span class="badge badge-soft-success d-none {{ $shop->id }}">
                                      {{ __('dashboard-shop-product-index.ListMahsoolatTableStatusEnable') }}
                                      </span>
                                      <span class="badge badge-soft-pink show{{ $shop->id }}">
                                      {{ __('dashboard-shop-product-index.ListMahsoolatTableStatusDisable') }}
                                      </span>
                                      @endif
                                   </td>
                                             <td>{{ jdate($shop->created_at) }}</td>
                                             <td>
                                               <button type="button" class="btn btn-primary rounded">
                                               <a href="{{ isset($action) ? route($action['url'], $shop->id) : route('shops.edit', $shop->id) }}" class="text-white">{{ isset($action) ? $action['name'] : 'تنظیمات' }}
                                                 </a>

                                             </button>
                                               <button type="button" class="btn btn-dropbox rounded">
                                               <a href="{{ isset($action) ? route($action['trashedUrl'], $shop->id) : 'localhost:8000/login021' }}" class="text-white">{{ isset($action) ? $action['trashed'] : ' ورود به فروشگاه' }}
                                                 </a>

                                             </button>

                                           </td>
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
<script type="text/javascript">
$(".change").click(function() {
  console.log('hi');
      var id = $(this).data("id");
      $.ajax({
          url: "/dashboard/shop/shops/change-status/" + id,
          type: 'put',
          dataType: "JSON",
          data: {
              "id": id,
              "_method": 'put',
              "_token": $('#csrf-token')[0].content,
          }

      });
      $("i." + id).toggleClass("d-none");
      $("span." + id).toggleClass("d-none");
      $("i.show" + id).toggleClass("d-none");
      $("span.show" + id).toggleClass("d-none");
      toastr.success('انجام شد.', '', [])
  });
</script>
@stop
