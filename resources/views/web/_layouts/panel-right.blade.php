@inject('web', 'App\Services\WebService')
{{-- <form class="form-inline mb-3">
  <input class="form-control form-control-sm col mr-sm-2" type="search" placeholder="Cari Info Disini" aria-label="Search">
  <button class="btn btn-sm btn-outline-primary" type="submit">Go !</button>
</form> --}}
<div class="card border-white">
  @foreach ($video as $index => $item)
  <div class="embed-responsive embed-responsive-16by9 mb-2">
    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $item->link }}?rel=0" allowfullscreen></iframe>
  </div>
  @endforeach

  {{-- <div class="embed-responsive embed-responsive-16by9 mb-2">
    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
  </div> --}}

</div>


<div class="card border-white mb-3">
  <div class="py-2">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link text-primary font-weight-bold active" id="terpopuler-tab" data-toggle="tab" href="#terpopuler" role="tab" aria-controls="terpopuler" aria-selected="true">Terpopuler</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link text-primary font-weight-bold" id="terkini-tab" data-toggle="tab" href="#terkini" role="tab" aria-controls="terkini" aria-selected="false">Terkini</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link text-primary font-weight-bold" id="agenda-tab" data-toggle="tab" href="#agenda" role="tab" aria-controls="agenda" aria-selected="false">Agenda</a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="terpopuler" role="tabpanel" aria-labelledby="terpopuler-tab">
        @foreach ($populer as $index => $item)
        <div class="media py-2">
          <img src="{{ $image::postImage($item->id)->value('path') ? url($image::postImage($item->id)->value('path')) : asset('images/img-post.png') }}" height="64" class="mr-3" alt="...">
          <div class="media-body">
            <a href="{{ url("/post/".$item->slug) }}" class="text-dark">{{ $item->title }}</a>
            <p class="small text-primary">{{ date_indo($item->published_at) }} / {{ $item->read }} view</p>
          </div>
        </div>
        @endforeach
      </div>
      <div class="tab-pane" id="terkini" role="tabpanel" aria-labelledby="terkini-tab">
        @foreach ($news as $index => $item)
        <div class="media py-2">
          <img src="{{ $image::postImage($item->id)->value('path') ? url($image::postImage($item->id)->value('path')) : asset('images/img-post.png') }}" height="64" class="mr-3" alt="...">
          <div class="media-body">
            <a href="{{ url("/post/".$item->slug) }}" class="text-dark">{{ $item->title }}</a>
            <p class="small text-primary">{{ date_indo($item->published_at) }} / {{ $item->read }} view</p>
          </div>
        </div>
        @endforeach
      </div>
      <div class="tab-pane" id="agenda" role="tabpanel" aria-labelledby="agenda-tab">
        @foreach ($agenda as $index => $item)
        <div class="media py-2">
          <img src="{{ $image::postImage($item->id)->value('path') ? url($image::postImage($item->id)->value('path')) : asset('images/img-post.png') }}" height="64" class="mr-3" alt="...">
          <div class="media-body">
            <a href="{{ url("/agenda/".$item->slug) }}" class="text-dark">{{ $item->caption }}</a>
            <p class="small text-primary">{{ date_indo($item->date) }} / {{ $item->location }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>

  </div>
</div>

@if(data_get($polling,'id',null) != null )
<div class="card border-white mb-3">
  <div class="px-4 py-3 bg-primary text-white">
    <span class="h5"><i class="bi bi-bar-chart-steps mr-2"></i> POLLING</span>
  </div>
  <div class="p-1 bg-info"></div>
  <form action="{{ route('vote-polling') }}" method="post">
    @csrf
    @method('POST')
    <div class="py-2">
      <ul class="list-group pb-2">
        <li class="list-group-item bg-secondary text-white" aria-current="true">{{ data_get($polling,'content') }}</li>
        @foreach ($polling['answer'] as $index => $item)
          <li class="list-group-item"><input type="radio" name="vote" id="" value="{{ $item->id }}" requiinfo> {{ $item->content }}</li>
        @endforeach
      </ul>
      <button type="submit" class="btn btn-sm btn-block btn-outline-warning">Kirim</button>
      <a href="{{ url('/polling/'. data_get($polling,'id') )}}" class="btn btn-sm btn-block btn-warning">Lihat Polling</a>
    </div>
  </form>
</div>
@endif

<div class="card border-white mb-3">
  <div class="px-4 py-3 bg-primary text-white">
    <span class="h5"><i class="bi bi-link mr-2"></i>EKSTERNAL LINK</span>
  </div>
  <div class="p-1 bg-info"></div>
  <div class="py-2">
    <span class="list-group">
      @foreach ($link as $index => $item)
        <a href="{{ $item->link }}" class="list-group-item text-primary" target="_blank">{{ $item->name }}</a>
      @endforeach
    </span>
  </div>
</div>

<div class="card border-white mb-3">
  <div class="px-4 py-3 bg-primary text-white">
    <span class="h5"><i class="bi bi-phone mr-2"></i>SOSIAL MEDIA</span>
  </div>
  <div class="p-1 bg-info"></div>
  <div class="py-2 text-center">
    <a href="{{ $web->socialMedia('link_facebook')?:'#' }}" class="px-2 display-4 text-primary"><i class="bi bi-facebook"></i></a>
    <a href="{{ $web->socialMedia('link_instagram')?:'#' }}" class="px-2 display-4 text-info"><i class="bi bi-instagram"></i></a>
    <a href="{{ $web->socialMedia('link_youtube')?:'#' }}" class="px-2 display-4 text-danger"><i class="bi bi-youtube"></i></a>
    <a href="{{ $web->socialMedia('link_twitter')?:'#' }}" class="px-2 display-4 text-aqua"><i class="bi bi-twitter"></i></a>
  </div>
</div>
