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
          <th>website</th>
          <th>tel</th>
          <th>description</th>
          <th>ticket_info</th>
          <th>traffic_info</th>
          <th>parking_info</th>
          <th>user_id</th>
        </tr>
      </thead>
      @foreach ($attractions as $attraction)
        {{-- {{dd($attraction->position)}} --}}
        <tbody>
          <tr>
            <td>{{$attraction->id}}</td>
            <td>{{$attraction->name}}</td>
            <td>{{$attraction->website}}</td>
            <td>{{$attraction->tel}}</td>
            <td>{{$attraction->description}}</td>
            <td>{{$attraction->ticket_info}}</td>
            <td>{{$attraction->traffic_info}}</td>
            <td>{{$attraction->parking_info}}</td>
            <td>{{$attraction->user_id}}</td>
            <td>
              <a href="{{ route('backstage.attractions.edit',[ 'attraction'=>$attraction->id]) }}">
                <button>編輯</button>
            </a>

            <button class="btn btn-danger btn-sm delete-btn"
                            data-id="#delete_{{ $attraction->id }}">刪除</button>

            <form id="delete_{{ $attraction->id }}" action="{{ route('backstage.attractions.destroy',[ 'attraction'=>$attraction->id]) }}" method="POST"
                class="d-none">
                @csrf
                @method('DElETE')
            </form>
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

<script>

  window.onload = () => {
      document.querySelectorAll('.delete-btn').forEach(function(btn) {
          btn.addEventListener('click', function() {

              const id = this.getAttribute('data-id');
              if (confirm('是否刪除')) {
                  document.querySelector(id).submit();
              }
          });
      })
  }
</script>

</body>

</html>
