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
                            <li class="breadcrumb-item ">لیست نظرات</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">نظرات فروشگاه</h4>
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
                        <h4 class="mt-0 header-title">لیست نظرات</h4>


                        <p class="text-muted mb-4 font-13">لیست تمامی نظرات حذف شده</p>
                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                            <thead>
                                                <tr role="row">

                                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 148px;">ردیف</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">کاربر</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">تاریخ درج</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">متن نظر</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">عملیات</th>
                                                </tr>
                                            </thead>
                                            <tbody class="byekan">
                                                @php
                                                $id = 1;
                                                @endphp
                                                @foreach($comments as $comment)
                                                <tr role="row" class="odd icon-hover hover-color" id="{{ $comment->id }}">
                                                    <td>{{ $id }}
                                                    </td>
                                                    <td class="iranyekan">{{ $comment->user->firstName . ' ' . $comment->user->lastName }}</td>
                                                    <td>{{ jdate($comment->created_at) }}</td>
                                                    <td class="iranyekan"> {{ $comment->comment }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success rounded">
                                                            <a href="#" id="restore" data-id="{{ $comment->id }}" class="text-white">
                                                                بازگردانی
                                                            </a>
                                                        </button>
                                                        <button type="button" class="btn btn-danger rounded">
                                                            <a href="#" id="removerComment" data-id="{{ $comment->id }}" class="text-white">
                                                                حذف کلی
                                                            </a>

                                                        </button>

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
    $(document).on('click', '#restore', function(e) {

                e.preventDefault();
                var id = $(this).data('id');
                swal(` ${'حذف محصول:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
                        dangerMode: true,
                        icon: "warning",
                        buttons: ["انصراف", "حذف"],
                    })
                    .then(function(isConfirm) {
                            if (isConfirm) {
                                $.ajax({
                                        type: 'put',
                                        // dataType: "JSON",
                                        url: "/dashboard/shop/shops-comments/{{ $shop->id }}/trashed-comment/restore",
                                        data: {
                                            id: id,
                                            "_method": 'put',
                                            "_token": $('#csrf-token')[0].content,
                                            },
                                            success: function(data) {
                                                var url = "/dashboard/shop/shops-comments/{{ $shop->id }}/trashed-comment";
                                                location.href = url;
                                            }
                                        });
                                }
                                else {
                                    toastr.warning('لغو شد.', '', []);
                                }
                            });
                    });
</script>

<script type="text/javascript">
    $(document).on('click', '#removerComment', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        swal(` ${'حذف محصول:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
                dangerMode: true,
                icon: "warning",
                buttons: ["انصراف", "حذف"],
            })
            .then(function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: "post",
                        url: "/dashboard/shop/shops-comments/{shopId}/trashed-comment/delete",
                        data: {
                            id: id,
                            "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                        },
                        success: function(data) {
                          var url = "/dashboard/shop/shops-comments/{{ $shop->id }}/trashed-comment";
                          location.href = url;
                        }
                    });
                } else {
                    toastr.warning('لغو شد.', '', []);
                }
            });
    });
</script>


@stop
