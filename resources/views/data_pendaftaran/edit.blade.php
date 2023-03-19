@extends('admin.layouts.master')

@section('title')
Edit Pendaftaran Siswa Baru
@endsection
@section('header')

@endsection
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Edit Pendaftaran Siswa Baru</h4>
  </div>
  <a href="/data-pendaftaran" class="btn btn-info"><i class="fa fa-arrow-left"></i> Kembali</a>
  <h5 align="center">FORMULIR PENERIMAAN CALON BEAUTY ADVISOR <br>
  PARAGON DC JAMBI
  </h5>
  <p>No. Pendaftaran : {{$pendaftaran->no_pendaftaran}}</p>
  <hr>
  @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div class="alert alert-danger">{{$error}}</div>
     @endforeach
  @endif
  <form action="/data-pendaftaran/edit/{{$pendaftaran->no_pendaftaran}}/submit" method="post">
    @csrf
  <table width="100%" class="table table-bordered">
    <tr>
      <td colspan="3"><strong>A. KETERANGAN CALON BEAUTY ADVISOR</strong></td>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;1. Nama Lengkap</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td><input type="text" name="nama_lengkap" class="form-control" value="{{$pendaftaran->nama_lengkap}}" placeholder=""></td>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;2. Jenis Kelamin</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td>
        <select name="jenis_kelamin" class="form-control">
          <option value="">[Pilih]</option>
          <option value="Laki-laki" @if($pendaftaran->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
          <option value="Perempuan" @if($pendaftaran->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
        </select>
      </td>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;3. Tempat Lahir</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td><input type="text" name="tempat_lahir" class="form-control" value="{{$pendaftaran->tempat_lahir}}" placeholder=""></td>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;4. Tanggal Lahir</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td><input type="date" class="form-control" name="tgl_lahir" value="{{$pendaftaran->tgl_lahir}}"/>
        </td>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;5. Anak Ke-</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td><input type="number" name="anak_ke" class="form-control" value="{{$pendaftaran->anak_ke}}" placeholder=""></td>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;6. Jumlah Saudara</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td><input type="number" name="jml_saudara" class="form-control" value="{{$pendaftaran->jml_saudara}}" placeholder=""></td>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;7. Alamat Tempat Tinggal</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td><input type="text" name="alamat" class="form-control" value="{{$pendaftaran->alamat}}" placeholder=""></td>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;8. Posisi</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td><select class="form-control" name="jurusan" id="jurusan">
                  <option value="">[Pilih Posisi]</option>
                  <option value="MIPA" @if($pendaftaran->jurusan == "MAKE OVER") selected @endif>MAKE OVER</option>
                  <option value="IPS" @if($pendaftaran->jurusan == "EMINA") selected @endif>EMINA</option>
                  <option value="MIPA" @if($pendaftaran->jurusan == "WARDAH") selected @endif>WARDAH</option>
              </select></td>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;9. Penempatan</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td><select class="form-control" name="tempat_tinggal" id="tempat_tinggal">
                  <option value="">[Pilih]</option>
                  <option value="Asrama" @if($pendaftaran->tempat_tinggal == "Dalam Kota") selected @endif>Dalam Kota</option>
                  <option value="Tidak Asrama" @if($pendaftaran->tempat_tinggal == "Luar Kota") selected @endif>Luar Kota</option>
              </select></td>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;10. Pendidikan Terakhir</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td><input type="text" name="sekolah_sebelumnya" class="form-control" value="{{$pendaftaran->sekolah_sebelumnya}}" placeholder=""></td>
    </tr>
    <tr>
      <td colspan="3"><div class="d-grid gap-2"><button type="submit" class="btn btn-success btn-block">Simpan</button></div></td>
    </tr>
  </table>
  </form>
</main>
@endsection