$(document).ready(function () {
  $("#toggle_menu").click(function () {
    $("#sidebar").toggleClass('toggled');
    $(".right-content").toggleClass('toggled');
  });
  $(function () {
    $('#stu_list_daterange').daterangepicker({
      timePicker: false,
      // startDate: moment().startOf('hour'),
      // endDate: moment().startOf('hour').add(32, 'hour'),
      locale: {
        format: 'd/MM/YY'
      }
    });
  });
  $('#student_list').DataTable({
    "dom": "<'row'<'col-sm-12 col-md-6'><'col-sm-12 col-md-6'>>" +
    "<'row'<'col-sm-12'tr>>" +
    "<'row'<'col-sm-12 col-md-6'p><'col-sm-12 col-md-6 float-right'l>>",
//     pagingType: 'input',
//  pageLength: 5,
 language: {
 oPaginate: {
   sNext: '<i class="fa fa-chevron-right"></i>',
   sPrevious: '<i class="fa fa-chevron-left"></i>',
   sFirst: '<i class="fa fa-step-backward"></i>',
   sLast: '<i class="fa fa-step-forward"></i>'
   },
   "lengthMenu":     "_MENU_ Items per page",
   }  
  });

  $(".select2").select2({
    placeholder: "Select language",
    allowClear: true
  });

  // var setDefaultActive = function () {
  //   var path = window.location.pathname;

  //   var element = $(".perent-menu.menu-item a[href='" + path + "']");

  //   element.addClass("active");
  // }

  // setDefaultActive()
});

$(document).ready(function(){
  var fullpath =window.location.pathname;
  var filename=fullpath.replace(/^.*[\\\/]/, '');
  var subfilename=fullpath.replace(/^.*[\\\/]/, '');
  
  //alert(filename);

  
  var submenuLink=$('.child-menu .menu-item a[href="' + subfilename + '"]'); 
  submenuLink.parent().addClass("child-active");
  submenuLink.parent().parent().parent().addClass("active");

  // var currentLink=$('.perent-menu.menu-item.parent a[href="' + filename + '"]'); 
  // currentLink.parent().addClass("active");
  
})

// Booking

$(".specialization").select2({
  placeholder: "Select Specialization",
  allowClear: true
});

$(".language").select2({
  placeholder: "Select Language",
  allowClear: true
});