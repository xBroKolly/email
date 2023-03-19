<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <center>
  <img src="{{ asset('images/paragon.png') }}" width="100px" alt="Image" class="img-fluid text-center"></center>
  <hr>
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      @if(auth()->user()->role == 'admin')
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="/home">
          <i class="fa fa-tachometer-alt" ></i>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="/data-pendaftaran/tambah">
          <i class="fa fa-edit" ></i>
          Form Pendaftaran Beauty Advisor
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="/data-pendaftaran">
          <i class="fa fa-list" ></i>
          Data Pendaftaran
        </a>
      </li>
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Setting</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle"></span>
        </a>
      </h6>
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="/user">
          <i class="fa fa-users"></i>
          Manajemen User
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="/data-sekolah">
          <i class="fa fa-school"></i>
          Data Perusahaan
        </a>
      </li>
      @else
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="/home">
          <i class="fa fa-tachometer-alt" ></i>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="/pendaftaran-siswa-baru">
          <i class="fa fa-edit" ></i>
          Pendaftaran Beauty Advisor
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="/upload-berkas">
          <i class="fa fa-file" ></i>
          Upload Berkas
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt" ></i> Sign out</a>
        
      </li>
    </ul>

    
  </div>
</nav>