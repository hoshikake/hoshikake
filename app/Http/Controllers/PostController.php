<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Post;
use App\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('post.index', ['posts' => Post::published()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View|RedirectResponse
     */
    public function create()
    {
        /** @var User */
        $user = \Auth::user();
        if ($user->is_posted) {
            return redirect()->route('posts.edit', $user->post);
        }
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
        /**
         * @var User
         */
        $user = \Auth::user();
        $post = new Post();
        $post->fill($request->all());
        $post->is_published = $request->is_published ? true : false;
        $post->user_id = $user->id;
        $post->save();
        return redirect()->route('posts.index')->with(['status' => '登録完了しました。']);
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Post $post
     * @return View|RedirectResponse
     */
    public function show(Request $request, Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Post $post
     * @return View|RedirectResponse
     */
    public function edit(Request $request, Post $post)
    {
        /** @var User */
        $user = \Auth::user();
        if (!$user->is_posted) {
            return redirect()->route('posts.create');
        }
        return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Post $post
     * @return RedirectResponse
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        $post->fill($request->all());
        $post->is_published = $request->is_published ? true : false;
        $post->save();
        return redirect()->route('posts.index')->with(['status' => '編集完了しました。']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        \DB::transaction(function ($post) {
            $post->comments()->delete();
            $post->delete();
        });
        return redirect()->route('posts.index')->with(['status' => '削除完了しました。']);
    }
}
