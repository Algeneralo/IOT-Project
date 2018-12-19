<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        if ($request->method() == "POST") {

            $request->validate(['name' => "required"]);
            $user = User::find(Auth::id());
            $user->name = $request->get('name');
            $user->save();
            return redirect("/profile")->with("success", 'Your data has been changed');
        }
        return view("profile");
    }
}
