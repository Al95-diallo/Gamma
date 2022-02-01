<?php

namespace App\Http\Controllers;
use App\Models\Polices;
use App\Models\pivot;
use App\Models\Souscripteur;
use Illuminate\Http\Request;

class Policescontroller extends Controller
{
    public function getpolices() {
        $polices = Polices::with(['Souscripteur'])->get();
        return response()->json(['data' => $polices]);
    }

    public function getpolicesById($id) {
        $polices = Polices::find($id);
        if(is_null($polices)) {
            return response()->json(['message' => 'pas de police disponible'], 404);
        }
        return response()->json($polices::find($id), 200);
    }

    public function addpolices(Request $request) {
        // $polices = Polices::create($request->all());
        $polices= new Polices();
        $polices->numero = $request->numero;
        $polices->types = $request->types;
        $polices->date_debut = $request->date_debut;
        $polices->date_fin = $request->date_fin;
        $polices->souscripteur_id = $request->souscripteur_id;
        $polices->montant = $request->montant;
        $polices->save();
        return response($polices, 201);
    }
    public function updatepolices(Request $request, $id) {
        // $polices = Polices::find($id);
        // if(is_null($polices)) {
        //     return response()->json(['message' => 'pas de police disponible'], 404);
        // }
        $polices= new Polices();
        $polices->numero = $request->numero;
        $polices->types = $request->types;
        $polices->date_debut = $request->date_debut;
        $polices->date_fin = $request->date_fin;
        $polices->souscripteur_id = $request->souscripteur_id;
        $polices->montant = $request->montant;
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
