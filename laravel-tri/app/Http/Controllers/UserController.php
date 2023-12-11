<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view("pages.admin.user.index", compact('users'));
    }

    public function create()
    {
        return view("pages.admin.user.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:255',
        ]);

        $save = new User;
        $save->name = $request->name;
        $save->email = $request->email;
        $save->password = bcrypt($request->password);

        $save->remember_token = \Illuminate\Support\Str::random(60);
        $save->remember_token = sha1($save->email);
        $save->save();

        Mail::to($save->email)->send(new RegisterMail($save, $save->id, $save->remember_token));
        return redirect("/user")->with('success', "User has been created! Please verify the user's email address!");
    }

    public function edit(User $user)
    {
        return view('pages.admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $input = $request->all();

        $user->update($input);
        return redirect('/user')->with('success', 'User successfully edited!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/user')->with('success', 'User successfully deleted!');
    }
}
