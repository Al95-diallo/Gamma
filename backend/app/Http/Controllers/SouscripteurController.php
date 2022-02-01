<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Souscripteur;
class SouscripteurController extends Controller
{
    public function getsouscripteurs() {
        return response()->json(Souscripteur::all(), 200);
        // $souscripteurs = App\Models\Souscripteur::get();
        // return response()->success(compact('souscripteurs'));
    }
    public function getsouscripteursById($id) {
        $souscripteurs = Souscripteur::find($id);
        if(is_null($souscripteurs)) {
            return response()->json(['message' => 'pas de souscripteurs disponible'], 404);
         }
        return response()->json($souscripteurs::find($id), 200);

    }

    public function addasouscripteurs(Request $request) {
        $souscripteurs = Souscripteur::create($request->all());
        return response($souscripteurs, 201);
    }

    public function updatesouscripteurs(Request $request, $id) {
        $souscripteurs = Souscripteur::find($id);
        if(is_null($souscripteurs)) {
            return response()->json(['message' => 'pas de souscripteurs disponible'], 404);
        }
        $souscripteurs->update($request->all());
        return response($souscripteurs, 200);
    }

    public function deletecharges(Request $request, $id) {
        $souscripteurs = Souscripteur::find($id);
        if(is_null($souscripteurs)) {
            return response()->json(['message' => 'pas de souscripteurs disponible'], 404);
        }
        $souscripteurs->delete();
        return response()->json(null, 204);
    }
}
