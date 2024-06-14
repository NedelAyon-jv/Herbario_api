<?php

namespace App\Http\Controllers\api;
use App\Models\Observacion;
use App\Models\Planta;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class observacionesController extends Controller
{
    //
    public function index(){
        $obser = Observacion::with(['Planta'])->get();
        if($obser->isEmpty()){
            return response()->json(["Error"=> "não há dados"], 404);
        }
        return response()->json(["Data"=> $obser],200);
    }


    //Almacena la observacion
    public function store(Request $request){
        $userId = Auth::id();
        $validator = Validator::make($request->all(), [
            "longitud"=> "required|string",
            "latitud"=> "required|string",
            "localidad"=> "required|string",
            "ubicacion"=> "required|string",
            "fisiografia"=> "required|string",
            "fechaColecta"=> "required|string",
            "idPlanta"=> "required|exists:plantas,id",
            "img"=> "required|image|mimes:jpg,png,jpeg|max:40880",
            "imgBase64"=>"required|string",
        ]);
        if($validator->fails()){
            return response()->json(["Error"=> $validator->errors()],422);
        }
        $validatorData = $validator -> validated();
        $image = $request -> file("img");
        $imagePath = $image->store('observacion', 'public');
        $validatorData["img"] = $request->get("imgBase64");     
        $validatorData["userId"] = $userId;
        $obser = Observacion::create($validatorData);
        return response()->json(["Observação capturada"=> $obser],200);
       
    }  
    //Actualiza la observacion 
    public function update(Request $request, $id){
        $obser = Observacion::find($id);

        if(!$obser){
            return response()->json(["Error update"=> "Observação não encontrada"],422);
        }

        $validator = Validator ::make($request->all(), [
            "nombre"=> "sometimes|string",
            "colector"=> "sometimes|string",
            "longitud"=> "sometimes|string",
            "latitud"=> "sometimes|string",
            "localidad"=> "sometimes|string",
            "ubicacion"=> "sometimes|string",
            "fisiografia"=> "sometimes|string",
            "fechaColecta"=> "sometimes|string",
            "idPlanta"=> "sometimes|string",
        ]);
        if($validator->fails()){
            return response()->json(["Error update"=> $validator->errors()],422);
        }
        $obser->update($validator -> validated());
        return response()->json(["Atualização bem-sucedida"=> $obser],200);
    }
    //Elimina la observacion
    public function destroy($id){
        $obser = Observacion::find($id);
        if(!$obser){
            return response()->json(["message"=> "A observação não foi encontrada"],404);        
        }

        $obser -> delete();
        return response()->json(["message"=>"a observação foi excluída" ],200);
    }



}
