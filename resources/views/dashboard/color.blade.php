@extends('dashboard.layouts.master')
@section('content')
<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">
<style media="screen">
  .color{
    width: 30px;
    height: 30px;
    border : 1px solid gray;
    border-radius: 50px;
  }
</style>

<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                      <div class="text-right">
                         <a href="#" data-toggle="modal" data-target="#AddColorModal" class="btn btn-primary text-white d-inline-block text-right mb-3 font-weight-bold rounded"><i
                            class="fa fa-plus mr-2"></i>اضافه کردن رنگ</a>
                      </div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item ">لیست رنگ ها</li>
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
        @foreach($colors as $color)
<div class="modal fade bd-example-modal-xl" id="UpdateColor{{ $color->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ویرایش برند</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-scroll" style="background-color:#fbfcfd">
                <form action="{{ route('color.update', ['id' => $color->id]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="form-group mb-0">
                        <div class="input-group mt-3">
                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i
                               class="fas fa-star required-star mr-1"></i>نام رنگ:</span></div>
                            <input type="text" class="form-control inputfield" name="name" value="{{ old('name', $color->name) }}">
                        </div>
                        <div class="input-group mt-3">
                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i
                               class="fas fa-star required-star mr-1"></i>کد رنگ :</span></div>
                            <input type="color" class="form-control inputfield" name="code" value="#{{ old('name', $color->code) }}">
                        </div>

                    </div>
                    <!--end form-group-->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger rounded" data-dismiss="modal">انصراف</button>
                <button type="submit" class="btn btn-primary rounded">ثبت درخواست</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">لیست رنگ ها</h4>
                    <p class="text-muted mb-4 font-13">لیست تمامی رنگ های سامانه</p>
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                      <div class="modal fade bd-example-modal-xl" id="AddColorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                         <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                               <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard-shop-product-category.addCategoryTitle') }}</h5>
                                  <button type="button" class="close rounded" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                               </div>
                               <div class="modal-body modal-scroll" style="background-color:#fbfcfd">
                                  <form action="{{ route('color.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                     @csrf
                                     <div class="form-group mb-0">
                                        <div class="input-group mt-3">
                                           <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i
                                              class="fas fa-star required-star mr-1"></i>نام رنگ :</span></div>
                                           <input type="text" class="form-control inputfield" value="{{ old('name') }}" name="name" placeholder="مثال : قرمز">
                                        </div>
                                        <div class="input-group mt-3">
                                           <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i
                                              class="fas fa-star required-star mr-1"></i>کد رنگ :</span></div>
                                           <input type="color" class="form-control inputfield" value="{{ old('code') }}" name="code">
                                        </div>
                                     </div>
                                     <!--end form-group-->
                               </div>
                               <div class="modal-footer justify-content-between">
                               <button type="button" class="btn btn-danger rounded" data-dismiss="modal">{{ __('dashboard-shop-product-category.addCategoryItem5') }}</button>
                               <div class="group">
                               <button type="submit" name="action" value="justSave" class="btn btn-primary rounded">{{ __('dashboard-shop-product-category.addCategoryItem6') }}</button>
                               </div>
                               </div>
                               </form>
                            </div>
                         </div>
                      </div>
                        <div class="row">
                            <div class="col-sm-12">
                              <div class="table-responsive">

                                <table id="datatable" class="table table-bordered dt-responsive dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">شناسه</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">نام</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">کد رنگ</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">تاریخ ایجاد</th>

                                        </tr>
                                    </thead>
                                    <tbody class="byekan">

                                        @foreach($colors as $color)
                                        <tr role="row" class="odd">
                                          <td class="iranyekan">{{ $color->id }}</td>
                                            <td class="iranyekan">
                                              <div class="row">
                                                <div class="color mt-3" style="background-color:#{{ $color->code }}"></div>
                                                <div class="p-3">
                                                  {{ $color->name }}
                                                </div>
                                              </td>
                                              </div>
                                            </div>
                                            <td class="iranyekan">{{ $color->code }}</td>
                                             <td>{{ jdate($color->created_at) }}
                                               <a href="" title="ویرایش" data-toggle="modal" data-target="#UpdateColor{{ $color->id }}"><i class="far fa-edit text-warning p-1"></i>
                                               </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                @if ($colors->count() == 0)
                                  <p class="font-17 text-center font-weight-bold"> رنگی وجود ندارد
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
<script>
    oTable = $('#datatable').DataTable(); //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
</script>
@stop
