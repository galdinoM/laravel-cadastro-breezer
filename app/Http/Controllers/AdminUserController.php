<?php


namespace App\Http\Controllers;

use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('dashboard', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('user-details', compact('user'));
    }
}
