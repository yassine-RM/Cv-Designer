@extends('pages.master')

@section('script')
<script>
    var idcv =
        <?php echo json_encode($idCv) ?>;
        window.Laravel = <?php echo json_encode([
                    'csrfToken' => csrf_token(),
                ]); ?>

</script>
@endsection
@section('body')
<div class="row  mb-5" id="top">
    <div class="col-2 side">
        <h5>
            @include('pages.sideBar')
        </h5>
    </div>
    <div class="col-10">
        <div class="row">
            <div class="col-12" id="CvAddEtems">
                @include('pages.cv.createInfo')
            </div>
            <div class="col-8 offset-2 " id="CvAddEtems">
                @include('pages.cv.createFormation')
                @include('pages.cv.createExperience')
                @include('pages.cv.createCompetence')
                @include('pages.cv.createLoisire')
                @include('pages.cv.createLangue')


            </div>
        </div>
        <div class="row mt-3 mr-1 cvtemplate">
            <div class=" col-3 p-2 ">
                <div>
                    <img :src="Cv.photo" alt="cv photo" width="200" height="200" class="rounded-circle">
                </div>
                <div id="print">
                    <h5 class=" card-title mt-2">
                        <h3 class="text-primary"><i class="fa fa-info-circle "></i> Info</h3>

                    </h5>
                    <p> <i class="fa fa-birthday-cake"></i> @{{ Infos.dateNaissance }}</p>
                    <p><i class="fa fa-flag"></i> @{{Infos.paye}}</p>
                    <p> <i class="fa fa-home"></i> @{{Infos.ville}} </p>
                    <p><i class="fa fa-address-card"></i> @{{Infos.adresse}}</p>
                    <p> <i class="fa fa-university"></i> @{{  Cv.niveau}}</p>

                    <h5 class="card-title">
                        <h3 class="text-primary"><i class="fa fa-phone"></i> Contact</h3>
                    </h5>
                    <p><i class="fa fa-mobile"></i> @{{Infos.telephonne}}</p>
                    <p><i class="fa fa-envelope"></i> @{{Infos.email}}</p>

                    <h5 class="card-title">
                        <h3 class="text-primary"><i class="fa fa-align-justify"></i> Présentation </h3>
                    </h5>
                    <p class="">@{{Cv.presentation}}</p>


                </div>
            </div>
            <div class=" col-9 ">
                <div class="row ">
                    <div class="col col-9 ">
                        <h2>@{{Infos.civilite}} &nbsp; @{{Infos.nom}}&nbsp;&nbsp;@{{Infos.prenom}}</h2>
                        <div class="text-info">
                            <h3>@{{Cv.titre}}</h3>
                        </div>


                    </div>


                    <div class="col-3 text-right">
                        <a href="{{ url('/showCv/'.$idCv) }}" class="btn btn-sm btn-warning">
                            <i class="fa fa-paint-brush"></i> Choisir un thème </a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col col-8 ">
                        <div class="row  mt-1 ">
                            <div class="col-12">
                                <div class="row">
                                    <p class="card-text">
                                        <h2 v-if='Formations.length' class="text-primary"><i
                                                class="text-danger fa fa-graduation-cap"></i> Formations</h2>
                                    </p>
                                </div>
                                <div class="row" v-for='formation in Formations'>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-10">
                                                <h4 class="card-text"><i class="fa fa-caret-right"></i>
                                                    @{{formation.titre}}</h4>
                                            </div>
                                            <div class="col-2">
                                                <p>
                                                    <a data-toggle="modal" data-target="#formModal"
                                                        @click="idForm=formation.id,button=false,editFormation(formation)"><i
                                                            class="fa fa-edit text-success"></i></a>
                                                    <a href="#"
                                                        @click.prevent='idForm=formation.id,deleteFormation(formation)'><i
                                                            class="fa fa-trash text-danger"></i></a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="card-text">@{{formation.etablissement}}</div>
                                            </div>
                                            <div class="col-8">
                                                <div class="card-text">@{{formation.description}}</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <i class="fa fa-calendar"></i> Date Debut
                                                <div class="card-text">@{{formation.dateDebut}}</div>
                                            </div>
                                            <div class="col-6">
                                                <i class="fa fa-calendar"></i> Date Fin
                                                <div class="card-text">@{{formation.dateFin}}</div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="row  mt-1">
                            <div class="col-12">
                                <div class="row mt-2">
                                    <p class="card-text">
                                        <h2 v-if='Experiences.length' class="text-primary"><i
                                                class="text-danger fa fa-suitcase"></i> Experiences </h2>
                                    </p>
                                </div>
                                <div class="row" v-for='experience in Experiences'>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-8">
                                                <h4><i class="fa fa-caret-right"></i> @{{experience.titre}}</h4>
                                            </div>
                                            <div class="col-4">

                                                <p>
                                                    <a data-toggle="modal" data-target="#expModal"
                                                        @click="button=false,editExperience(experience)"><i
                                                            class="fa fa-edit text-success"></i></a>
                                                    <a href="#"
                                                        @click.prevent='idExp=experience.id,deleteExperience(experience)'><i
                                                            class="fa fa-trash text-danger"></i></a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-8">
                                                <h5>@{{experience.entreprise}}</h5>
                                            </div>
                                            <div class="col-4"><img :src="experience.logo" width="40" hieght="40" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">@{{experience.description}}</div>
                                        </div>
                                        <div class="row">


                                            <div class="col-6"> <i class="fa fa-calendar"></i>
                                                Date Debut
                                                <div class="card-text">
                                                    @{{experience.dateDebut}}
                                                </div>
                                            </div>

                                            <div class="col-6"><i class="fa fa-calendar"></i>
                                                Date Fin
                                                <div class="card-text">
                                                    @{{experience.dateFin}}
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row  mt-1">
                            <div class="col-12">
                                <div class="row mt-2">
                                    <p class="card-text">
                                        <h2 v-if='Loisires.length' class="text-primary"><i
                                                class="text-danger fa fa-paper-plane-o"></i> Loisires</h2>
                                    </p>
                                </div>
                                <div class="row" v-for='loisire in Loisires'>
                                    <div class="col-8">
                                        <h4><i class="fa fa-caret-right"></i> @{{loisire.titre}}</h4>
                                    </div>
                                    <div class="col-4">
                                        <p>
                                            <a data-toggle="modal" data-target="#loisModal"
                                                @click="button=false,editLoisire(loisire)"><i
                                                    class="fa fa-edit text-success"></i></a>
                                            <a href="#" @click.prevent='idLoisire=loisire.id,deleteLoisire(loisire)'><i
                                                    class="fa fa-trash text-danger"></i></a>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col col-4 ">
                        <div class="row  mt-1 ">
                            <div class="col-12">
                                <p class="card-text ">
                                    <h2 v-if='Competences.length' class="text-primary"><i
                                            class="text-danger fa fa-id-card"></i> Competences</h2>
                                </p>
                                <div class="row" v-for='competence in Competences'>
                                    <div class="col-3">
                                        <p class="card-text"><i class="fa fa-caret-right"></i>
                                            @{{competence.competence}}</p>
                                    </div>
                                    <div class="col-6">
                                        <div class="progress">
                                            <div class="progress-bar-striped bg-primary"
                                                v-bind:style="{width: competence.pourcentage+'%'}" role="progressbar"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                @{{competence.pourcentage}}%</div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <p>
                                            <a data-toggle="modal" data-target="#compModal"
                                                @click="button=false,editCompetence(competence)"><i
                                                    class="fa fa-edit text-success"></i></a>
                                            <a href="#"
                                                @click.prevent='idComp=competence.idComp,deleteCompetence(competence)'><i
                                                    class="fa fa-trash text-danger"></i></a>
                                        </p>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="row  mt-1 ">
                            <div class="col-12">
                                <p class="card-text">
                                    <h2 v-if='Langues.length' class="text-primary"><i
                                            class="text-danger fa fa-language"></i> Langues</h2>
                                </p>
                                <div class="row" v-for='langue in Langues'>
                                    <div class="col-3">
                                        <p class="card-text"><i class="fa fa-caret-right"></i> @{{langue.langue}}</p>
                                    </div>
                                    <div class="col-6">
                                        <div class="progress">
                                            <div class="progress-bar-striped bg-primary"
                                                v-bind:style="{width: langue.pourcentage+'%'}" role="progressbar"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                @{{langue.pourcentage}}%</div>
                                        </div>
                                    </div>
                                    <div class="col-3 text-right">

                                        <a data-toggle="modal" data-target="#langModal"
                                            @click="button=false,editLangue(langue)"><i
                                                class="fa fa-edit text-success"></i></a>
                                        <a href="#" @click.prevent='idLang=langue.id,deleteLangue(langue)'><i
                                                class="fa fa-trash text-danger"></i></a>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection
