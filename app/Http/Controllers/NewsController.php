<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function __construct()
    {
        // Hanya fungsi create, store, edit, update, destroy yang membutuhkan auth
        // Periksa apakah user adalah admin di dalam method
        $this->middleware('auth')->except(['index', 'show']);
    }
    
    // Tampilkan semua berita (public)
    public function index()
    {
        $news = News::latest()->get();
        return view('news.index', compact('news'));
    }
    
    // Tampilkan detail berita (public)
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }

    // Tampilkan form tambah berita (admin only)
    public function create()
    {
        // Redirect non-admin user
        if (!Auth::user()->is_admin) {
            return redirect()->route('news.index')->with('error', 'Anda tidak memiliki hak akses ke halaman tersebut.');
        }
        
        return view('news.create');
    }

    // Simpan berita baru (admin only)
    public function store(Request $request)
    {
        // Redirect non-admin user
        if (!Auth::user()->is_admin) {
            return redirect()->route('news.index')->with('error', 'Anda tidak memiliki hak akses untuk melakukan tindakan ini.');
        }
        
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'hashtag' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);
        
        $gambar = null;
        if ($request->hasFile('gambar')) {
            // Dapatkan file dan generate nama unik
            $file = $request->file('gambar');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            
            // Pindahkan file ke public/images
            $file->move(public_path('images'), $filename);
            
            // Simpan path relatif ke database
            $gambar = 'images/' . $filename;
        }

        News::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'hashtag' => $request->hashtag,
            'gambar'=> $gambar,
        ]);
        
        return redirect()->route('news.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    // Tampilkan form edit berita (admin only)
    public function edit($id)
    {
        // Redirect non-admin user
        if (!Auth::user()->is_admin) {
            return redirect()->route('news.index')->with('error', 'Anda tidak memiliki hak akses ke halaman tersebut.');
        }
        
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    // Update berita (admin only)
    public function update(Request $request, $id)
    {
        // Redirect non-admin user
        if (!Auth::user()->is_admin) {
            return redirect()->route('news.index')->with('error', 'Anda tidak memiliki hak akses untuk melakukan tindakan ini.');
        }
        
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'hashtag' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);
        
        $news = News::findOrFail($id);

        $gambar = $news->gambar;
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($news->gambar && File::exists(public_path($news->gambar))) {
                File::delete(public_path($news->gambar));
            }
            
            // Dapatkan file dan generate nama unik
            $file = $request->file('gambar');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            
            // Pindahkan file ke public/images
            $file->move(public_path('images'), $filename);
            
            // Simpan path relatif ke database
            $gambar = 'images/' . $filename;
        }

        $news->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'hashtag' => $request->hashtag,
            'gambar'=> $gambar,
        ]);
        
        return redirect()->route('news.index')->with('success', 'Berita berhasil diupdate!');
    }
    
    // Delete berita (admin only)
    public function destroy($id)
    {
        // Redirect non-admin user
        if (!Auth::user()->is_admin) {
            return redirect()->route('news.index')->with('error', 'Anda tidak memiliki hak akses untuk melakukan tindakan ini.');
        }
        
        $news = News::findOrFail($id);
        
        // Delete image if exists
        if ($news->gambar && File::exists(public_path($news->gambar))) {
            File::delete(public_path($news->gambar));
        }
        
        $news->delete();
        return redirect()->route('news.index')->with('success', 'Berita berhasil dihapus!');
    }
}
