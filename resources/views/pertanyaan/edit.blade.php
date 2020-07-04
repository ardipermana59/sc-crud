@extends('template.master')

@section('title','Edit Pertanyaan')
@section('title-page','Edit Pertanyaan')

@section('content')
<form action="/pertanyaan/{{$question->id}}" method="post">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" placeholder="Masukan Judul Pertanyaan" name="email" value="{{$question->email}}">
  </div>
  <div class="form-group">
    <label for="title">Judul Pertanyaan</label>
    <input type="text" class="form-control" id="title" placeholder="Masukan Judul Pertanyaan" name="title" value="{{$question->title}}">
  </div>
  
  <div class="form-group">
    <label for="content">Isi Pertanyaan</label>
    <textarea class="form-control" id="content" rows="5" placeholder="isi Pertanyaan" name="content">{{$question->content}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Kirim</button>
</form>
@endsection
