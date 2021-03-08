<?php

namespace App\Http\Controllers;

use App\Models\Drone;
use Illuminate\Http\Request;

class DroneController extends Controller
{

    public function index()
    {
        return response()->json(Drone::all());
    }

    public function store(Request $request, $id)
    {
        $register = new Drone();
        $register->id = $id;

        $droneExistente = Drone::find($id);

        if($droneExistente) {
            return response()->json(['message' => 'Drone já existe em nossa base de dados']);
        }

        $register->image = $request->image;
        $register->name = $request->name;
        $register->address = $request->address;
        $register->battery = $request->battery;
        $register->max_speed = $request->max_speed;
        $register->average_speed = $request->average_speed;
        $register->status = $request->status;
        $register->fly = $request->fly;
        $register->save();

        return response()->json($register);

    }

    public function show($id)
    {
        $register = Drone::find($id);
        if($register) {
            return response()->json($register);
        }
        return response()->json(['message' => 'Registro não encontrado']);

    }

    public function update(Request $request, $id)
    {
        $register = Drone::find($id);
        if($register) {

            $register->image = $request->image;
            $register->name = $request->name;
            $register->address = $request->address;
            $register->battery = $request->battery;
            $register->max_speed = $request->max_speed;
            $register->average_speed = $request->average_speed;
            $register->status = $request->status;
            $register->fly = $request->fly;
            $register->update();

            return response()->json($register);
        }
        return response()->json(['message' => 'Registro não encontrado']);
    }

    public function destroy($id)
    {
        $register = Drone::find($id);
        if($register) {
            $register->delete();
            return response()->json(['message' => 'Registro excluido com sucesso']);
        }
        return response()->json(['message' => 'Registro não encontrado']);

    }
}
