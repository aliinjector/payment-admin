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
$( document ).ready(function() {
  $( ".dropify-clear" ).remove();
  });
   $(document).on('click', '#removeSpecification', function(e) {
       e.preventDefault();
       var id = $(this).data('id');
       var name = $(this).data('name');
       swal(` ${'حذف خصوصیت:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
               dangerMode: true,
               icon: "warning",
               buttons: ["انصراف", "حذف"],
           })
           .then(function(isConfirm) {
               if (isConfirm) {
                   $.ajax({
                       type: "post",
                       url:  "/admin-panel/shop/categrory-managment/specification/delete",
                       data: {
                           id: id,
                           "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                       },
                       success: function(data) {
                         window.location.reload()
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
      $('#datatable_wrapper').children(':first').find('.col-sm-12').removeClass('col-sm-12 col-md-6');

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
