@extends('web._layouts.default')
@section('top-script')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<style>
  .bg-img{
    position: relative;
    height: 100vh;
    width: 100%;
    background-image: url('images/bg.jpeg');
    background-size: cover;
  }
</style>
@endsection

@section('bottom-script')
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
  function currentTime() {
    var date = new Date(); /* creating object of Date class */
    var hour = date.getHours();
    var min = date.getMinutes();
    var sec = date.getSeconds();
    // var midday = "AM";
    // midday = (hour >= 12) ? "PM" : "AM"; /* assigning AM/PM */
    // hour = (hour == 0) ? 12 : ((hour > 12) ? (hour - 12): hour); /* assigning hour in 12-hour format */
    hour = changeTime(hour);
    min = changeTime(min);
    sec = changeTime(sec);
    // document.getElementById("digit_clock_time").innerText = hour + " : " + min + " : " + sec + " " + midday; /* adding time to the div */
    document.getElementById("digit_clock_time").innerText = hour + ":" + min + ":" + sec; /* adding time to the div */

    var t = setTimeout(currentTime, 1000); /* setting timer */
  }

  function changeTime(k) { /* appending 0 before time elements if less than 10 */
    if (k < 10) {
      return "0" + k;
    }
    else {
      return k;
    }
  }

  currentTime();

</script>
@endsection

@section('base_content')
  <div class="container">
    <div class="bg-white shadow">

      <div class="container">
        <div class="d-flex row bg-dark">
          <div class="p-2 bg-success text-white">Breaking News!</div>
          <div class="col-8 p-2 bg-dark">
            <marquee class="text-white">
              <a href="#" class="text-white">Jalin Silaturahim, Tingkatkan Ibadah Pasca Ramadhan</a> &nbsp; - &nbsp;
              <a href="#" class="text-white">Forum Konsultasi Teknis Penyusunan RPIK</a> &nbsp; - &nbsp;
              <a href="#" class="text-white">Pengawasan Menjelang Hari Raya</a> &nbsp; - &nbsp;
              <a href="#" class="text-white">Roby Tutup Pasar Murah</a> &nbsp; - &nbsp;
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
            <li class="nav-item active">
              <a class="nav-link" href="#">BERANDA <span class="sr-only">(current)</span></a>
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
      <div class="p-1 bg-warning"></div>

      <div class="row p-3">
        <div class="col-lg-8">
          @yield('content')
          <img src="https://indagkop.kaltimprov.go.id/asset/foto_iklantengah/berdaulat12.jpg" class="img-fluid">
        </div>
        <div class="col-lg-4">
          <form class="form-inline mb-3">
            <input class="form-control form-control-sm col mr-sm-2" type="search" placeholder="Cari Info Disini" aria-label="Search">
            <button class="btn btn-sm btn-outline-success" type="submit">Go !</button>
          </form>
          <div class="card border-white mb-3">
            <div class="p-2">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link text-success active" id="terpopuler-tab" data-toggle="tab" href="#terpopuler" role="tab" aria-controls="terpopuler" aria-selected="true">Terpopuler</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link text-success" id="terkini-tab" data-toggle="tab" href="#terkini" role="tab" aria-controls="terkini" aria-selected="false">Terkini</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link text-success" id="agenda-tab" data-toggle="tab" href="#agenda" role="tab" aria-controls="agenda" aria-selected="false">Agenda</a>
                </li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="terpopuler" role="tabpanel" aria-labelledby="terpopuler-tab">TERPOPULER</div>
                <div class="tab-pane" id="terkini" role="tabpanel" aria-labelledby="terkini-tab">TERKINI</div>
                <div class="tab-pane" id="agenda" role="tabpanel" aria-labelledby="agenda-tab">AGENDA</div>
              </div>

            </div>
          </div>

          <div class="card border-white mb-3">
            <div class="px-4 py-3 bg-success text-white">
              <span class="h5"><i class="bi bi-list mr-2"></i> DAFTAR HARGA</span>
            </div>
            <div class="p-1 bg-warning"></div>
            <div class="p-2">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam provident, necessitatibus eos sequi quo dicta officia maxime facere reprehenderit reiciendis vel harum ea nihil dignissimos neque quaerat repellat quos nemo.
            </div>
          </div>
          <div class="card border-white mb-3">
            <div class="px-4 py-3 bg-success text-white">
              <span class="h5"><i class="bi bi-bar-chart-steps mr-2"></i> POLLING</span>
            </div>
            <div class="p-1 bg-warning"></div>
            <div class="p-2">
              <ul class="list-group">
                <li class="list-group-item bg-secondary text-white" aria-current="true">BAGAIMANAKAH KINERJA INSTANSI DINAS ?</li>
                <li class="list-group-item"><input type="radio" name="vote" id=""> Kurang</li>
                <li class="list-group-item"><input type="radio" name="vote" id=""> Cukup</li>
                <li class="list-group-item"><input type="radio" name="vote" id=""> Baik</li>
                <li class="list-group-item"><input type="radio" name="vote" id=""> Sangat Baik</li>
                <li class="list-group-item"><input type="radio" name="vote" id=""> Tidak Tahu</li>
              </ul>
            </div>
          </div>

          <div class="card border-white mb-3">
            <div class="px-4 py-3 bg-success text-white">
              <span class="h5">BANNER</span>
            </div>
            <div class="p-1 bg-warning"></div>
            <div class="py-2">
              <span class="list-group">
                <a href="" class="list-group-item">PROUKM</a>
                <a href="" class="list-group-item">Pengaduan Konsumen</a>
                <a href="" class="list-group-item">E-SKA</a>
                <a href="" class="list-group-item">E-SURAT</a>
                <a href="" class="list-group-item">UPTD.BPSMB</a>
              </span>
            </div>
          </div>

          <div class="card border-white mb-3">
            <div class="px-4 py-3 bg-success text-white">
              <span class="h5">BANNER LINK</span>
            </div>
            <div class="p-1 bg-warning"></div>
            <div class="card-body">
                <img class="img-fluid border mb-2" src="https://indagkop.kaltimprov.go.id/asset/foto_pasangiklan/kemenperin.jpg">
                <img class="img-fluid border mb-2" src="https://indagkop.kaltimprov.go.id/asset/foto_pasangiklan/kemenperin.jpg">
                <img class="img-fluid border mb-2" src="https://indagkop.kaltimprov.go.id/asset/foto_pasangiklan/kemenperin.jpg">
                <img class="img-fluid border mb-2" src="https://indagkop.kaltimprov.go.id/asset/foto_pasangiklan/kemenperin.jpg">
            </div>
          </div>
        </div>
      </div>
      <div class="p-1 bg-warning"></div>
      <footer class="bg-success mt-auto py-3">
        <div class="container">
          <div class="text-center">
            <span class="text-light">Dinas Perindagkop & UKM Prov. Kaltim.</span>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection
