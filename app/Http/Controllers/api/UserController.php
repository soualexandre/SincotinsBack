<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\models\Posts;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function registrar(Request $request){
        $dados = $request->all();
        if(!User::where('email', $dados['email'])->count()){
            $dados['password'] = bcrypt($dados['password']);
            $user = User::create($dados);
            return response()->json(['data'=>$user], 201);
        }else{
            return response()->json(['message'=>'Este e-mail já está cadastrado.'], 400);
        }

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id' , $id)->first();
        if($user){
            echo "<h1>Dados de usuário<h1/>";
            echo "<p> Nome: {$user->name} Email: {$user->email}  ";

        }
        $posts = $user->posts()->first();

        if($posts){
            echo "<h1Post <h1/>";
            echo "Postagem completa:  {$posts->titulo}, {$posts->descicao}, {$posts->texto}";
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
