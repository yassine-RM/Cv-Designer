<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Cv;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\CvRequest;
use App\Http\Requests\InfoRequest;

use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;



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
    public function storeCv()
    {
        $cv = new Cv();

        $cv->user_id = Auth::user()->id;

        $cv->save();


        return redirect('cvTemplate/' . $cv->id);
    }
    public function storeCv1(Request $request)
    {
        $this->validate($request, [

            'titre1' => 'required|min:3|max:150',
            'niveau1' => 'required',
            'presentation1' => 'required|min:3|max:255',
            'photo1' => 'required'
        ]);

        $cv = new Cv();

        $cv->user_id = Auth::user()->id;

        $cv->titre = $request->titre1;
        $cv->niveau = $request->niveau1;
        $cv->presentation = $request->presentation1;

        $name = time() . '.' . explode('/', explode(':', substr($request->photo1, 0, strpos($request->photo1, ';')))[1])[1];
        \Image::make($request->photo1)->save(public_path('img/') . $name);
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

        $currentPhoto = $cv->photo;

        $name = time() . '.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
        \Image::make($request->image)->save(public_path('img/') . $name);
        $cv->photo = '/img/' . $name;

        $photoRemove = public_path() . $currentPhoto;

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

        $comments = Comment::join('cvs', 'cvs.id', '=', 'comments.cv_id')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->where(['cv_id' => $id])
            ->orderBy('comments.created_at', 'desc')
            ->get(['comments.commentaire', 'comments.user_id', 'comments.created_at', 'comments.idcmt', 'cvs.user_id as cvsUserId', 'comments.cv_id', 'users.nom', 'users.prenom', 'users.photo']);

        return response()->json(['comments' => $comments]);
    }



    //------------------------------------
    public function deleteComment($id)
    {
        $comment = Comment::where('idcmt', '=', $id)->delete();


        return response()->json(['etat' => $id]);
    }
    //------------------------------------
    public function editComment(Request $request, $id)
    {
        $comment = Comment::where('idcmt', '=', $id)->update(['commentaire' => $request->commentaire]);

        return response()->json(['etat' => true]);
    }


    //----------------------------------
    public function Dashboard(Request $request)
    {

        $option = $request->get('option');
        $search = $request->get('search');

        if ($option == "Nom") {
            $users = User::where('nom', 'like', '%' . $search . '%')->orderBy("nom")->paginate(4);
        } else if ($option == "Prenom") {
            $users = User::where('prenom', 'like', '%' . $search . '%')->orderBy("prenom")->paginate(4);
        } else if ($option == "Ville") {
            $users = User::where('ville', 'like', '%' . $search . '%')->orderBy("ville")->paginate(4);
        } else if ($option == "Paye") {
            $users = User::where('paye', 'like', '%' . $search . '%')->orderBy("paye")->paginate(4);
        } else if ($option == "Email") {
            $users = User::where('email', 'like', '%' . $search . '%')->orderBy("email")->paginate(4);
        } else {
            $users = User::paginate(4);
        }

        $countUsers = User::where("state", "=", "0")->count();
        $countAdmins = User::where("state", "=", "1")->count();

        $countCvs = Cv::count();

        $cvs = Cv::select(DB::raw("count(id) as count,CONCAT(year(created_at) , '-' , MONTH(created_at)) as date"))
            ->orderBy("created_at")
            ->groupBy(DB::raw("MONTH(created_at),year(created_at)"))
            ->get()->toArray();
        //--------------------------------
        $usersGraph = User::select(DB::raw("count(id) as count,CONCAT(year(created_at) , '-' , MONTH(created_at)) as date"))
            ->orderBy("created_at")
            ->groupBy(DB::raw("MONTH(created_at),year(created_at)"))
            ->get()->toArray();
        //--------------------------------
        foreach ($cvs as $cv) {
            $date[] = $cv['date'];
            $count[] = $cv['count'];
        }

        foreach ($usersGraph as $user) {
            $dateUser[] = $user['date'];
            $countUser[] = $user['count'];
        }



        return view('pages.dashboard', ['users' => $users, 'countUsers' => $countUsers, 'countAdmins' => $countAdmins, 'countCvs' => $countCvs, 'date' => $date, 'count' => $count, 'dateUser' => $dateUser, 'countUser' => $countUser, 'option' => $option, 'searchUser' => $search]);
    }
    //----------------------------------
    public function showCvs($id)
    {
        $cvs = Cv::where('user_id', '=', $id)->paginate(6);
        return view('pages.showCvs', ['cvs' => $cvs]);
    }
    public function admin($id)
    {



        $user = User::find($id);
        if ($user->state == 1) {
            $user->state = 0;
        } else
            $user->state = 1;
        $user->save();


        return response()->json(['etat' => true]);
    }
    //----------------------------------
    public function Notifications()
    {
        $Notif = Cv::join('users', 'cvs.user_id', '=', 'users.id')
            ->where(['cvs.state' => 0])->get(['cvs.created_at', 'users.nom', 'users.prenom', 'users.photo', 'cvs.titre', 'users.civilite', 'cvs.id']);

        return response()->json(['Notif' => $Notif]);
    }
    //----------------------------------
    public function EditState($id)
    {
        $cv = Cv::find($id);
        $cv->state = 1;
        $cv->save();
        return response()->json(['etat' => true]);
    }
    //----------------------------------
    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['etat' => true]);
    }
}