$(document).ready(function () {

  // Booking
  $(".specialization").select2({
    placeholder: "Select Specialization",
    allowClear: true
  });


  $(".language").select2({
    placeholder: "Select Language",
    allowClear: true
  });


});

var valueHover = 0;
function calcSliderPos(e, maxV) {
  return (e.offsetX / e.target.clientWidth) * parseInt(maxV, 10);
}

$(".starrate").on("click", function () {
  $(this).data('val', valueHover);
  $(this).addClass('saved')
});

$(".starrate").on("mouseout", function () {
  upStars($(this).data('val'));
});


$(".starrate span.ctrl").on("mousemove", function (e) {
  var maxV = parseInt($(this).parent("div").data('max'))
  valueHover = Math.ceil(calcSliderPos(e, maxV) * 2) / 2;
  upStars(valueHover);
});


function upStars(val) {

  var val = parseFloat(val);
  $("#test").html(val.toFixed(1));

  var full = Number.isInteger(val);
  val = parseInt(val);
  var stars = $("#starrate i");

  stars.slice(0, val).attr("class", "fas fa-fw fa-star");
  if (!full) { stars.slice(val, val + 1).attr("class", "fas fa-fw fa-star-half-alt"); val++ }
  stars.slice(val, 5).attr("class", "far fa-fw fa-star");




}


$(document).ready(function () {
  $(".starrate span.ctrl").width($(".starrate span.cont").width());
  $(".starrate span.ctrl").height($(".starrate span.cont").height());
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
    count = count < 1 ? 1 : count;
    $input.val(count);
    $input.change();
    return false;
  });
  $('.plus').click(function () {
    var $input = $(this).parent().find('input');
    $input.val(parseInt($input.val()) + 1);
    $input.change();
    return false;
  });


})





$(".select2.front-specialization").select2({
  placeholder: "Select Specialization",
  allowClear: true
});

