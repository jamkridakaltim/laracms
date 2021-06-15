@inject('web', 'App\Services\WebService')
<div class="p-1 bg-warning"></div>
<footer class="bg-dark mt-auto py-3">
  <div class="container">
    <div class="text-center">
      <span class="text-light">Tahun {{ tahun() }}. {{ $web->titlePage() }}.</span>
    </div>
  </div>
</footer>
<div class="p-1 bg-warning"></div>
