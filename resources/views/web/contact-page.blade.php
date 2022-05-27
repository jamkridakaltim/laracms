@extends('web._layouts.app')
@section('content')
  <div class="card border-white">
    <div class="pl-4 py-2 bg-primary text-white">
      <span class="h6">KONTAK KAMI</span>
    </div>
    <div class="py-1 bg-info">
    </div>
    <div class="py-1">
    </div>

    <div class="py-2">
      <form action="{{ route('contact_send') }}" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="" class="label">Nama Anda</label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="" class="label">Nomor Kontak/Whatsapp Anda</label>
          <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="" class="label">Email Anda</label>
          <input type="email" name="email" class="form-control">
          <small class="text-muted">Tidak Wajib</small>
        </div>
        <div class="form-group">
          <label for="" class="label">Kritik dan Saran / Pesan Anda</label>
          <textarea name="message" rows="5" class="form-control" required></textarea>
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-sm bg-primary text-white"><i class="bi-box-arrow-up-right"></i> Kirim</button>
        </div>
      </form>
    </div>

    <div class="img-fluid py-4">
      <iframe class="google-map"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d997.417255815881!2d117.15585433902251!3d-0.49566480283344927!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f151818dd03%3A0x5d7986d52df09102!2sHead%20Office%20PT.%20Jamkrida%20Kaltim!5e0!3m2!1sid!2sid!4v1614777214794!5m2!1sid!2sid"
        width="100%" height="300" frameborder="0" style="border:0" allowfullscreen=""></iframe>
    </div>
  </div>
@endsection
