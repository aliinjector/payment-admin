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
