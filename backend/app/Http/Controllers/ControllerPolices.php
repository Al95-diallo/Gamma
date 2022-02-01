<?php

namespace App\Http\Controllers;
use App\Models\Polices;
use Illuminate\Http\Request;

class ControllerPolices extends Controller
{
    public function getpolices() {
        return response()->json(Polices::all(), 200);
    }


    public function getpolicesById($id) {
        $polices = Polices::find($id);
        if(is_null($polices)) {
            return response()->json(['message' => 'pas de police disponible'], 404);
        }
        return response()->json($polices::find($id), 200);
    }

    public function addpolices(Request $request) {
        $polices = Polices::create($request->all());
        return response($polices, 201);
    }

    public function updatepolices(Request $request, $id) {
        $polices = Polices::find($id);
        if(is_null($polices)) {
            return response()->json(['message' => 'pas de police disponible'], 404);
        }
        $polices->update($request->all());
        return response($polices, 200);
    }

    public function deletepolices(Request $request, $id) {
        $polices = Polices::find($id);
        if(is_null($polices)) {
            return response()->json(['message' => 'pas de police disponible'], 404);
        }
        $polices->delete();
        return response()->json(null, 204);
    }
}
