<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function allUsers()
    {
        $users = User::all();

        return view('admin.allUsers', compact('users'));
    }

    public function deleteUser(User $user)
    {
        $user->delete();

        return redirect()->back();
    }

    public function blockUser(User $user)
    {

    }
}
