<?php
// app/Http/Controllers/CepController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
    public function consultaCep($cep)
    {
        $url = "https://viacep.com.br/ws/{$cep}/json/";
        $response = Http::get($url);

        return $response->json();
    }
}
