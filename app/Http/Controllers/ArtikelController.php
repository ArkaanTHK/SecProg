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
        // Check if user is logged in
        if (auth()->user()) {
            $articles = DB::table('artikels')->orderby('id', 'desc')->get();
            return view('showblog', ['articles' => $articles]);
        } else {
            return redirect('/login');
        }
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
        // if ($article->file('image')) {
        //     Artikel::create([
        //         'judul' => $article->judul,
        //         'deskripsi' => $article->deskripsi,
        //         'image' => $article->file('image')->store('artikel'),
        //     ]);
        // } else if (getimagesize($article->image)) {
        //     Artikel::create([
        //         'judul' => $article->judul,
        //         'deskripsi' => $article->deskripsi,
        //         'image' => $article->image,
        //     ]);
        // } else {
        //     Session::flash('error', 'Image is not valid');
        //     return redirect()->back();
        // }
        // return redirect()->action([ArtikelController::class, 'show']);

        //Validate the Article, if it fails, redirect back to the form with the errors and if it passes, save the article
        $article->validate(
            [
                'judul' => 'required',
                'deskripsi' => 'required',
                'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|image|max:2048',
            ],
            [
                'judul.required' => 'Judul harus diisi',
                'deskripsi.required' => 'Deskripsi harus diisi',
                'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif, svg',
                'image.max' => 'Ukuran file maksimal 2 MB',
            ]
        );


        if ($article->file('image')) {
            Artikel::create([
                'judul' => $article->judul,
                'deskripsi' => $article->deskripsi,
                'image' => $article->file('image')->store('artikel'),
                'user_id' => auth()->user()->id,
            ]);
        } else {
            Artikel::create([
                'judul' => $article->judul,
                'deskripsi' => $article->deskripsi,
                'image' => 'artikel/default.jpg',
                'user_id' => auth()->user()->id,
            ]);
        }
        return redirect()->action([ArtikelController::class, 'show']);
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
        if (!auth()->user()) {
            return redirect()->action([LoginController::class, 'login']);
        }
        if (auth()->user()->isAdmin == 1) {
            $articles = DB::table('artikels')->orderby('id', 'desc')->get();
            return view('adminblog', ['articles' => $articles]);
        } else (auth()->user()->isAdmin == 0); {
            $articles = DB::table('artikels')->where('user_id', auth()->user()->id)->orderby('id', 'desc')->get();
            return view('adminblog', ['articles' => $articles]);
        }
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
        return redirect()->back();
    }
}
