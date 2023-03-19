@extends('admin.layouts.master')

@section('title')
Upload Berkas
@endsection
@section('header')

@endsection
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Upload Berkas</h4>
  </div>
  @if($cek_data_siswa == 1)
  <span class="text-danger">Format file : jpeg/jpg/png <br>
  Ukuran Maksimal : 2mb</span>
  <form action="/upload-berkas/submit" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="pendaftaran_siswa_id" value="{{$data_siswa->id}}">
    <input type="hidden" name="nama_lengkap" value="{{$data_siswa->nama_lengkap}}">
  <table width="100%" class="table table-bordered">
    <tr>
      <td>Foto Selfie Terbaik</td>
      <td><input type="file" name="pas_photo" required></td>
    </tr>
    <tr>
      <td>Foto Ijazah</td>
      <td><input type="file" name="foto_ijazah" required></td>
 
    </tr>
    <tr>
      <td>Foto Akta</td>
      <td><input type="file" name="foto_akta" required></td>

    </tr>
    <tr>
      <td>Foto KTP</td>
      <td><input type="file" name="foto_kk" required></td>

    </tr>
    <tr>
      <td>Foto Full Body</td>
      <td><input type="file" name="skhu" required></td>
   
    </tr>
    <tr>
      <td colspan="3"><button type="submit" class="btn btn-success"> Kirim</button></td>
    </tr>
  </table>
  </form>
  @else
    <div class="alert alert-danger">
      <h3>Anda Belum Melakukan Pendaftaran, silahkan Daftar terlebih dahulu</h3></div>
  @endif
</main>
@endsection