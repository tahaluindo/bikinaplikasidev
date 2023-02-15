<?php

namespace App\Http\Controllers;

use App\Models\Balasan;
use App\Models\Komen;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {

        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => 'posts',
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post, Request $request)
    {

        if ($request->notifikasi_id) {
            Notifikasi::findOrFail($request->notifikasi_id)->update([
                'dibaca' => 1
            ]);
        }

        return view('post', [
            "title" => $post->title,
            "active" => 'posts',
            "post" => $post
        ]);
    }

    public function komen(Request $request, Post $post)
    {
        $this->validate($request, [
            'isi' => 'required|min:5'
        ]);

        if ($post->user_id != auth()->user()->id) {
            Notifikasi::create([
                'post_id' => $post->id,
                'dari_user' => auth()->user()->id,
                'ke_user' => $post->user_id,
                'type' => 'Komentar'
            ]);
        }

        Komen::create([
            'post_id' => $post->id,
            'user_id' => auth()->user()->id,
            'isi' => $request->isi
        ]);

        return redirect()->back();
    }

    public function komenUpdate(Request $request, Post $post, Komen $komen)
    {
        $this->validate($request, [
            'isi' => 'required|min:5'
        ]);

        $komen->update([
            'isi' => $request->isi
        ]);

        return redirect()->back();
    }

    public function komenDestroy(Request $request, Post $post, Komen $komen)
    {
        $komen->delete();

        return redirect()->back();
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back();
    }

    public function balasan(Request $request, Komen $komen)
    {
        $this->validate($request, [
            'isi' => 'required|min:5'
        ]);

        if ($komen->user_id != auth()->user()->id) {
            Notifikasi::create([
                'post_id' => $komen->post_id,
                'dari_user' => auth()->user()->id,
                'ke_user' => $komen->user_id,
                'type' => 'Balasan'
            ]);
        }

        Balasan::create([
            'komen_id' => $komen->id,
            'user_id' => auth()->user()->id,
            'isi' => $request->isi
        ]);

        return redirect()->back();
    }

    public function setAsTheBestKomen(Post $post, Komen $komen)
    {
        if (auth()->user()->id == $post->user_id) {
            $komen->update([
                'is_the_best_komen' => 1
            ]);
        }

        return redirect()->back();
    }

}
