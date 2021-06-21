<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Comment;
use App\Post;

class CommentController extends Controller
{
    /**
     * コメント一覧
     *
     * @param Request $request
     * @param Post $post
     * @return View
     */
    public function index(Request $request, Post $post): View
    {
        return view('comment.index', ['post' => $post, 'comments' => $post->comments()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('comment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request, Post $post): RedirectResponse
    {
        /**
         * @var User
         */
        $user = \Auth::user();
        $post->comments()->create([
            'comment' => $request->comment,
            'user_id' => $user->id,
        ]);
        return redirect()->route('comments.index', $post)->with(['status' => '投稿しました。']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id): View
    {
        return view('comment.edit', ['comment' => Comment::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Comment  $comment
     * @return RedirectResponse
     */
    public function update(Request $request, Comment $comment): RedirectResponse
    {
        $comment->fill($request->all())->update();
        return redirect()->route('comments.index', $comment->post)->with(['status' => '編集完了しました。']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        Comment::destroy($id);
        return redirect()->route('comments.index', $comment->post)->with(['status' => '削除完了しました。']);
    }
}
