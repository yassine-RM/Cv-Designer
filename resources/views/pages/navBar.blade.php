<!-- Modal -->
<div class="row navNav">
    <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-light">

            <div class="navbar-brand ">
                <a href="
                @if (Auth::user()->state==0)
                /
                @else
                /Dashboard
                @endif

                "><img class="rounded-circle" width="15%" height="15%" src="{{asset('images/cv-logo.png')}}"></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-light"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">


                @if (Auth::user()->state==0)


                <ul class="nav navbar-nav  ">

                    <li class="nav-item">
                        <a href="/" class="nav-link text-light"><i class="fa fa-home text-warning"></i>
                            Accueil</a>
                    </li>

                </ul>
                <ul class="nav navbar-nav  ">

                    <li class="nav-item">
                        <a href="/mesCvs" class="nav-link text-light"><i class="fa fa-list text-warning"></i> Mes
                            cvs</a>
                    </li>

                </ul>

                <ul class="nav navbar-nav  ">

                    <li class="nav-item">
                        <a href="/storeCv" class="nav-link text-light"><i
                                class="fa fa-pencil-square-o text-warning"></i>
                            Créer un cv
                        </a>
                    </li>

                </ul>

                <ul class="nav navbar-nav  ">

                    <li class="nav-item">
                        <a href="/#commentMarche" class="nav-link text-light"><i
                                class="fa fa-question-circle text-warning"></i> Comment
                            ça marche</a>
                    </li>

                </ul>

                <ul class="nav navbar-nav  ">

                    <li class="nav-item">
                        <a href="mailto:remmanidev@gmail.com" class="nav-link text-light"><i
                                class="fa fa-envelope text-warning"></i>
                            Contactez-nous </a>
                    </li>

                </ul>

                @else

                <ul class="nav navbar-nav  ">

                    <li class="nav-item">
                        <a href="/Dashboard" class="nav-link text-light"> <i class="fa fa-dashboard text-warning"
                                aria-hidden="true"></i>
                            Dashboard </a>
                    </li>

                </ul>
                <ul class="nav navbar-nav  ">

                    <li class="nav-item">
                        <a href="/mesCvs" class="nav-link text-light"><i class="fa fa-list text-warning"></i> Mes
                            cvs</a>
                    </li>

                </ul>
                <ul class="nav navbar-nav  ">

                    <li class="nav-item">
                        <a href="/storeCv" class="nav-link text-light"><i
                                class="fa fa-pencil-square-o text-warning"></i>
                            Créer un cv
                        </a>
                    </li>

                </ul>

                <ul class="nav navbar-nav  ml-5">

                    <li class="nav-item dropdown ">
                        <a class="nav-link " id="cursor" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell text-warning"></i>
                            <sup> <span class="badge badge-danger">@{{Notif }}</span></sup>
                        </a>
                        <div class="dropdown-menu bg-light mt-3 " style="width: 700px !important">
                            <div class="row  " v-if='!NotifList.length'>
                                <div class="col-12 text-center">
                                    Aucun notifications existe !!!</div>
                            </div>

                            <table class="table table-hover">
                                <tr id="cursor" class="text-center" @click='EditState(notif.id)'
                                    v-for='notif in NotifList'>
                                    <td>
                                        <img :src="'/storage/'+notif.photo" width="40" height="40"
                                            class="rounded-circle" alt="">
                                    </td>
                                    <td>
                                        <p>@{{ notif.civilite }} @{{ notif.nom }} @{{ notif.prenom }} a créer
                                            le cv de titre @{{ notif.titre }}</p>
                                    </td>
                                    <td>
                                        <p> @{{ notif.created_at }}</p>
                                    </td>


                                </tr>

                            </table>
                        </div>

                    </li>

                </ul>



                @endif

                <ul class="nav navbar-nav m-auto">
                    <li class="nav-item ">

                        <!-- Search form -->
                        <form method="GET" :action="'/searchCvs?s='+search+'&n='+niveau" class="form-inline">

                            <div class="form-group mr-sm-2">
                                <select v-model='niveau' name="niveau" class=" form-control "
                                    style="background-color: transparent;color: white">
                                    <option value="" disabled selected>Niveau scolaire</option>
                                    <option style="color: black">Bac </option>
                                    <option style="color: black">Bac + 1</option>
                                    <option style="color: black">Bac + 2</option>
                                    <option style="color: black">Bac + 3</option>
                                    <option style="color: black">Bac + 4</option>
                                    <option style="color: black">Bac + 5</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <input list="titre" @keyup='searching()' v-model='search ' name="search"
                                    placeholder="Titre du cv" autocomplete="off" class=" form-control" id="search1"
                                    type="text">
                                <datalist id="titre">
                                    <option v-for='d in data'>
                                        @{{ d.titre  }}</option>
                                </datalist>
                            </div>

                            <button class="btnSearch">
                                <i class="fa fa-search text-light" aria-hidden="true"></i>
                            </button>
                        </form>

                    </li>

                </ul>

                <ul class="nav navbar-nav " id="navbar_right">
                    <li class="nav-item dropdown ">
                        <a class="nav-link " href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">



                            <img class="rounded-circle" width="60" height="60"
                                src="{{asset('storage/'.Auth::user()->photo)}}">

                            <h4 class=" text-light "> <i class="fa fa-caret-down"></i></h4>


                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a id="cursor" class="dropdown-item" data-toggle="modal" data-target="#profile"> <i
                                    class="fa fa-user text-danger"></i> Profile</a>

                            <a class="dropdown-item" href="/logout"> <i class="fa fa-sign-out text-danger"></i>
                                LogOut</a>
                        </div>
                    </li>

                </ul>

                @include('pages.notification')
        </nav>
    </div>
</div>
