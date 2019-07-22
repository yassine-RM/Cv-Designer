@extends('pages.master')

@section('body')


<div id="statistique">
    <div class="row ml-3 mr-3">
        <div class="col-md-6 grid-margin stretch-card">
            <h3 class="bg-warning mt-2">
                <i class="fa fa-bar-chart text-danger" aria-hidden="true"></i>
                Utilisateurs
            </h3>
            <canvas id="myChartUser" width="400" height="200"></canvas>
        </div>
        <div class="col-md-6 grid-margin stretch-card">

            <h3 class="bg-warning mt-2">
                <i class="fa fa-bar-chart text-danger" aria-hidden="true"></i>
                Cvs
            </h3>
            <canvas id="myChartCv" width="400" height="200"></canvas>
        </div>

    </div>
    <div class="row">

        <div class="col-6 ">
            <div class=" row p-4  ml-5 mr-3" id="cap">
                <div class="col-6">
                    <h2><i class=" fa fa-user fa-2x"></i></h2>
                </div>
                <div class="col-6 text-center">
                    <div class="row">
                        <div class="col-12">

                            <h3 class="text-center">Total</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="circle">
                                <h2 class="text-danger mt-3 counter">{{ $countAdmins }}</h2>
                                <p>Administrateur</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="circle">
                                <h2 class="text-danger mt-3 counter">{{ $countUsers }}</h2>
                                <p>Utilisateurs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 ">
            <div class=" row p-4  ml-3 mr-5" id="cap">
                <div class=" col-6">
                    <h2><i class="fa fa-address-card fa-2x"></i></h2>
                </div>
                <div class="col-6 text-center">
                    <div class="row">
                        <div class="col-6 offset-3">
                            <h3>Total</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 offset-3">
                            <div class="circle">
                                <h2 class="text-danger mt-3 counter">{{ $countCvs }}</h2>
                                <p>Cvs</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>
<div class="row row_dash mt-4">
    <div class="col-12  ">

        <div class="row mt-2">
            <div class="col-12 ">
                <div class="row mt-1">
                    <div class="col-12 text-center ">
                        <h3 class="bg-success"><i class="fa fa-users text-danger" aria-hidden="true"></i> Liste des
                            utilisateurs
                        </h3>
                        <div class="row">
                            <div class="col-12">
                                <a @click.prevent="openForm,printDiv('usersListe')"
                                    class="float-right btn btn-sm btn-info mb-1"><i class="fa fa-print">
                                        Imprimer</i></a>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-4 offset-4 mt-1 mb-1 text-center">
                                <div class="form-inline">


                                    <select v-model='option' class=" form-control "
                                        style="background-color: transparent;color: black">
                                        <option value="" disabled selected>Rechercher par ...</option>
                                        <option style="color: black">Nom</option>
                                        <option style="color: black">Prenom</option>
                                        <option style="color: black">Ville</option>
                                        <option style="color: black">Paye</option>
                                        <option style="color: black">Email</option>

                                    </select>


                                    <input v-model='searchUser' placeholder="Search ..." autocomplete="off"
                                        class=" form-control text-dark" id="search1" type="text">
                                    &nbsp;&nbsp;
                                    <a :href="'/Dashboard?option='+option+'&search='+searchUser" class="btnSearch">
                                        <i class="fa fa-search text-dark" aria-hidden="true"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div id="usersListe">
                            @if (!count($users))
                            <div class="row mt-5">
                                <div class="col-6 offset-3">

                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <strong>Result </strong> Aucun Utilisateur existe pour "{{ $option }}"
                                        contient "{{ $searchUser }}".
                                    </div>
                                </div>
                            </div>

                            @else
                            <div class="row mt-2">
                                <div class="col-6 offset-3">
                                    @if ($option!="" && $searchUser!="")



                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        Result de "{{ $option }}" contient "{{ $searchUser }}"
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row mt-2" id="listUser">
                                <div class="col-12">
                                    <table class="table table-dark">
                                        <thead>
                                            <tr>
                                                <th>Utilisateur</th>

                                                <th>Adresse</th>
                                                <th>Paye</th>
                                                <th>Ville</th>
                                                <th>Telephonne</th>
                                                <th>Email</th>

                                                <th v-if='dash'>Admin </th>
                                                <th v-if='dash'>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($users as $user)
                                            @if ($user->id!=Auth::user()->id)


                                            <tr>
                                                <td><img src="{{ asset('storage/'.$user->photo) }}" width="60"
                                                        height="60" class="rounded-circle" alt="">
                                                    <br>
                                                    {{ $user->civilite }}
                                                    {{ $user->nom }}
                                                    {{ $user->prenom }}
                                                </td>

                                                <td>{{ $user->adresse }}</td>
                                                <td>{{ $user->paye }}</td>
                                                <td>{{ $user->ville }}</td>
                                                <td>{{ $user->telephonne }}</td>
                                                <td>{{ $user->email }}</td>

                                                <td v-if='dash'>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="{{ $user->id }}"
                                                            value="{{ $user->id }}" @if($user->state==1) checked @endif

                                                        @click.prevent='isAdmin({{ $user->id }})'
                                                        >

                                                    </div>
                                                </td>
                                                <td v-if='dash'>
                                                    <a href="{{ url('showCvs/'.$user->id) }}">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                    &nbsp;
                                                    <a href="mailto:{{ $user->email  }}">
                                                        <i class="fa fa-envelope text-warning" aria-hidden="true"></i>
                                                    </a>
                                                    &nbsp;
                                                    <a href="" @click.prevent='deleteUser({{ $user->id }})'
                                                        class="text-danger">
                                                        <i class="fa fa-trash" aria-hidden="true"></i></td>
                                                </a>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-4 text-center mt-3 ">


                {{ $users->links() }}
            </div>
        </div>
        <script src="{{ asset('js/waypoints.min.js') }}"></script>
        <script src="{{ asset('js/counte.min.js') }}"></script>
        <script>
            //-----------------------------------------------------
            jQuery(document).ready(function(){
                $('.counter').counterUp({
                delay: 2,
                time: 1000
                });
                })
        </script>

    </div>
</div>
<script>
    var date =
        <?php echo json_encode($date) ?>;
    var count =
        <?php echo json_encode($count) ?>;
    var dateUser =
        <?php echo json_encode($dateUser) ?>;
    var countUser =
        <?php echo json_encode($countUser) ?>;
        window.Laravel = <?php echo json_encode([
                    'csrfToken' => csrf_token(),
                ]); ?>

</script>



@endsection
