<?php

namespace App\Http\Controllers\api;
use App\Models\Aprobaciones;
use App\mODELOS\Observacion;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class aprobacionesController extends Controller
{
    //

    public function index(){
        $aprob = Aprobaciones::with(['Observaciones'])->get();
        if($aprob->isEmpty()){
            return response()->json(["Error"=> "no se encuentran datos"], 404);
        }
        return response()->json(["Data"=> $aprob],200);
    }

  
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            "correoCuenta"=> "requiered|string",
            "observaciones"=> "required|string",
        ]);
        if($validator->fails()){
            return response()->json(["Error"=> $validator->errors()],422);
        }
        $aprob = Aprobaciones::create($validator->validated());
        return response()->json(["Observacion capturada"=> $aprob],200);
    }


    public function update(Request $request, $id){
        $aprob = Aprobaciones::find();

        if(!$aprob){
            return response()->json(["Error update"=> "Observacion no encotrada"],422);
        }

        $validator = Validator ::make($request->all(), [
            "correoCuenta"=> "sometimes|string",
            "observaciones"=> "sometimes|string",
        ]);
        if($validator->fails()){
            return response()->json(["Error update"=> $validator->errors()],422);
        }
        $aprob->update($validator -> validated());
        return response()->json(["Acualizacion realizada"=> $aprob],200);
    }

    public function destroy($id){
        $aprob = Aprobacion::find($id);
        if(!$aprob){
            return response()->json(["message"=> "Aprobacion no encontrada"],404);        
        }

        $aprob -> delete();
        return response()->json(["message"=>"Aprobacion borrada con exito" ],200);
    }


}
