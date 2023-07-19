<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredAdminController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'cep' => ['required', 'string'],
            'logradouro' => ['required', 'string'],
            'bairro' => ['required', 'string'],
            'uf' => ['required', 'string', 'size:2'],
            'localidade' => ['required', 'string'],
            'complemento' => ['required', 'string'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cep' => $request->cep,
            'logradouro' => $request->logradouro,
            'bairro' => $request->bairro,
            'complemento' => $request->complemento,
            'uf' => $request->uf,
            'localidade' => $request->localidade,
        ])->givePermissionTo('admin');


        if (!$user->hasPermissionTo('admin')) {
            $user->givePermissionTo('admin');
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
