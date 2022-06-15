<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Vehiculo;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){


        $personas = Persona::all();

        /*::join("vehiculos", "vehiculos.id", "=", "personas.id_vehiculo")
            ->select("*")
            ->get();*/
        return view('welcome')->with( 'personas',$personas);
    }
    public function create(){
        return view('create');
    }

    public function store(Request $request){

        $data = $request->except('_method','_token','submit');

        $data["fecha"]=Carbon::parse($data["fecha"]);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3',
            'fecha' => 'required',
            'matricula' => 'required|string|max:6',
        ]);

        if ($validator->fails()) {
            return redirect()->Back()->withInput()->withErrors($validator);
        }
        /**/

        /*       $persona= new Persona();
        $vehiculo=new Vehiculo();

        $vehiculo->fecha=Carbon::parse($data["fecha"]);
        $vehiculo->matricula=$data["matricula"];
        $vehiculo->save();
        $persona->name=$data["name"];
        $persona->id_vehiculo=$vehiculo->id;
        $persona->save();*/

        if($record = Persona::firstOrCreate($data)){
            Session::flash('message', 'Se guardo Con Exito!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('index');
        }else{
            Session::flash('message', 'No se Guardo!');
            Session::flash('alert-class', 'alert-danger');
        }

        return Back();
    }
    public function edit($id){

        $persona = Persona::find($id);

            /*join("vehiculos", "vehiculos.id", "=", "personas.id_vehiculo")
            ->select("*")
            ->where('personas.id',$id)
            ->get();*/

        return view('edit')->with('persona',$persona);
    }
    public function update(Request $request,$id){
        $data = $request->except('_method','_token','submit');

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3',
            'fecha' => 'required',
            'matricula' => 'required|string|max:6',
        ]);

        if ($validator->fails()) {
            return redirect()->Back()->withInput()->withErrors($validator);
        }
        $persona = Persona::find($id);

        if($persona->update($data)){

            Session::flash('message', 'Se actualizo!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('index');
        }else{
            Session::flash('message', 'error!');
            Session::flash('alert-class', 'alert-danger');
        }

        return Back()->withInput();
    }


    public function destroy($id){

        Persona::destroy($id);

        Session::flash('message', 'Se borro!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('index');
    }

}
