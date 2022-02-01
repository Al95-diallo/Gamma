<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\charges;

class chargeController extends Controller
{
    public function getcharges() {
        return response()->json(charges::all(), 200);
    }


    public function getchargesById($id) {
        $charge = charges::find($id);
        if(is_null($charge)) {
            return response()->json(['message' => 'pas de charges disponible'], 404);
        }
        return response()->json($charge::find($id), 200);
    }
    public function addcharges(Request $request) {
        $charge = charges::create($request->all());
        return response($charge, 201);
    }
    public function updatecharges(Request $request, $id) {
        $charge = charges::find($id);
        if(is_null($charge)) {
            return response()->json(['message' => 'pas de charges disponible'], 404);
        }
        $charge->update($request->all());
        return response($charge, 200);
    }

    public function deletecharges(Request $request, $id) {
        $charge = charges::find($id);
        if(is_null($charge)) {
            return response()->json(['message' => 'pas de charges disponible'], 404);
        }
        $charge->delete();
        return response()->json(null, 204);
    }
}
