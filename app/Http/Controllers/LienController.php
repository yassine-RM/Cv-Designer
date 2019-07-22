<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LienRequest;
use App\Lien;

class LienController extends Controller
{
      //--------------------------------------lien------------------------

    public function addLien($id,LienRequest $request)
    {
        $Lien = new Lien();
        $Lien->cv_id = $id;
        $Lien->service = $request->input('service');
        $Lien->url = $request->input('url');

        $Lien->save();
        return response()->json(['etat' => true]);
    }
    public function getLiens($id)
    {
        $Liens = Lien::where(['cv_id' => $id])->get();

        return response()->json(['etat' => true, 'Liens' => $Liens]);
    }
    public function deleteLien($id)
    {
        $Lien = Lien::find($id);
        $Lien->delete();
        return response()->json(['etat' => true]);

    }
    public function updateLien($id, LienRequest $request)
    {
        $Lien = Lien::find($id);
     $Lien->service = $request->input('service');
     $Lien->url = $request->input('url');


        $Lien->save();

        return response()->json(['etat' => true]);

    }
}
