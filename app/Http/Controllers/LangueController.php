<?php

namespace App\Http\Controllers;

use App\Langue;
use Illuminate\Http\Request;
use App\Http\Requests\LangueRequest;
class LangueController extends Controller
{
    //--------------------------------------Langues------------------------

    public function addLangue($id, LangueRequest $request)
    {
        $Langue = new Langue();
        $Langue->cv_id = $id;
        $Langue->langue = $request->input('langue');
        $Langue->pourcentage = $request->input('pourcentage');

        $Langue->save();
        return response()->json(['etat' => true]);
    }
    public function getLangues($id)
    {
        $Langues = Langue::where(['cv_id' => $id])->get();

        return response()->json(['etat' => true, 'Langues' => $Langues]);
    }
    public function deleteLangue($id)
    {
        $Langue = Langue::find($id);
        $Langue->delete();
        return response()->json(['etat' => true]);

    }
    public function updateLangue($id, LangueRequest $request)
    {
        $Langue = Langue::find($id);
        $Langue->langue = $request->langue;
        $Langue->pourcentage = $request->pourcentage;

        $Langue->save();

        return response()->json(['etat' => true]);

    }
}
