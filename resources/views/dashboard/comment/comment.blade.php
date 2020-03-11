@extends('dashboard.layouts.master')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row">
         <div class="col-sm-12">
            <div class="page-title-box">
               <div class="float-right">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item ">نظرات</li>
                     <li class="breadcrumb-item"><a href="javascript:void(0);">لیست نظرات</a></li>
                  </ol>
               </div>

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
                  <h4 class="mt-0 header-title">نظرات فروشگاه</h4>
                     <p class="text-muted mb-4 font-13">تمامی نظرات فروشگاه
                     </p>
                     <div class="row">
                        <div class="col-sm-12">
                           <ul style="margin-bottom: 50px;" class="nav nav-pills" role="tablist">
                              <li class="nav-item">
                                 <a class="nav-link active" data-toggle="tab" href="#kt_tabs_3_1">{{ __('dashboard-shop-product-comment.listNazaraatBox1') }}</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" data-toggle="tab" href="#kt_tabs_3_3">{{ __('dashboard-shop-product-comment.listNazaraatBox2') }}</a>
                              </li>
                           </ul>
                           <div class="tab-content">
                              <div class="tab-pane active" id="kt_tabs_3_1" role="tabpanel">

                                <div class="table-responsive">

                                 <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer text-center" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                    aria-describedby="datatable_info">
                                    <thead>
                                       <tr role="row">
                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">{{ __('dashboard-shop-product-comment.listNazaraatItem1') }}</th>
                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 100px;">
                                             {{ __('dashboard-shop-product-comment.listNazaraatItem2') }}
                                          </th>
                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 100px;">
                                            {{ __('dashboard-shop-product-comment.listNazaraatItem3') }}
                                          </th>
                                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 400px;">{{ __('dashboard-shop-product-comment.listNazaraatItem4') }}</th>
                                       </tr>
                                    </thead>
                                    <tbody class="byekan">
                                       @foreach($comments->where('approved', '0' ) as $comment)
                                       <tr role="row" class="odd icon-hover hover-color">
                                          <td style="width:5%"><a target="_blank" href="#">{{ $comment->commentable->title }}</a>
                                          </td>
                                          <td>{{ $comment->user->firstName . ' ' . $comment->user->lastName }}</td>
                                          <td>{{ jdate($comment->created_at) }}</td>
                                          <td class="">
                                             {{ $comment->comment }}
                                          </td>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                 </table>
                               </div>
                              </div>

                              <div class="tab-pane" id="kt_tabs_3_3" role="tabpanel">
                                <div class="table-responsive">
                                 <table id="datatable1" class="table table-bordered dt-responsive nowrap dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                    aria-describedby="datatable_info">
                                    <thead>
                                       <tr role="row">
                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">محصول</th>
                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 100px;">
                                             کاربر
                                          </th>
                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 100px;">
                                             تاریخ درج
                                          </th>
                                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 400px;">متن نظر</th>
                                       </tr>
                                    </thead>
                                    <tbody class="byekan">
                                       @foreach($comments->where('approved', '1' ) as $comment)
                                       <tr role="row" class="odd icon-hover hover-color">
                                          <td style="width:5%"><a target="_blank" href="#">{{ $comment->commentable->title }}</a>
                                          </td>
                                          <td>{{ $comment->user->firstName . ' ' . $comment->user->lastName }}</td>
                                          <td>{{ jdate($comment->created_at) }}</td>
                                          <td class="">
                                             {{ $comment->comment }}
                                          </td>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                 </table>
                               </div>
                              </div>
                           </div>
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

<script type="text/javascript">
$(window).resize(function() {
  if ($(window).width() < 1300) {
      $("body").addClass('enlarge-menu');

  } else {
      $("body").removeClass('enlarge-menu');

  }
}).resize();
$(window).resize(function() {
  if ($(window).width() < 1070) {
      $(".icon-show").removeClass('d-none');

  } else {
      $(".icon-show").addClass('d-none');

  }
}).resize();
$(document).ready(function() {
  $(".dropify-clear").remove();
});
 oTable = $('#datatable').DataTable({
     "order": [
         [2, "desc"]
     ]
 }); //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
 oTable = $('#datatable1').DataTable({
     "order": [
         [2, "desc"]
     ]
 }); //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
 $('#myInputTextField').keyup(function() {
     oTable.search($(this).val()).draw();
 })
 $('#myInputTextField1').keyup(function() {
     oTable.search($(this).val()).draw();
 })
 $(document).on('click', '.button', function(e) {
     e.preventDefault();
     var id = $(this).data('id');
     swal("آیا اطمینان دارید؟", {
             dangerMode: true,
             icon: "warning",
             buttons: ["انصراف", "حذف"],

         })
         .then(function(isConfirm) {
             if (isConfirm) {
                 $.ajax({
                     type: "post",
                     url: "/admin-panel/shop/comment/delete",
                     data: {
                         id: id,
                         "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                     },
                     success: function(data) {
                         var url = "/admin-panel/shop/product-comments";
                         location.href = url;
                     }
                 });
             } else {
                 toastr.warning('لغو شد.', '', []);
             }
         });
 });

$(document).ready(function(){
$('#datatable_filter').parent().remove();
$('#datatable1_filter').parent().remove();
$('#datatable_wrapper').children(':first').find('.col-sm-12').removeClass('col-sm-12 col-md-6');
$('#datatable1_wrapper').children(':first').find('.col-sm-12').removeClass('col-sm-12 col-md-6');

});
$(document).ready(function(){
$('input#myInputTextField').on("focus", function(){
  if ($(this).hasClass("searchActive")){
         $(this).removeClass("searchActive");
     }
     else{
    $('input#myInputTextField').addClass('searchActive');
    }
});
});
oTable = $('#datatable').DataTable(); //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said

</script>


@stop
