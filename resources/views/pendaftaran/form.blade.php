@extends('admin.layouts.master')

@section('title')
Dashboard
@endsection
@section('header')

@endsection
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Pendaftaran Siswa baru</h4>
  </div>

  <h5 align="center">FORMULIR PENERIMAAN CALON BEAUTY ADVISOR <br>
PARAGON TECHNOLOGY AND INOVATION DC JAMBI
</h5>
  <hr>
  @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div class="alert alert-danger">{{$error}}</div>
     @endforeach
  @endif
  <form action="/submit-pendaftaran-siswa-baru" method="post">
    @csrf
  <table width="100%" class="table table-bordered">
    <tr>
      <td colspan="3"><strong>A. KETERANGAN CALON BAEUTY ADVISOR</strong></td>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;1. Nama Lengkap</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td><input type="text" name="nama_lengkap" class="form-control" value="{{old('nama_lengkap')}}" placeholder=""></td>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Email</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td><input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder=""></td>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;3. Jenis Kelamin</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td>
        <select name="jenis_kelamin" class="form-control">
          <option value="">[Pilih]</option>
          <option value="Laki-laki" @if(old("jenis_kelamin") == 'Laki-laki') selected @endif>Laki-laki</option>
          <option value="Perempuan" @if(old("jenis_kelamin") == 'Perempuan') selected @endif>Perempuan</option>
        </select>
      </td>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;4. Tempat Lahir</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td><input type="text" name="tempat_lahir" class="form-control" value="{{old('tempat_lahir')}}" placeholder=""></td>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;5. Tanggal Lahir</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td>
        <div class="row">
        
          <div class="col-md-2">
              <select class="form-control select2" name="tgl_lahir" id="tgl">
                  <option value="">[Tanggal]</option>
                  <?php for($a=1; $a<=31; $a+=1){ ?>
                      <option value="{{$a}}" @if(old("tgl") == $a) selected @endif>{{$a}}</option>
                  <?php } ?>
              </select>
          </div>
          <div class="col-md-3">
              <select class="form-control select2" name="bulan_lahir" id="bulan">
                  <option value="">[Bulan]</option>
                  <option value="01" @if(old("bulan") == '01') selected @endif>Januari</option>
                  <option value="02" @if(old("bulan") == '02') selected @endif>Februari</option>
                  <option value="03" @if(old("bulan") == '03') selected @endif>Maret</option>
                  <option value="04" @if(old("bulan") == '04') selected @endif>April</option>
                  <option value="05" @if(old("bulan") == '05') selected @endif>Mei</option>
                  <option value="06" @if(old("bulan") == '06') selected @endif>Juni</option>
                  <option value="07" @if(old("bulan") == '07') selected @endif>Juli</option>
                  <option value="08" @if(old("bulan") == '08') selected @endif>Agustus</option>
                  <option value="09" @if(old("bulan") == '09') selected @endif>September</option>
                  <option value="10" @if(old("bulan") == '10') selected @endif>Oktober</option>
                  <option value="11" @if(old("bulan") == '11') selected @endif>November</option>
                  <option value="12" @if(old("bulan") == '12') selected @endif>Desember</option>
              </select>
          </div>    
          <div class="col-md-3">
              <select class="form-control select2" name="tahun_lahir" id="tahun">
                  <option value="">[Tahun]</option>
                  <?php for($i=date('Y'); $i>=date('Y')-90; $i-=1){ ?>
                  <option value="{{$i}}" @if(old("tahun") == $i) selected @endif>{{$i}}</option>
                  <?php } ?>
              </select>

          </div> 
        </div>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;6. Anak Ke-</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td><input type="number" name="anak_ke" class="form-control" value="{{old('anak_ke')}}" placeholder=""></td>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;7. Jumlah Saudara</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td><input type="number" name="jml_saudara" class="form-control" value="{{old('jml_saudara')}}" placeholder=""></td>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;8. Alamat Tempat Tinggal</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td><input type="text" name="alamat" class="form-control" value="{{old('alamat')}}" placeholder=""></td>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;9. Posisi</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td><select class="form-control" name="jurusan" id=jurusan">
                  <option value="">[Pilih Posisi]</option>
                  <option value="MAKE_OVER" @if(old("jurusan") == "MAKE OVER") selected @endif>MAKE OVER</option>
                  <option value="EMINA" @if(old("jurusan") == "EMINA") selected @endif>EMINA</option>
                  <option value="WARDAH" @if(old("jurusan") == "WARDAH") selected @endif>WARDAH</option>

              </select></td>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;10. Penempatan</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td><select class="form-control" name="tempat_tinggal" id=tempat_tinggal">
                  <option value="">[Pilih]</option>
                  <option value="Dalam_Kota" @if(old("tempat_tinggal") == "Dalam Kota") selected @endif>Dalam Kota</option>
                  <option value="Luar_Kota" @if(old("tempat_tinggal") == "Luar Kota") selected @endif>Luar Kota</option>
              </select></td>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;11. Pendidikan Terakhir</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td><input type="text" name="sekolah_sebelumnya" class="form-control" value="{{old('sekolah_sebelumnya')}}" placeholder=""></td>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12. No Whatsapp</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td><input type="text" name="no_wa" value="{{old('no_wa')}}" class="form-control" placeholder=""></td>
    </tr>
    <tr>
      <td width="30%" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;13. Lokasi</td>
      <td width="5%" align="center" valign="middle">:</td>
      <td><input type="text" name="lokasi" value="{{old('lokasi')}}" class="form-control" placeholder=""></td>
    </tr>
    <tr>
      <td colspan="3"><div class="d-grid gap-2"><button type="submit" class="btn btn-success btn-block">Simpan</button></div></td>
    </tr>
  </table>
  </form>
</main>
@endsection