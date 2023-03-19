@extends('admin.layouts.master')

@section('title')
Data Pendaftaran
@endsection
@section('header')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Data Pendaftaran</h4>
  </div>
  <a href="/data-pendaftaran/tambah" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Pendaftaran</a>
  <hr>
  <table class="table table-hover" id="myTable">
    <thead>
      <tr style="background-color: #c4c4c4;">
        <th>No.</th>
        <th>No. Pendaftaran</th>
        <th>Nama Lengkap</th>
        <th>Jenis Kelamin</th>
        <th>Posisi</th>
        <th>Berkas</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=0; ?>
      @foreach($pendaftaran as $p)
      <?php $no++; ?>
      <tr>
          <td>{{$no}}</td>
          <td>{{$p->no_pendaftaran}}</td>
          <td>{{$p->nama_lengkap}}</td>
          <td>{{$p->jenis_kelamin}}</td>
          <td>{{$p->jurusan}}</td>
          <td>
            <?php $cek_data_berkas = \App\Models\Upload_berkas::where('pendaftaran_siswa_id',$p->id)->count(); ?>
            @if($cek_data_berkas == 0)
              <a href="/upload-berkas-admin/{{$p->id}}" class="btn btn-secondary btn-sm"><i class="fa fa-plus"></i> Tambah Berkas</a>
            @else
              <a href="/upload-berkas-admin/{{$p->id}}" class="btn btn-secondary btn-sm"><i class="fa fa-file"></i> Lihat Berkas</a>
            @endif
          </td>
          <td>
            @if($p->status == null)
              <span class="badge bg-warning">dalam proses</span>
             
            @elseif($p->status == 'Diterima')
              <span class="badge bg-success">Diterima</span>
            @elseif($p->status == 'Ditolak')
              <span class="badge bg-danger">Ditolak</span>
            @endif

            </td>
          <td>
            <a href="/data-pendaftaran/detail/{{$p->no_pendaftaran}}" class="btn btn-primary btn-sm" title="Detail"><i class="fa fa-eye"></i> Detail</a>
            <a href="/data-pendaftaran/edit/{{$p->no_pendaftaran}}" class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-edit"></i> Edit</a>
            <button class="btn btn-danger btn-sm hapus" siswa-name="{{$p->nama_lengkap}}" siswa-id="{{$p->id}}"><i class="fa fa-trash"></i> Hapus</button>
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

            var siswa_name = $(this).attr('siswa-name'),
            title = siswa_name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();});
            siswa_id = $(this).attr('siswa-id');
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
                        url: "/data-pendaftaran/"+siswa_id+"/delete",

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