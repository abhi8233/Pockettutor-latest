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
    <center><h1>Tutor Update profile</h1></center>
    <br>
    <br><center>
    <table>
        <tr>
        <th>Specialization :</th>
        @foreach($documents as $document)
        <td>{{$document->document_key}}</td>
        @endforeach
        </tr>
    </table>
    </center>
</html>
