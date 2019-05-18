<div class="row">
    <div class="col col-md-12">
        <!-- Modal -->

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-brand">
                <a href="/"><img class="rounded-circle" width="15%" height="15%"
                        src="{{asset('images/cv-logo.png')}}"></a>
            </div>

            <ul class="nav navbar-nav  ">

                <li class="nav-item">
                    <a href="/" class="nav-link text-light"><i class="fa fa-home text-warning"></i> Acceuil</a>
                </li>

            </ul>
            <ul class="nav navbar-nav  ">

                <li class="nav-item">
                    <a href="/mesCvs" class="nav-link text-light"><i class="fa fa-list text-warning"></i> Mes cvs</a>
                </li>

            </ul>

            <ul class="nav navbar-nav  ">

                <li class="nav-item">
                    <a href="/" class="nav-link text-light"><i class="fa fa-pencil-square-o text-warning"></i> Créer un
                        cv gratuitement</a>
                </li>

            </ul>

            <ul class="nav navbar-nav  ">

                <li class="nav-item">
                    <a href="/#commentMarche" class="nav-link text-light"><i
                            class="fa fa-question-circle text-warning"></i> Comment
                        ça marche</a>
                </li>

            </ul>


            <ul class="nav navbar-nav m-auto">
                <li class="nav-item ">

                    <!-- Search form -->
                    <form method="GET" v-bind:action="'/searchCvs?s='+search+'&n='+niveau" class="form-inline">

                        <div class="form-group mr-sm-2">
                            <select v-model='niveau' name="niveau" class=" form-control "
                                style="background-color: transparent;color: white">
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
                                placeholder="search ..." autocomplete="off" class=" form-control" id="search1"
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

            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown ">
                    <a class="nav-link " href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <img class="rounded-circle" width="60" height="60"
                            src="{{asset('storage/'.Auth::user()->photo)}}">

                        <h4 class="text-center text-light"> <i class="fa fa-caret-down"></i></h4>

                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a id="cursor" class="dropdown-item" data-toggle="modal" data-target="#profile"> <i
                                class="fa fa-user text-danger"></i> Profile</a>

                        <a class="dropdown-item" href="/logout"> <i class="fa fa-sign-out text-danger"></i> LogOut</a>
                    </div>
                </li>

            </ul>


        </nav>
    </div>
</div>
