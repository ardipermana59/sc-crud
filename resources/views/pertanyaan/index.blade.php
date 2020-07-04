@extends('template.master')

@section('title','Home')
@section('title-page','Home')

@section('content')
	<table class="table table-bordered">
    <thead>                  
      <tr class="text-center">
        <th style="width: 1rem;">No</th>
        <th style="width: 7em;">Judul</th>
        <th style="width: 10px;">Dibuat oleh</th>
        <th>Isi Pertanyaan</th>
        <th style="width: 6rem;">Action</th>
        <th style="width: 5rem;">Waktu Buat</th>
        <th style="width: 5rem;">Waktu Update</th>
      </tr>
    </thead>
    <tbody>
      @if (session('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }} 
        </div>
      @elseif (session('edit-pertanyaan'))
        <div class="alert alert-warning text-center" role="alert">
            {{ session('edit-pertanyaan') }}
      @elseif (session('destroy'))
        <div class="alert alert-danger text-center" role="alert">
            {{ session('destroy') }} 
        </div>
      @endif
      

      @foreach ($questions as $key => $question)

        <tr>
          <td>{{$key+1}}</td>
          <td>{{$question->title}}</td>
          <td>{{$question->email}}</td>
          <td>{{$question->content}}</td>
          <td>
            <a href="/jawaban/{{$question->id}}" class="badge badge-success p-3">Detail</a>
            <a href="/pertanyaan/{{$question->id}}/edit" class="badge badge-warning p-3">Edit</a>
            <form action="/pertanyaan/{{$question->id}}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger"><i class=" fas fa-trash"></i></button>
            </form>
          </td>
          <td><?= date('h M Y G:i', $question->create_at); ?></td>

          <?php  if( $question->update_at == 0): ?>
            <td>-</td>
          <?php   else: ?>
            <td><?= date('h M Y G:i', $question->update_at); ?></td>
          <?php   endif; ?>
        </tr>

      @endforeach
    </tbody>
  </table>
@endsection