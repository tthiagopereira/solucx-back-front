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

    public function store(Request $request)
    {
        $this->validate($request,[

        ]);

        return response()->json(Drone::create($request->all()));

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
            $register->fill($request->all());
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
