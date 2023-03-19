@extends('admin.layouts.master')

@section('title')
Detail Pendaftaran Beauty Advisor
@endsection
@section('header')

@endsection
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Detail Pendaftaran Beauty Advisor</h4>
  </div>
  <a href="/data-pendaftaran" class="btn btn-info mb-5"><i class="fa fa-arrow-left"></i> Kembali</a>

  {{-- Tampilkan Pesan dari Session --}}
  @if (session('pesan'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>Pesan!</strong> {{ session('pesan') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

<br><br>
  <div class="alert alert-info">
    <h3 align="center">Verifikasi</h3>

    <form action="/data-pendaftaran/verifikasi/{{$pendaftaran->no_pendaftaran}}" method="post">
      @csrf
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Status</label>
        <select class="form-control" name="status">
          <option value="">[Pilih]</option>
          <option value="Diterima" @if($pendaftaran->status == "Diterima") selected @endif>Diterima</option>
          <option value="Ditolak" @if($pendaftaran->status == "Ditolak") selected @endif>Ditolak</option>
        </select>
        
      </div>
      <button type="submit" class="btn btn-success"> Simpan</button>
    </form>

    <a href="{{ route('kirim.email.notifikasi', $pendaftaran->no_pendaftaran) }}" class="btn btn-warning">Kirim Notifikasi</a>
  </div>
  <h3 align="center">FORMULIR PENERIMAAN BEAUTY ADVISOR <br>
PARAGON DC JAMBI
</h3>

<p>No. Pendaftaran : {{$pendaftaran->no_pendaftaran}}</p>
<p align="left"><a href="/cetak-formulir/{{$pendaftaran->no_pendaftaran}}" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Formulir</a></p>
<table width="100%" class="table table-bordered">
    <tr>
      <td colspan="3"><strong>A. KETERANGAN CALON BEAUTY ADVISOR</strong></td>
    </tr>
    <tr>
      <td width="40%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;1. Nama Lengkap</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td>{{$pendaftaran->nama_lengkap}}</td>
    </tr>
    <tr>
      <td width="40%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;2. Jenis Kelamin</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td>
        {{$pendaftaran->jenis_kelamin}}
      </td>
    </tr>
    <tr>
      <td width="40%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;3. Tempat Lahir</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td>{{$pendaftaran->tempat_lahir}}</td>
    </tr>
    <tr>
      <td width="40%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;4. Tanggal Lahir <i>(tahun-bulan-tanggal)</i></td>
      <td width="5%" align="center" valign="middle">:</td>
      <td>{{$pendaftaran->tgl_lahir}}</td>
        
    </tr>
    <tr>
      <td width="40%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;5. Anak Ke-</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td>{{$pendaftaran->anak_ke}}</td>
    </tr>
    <tr>
      <td width="40%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;6. Jumlah Saudara</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td>{{$pendaftaran->jml_saudara}}</td>
    </tr>
    <tr>
      <td width="40%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;7. Alamat Tempat Tinggal</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td>{{$pendaftaran->alamat}}</td>
    </tr>
    <tr>
      <td width="40%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;8. POSISI</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td>{{$pendaftaran->jurusan}}</td>
    </tr>
    
  </table>
<br><br>
  <table width="100%" class="table table-bordered">

  </table>
  

</main>
@endsection