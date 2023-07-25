<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $form = url()->previous();

        return view('dashboard-admin', compact('form'));
    }

    public function showAdminDashboard()
{
    $users = User::all(); // Retrieve all users from the database

    return view('dashboard-admin', compact('users'));
}
}
