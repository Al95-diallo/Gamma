<?php

namespace App\Http\Controllers;
use App\Models\assuree;
use App\Models\charges;
use App\Models\Polices;
use Illuminate\Http\Request;
use App\Models\pivotpolice;

class AssureeController extends Controller
{
    public function getassurees() {
        $assurees = assuree::with(['polices','charges'])->get();
        return response()->json(['data' => $assurees]);
        // return response()->json(assuree::all(), 200);
    }
    public function getassureesById($id) {
        $assures = assuree::find($id);
        if(is_null($assures)) {
            return response()->json(['message' => 'Pas des assurée disponible'], 404);
        }
        return response()->json($assures::find($id), 200);
    }
    public function addassurees(Request $request) {
        // $assures = assuree::create($request->all());
            $assures= new assuree();
            $assures->nom = $request->nom;
            $assures->prenom = $request->prenom;
            $assures->telephone = $request->telephone;
            $assures->sexe = $request->sexe;
            $assures->Adresse = $request->Adresse;
            $assures->Email = $request->Email;
            $assures->nb_enfant = $request->nb_enfant;
            $assures->nb_conjoint = $request->nb_conjoint;
            $assures->save();
            $pivotpolice= new pivotpolice();
            $pivotpolice->charges_id = $request->charges_id;
            $pivotpolice->assuree_id = $assures->id;
            $pivotpolice->polices_id = $request->polices_id;
            $pivotpolice->save();  
        //     if ($request->hasFile('thumbimage'))
        //     {
        //           $file      = $request->file('thumbimage');
        //           $filename  = $file->getClientOriginalName();
        //           $extension = $file->getClientOriginalExtension();
        //           $picture   = date('His').'-'.$filename;
        //           $file->move(public_path('tImg'), $picture);
        //           return response()->json(["message" => "Image Uploaded Succesfully"]);
        //      }else{
        //           return response()->json(["message" => "Select image first."]); // returns this
        //      }
        //    }

        return response($assures);
    }
    
    public function updateassurees(Request $request, $id) {
        // $assures = assuree::find($id);
        // if(is_null($assures)) {
        //     return response()->json(['message' => 'pas de charges disponible'], 404);
        // }
        // $assures->update($request->all());
        $assures= new assuree();
        $assures->nom = $request->nom;
        $assures->prenom = $request->prenom;
        $assures->telephone = $request->telephone;
        $assures->sexe = $request->sexe;
        $assures->Adresse = $request->Adresse;
        $assures->Email = $request->Email;
        $assures->nb_enfant = $request->nb_enfant;
        $assures->nb_conjoint = $request->nb_conjoint;
        $assures->update();
        $pivotpolice= new pivotpolice();
        $pivotpolice->charges_id = $request->charges_id;
        $pivotpolice->assuree_id = $assures->id;
        $pivotpolice->polices_id = $request->polices_id;
        $pivotpolice->update();  
        return response($assures, 200);
    }
    public function deleteassurees(Request $request, $id) {
        $assures = assuree::find($id);
        if(is_null($assures)) {
            return response()->json(['message' => 'pas des assurée disponible'], 404);
        }
        $assures->delete();
        return response()->json(null, 204);
    }
    public function show($id)
    {
        $assures = assuree::find($id);
        return Response::json(array('success'=>true,'assuree'=>$assures->toArray()));
    }
}
