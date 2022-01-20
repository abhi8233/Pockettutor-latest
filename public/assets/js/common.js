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
      "lengthMenu": "_MENU_ Items per page",
    }
  });

  $(".select2.specialization_id").select2({
    placeholder: "Select Specialization",
    allowClear: true
  });
 
  $(".select2.language_id").select2({
    placeholder: "Select Language",
    allowClear: true
  });
  $(".select2.tutor_id").select2({
    placeholder: "Select Tutor",
    allowClear: true
  });
  $(".select2.all_language").select2({
    placeholder: "Select Language",
    allowClear: true
  });

  $(".select2.country").select2({
    placeholder: "Select Country",
    allowClear: true
  });

  $(".select2.intrest").select2({
    placeholder: "Select Field of Intrest",
    allowClear: true
  });
  

  // Booking

  // $(".specialization").select2({
  //   placeholder: "Select Specialization",
  //   allowClear: true
  // });

  // $(".language").select2({
  //   placeholder: "Select Language",
  //   allowClear: true
  // });

  // var setDefaultActive = function () {
  //   var path = window.location.pathname;

  //   var element = $(".perent-menu.menu-item a[href='" + path + "']");

  //   element.addClass("active");
  // }

  // setDefaultActive()
});

$(document).ready(function () {
  var fullpath = window.location.pathname;
  var filename = fullpath.replace(/^.*[\\\/]/, '');
  var subfilename = fullpath.replace(/^.*[\\\/]/, '');

  //alert(filename);

  //  Sidemenu
  var submenuLink = $('.child-menu .menu-item a[href="' + subfilename + '"]');
  submenuLink.parent().addClass("child-active");
  submenuLink.parent().parent().parent().addClass("active");

  // Student sidemenu
  var submenuLink = $('.student .perent-menu.menu-item a[href="' + subfilename + '"]');
  // submenuLink.parent().addClass("child-active");
  submenuLink.parent().addClass("active");

  // Tutor sidemenu
  var submenuLink = $('.tutor .perent-menu.menu-item a[href="' + subfilename + '"]');
  // submenuLink.parent().addClass("child-active");
  submenuLink.parent().addClass("active");



  // var currentLink=$('.perent-menu.menu-item.parent a[href="' + filename + '"]'); 
  // currentLink.parent().addClass("active");

  $("form").on("change", ".file-upload-field", function () {
    $(this).parent(".file-upload-wrapper").attr("data-text",
      $(this).val().replace(/.*(\/|\\)/, ''));
  });

  $(".toggle-password").click(function () {
    $(this).toggleClass("mdi-eye-remove-outline");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });

 /*  $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      responsiveClass: true,
      responsive: {
        0: {
          items: 1,
          nav: true
        },
        600: {
          items: 3,
          nav: false
        },
        1000: {
          items: 5,
          nav: true,
          loop: false,
          margin: 20
        }
      }
  }) */

  
})

