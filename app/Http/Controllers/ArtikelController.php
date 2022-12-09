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
        if (auth()->user()->id !== $article->user_id) {
            return redirect()->action([ArtikelController::class, 'show'])->with('error', 'You are not authorized to edit this article');
        } else {
            return view('editblog', ['article' => $article]);
        }
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
        } else if (auth()->user()->isAdmin == 0) {
            return redirect()->action([ArtikelController::class, 'show'])->with('error', 'You are not authorized to view this page');
        }
    }

    public function edit_process(Request $article)
    {
        $article->validate(
            [
                'judul' => 'required',
                'deskripsi' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'judul.required' => 'Judul harus diisi',
                'deskripsi.required' => 'Deskripsi harus diisi',
                'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif, svg',
                'image.max' => 'Ukuran file maksimal 2 MB',
            ]
        );
        $edit = Artikel::find($article->id);
        if (auth()->user()->id != $edit->user_id) {
            return redirect()->action([ArtikelController::class, 'show'])->with('error', 'You are not authorized to edit this article');
        }

        if ($article->file('image')) {
            $edit->update([
                'judul' => $article->judul,
                'deskripsi' => $article->deskripsi,
                'image' => $article->file('image')->store('artikel'),
                'user_id' => auth()->user()->id,
            ]);
        } else {
            $edit->update([
                'judul' => $article->judul,
                'deskripsi' => $article->deskripsi,
                'user_id' => auth()->user()->id,
            ]);
        }
        Session::flash('success', 'Artikel berhasil diedit');
        if (auth()->user()->isAdmin == 1) {
            return redirect()->action([ArtikelController::class, 'show_by_admin']);
        } else {
            return redirect()->action([ArtikelController::class, 'show']);
        }
    }

    public function delete(Request $article)
    {
        $delete = Artikel::find($article->id);
        if (auth()->user()->id !== $delete->user_id) {
            return redirect()->action([ArtikelController::class, 'show'])->with('error', 'You are not authorized to delete this article');
        } else {
            $delete->delete();
            Session::flash('success', 'Artikel berhasil dihapus');
            return redirect()->back();
        }
    }
}
