<?php

namespace App\Http\Controllers\api;
use App\Models\Planta;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class plantaController extends Controller
{
    //
    public function index(){
        $plans = Planta::get();
        if($plans->isEmpty()){
            return response()->json(["Error"=> "No hay datos :c"], 404);
        }
        return response()->json(["Data"=> $plans],200);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            "nombreCientifico"=> "required|string",
            "nombreComun"=> "required|string",
            "familia"=> "required|string",
            "formaBiologica"=> "required|string",
            "tipoVegetacion"=> "required|string",
            "vulnerada"=> "required|string",
            "infoAdicional"=> "required|string",
        ]);
        if($validator->fails()){
            return response()->json(["Error"=> $validator->errors()],422);
        }
        $plans = Planta::create($validator->validated());
        return response()->json(["Planta :D"=> $plans],200);

    }

    public function update(Request $request, $id){
        $plan = Planta::find($id);

        if(!$plan){
            return response()->json(["Error update"=> "Planta no encontrada"],422);
        }

        $validator = Validator::make($request->all(), [
            "nombreComun"=> "string",
            "familia"=> "string",
            "formaBiologica"=> "string",
            "tipoVegetacion"=> "string",
            "vulnerada"=> "string",
            "infoAdicional"=> "string",
        ]);
      
        if($validator->fails()){
            return response()->json(["Error update"=> $validator->errors()],422);
        }
        
        $plan->update($validacion->validated());
        return response()->json(["Update exitosa"=> $plan],200);

    }

    public function destroy($id){
        $plan = Planta::find($id);
        if(!$plan){
            $plan -> delete();
            return response()->json(["message"=> "El usuario ha sido eliminado"],);
        }
        return response()->json(["message"=>"Dato no encontrado" ],404);
    }

}
