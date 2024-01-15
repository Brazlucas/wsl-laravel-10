<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticação bem-sucedida
            return response()->json(['message' => 'Autenticação bem-sucedida']);
        }

        if (!$credentials) {
            // Credenciais não informadas
            return response()->json(['message' => 'Você precisa estar logado para executar esta ação!'], 500);
        }

        // Autenticação falhou
        return response()->json(['message' => 'Credenciais inválidas'], 401);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Logout bem-sucedido']);
    }
}