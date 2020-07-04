@extends('template.master')

@section('title','Edit Jawaban')
@section('title-page','Edit Jawaban')

@section('content')
<form action="/jawaban/{{$qId}}" method="post">
  @csrf
  @method('PUT')
  <input type="hidden" name="answer_id" value="{{$data->id}}">
  <div class="form-group">
    <label for="content">Isi Jawaban</label>
    <textarea class="form-control" id="content" rows="11" placeholder="isi Pertanyaan" name="content">{{$data->answers_content}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection
