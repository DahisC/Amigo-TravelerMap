<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <style>
      tr td{
          border-bottom: 1px solid black;
          text-align: center;
      }
  </style>
</head>

<body>

  <div class="container">

    <table id="myDataTalbe" class="display">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Address</th>
          <th>ActionButton</th>
        </tr>
      </thead>
      @foreach ($attractions as $attraction)
        {{-- {{dd($attraction->position)}} --}}
        <tbody>
          <tr>
            <td>{{$attraction->id}}</td>
            <td>{{$attraction->name}}</td>
            <td>{{$attraction->position->address}}</td>
            <td>
              <button type="button">Edit</button>
              <button type="button">Delete</button>
            </td>
          </tr>
        </tbody>
      @endforeach
    </table>
  </div>

  <!--引用jQuery-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <!--引用dataTables.js-->
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript">
    $(function() {

      $("#myDataTalbe").DataTable({
        searching: false, //關閉filter功能
        columnDefs: [{
          targets: [3],
          orderable: false,
        }]
      });
    });

  </script>

</body>

</html>
