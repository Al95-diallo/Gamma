<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\partenaires;

class PartenairesController extends Controller
{
    public function getpartenaires() {
        return response()->json(partenaires::all(), 200);
    }


    public function getpartenairesById($id) {
        $partenaire = partenaires::find($id);
        if(is_null($partenaire)) {
            return response()->json(['message' => 'pas de partenaires disponible'], 404);
        }
        return response()->json($partenaire::find($id), 200);
    }
    public function addpartenaires(Request $request) {
        $partenaire = partenaires::create($request->all());
        return response($partenaire, 201);
    }
    public function updatepartenaires(Request $request, $id) {
        $partenaire = partenaires::find($id);
        if(is_null($partenaire)) {
            return response()->json(['message' => 'pas de partenaires disponible'], 404);
        }
        $partenaire->update($request->all());
        return response($partenaire, 200);
    }

    public function deletepartenaires(Request $request, $id) {
        $partenaire = partenaires::find($id);
        if(is_null($partenaire)) {
            return response()->json(['message' => 'pas de partenaires disponible'], 404);
        }
        $partenaire->delete();
        return response()->json(null, 204);
    }
}
