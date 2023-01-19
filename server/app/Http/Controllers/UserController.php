<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function index(Request $request)
    {

        $users = User::orderBy('id', 'asc')->get();


        return view('user.index', ['users' => $users]);
    }

    public function assignRoleView(Request $request, $userId)
    {
        $userId = htmlspecialchars(stripslashes($userId));

        $user = User::find($userId);


        return view('user.assignRoleView', ['id' => $userId, 'user' => $user]);
    }
}
