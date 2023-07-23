<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function index()
    {
        $form = url()->previous();

        return view('dashboardUser', compact('form, role'));
    }
}
