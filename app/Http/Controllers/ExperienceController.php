<?php

namespace App\Http\Controllers;

use App\Experience;
use App\Http\Requests\ExperienceRequest;

class ExperienceController extends Controller
{
    //--------------------------------------Experiences------------------------

    public function addExperience($id, ExperienceRequest $request)
    {
        $Experience = new Experience();
        $Experience->cv_id = $id;
        $Experience->titre = $request->input('titre');
        $Experience->description = $request->input('description');
        $Experience->entreprise = $request->input('entreprise');

        $name = time() . '.' . explode('/', explode(':', substr($request->logo, 0, strpos($request->logo, ';')))[1])[1];
        \Image::make($request->logo)->save(public_path('img/') . $name);
        $Experience->logo = '/img/' . $name;

        $Experience->dateDebut = $request->input('dateDebut');
        $Experience->dateFin = $request->input('dateFin');

        $Experience->save();
        return response()->json(['etat' => true]);
    }
    public function getExperiences($id)
    {
        $Experiences = Experience::where(['cv_id' => $id])->orderby('dateFin','desc')->get();

        return response()->json(['etat' => true, 'Experiences' => $Experiences]);
    }
    public function deleteExperience($id)
    {
        $Experience = Experience::find($id);
        $Experience->delete();
        return response()->json(['etat' => true]);

    }
    public function updateExperience($id, ExperienceRequest $request)
    {
        $Experience = Experience::find($id);
        $Experience->titre = $request->titre;
        $Experience->description = $request->description;
        $name = time() . '.' . explode('/', explode(':', substr($request->logo, 0, strpos($request->logo, ';')))[1])[1];
        \Image::make($request->logo)->save(public_path('img/') . $name);
        $Experience->logo = '/img/' . $name;

        $Experience->entreprise = $request->entreprise;
        $Experience->dateDebut = $request->dateDebut;
        $Experience->dateFin = $request->dateFin;

        $Experience->save();

        return response()->json(['etat' => true]);

    }
}
