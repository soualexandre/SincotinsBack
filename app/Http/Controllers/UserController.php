<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function listar(){
        return User::all();
    }

    public function registrar(Request $request)
    {

         $validatedData = $request->validate([
             'name'=>'required|max:55',
             'email'=>'email|required|unique:users',
             'password'=>'required|confirmed'
         ]);
 
         $validatedData['password'] = bcrypt($request->password);
 
         $user = User::create($validatedData);
 
         $accessToken = $user->createToken('authToken')->accessToken;
 
         return response(['user'=> $user, 'access_token'=> $accessToken]);
        
    }
 
 
    public function login(Request $request)
    {
         $loginData = $request->validate([
             'email' => 'email|required',
             'password' => 'required'
         ]);
        
         if(!auth()->attempt($loginData)) {
             return response(['message'=>'Usuário os senha inválido']);
         }
 
         $accessToken = auth()->user()->createToken('authToken')->accessToken;
 
         return response(['message' => 'Login realizado com sucesso', 'user' => auth()->user(), 'access_token' => $accessToken]);
 
    }

    public function logout(Request $request)
    {
        $isUser = $request->user()->token()->revoke();
        if ($isUser) {
            $resposta['message'] = "Logout efetuado com sucesso";
            return response()->json($resposta , 200);
        } else {
            $resposta = "ALGO DEU ERRADO";
            return response()->json($resposta, 404);
        }
    }
}
