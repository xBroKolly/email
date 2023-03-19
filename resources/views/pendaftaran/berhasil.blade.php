@extends('admin.layouts.master')

@section('title')
Pendaftaran Beauty Advisor
@endsection
@section('header')

@endsection
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Pendaftaran Beauty Advisor</h4>
  </div>
  @if($data_siswa->status == null)
    <div class="alert alert-warning"><h4>Pendaftaran Telah Dikirim, Langkah selanjutnya Silahkan Upload Berkas <a href="/upload-berkas">disini</a></h4></div>
  @elseif($data_siswa->status == 'Diterima')
    <div class="alert alert-success"><h4>Pendaftaran Telah diverifikasi, selamat anda lolos ketahap berikutnya</h4></div>
  @elseif($data_siswa->status == 'Ditolak')
    <div class="alert alert-danger"><h4>Pendaftaran Telah diverifikasi, Maaf pendaftaran anda ditolak</h4></div>
  @endif

  <hr>
  <p align="left"><a href="/cetak-formulir/{{$data_siswa->no_pendaftaran}}" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Formulir</a></p>
  Nomor pendaftaran Anda : {{$data_siswa->no_pendaftaran}}<br><br>
  Status Verifikasi : 
  @if($data_siswa->status == null)
    <button class="btn btn-warning">Belum Diverifikasi</button>
  @elseif($data_siswa->status == 'Diterima')
    <button class="btn btn-success">Diterima</button>
  @elseif($data_siswa->status == 'Ditolak')
    <button class="btn btn-danger">Ditolak</button>
  @endif
  <br><br>
  @if($data_siswa->status == 'Diterima')
    @if($data_berkas->foto_bukti == null)
    Upload Bukti Pendaftaran <br>
    <form action="/upload-bukti/{{$data_berkas->id}}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="" value="{{$data_berkas->id}}">
      <input type="hidden" name="nama_lengkap" value="{{$data_siswa->nama_lengkap}}">
    <table width="100%" class="table table-bordered">
      <tr>
        <td>Foto Formulir Pendaftaran</td>
        <td><input type="file" name="foto_bukti" required><button type="submit" class="btn btn-primary"> Kirim</button></td>
      </tr>
    </table>
    </form>
    @else
      <table width="100%" class="table table-bordered">
        <tr>
          <td>Foto Formulir Pendaftaran</td>
          <td><a href="{{asset('images/foto_bukti/'.$data_berkas->foto_bukti)}}" target="_blank"><img src="{{asset('images/foto_bukti/'.$data_berkas->foto_bukti)}}" width="100px"></a></td>
        </tr>
      </table>
    @endif
  @endif

</main>
@endsection