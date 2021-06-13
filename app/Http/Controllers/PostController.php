<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('post.index', ['posts' => Post::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        Post::create($request->all());
        return redirect()->route('posts.index')->with(['status' => '登録完了しました。']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id): View
    {
        return view('post.show', ['post' => Post::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id): View
    {
        return view('post.edit', ['post' => Post::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $post = Post::find($id);
        $post->fill($request->all())->update();
        return redirect()->route('posts.index')->with(['status' => '編集完了しました。']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        \DB::transaction(function ($id) {
            Comment::where('post_id', $id)->delete();
            Post::destroy($id);
        });
        return redirect()->route('posts.index')->with(['status' => '削除完了しました。']);
    }
}
