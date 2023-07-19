<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserControllerr extends Controller
{
    public function index()
    {
        $users = User::All();

        return view('dashboard-userz', compact('users'));
    }
}
