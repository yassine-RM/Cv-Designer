<?php

namespace App\Http\Controllers;

use App\Formation;
use Illuminate\Http\Request;
use App\Http\Requests\FormationRequest;
class FormationController extends Controller
{
    //--------------------------------------Formations------------------------

    public function addFormation($id, FormationRequest $request)
    {
        $Formation = new Formation();
        $Formation->cv_id = $id;
        $Formation->titre = $request->input('titre');
        $Formation->etablissement = $request->input('etablissement');
        $Formation->description = $request->input('description');
        $Formation->dateDebut = $request->input('dateDebut');
        $Formation->dateFin = $request->input('dateFin');

        $Formation->save();
        return response()->json(['etat' => true]);
    }
    public function getFormations($id)
    {
        $formations = Formation::where(['cv_id' => $id])->orderby('dateFin','desc')->get();

        return response()->json(['etat' => true, 'formations' => $formations]);
    }
    public function deleteFormation($id)
    {
        $formation = Formation::find($id);
        $formation->delete();
        return response()->json(['etat' => true]);

    }
    public function updateFormation($id, FormationRequest $request)
    {
        $formation = Formation::find($id);
        $formation->titre = $request->titre;
        $formation->description = $request->description;
        $formation->etablissement = $request->etablissement;
        $formation->dateDebut = $request->dateDebut;
        $formation->dateFin = $request->dateFin;

        $formation->save();

        return response()->json(['etat' => true]);

    }
}
