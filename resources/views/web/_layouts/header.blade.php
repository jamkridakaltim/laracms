<div class="container">
  <div class="d-flex row bg-dark">
    <div class="p-2 bg-success text-white">Breaking News!</div>
    <div class="col-8 p-2 bg-dark">
      <marquee class="text-white">
        <a href="#" class="text-warning"><i class="bi bi-file-richtext mr-2"></i>Jalin Silaturahim, Tingkatkan Ibadah Pasca Ramadhan</a> &nbsp; - &nbsp;
        <a href="#" class="text-warning"><i class="bi bi-file-richtext mr-2"></i>Forum Konsultasi Teknis Penyusunan RPIK</a> &nbsp; - &nbsp;
        <a href="#" class="text-warning"><i class="bi bi-file-richtext mr-2"></i>Pengawasan Menjelang Hari Raya</a> &nbsp; - &nbsp;
        <a href="#" class="text-warning"><i class="bi bi-file-richtext mr-2"></i>Roby Tutup Pasar Murah</a>
      </marquee>
    </div>
    <div class="col p-2 bg-success text-white">
      <div class="digital_clock_wrapper">
        {{ today()->format("l, d F Y") }},
        <span id="digit_clock_time"></span> WITA
        {{-- <div id="digit_clock_date"></div> --}}
      </div>
    </div>
  </div>
</div>

<div class="p-1 bg-warning"></div>

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://indagkop.kaltimprov.go.id/asset/logo/baliho_hari_konsumen_nasional.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://indagkop.kaltimprov.go.id/asset/logo/kpk.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://indagkop.kaltimprov.go.id/asset/logo/banner.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/">BERANDA <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          TENTANG KAMI
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item small" href="#">Sekapur Sirih</a>
          <a class="dropdown-item small" href="#">Maklumat Pelayanan</a>
          <a class="dropdown-item small" href="#">Sejarah Dinas Perindagkop</a>
          <a class="dropdown-item small" href="#">Visi Dan Misi</a>
          <a class="dropdown-item small" href="#">Struktur Organisasi</a>
          <a class="dropdown-item small" href="#">Tupoksi</a>
          <a class="dropdown-item small" href="#">Kebijakan Mutu</a>
          <a class="dropdown-item small" href="#">Peraturan dan kebijakan Perkeb</a>
          <a class="dropdown-item small" href="#">LHKPN</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          PROGRAM DAN KEGIATAN
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item small" href="#">Rencana Strategis</a>
          <a class="dropdown-item small" href="#">Indikator Kinerja Utama</a>
          <a class="dropdown-item small" href="#">Program dan Kinerja</a>
          <a class="dropdown-item small" href="#">Laporan Capaian Kinerja</a>
          <a class="dropdown-item small" href="#">Monitoring dan Evaluasi</a>
          <a class="dropdown-item small" href="#">Neraca Keuangan</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          BIDANG DAN UPTD
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item small" href="#">Koperasi dan UMKM</a>
          <a class="dropdown-item small" href="#">Industri</a>
          {{-- <div class="dropright">
            <a href="#" class="dropdown-item dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Industri
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item small" href="#">KEK/MBTK</a>
              <a class="dropdown-item small" href="#">SENTRA IKM SOMBER</a>
              <a class="dropdown-item small" href="#">SENTRA IKM TERITIP</a>
              <a class="dropdown-item small" href="#">SIDIN</a>
            </div>
          </div> --}}
          <a class="dropdown-item small" href="#">Perdagangan</a>
          <a class="dropdown-item small" href="#">PKPB</a>
          <a class="dropdown-item small" href="#">UPTD. BPSMB</a>
          <a class="dropdown-item small" href="#">UPTD. P3UKM</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          BERITA
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item small" href="#">Seputar Indagkop</a>
          <a class="dropdown-item small" href="#">Pengumuman</a>
          <a class="dropdown-item small" href="#">Artikel Indagkop</a>
          <a class="dropdown-item small" href="#">Nasional</a>
          <a class="dropdown-item small" href="#">Berita Foto</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          INFORMASI
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item small" href="#">Harga Komoditi</a>
          <a class="dropdown-item small" href="#">Semua Agenda</a>
          <a class="dropdown-item small" href="#">Koleksi Video</a>
          <a class="dropdown-item small" href="#">Unduhan</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          LAYANAN
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item small" href="#">Konsultasi</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          PPID
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item small" href="#">Profil PPID</a>
          <a class="dropdown-item small" href="#">Struktur Organisasi PPID</a>
          <a class="dropdown-item small" href="#">Dasar Hukum</a>
          <a class="dropdown-item small" href="#">Maklumat Pelayanan</a>
          <a class="dropdown-item small" href="#">Tata Cara Permohonan Informasi</a>
          <a class="dropdown-item small" href="#">Tata Cara Pengajuan Keberatan</a>
          <a class="dropdown-item small" href="#">Tata Cara Pengajuan Permohonan</a>
          <a class="dropdown-item small" href="#">Daftar Informasi Publik</a>
          <a class="dropdown-item small" href="#">Formulir Permohonan</a>
        </div>
      </li>
    </ul>
    {{-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> --}}
  </div>
</nav>

<div class="p-1 bg-warning"></div>
