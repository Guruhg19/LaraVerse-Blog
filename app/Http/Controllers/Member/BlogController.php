<?php

namespace App\Http\Controllers\Member;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jumlahData = 2;
        $user = Auth::user();
        $data = Post::where('user_id', $user->id)->orderBy('id','desc')->paginate($jumlahData);
        return view('member.blogs.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $data = $post;
        return view('member.blogs.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'images|mimes:png,jpg,jpeg|max:10240',
            'content' => 'required',
        ],
        [
            'title.required' => 'Judul wajib diisi',
            'description.required' => 'Deskripsi wajib diisi',
            'thumbnail.images' => 'Hanya gambar yang diperbolehkan',
            'thumbnail.mimes' => 'Ekstensi gambar yang diperbolehkan adalah png,jpd atau jpeg',
            'thumbnail.max' => 'Ukuran maksimal untuk gambar adalah 10MB',
            'content.required' => 'Konten wajib diisi'
        ]);

        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
