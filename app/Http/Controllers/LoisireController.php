<?php

namespace App\Http\Controllers;

use App\Loisire;
use Illuminate\Http\Request;
use App\Http\Requests\LoisireRequest;
class LoisireController extends Controller
{

    //--------------------------------------Loisires------------------------

    public function addLoisire($id, LoisireRequest $request)
    {
        $Loisire = new Loisire();
        $Loisire->cv_id = $id;
        $Loisire->titre = $request->input('titre');

        $Loisire->save();
        return response()->json(['etat' => true]);
    }
    public function getLoisires($id)
    {
        $Loisires = Loisire::where(['cv_id' => $id])->get();

        return response()->json(['etat' => true, 'Loisires' => $Loisires]);
    }
    public function deleteLoisire($id)
    {
        $Loisire = Loisire::find($id);
        $Loisire->delete();
        return response()->json(['etat' => true]);

    }
    public function updateLoisire($id, LoisireRequest $request)
    {
        $Loisire = Loisire::find($id);
        $Loisire->titre = $request->titre;

        $Loisire->save();

        return response()->json(['etat' => true]);

    }
}
