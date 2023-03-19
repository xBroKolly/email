@extends('admin.layouts.master')

@section('title')
Data User
@endsection
@section('header')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Data User</h4>
  </div>
  <a href="/user/tambah" class="btn btn-info"><i class="fa fa-plus"></i> Tambah User</a>
  <hr>
  <table class="table table-hover" id="myTable">
    <thead>
      <tr style="background-color: #c4c4c4;">
        <th>No.</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=0; ?>
      @foreach($user as $p)
      <?php $no++; ?>
      <tr>
          <td>{{$no}}</td>
          <td>{{$p->name}}</td>
          <td>{{$p->email}}</td>
          <td>{{$p->role}}</td>
          <td>
            <a href="/user/edit/{{$p->id}}" class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-edit"></i> Edit</a>
            <button class="btn btn-danger btn-sm hapus" user-name="{{$p->name}}" user-id="{{$p->id}}"><i class="fa fa-trash"></i> Hapus</button>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</main>
@endsection
@section('footer')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

<script>
  $(document).ready( function () {
    $('#myTable').DataTable();

    $('body').on('click', '.hapus', function (event) {
            event.preventDefault();

            var user_name = $(this).attr('user-name'),
            title = user_name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();});
            user_id = $(this).attr('user-id');
            swal({
                    title: "Anda Yakin?",
                    text: "Mau Menghapus Data : "+ title +"?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
            .then((result) => {
                if (result) {
                    $.ajax({
                        url: "/user/"+user_id+"/delete",

                        success: function (response) {
                            //$('#myTable').DataTable().ajax.reload();
                            swal("Berhasil", "Data Berhasil Dihapus", "success");
                            location.reload(); 
                        },
                        error: function (xhr) {
                            swal("Oops...", "Terjadi Kesalahan", "error");
                            
                        }
                    });
                }
            });
        });
  });
</script>
@endsection