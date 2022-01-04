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
  $('#student_list').DataTable();

  $(".select2").select2({
    placeholder: "Select language",
    allowClear: true
  });
});