<?php

namespace App\Http\Controllers\api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class usuarioController extends Controller
{
    //
    public function registrar(Request $request){
        $validacion = Validator::make($request->all(), [
            "name"=> "required|string",
            "email"=> "required|email|unique:users",
            "img"=> "required|string",
            "password"=> "required|string",
            "rol"=> "required|in:Onyx,Bronze",
        ]);
        if($validacion->fails()){
            return response()->json(["error"=>$validacion->errors()],422);
        }
        $usuario = User::create($validacion->validated());
        Auth::login($usuario);
        return response() -> json(["data"=> $usuario], 200);
        
    }

    public function Login(Request $request){
        $validacion = Validator::make($request->all(), [
            "email"=> "required|email",
            "password"=> "required|string",
        ]);
        if($validacion->fails()){
            return response()->json(["error"=>$validacion->errors()],422);
        }
        $auth = Auth::attempt($request->only("email","password"));
        if(!$auth){
            return response()->json(["error"=>"Credenciales invalidas"],401);
        }
        $user = Auth::user();
        $token = $user->createToken("Token")->plainTextToken;
        return response() -> json(["token"=> $token],200);

    }

    public function getUserData(){
        $userId = Auth::id();
        $user = User::find($userId);
        return response() -> json(["user"=> $user],200);

    }

    public function Logout(Request $request){
        Auth::logout();
        $request ->session()->invalidate();
        $request ->session()->regenerateToken();
        return response() -> json(["message"=> "Se salio con exito :D"],200);
    }

    




}
