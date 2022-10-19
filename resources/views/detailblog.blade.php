@extends('masterblog')
 
<!-- memberikan judul di tab sesuai dengan judul artikel yang sedang dibaca -->
@section('title')
{{ $article->judul }}
@endsection
 


<!-- menampilkan gambar, judul, dan isi artikel -->
@section('main')
@if ($article->image != null)
    <div class="col-md-7 col-sm-12 mb-5 bg-white p-0 bintang2">
        <img src="{{ asset('storage/' . $article->image)  }}" class="card-img-top" alt="gambar" >
        <div class="py-4">
            <h2>{{ $article->judul }}</h2>
            <p align="justify" class="mt-5">{{ $article->deskripsi }}</p>
        </div>
    </div>

@else
    <div class="col-md-7 col-sm-12 mb-5 bg-white p-0 bintang2">
        <img src="https://pammana.wajokab.go.id/img/no-image.png" class="card-img-top" alt="gambar" >
        <div class="py-4">
            <h2>{{ $article->judul }}</h2>
            <p align="justify" class="mt-5">{{ $article->deskripsi }}</p>
        </div>
    </div>
@endif
@endsection
 
<!-- menampilkan tombol kembali ke halaman utama -->
@section('sidebar')
<div class="col-md-4 offset-md-1 col-sm-12 bg-white p-4 h-100">
        <a href="/showblog"> 
            <button class="btn btn-info text-white w-100">Kembali</button> 
        </a>

</div>
@endsection