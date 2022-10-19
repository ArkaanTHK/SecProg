<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ArtikelController extends Controller
{
    public function show()
    {
        $articles = DB::table('artikels')->orderby('id', 'desc')->get();
        return view('showblog', ['articles' => $articles]);
    }

    public function show3()
    {
        $articles = DB::table('artikels')->orderby('id', 'desc')->take(3)->get();
        return view('index', ['articles' => $articles]);
    }

    public function add()
    {
        return view('add');
    }


    public function addblog_process(Request $article)
    {
        if ($article->file('image')) {
            Artikel::create([
                'judul' => $article->judul,
                'deskripsi' => $article->deskripsi,
                'image' => $article->file('image')->store('artikel'),
            ]);
        } else {
            Artikel::create([
                'judul' => $article->judul,
                'deskripsi' => $article->deskripsi,
            ]);
        }

        // dd($article->file('image')->store('/artikel'));
        // $article->file('image')->store('/artikel');
        return redirect()->action([ArtikelController::class, 'show']);
        // return redirect('/showblog');
        // return $article->file('image')->store('/artikel');
    }



    public function edit($id)
    {
        $article = Artikel::find($id);
        return view('editblog', ['article' => $article]);
    }

    public function detail($id)
    {
        $article = DB::table('artikels')->where('id', $id)->first();
        return view('detailblog', ['article' => $article]);
    }

    public function show_by_admin()
    {
        $articles = DB::table('artikels')->orderby('id', 'desc')->get();
        return view('adminblog', ['articles' => $articles]);
    }

    // public function edit($id)
    // {
    //     $article = DB::table('artikel')->where('id', $id)->first();
    //     return view('editblog', ['article' => $article]);
    // }

    // public function edit_process(Request $article)
    // {
    //     $id = $article->id;
    //     $judul = $article->judul;
    //     $deskripsi = $article->deskripsi;
    //     DB::table('artikels')->where('id', $id)
    //         ->update(['judul' => $judul, 'deskripsi' => $deskripsi]);
    //     Session::flash('success', 'Artikel berhasil diedit');
    //     return redirect()->action([ArtikelController::class, 'show_by_admin']);
    // }
    public function edit_process(Request $article)
    {
        // dd($article->judul);
        $edit = Artikel::find($article->id);
        $edit->update([
            'judul' => $article->judul,
            'deskripsi' => $article->deskripsi,
            'image' => $article->image,
        ]);
        return redirect('/adminblog');
    }

    public function delete(Request $article)
    {
        $delete = Artikel::find($article->id);
        $delete->delete();
        Session::flash('success', 'Artikel berhasil dihapus');
        return redirect()->action([ArtikelController::class, 'show_by_admin']);
    }
}
