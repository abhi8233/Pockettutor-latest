$(document).ready(function () {

  // Booking
  $(".specialization").select2({
    placeholder: "Select Specialization",
    allowClear: true
  });


  // $(".language").select2({
  //   placeholder: "Select Language",
  //   allowClear: true
  // });


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

  $('.minus').click(function () {
    var $input = $(this).parent().find('input');
    var count = parseInt($input.val()) - 1;
    count = count < 0 ? 0 : count;
    
      $input.val(count);
      $input.change();
    
    return false;
  });
  $('.plus').click(function () {
    var $input = $(this).parent().find('input');
    var count = parseInt($input.val()) + 1;
    
    if(count <= 5){
      $input.val(count);
      $input.change();
    }
    return false;
  });
  
});





$(".select2.front-specialization").select2({
  placeholder: "Select Specialization",
  allowClear: true
});

