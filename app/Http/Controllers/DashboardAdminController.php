<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardAdminController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->route('from');

        if (Auth::user()->can('admin')) {
            $users = User::all();
            return view('dashboard', compact('users', 'from'));
        } else {
            return view('unauthorized');
        }
    }
}
