<!-- menggunakan kerangka dari halaman master.blade.php --> 
@extends('masterblog')
 
<!-- membuat komponen title sebagai judul halaman -->
@section('title', 'Athena Blog')
 
<!-- membuat header dan tombol tambah artikel di atas -->
@section('header')
@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
    </div>
@elseif($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
    </div>
@endif
      <!-- Jumbotron Card Bootstrap -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4 athena">Athena Blog</h1>
          <p class="lead">Resources</p>
    </div>
    @auth
    <a id="addbtn" href="/addblog"><button class="btn btn-success">Add Article</button></a>
    @endauth




@endsection
 
<!-- membuat komponen main yang berisi form untuk mengisi judul dan isi artikel -->
@section('main')
    @foreach ($articles as $article)
    @if($article->image != null)
    <div class="col-md-4 col-sm-12 mt-4 bintang">
        <div class="card">
            <img src="{{ asset('storage/' . $article->image)  }}" class="card-img-top" alt="gambar" >
            <div class="card-body">
                <h5 class="card-title">{{ $article->judul }}</h5>
                <a href="/detailblog/{{ $article->id }}" class="btn btn-primary">Read</a>
                @auth
                @if(Auth::user()->id == $article->user_id)
                <a href="/editblog/{{ $article->id }}" class="btn btn-warning">Edit</a>
                <a href="/deleteblog/{{ $article->id }}" class="btn btn-danger">Delete</a>
                @endif
                @endauth
            </div>
        </div>
    </div>

    @else
    <div class="col-md-4 col-sm-12 mt-4 bintang">
        <div class="card">
            <img src="https://pammana.wajokab.go.id/img/no-image.png" class="card-img-top" alt="gambar" >
            <div class="card-body">
                <h5 class="card-title">{{ $article->judul }}</h5>
                <a href="/detailblog/{{ $article->id }}" class="btn btn-primary">Read</a>
            </div>
        </div>
    </div>
    @endif
   @endforeach
@endsection