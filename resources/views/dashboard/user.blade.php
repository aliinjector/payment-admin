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
                    <h4 class="title-text mt-0"> کاربران احراز هویت شده</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">{{ $userInformations->where('status', '=', '5')->count() }}</h3><i class="dripicons-cart card-eco-icon text-secondary align-self-center"></i></div>
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
                        <h3 class="font-weight-bold"> {{ $userInformations->where('status', '>',  '4')->count() }} </h3><i class="dripicons-wallet card-eco-icon text-success align-self-center"></i></div>
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
                    <h4 class="mt-0 header-title">لیست کاربران سامانه</h4>
                    <p class="text-muted mb-3">در این قسمت، میتوانید لیست کاربران پایان پی را مشاهده و با استفاده از قسمت ویرایش، اطلاعات کاربر را ویرایش و حذف نمایید.</p>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%; text-align: center" role="grid">
                        <thead>
                        <tr>
                            <th>شناسه</th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>ایمیل</th>
                            <th>موبایل</th>
                            <th>وضعیت</th>
                            <th>نوع</th>
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
                                <td>{{ $user->email }}</td>
                                <td style="font-family: BYekan!important;">{{ $user->mobile }}</td>
                                <td><span class="badge badge-primary">{{ $user->status == 'active' ? 'فعال' : 'غیرفعال' }}</span></td>
                                <td><span class="badge badge-primary">{{ $user->type == 'user' ? 'کاربر' : 'مشتری' }}</span></td>
                                <td style="font-family: BYekan; direction: ltr">{{ jdate($user->created_at) }}</td>
                                <td style="font-family: BYekan; direction: ltr">{{ jdate($user->updated_at) }}</td>

                               <td>
                                 <a href="{{ route('user.edit', $user->id) }}"><i class="far fa-edit text-warning p-1"></i>
                                        @if($user->deleted_at == null)
                                 <a href="" data-id="{{ $user->id }}" data-name="{{ $user->firstName . ' ' . $user->lastName }}" id="removeUser"><i class="fa fa-trash text-danger p-1"></i>
                                 @else
                                 <a href="" data-id="{{ $user->id }}" data-name="{{ $user->firstName . ' ' . $user->lastName }}" id="restoreUser"><i class="fas fa-undo p-1 text-success"></i>
                                 @endif
                                 </a>
                               </td>
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
    <script type="text/javascript">
    $(document).on('click', '#removeUser', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      var name = $(this).data('name');
      swal(` ${'حذف کاربر:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
              dangerMode: true,
              icon: "warning",
              buttons: ["انصراف", "حذف"],
          })
          .then(function(isConfirm) {
              if (isConfirm) {
                  $.ajax({
                      type: "post",
                      url:  "/dashboard/user/delete",
                      data: {
                          id: id,
                          "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                      },
                      success: function(data) {
                        swal('عملیات با موفقیت انجام شد', {
                                icon: "success",
                                buttons: ['ادامه'],
                            })
                            setTimeout(function(){
                              var url = "/dashboard/user";
                              location.href = url;
                            }, 1300);
                      }
                  });
              } else {
                  toastr.warning('لغو شد.', '', []);
              }
          });
    });
    </script>
    <script type="text/javascript">
    $(document).on('click', '#restoreUser', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      var name = $(this).data('name');
      swal(` ${'بازگشت کاربر:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
              dangerMode: true,
              icon: "warning",
              buttons: ["انصراف", "حذف"],
          })
          .then(function(isConfirm) {
              if (isConfirm) {
                  $.ajax({
                      type: "post",
                      url:  "/dashboard/user/restore",
                      data: {
                          id: id,
                          "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                      },
                      success: function(data) {
                        swal('عملیات با موفقیت انجام شد', {
                                icon: "success",
                                buttons: ['ادامه'],
                            })
                            setTimeout(function(){
                              var url = "/dashboard/user";
                              location.href = url;
                            }, 1300);
                      }
                  });
              } else {
                  toastr.warning('لغو شد.', '', []);
              }
          });
    });
    </script>

@stop
