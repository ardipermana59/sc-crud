@extends('template.master')

@section('title','Buat Pertanyaan')
@section('title-page','Buat Pertanyaan')

@section('content')
<form action="/pertanyaan" method="post">
  @csrf
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" placeholder="Masukan Judul Pertanyaan" name="email" value="contohemail@gmail.com">
  </div>
  <div class="form-group">
    <label for="title">Judul Pertanyaan</label>
    <input type="text" class="form-control" id="title" placeholder="Masukan Judul Pertanyaan" name="title">
  </div>
  
  <div class="form-group">
    <label for="content">Isi Pertanyaan</label>
    <textarea class="form-control" id="content" rows="5" placeholder="isi Pertanyaan" name="content"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Kirim</button>
</form>
@endsection
