@extends('web._layouts.app')
@section('content')
  <div class="card border-white">
    <div class="pl-4 py-2 bg-success text-white">
      <span class="h6">{{ $post->title }}</span>
    </div>
    <div class="pl-4 py-2 bg-warning font-weight-bold">
      <i class="bi bi-clock"></i> {{ date_indo($post->published_at) }} / <i class="bi bi-person ml-1"></i> {{ $user->username }} / <i class="bi bi-eye ml-1"></i> {{ $post->read }} views
    </div>
    <div class="py-1">
    </div>
    <div class="py-2">
      <a class="mr-2" href="#">
        <img src="{{ $image::postImage($post->id)->value('path') ? url($image::postImage($post->id)->value('path')) : asset('images/img-post.png') }}" class="img-fluid" alt="...">
      </a>
      <div class="py-2">
        {!! $post->content !!}
      </div>
    </div>
    <div id="disqus_thread"></div>

  </div>
@endsection
@section('bottom-script')
  @parent
  <script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://diskop.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
@endsection
