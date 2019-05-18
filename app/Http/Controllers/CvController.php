<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Cv;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\CvRequest;
use App\Http\Requests\InfoRequest;
use App\Mail\CvMail;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Mail;

class CvController extends Controller
{
    //----------------constructor
    public function __construct()
    {
        $this->middleware('authCon');
    }
    //-------------------function accueil qui return la page accueil---------------
    public function accueil()
    {
        return view('pages.accueil');
    }
    //-------------------function qui affichier la vue cv---------------
    public function createCv()
    {
        return view('pages.cv.create');
    }
    //-------------------function qui enregistrer un cv dans db---------------
    public function storeCv(CvRequest $request)
    {
        $cv = new Cv();

       $cv->user_id = Auth::user()->id;

        $cv->titre = $request->titre;
        $cv->niveau = $request->niveau;
        $cv->presentation = $request->presentation;

        $name = time() . '.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
        \Image::make($request->image)->save(public_path('img/') . $name);
        $cv->photo = '/img/' . $name;

        $cv->save();

        $request->session()->flash('success', true);

        return response()->json(['etat' => true]);
    }
    //-------------------cv views-------------
    public function cvView()
    {
        return view('pages.mesCvs');
    }
    //-------------------liste des cvs-------------
    public function mesCvs()
    {

        $cvs = Cv::where(['user_id' => Auth::user()->id])->orderby('visite', 'desc')->paginate(6);

        return view('pages.mesCvs', ['cvs' => $cvs]);
    }
    //-------------------delete des cv-------------
    public function deleteCv($id)
    {

        $cv = Cv::find($id);
        $cv->delete();

        return response()->json(['etat' => true]);

    }

    //-------------------function cvTemplate---------------
    public function cvTemplate($id)
    {
        $cv = Cv::find($id);

        $this->authorize('update', $cv);
        return view('pages.cvTemplate', ['idCv' => $id]);
    }
    //-------------------function show cv---------------
    public function showCv($id)
    {
        $cv = Cv::find($id);

        $shows = explode(';', $cv->users_show);
        $chik = false;

        foreach ($shows as $show) {
            if ($show == Auth::user()->id) {
                $chik = true;
                break;
            }
        }
        if (!$chik) {

            $cv->visite += 1;
            $cv->users_show = $cv->users_show . Auth::user()->id . ';';
        }

        $cv->save();

        return view('pages.masterTemplate', ['idCv' => $id]);
    }
    //---------------get infos-------------
    public function getInfos($idcv)
    {

        $infos = Cv::find($idcv)->user;
        $cv = Cv::find($idcv);

        return response()->json(['infos' => $infos, 'cv' => $cv]);
    }
    public function updateInfos(InfoRequest $request)
    {

        $user = User::find(Auth::user()->id);

        $user->civilite = $request->civilite;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;

        $user->adresse = $request->adresse;
        $user->ville = $request->ville;
        $user->paye = $request->paye;

        $user->telephonne = $request->telephonne;

        $user->save();

        return response()->json(['etat' => true]);
    }
    //---------------------update cv------------
    public function updateCv($idcv, CvRequest $request)
    {
        $cv = Cv::find($idcv);

        $cv->titre = $request->titre;
        $cv->niveau = $request->niveau;
        $cv->presentation = $request->presentation;

        $currentPhoto=$cv->photo;

        $name = time() . '.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
        \Image::make($request->image)->save(public_path('img/') . $name);
        $cv->photo = '/img/' . $name;

        $photoRemove=public_path() . $currentPhoto;

        @unlink($photoRemove);

        $cv->save();
        return response()->json(['etat' => true]);

    }
    //---------------------update cv download------------
    public function editDownload($idcv)
    {
        $cv = Cv::find($idcv);

        $cv->download += 1;

        $cv->save();
        return response()->json(['etat' => true]);

    }

