<html>
    <head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding-top: 10px;
  padding-bottom: 20px;
  padding-left: 30px;
  padding-right: 40px;
}
</style>
</head>
    <center><h1>Student Booking Details</h1></center>
    <br>
    <br><center>
    <table>
        <tr>
        <th>Specialization :</th>
        <td>{{$bookingslot->specialization->name}}</td>
        </tr>
        <tr >
        <th>Language :</th>
        <td>{{$bookingslot->language->name}}</td>
        </tr>
        <tr>
        <th>Tutor name :</th>
        <td>{{$bookingslot->tutor->first_name}} {{$bookingslot->tutor->last_name}}</td>
        </tr>
        <tr>
        <th>Meeting link :</th>
        <td>{{$bookingslot->google_link}}</td>
        </tr>
        <tr>
        <th>Date Time :</th>
        <td>{{$bookingslot->date_time}}</td>
        </tr>
    </table>
    </center>
</html>
