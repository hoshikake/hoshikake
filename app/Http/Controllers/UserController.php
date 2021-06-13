<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request $request
     * @return View
     */
    public function edit(Request $request): View
    {
        /**
         * @var User
         */
        $user = \Auth::user();
        return view('edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        dd($user, $request->all());
        $user->fill($request->all())->update();

        return redirect()->route('edit')->with(['status' => 'プロフィール更新しました。']);
    }
}