    //---------------------------------------------
    public function updateLike($idcv)
    {
        $cv = Cv::find($idcv);

        $likes = explode(';', $cv->users_like);

        $userDelete = '';
        $chik = false;

        foreach ($likes as $like) {
            if ($like == Auth::user()->id) {
                $chik = true;

            } else {
                $userDelete = $userDelete . $like;
            }

        }

        if (!$chik) {

            $cv->like += 1;
            $cv->users_like = $cv->users_like . Auth::user()->id . ';';
        } else {

            $cv->like -= 1;
            $cv->users_like = $userDelete;
        }

        $cv->save();

        return response()->json(['etat' => true]);
    }
    //---------------------------------------------
    public function searchCvs(Request $request)
    {
        $search = $request->get('search');
        $niveau = $request->get('niveau');

        if ($search == '' && $niveau == '') {
            $cvs = Cv::join('competences', 'cvs.id', '=', 'competences.cv_id')
            ->groupBy('cvs.id')
            ->paginate(6);
            return view('pages.searchCvs', ['cvs' => $cvs]);
        } else if ($search != '' && $niveau == '') {

            $cvs = Cv::join('competences', 'cvs.id', '=', 'competences.cv_id')
                 ->where('cvs.titre', 'LIKE', "%" . $search . "%")
                ->orWhere('competences.competence', 'LIKE', "%" . $search . "%")

                ->groupBy('cvs.id')
                ->orderby('visite', 'desc')
                 ->paginate(6);

            return view('pages.searchCvs', ['cvs' => $cvs]);
        } else if ($search == '' && $niveau != '') {

            $cvs = Cv::where('cvs.niveau', '=', $niveau)

                  ->orderby('visite', 'desc')
                 ->paginate(6);

            return view('pages.searchCvs', ['cvs' => $cvs]);
        } else if ($search != '' && $niveau != '') {

            $cvs = Cv::join('competences', 'cvs.id', '=', 'competences.cv_id')

                ->where('cvs.titre', 'LIKE', "%" . $search . "%")
                ->where('cvs.niveau', '=', $niveau)
                ->orWhere('competences.competence', 'LIKE', "%" . $search . "%")

                ->groupBy('cvs.id')
                 ->orderby('visite', 'desc')
                 ->paginate(6);

            return view('pages.searchCvs', ['cvs' => $cvs]);
        }

    }
    //---------------------------------------------

    //---------------------------------------------
    public function search($search)
    {
        //$search = $request->get('s');
        $cvs = DB::table('cvs')

            ->join('competences', 'cvs.id', '=', 'competences.cv_id')

            ->where('cvs.titre', 'LIKE', "%" . $search . "%")
            ->orWhere('competences.competence', 'LIKE', "%" . $search . "%")

            ->groupBy('titre')
            ->get();

        return response()->json(['cvs' => $cvs, 's' => $search]);
    }
    //---------------------------------------------
    public function allTitre()
    {
          $cvs = DB::table('cvs')

            ->join('competences', 'cvs.id', '=', 'competences.cv_id')

            ->groupBy('titre')
            ->get();

        return response()->json(['results' => $cvs]);

    }
    //---------------------------------------------
    public function addComment($id, CommentRequest $request)
    {

        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->cv_id = $id;
        $comment->commentaire = $request->commentaire;
        $comment->save();
        return response()->json(['comment' => $comment]);

    }
    //---------------------------------------------
    public function getComments($id)
    {

        $comments = Comment::
            join('cvs', 'cvs.id', '=', 'comments.cv_id')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->where(['cv_id' => $id])
            ->orderBy('comments.created_at', 'desc')
            ->get(['comments.commentaire','comments.user_id','comments.idcmt','cvs.user_id as cvsUserId','comments.cv_id','users.nom','users.prenom','users.photo']);

        return response()->json(['comments' => $comments]);

    }



    //------------------------------------
    public function deleteComment($id)
    {
        $comment = Comment::where('idcmt','=', $id)->delete();


        return response()->json(['etat' => $id]);

    }
    //------------------------------------
    public function editComment(Request $request, $id)
    {
        $comment = Comment::where('idcmt','=', $id)->update(['commentaire' => $request->commentaire]);

        return response()->json(['etat' => true]);

    }
    //------------------------------------
    public function sentMail(Request $request)
    {
        Mail::to($request->user())->send(new CvMail('yassine remmani'));
        return "sent";
    }

}