<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Checkt of user ingelogd is
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(\Auth::id());

        if ($user->id !== \Auth::id()) {
            abort(Response::HTTP_FORBIDDEN);
        } else {
            return view('profile', compact('user'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $user = User::find($id);

        $user->name = request('name');

        $user->save();

        return redirect()->route('user.index')->with(['message'=> 'Updated Profile']);
    }
}
