<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JwtAuthController;
use App\Http\Controllers\ResetPwdReqController;
use App\Http\Controllers\UpdatePwdController;
use App\Http\Controllers\ControllerPolices;
use App\Http\Controllers\chargeController;
use App\Http\Controllers\AssureeController;
use App\Http\Controllers\SouscripteurController;
use App\Http\Controllers\Policescontroller;
use App\Http\Controllers\PartenairesController;




Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/signup', [JwtAuthController::class, 'register']);
    Route::post('/signin', [JwtAuthController::class, 'login']);
    Route::get('/user', [JwtAuthController::class, 'user']);
    Route::post('/token-refresh', [JwtAuthController::class, 'refresh']);
    Route::post('/signout', [JwtAuthController::class, 'signout']);

    Route::post('/req-password-reset', [ResetPwdReqController::class, 'reqForgotPassword']);
    Route::post('/update-password', [UpdatePwdController::class, 'updatePassword']);
    //  pour recuperer tous les polices
 Route::get('polices', [Policescontroller::class, 'getpolices']);
 // pour recuperer les policies a travers l'ID
 Route::get('polices/{id}', [ControllerPolices::class,'getpolicesById']);
 // pour Ajouter une police
 Route::post('addpolices', [ControllerPolices::class,'addpolices']);
 // pour modifier une police
 Route::put('updatepolices/{id}', [ControllerPolices::class,'updatepolices']);
 // pour la suppresision
 Route::delete('deletepolices/{id}', [ControllerPolices::class,'deletepolices']);

     //  pour recuperer tous les charges
     Route::get('charges', [chargeController::class, 'getcharges']);
     // pour recuperer les charges a travers l'ID
     Route::get('charges/{id}', [chargeController::class,'getchargesById']);
     // pour Ajouter une charges
     Route::post('addcharges', [chargeController::class,'addcharges']);
     // pour modifier une charges
     Route::put('updatecharges/{id}', [chargeController::class,'updatecharges']);
     // pour la suppresision
     Route::delete('deletecharges/{id}', [chargeController::class,'deletecharges']);

     //  pour recuperer tous les assurees
     Route::get('assurees', [AssureeController::class, 'getassurees']);
     // pour recuperer les assuer a travers l'ID
     Route::get('assurees/{id}', [AssureeController::class,'getassureesById']);
     Route::get('assurees', [AssureeController::class,'show']);
     // pour Ajouter une assuree
     Route::post('addassurees', [AssureeController::class,'addassurees']);
     // pour modifier une assuree
     Route::put('updateassurees/{id}', [AssureeController::class,'updateassurees']);
     // pour la suppresision
     Route::delete('deleteassurees/{id}', [AssureeController::class,'deleteassurees']);
     //  pour recuperer tous les Souscripteurs
     Route::get('souscripteurs', [SouscripteurController::class, 'getsouscripteurs']);
     // pour recuperer les assuer a travers l'ID
     Route::get('souscripteurs/{id}', [SouscripteurController::class,'getsouscripteursById']);
     // pour Ajouter une souscripteurs
     Route::post('addsouscripteurs', [SouscripteurController::class,'addasouscripteurs']);
     // pour modifier une souscripteurs
     Route::put('updatesouscripteurs/{id}', [SouscripteurController::class,'updatesouscripteurs']);
     // pour la souscripteurs
     Route::delete('deletesouscripteurs/{id}', [SouscripteurController::class,'deletesouscripteurs']);


    //  les partenaires
    //  pour recuperer tous les charges
    Route::get('partenaires', [PartenairesController::class, 'getpartenaires']);
    // pour recuperer les charges a travers l'ID
    Route::get('partenaires/{id}', [PartenairesController::class,'getpartenairesById']);
    // pour Ajouter une charges
    Route::post('addpartenaires', [PartenairesController::class,'addpartenaires']);
    // pour modifier une charges
    Route::put('updatepartenaires/{id}', [PartenairesController::class,'updatepartenaires']);
    // pour la suppresision
    Route::delete('deletepartenaires/{id}', [PartenairesController::class,'deletepartenaires']);

    
   
});
 

