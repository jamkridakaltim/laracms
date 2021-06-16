@extends('web._layouts.app')
@section('content')
  <div class="card border-white">
    <div class="pl-4 py-2 bg-success text-white">
      <span class="h6">KONTAK KAMI</span>
    </div>
    <div class="py-1 bg-red">
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
          <button type="submit" class="btn btn-sm bg-green text-white"><i class="bi-box-arrow-up-right"></i> Kirim</button>
        </div>
      </form>
    </div>

    <div class="img-fluid py-4">
      <iframe class="google-map"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.677451707555!2d117.13178651475337!3d-0.4814702996487249!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f15a85ae33b%3A0xf5b94c63c7d53492!2sDinas%20Koperasi%20dan%20UKM%20Daerah%20Pemerintah%20Kota%20Samarinda!5e0!3m2!1sen!2ssg!4v1568653375895!5m2!1sen!2ssg"
        width="100%" height="300" frameborder="0" style="border:0" allowfullscreen=""></iframe>
    </div>
  </div>
@endsection
