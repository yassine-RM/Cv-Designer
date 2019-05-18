<?php

namespace App\Http\Controllers;

use App\Competence;
use Illuminate\Http\Request;
use App\Http\Requests\CompetanceRequest;


class CompetenceController extends Controller
{

    //--------------------------------------Copmpetences------------------------

    public function addCompetence($id,CompetanceRequest $request)
    {

        $competence = new Competence();
        $competence->cv_id = $id;
        $competence->competence = $request->input('competence');
        $competence->pourcentage = $request->input('pourcentage');

        $competence->save();
        return response()->json(['etat' => true]);
    }
    public function getCompetences($id)
    {
        $competences = Competence::where(['cv_id' => $id])->get();

        return response()->json(['etat' => true, 'competences' => $competences]);
    }
    public function deleteCompetence($id)
    {
        $competence = Competence::where(['idComp'=>$id]);
        $competence->delete();
        return response()->json(['etat' => true]);

    }
    public function UpdateCompetence($id,Request $request)
    {
        $comp = Competence::where('idComp','=',$id)->update( [ 'competence' => $request->competence, 'pourcentage' => $request->pourcentage]);


       return response()->json(['etat' => $comp]);

    }
}