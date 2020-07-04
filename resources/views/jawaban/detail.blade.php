@extends('template.master')

@section('title','Home')
@section('title-page','Home')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12 p-3">
      <div class="border-bottom">
        <h3>{{$data->title}}</h3>
        <p class="text-muted">
          <small>{{$data->email}} | 
            <span><?= date('h M Y', $data->create_at); ?></span>
           
          </small>

        </p>
      </div>
      <div class="p-4 border-bottom">
        <p>{{$data->content}}</p>
      </div> 
    </div>
  </div>
  <h5 class="ml-4">Answer (<span><?= count($answers) ?></span>)</h5>
  @foreach ( $answers as $answer)
  <div class="row border-bottom">
    
    <div class="col-md-11 offset-md-1 pt-2 pr-5 pl-5 pb-5 ">
      <p>
        {{$answer->answers_content}}
      </p>
      <p>
        <span><a href="/jawaban/edit/{{$answer->id}}/{{$data->id}}">Edit</a></span>
      <small class="float-right">From <span>{{$answer->email}}</span></small>
      </p>
    </div>

  </div>
  @endforeach

  <div class="row mt-5">
    <div class="col-md-10 offset-md-1">
      <form action="/jawaban/{{$data->id}}" method="post">
        @csrf
        <input type="hidden" name="pertanyaanId" value="{{$data->id}}">
        <input type="text" name="id" value="8" hidden="">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" placeholder="Masukan Judul Pertanyaan" name="email">
        </div>
        <div class="form-group">
          <label for="content">Isi Pertanyaan</label>
          <textarea class="form-control" id="content" rows="8" placeholder="isi Pertanyaan" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
      </form>
    </div>
  </div>    
</div>
@endsection