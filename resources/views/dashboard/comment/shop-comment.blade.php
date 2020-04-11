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
                            <form action="{{ route('shops-comments.index') }}" class="search-form" method="get" id="srch">
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


                @if(count(request()->all()) != 0 && count($comments) != 0 )
                    <div class="card search-result">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">لیست نظرات</h4>


                            <p class="text-muted mb-4 font-13">لیست تمامی نظرات</p>
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

                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 405px;">
                                                            نام
                                                            محصول
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 148px;">کاربر</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 104px;">تاریخ درج</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">متن نظر</th>
                                                    </tr>
                                                    </tr>
                                                </thead>
                                                <tbody class="byekan">
                                                    @php
                                                    $id = 1;
                                                    @endphp
                                                    @foreach($comments as $comment)
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1 w-25 ">
                                                            <p class="d-inline-block align-middle mb-0 mr-2"><a href="#" class="d-inline-block align-middle mb-0 product-name iranyekan">{{ $comment->commentable->title }}</a>
                                                        </td>
                                                        <td class="iranyekan">{{ $comment->user->firstName . ' ' . $comment->user->lastName }}</td>
                                                        <td>{{ jdate($comment->created_at) }}</td>
                                                        <td class="iranyekan"> {{ $comment->comment }}</td>
                                                    </tr>
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
