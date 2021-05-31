@extends('web._layouts.app')
@section('top-content')
<div id="carouselExampleIndicators" class="carousel slide bg-light d-none d-sm-block" data-ride="carousel">

  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="media p-3">
        <img src="https://indagkop.kaltimprov.go.id/asset/foto_berita/halbi.jpg" height="200" class="mr-3" alt="...">
        <div class="media-body">
          <h5 class="h3 mt-0">Media heading</h5>
          <p>Will you do the same for me? It's time to face the music I'm no longer your muse. Heard it's beautiful, be the judge and my girls gonna take a vote. I can feel a phoenix inside of me. Heaven is jealous of our love, angels are crying from up above. Yeah, you take me to utopia. <br> <a href="#" class="badge badge-warning">Selengkapnya...</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="media p-3">
        <img src="https://indagkop.kaltimprov.go.id/asset/foto_berita/halbi.jpg" height="200" class="mr-3" alt="...">
        <div class="media-body">
          <h5 class="h3 mt-0">Media heading</h5>
          <p>Will you do the same for me? It's time to face the music I'm no longer your muse. Heard it's beautiful, be the judge and my girls gonna take a vote. I can feel a phoenix inside of me. Heaven is jealous of our love, angels are crying from up above. Yeah, you take me to utopia. <br> <a href="#" class="badge badge-warning">Selengkapnya...</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="media p-3">
        <img src="https://indagkop.kaltimprov.go.id/asset/foto_berita/halbi.jpg" height="200" class="mr-3" alt="...">
        <div class="media-body">
          <h5 class="h3 mt-0">Media heading</h5>
          <p>Will you do the same for me? It's time to face the music I'm no longer your muse. Heard it's beautiful, be the judge and my girls gonna take a vote. I can feel a phoenix inside of me. Heaven is jealous of our love, angels are crying from up above. Yeah, you take me to utopia. <br> <a href="#" class="badge badge-warning">Selengkapnya...</a></p>
        </div>
      </div>
    </div>
  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="p-1 bg-warning"></div>
@endsection

@section('content')
  <div class="card border-white">
    <div class="px-4 py-3 bg-success text-white">
      <span class="h5"><i class="bi-volume-up-fill"></i> BERITA TERKINI</span>
    </div>
    <div class="p-1 bg-warning"></div>

    <div class="p-2">
      <div class="media">
        <img src="https://indagkop.kaltimprov.go.id/asset/foto_berita/halbi.jpg" height="64" class="mr-3" alt="...">
        <div class="media-body">
          <h5 class="mt-0">Media heading</h5>
          <p>Standing on the frontline when the bombs start to fall. Heaven is jealous of our love, angels are crying from up above. Can't replace you with a million rings. Boy, when you're with me I'll give you a taste. There’s no going back. Before you met me I was alright but things were kinda heavy. Heavy is the head that wears the crown.</p>

          <div class="media mt-3">
            <a class="mr-3" href="#">
              <img src="https://indagkop.kaltimprov.go.id/asset/foto_berita/halbi.jpg" height="64" alt="...">
            </a>
            <div class="media-body">
              <h5 class="mt-0">Media heading</h5>
              <p>Greetings loved ones let's take a journey. Yes, we make angels cry, raining down on earth from up above. Give you something good to celebrate. I used to bite my tongue and hold my breath</p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <img src="https://indagkop.kaltimprov.go.id/asset/foto_iklantengah/STOP_GRATIFIKASI1.jpg" class="img-fluid">

  <div class="row py-4">
    <div class="col-lg-6 col-sm-12">
      <div class="card border-white">
        <div class="px-4 py-3 bg-success text-white">
          <span class="font-weight-bold"><i class="bi-newspaper mr-2"></i> SEPUTAR INDAGKOP</span>
        </div>
        <div class="p-1 bg-warning"></div>
        <div class="p-2">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, voluptatem rem minus id, quasi quo aut consequuntur possimus nostrum corporis vero sapiente aliquam repudiandae nisi autem libero. Dolores, unde sint.
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-sm-12">
      <div class="card border-white">
        <div class="px-4 py-3 bg-success text-white">
          <span class="font-weight-bold"><i class="bi-journal-text mr-2"></i> ARTIKEL INDAGKOP</span>
        </div>
        <div class="p-1 bg-warning"></div>
        <div class="p-2">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus reprehenderit consectetur voluptate cum dolore provident! Fugit neque nemo in? Recusandae sit exercitationem necessitatibus placeat ab facilis porro, ut iusto minima?
        </div>
      </div>
    </div>
  </div>

  <img src="https://indagkop.kaltimprov.go.id/asset/foto_iklantengah/PUBLIKASI.jpg" class="img-fluid">

  <div class="row py-4">
    <div class="col-lg-6 col-sm-12">
      <div class="card border-white">
        <div class="px-4 py-3 bg-success text-white">
          <span class="font-weight-bold"><i class="bi-newspaper mr-2"></i> PENGUMUMAN</span>
        </div>
        <div class="p-1 bg-warning"></div>
        <div class="p-2">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, voluptatem rem minus id, quasi quo aut consequuntur possimus nostrum corporis vero sapiente aliquam repudiandae nisi autem libero. Dolores, unde sint.
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-sm-12">
      <div class="card border-white">
        <div class="px-4 py-3 bg-success text-white">
          <span class="font-weight-bold"><i class="bi-journal-text mr-2"></i> NASIONAL</span>
        </div>
        <div class="p-1 bg-warning"></div>
        <div class="p-2">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus reprehenderit consectetur voluptate cum dolore provident! Fugit neque nemo in? Recusandae sit exercitationem necessitatibus placeat ab facilis porro, ut iusto minima?
        </div>
      </div>
    </div>
  </div>

@endsection
