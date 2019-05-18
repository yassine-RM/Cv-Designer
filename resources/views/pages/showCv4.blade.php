<div class="row bg-light text-dark" id="divContent">

    <div class="col-12">

        <div class="row " :style="bgColor">
            <div class=" p-3 col-3">
                <div class="">
                    <p><i class="text-danger fa fa-birthday-cake"></i> @{{Infos.dateNaissance}}</p>
                    <p><i class="text-danger fa fa-flag"></i> @{{Infos.paye}}</p>
                    <p><i class="text-danger fa fa-home"></i> @{{Infos.ville}}</p>
                    <p><i class="text-danger fa fa-address-card"></i> @{{Infos.adresse}}</p>
                     <p> <i class=" text-danger fa fa-university"></i> @{{  Cv.niveau}}</p>
                </div>
            </div>
            <div class=" p-5 col-3">
                <div class="">
                    <p><i class="text-danger fa fa-mobile"></i> @{{Infos.telephonne}}</p>
                    <p><i class="text-danger fa fa-envelope"></i> @{{Infos.email}}</p>
                </div>
            </div>
            <div class=" p-5 col-4 text-center">
                <h1 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">@{{Infos.civilite}}
                    &nbsp; @{{Infos.nom}}&nbsp;&nbsp;@{{Infos.prenom}}</h1>
                <div class="text-primary">
                    <h3>@{{Cv.titre}}</h3>
                </div>
            </div>
            <div class=" p-3 col-2">
                <div class="text-center">
                    <img :src="Cv.photo" alt="cv photo" width="150" height="150"
                        class="rounded-circle border border-warning">
                </div>
            </div>


        </div>


        <div class="row">

            <div class="col col-7  ">
                <div class="row bg-light mt-1 ">
                    <div class="col-12">
                        <div class="row">
                            <p class="card-text">
                                <h2 v-if='Formations.length' class="text-danger"><i
                                        class="text-danger fa fa-graduation-cap"></i> Formations</h2>
                            </p>
                        </div>
                        <div class="row" v-for='formation in Formations'>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="card-text"><i class="fa fa-caret-right"></i>
                                            @{{formation.titre}}</h4>
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
                                        <i class="fa fa-calendar text-danger"></i> Date debut
                                        <div class="card-text">@{{formation.dateDebut}}</div>
                                    </div>
                                    <div class="col-6">
                                        <i class="fa fa-calendar text-danger"></i> Date fin
                                        <div class="card-text">@{{formation.dateFin}}</div>
                                    </div>
                                </div>
                                <hr>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="row bg-light mt-1">
                    <div class="col-12">
                        <div class="row mt-2">
                            <p class="card-text">
                                <h2 v-if='Experiences.length' class="text-danger"><i
                                        class="text-danger fa fa-suitcase"></i> Experiences </h2>
                            </p>
                        </div>
                        <div class="row" v-for='experience in Experiences'>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h4><i class="fa fa-caret-right"></i> @{{experience.titre}}</h4>
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
                                    <div class="col-6">
                                        <i class="fa fa-calendar text-danger"></i> Date debut
                                        <div class="card-text">@{{experience.dateDebut}}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <i class="fa fa-calendar text-danger"></i> Date fin
                                        <div class="card-text">@{{experience.dateFin}}
                                        </div>
                                    </div>
                                </div>

                                <hr>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-1 ">
                    <div class="col-12">
                        <div class="row mt-2">
                            <p class="card-text">
                                <h2 v-if='Loisires.length' class="text-danger"><i
                                        class="text-danger fa fa-paper-plane-o"></i> Loisires</h2>
                            </p>
                        </div>
                        <div class="row" v-for='loisire in Loisires'>
                            <div class="col-12">
                                <h4><i class="fa fa-caret-right"></i> @{{loisire.titre}}</h4>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col col-3  ">
                <div class="row bg-light mt-1 ">
                    <div class="col-12">
                        <p class="card-text ">
                            <h2 v-if='Competences.length' class="text-danger"><i class="text-danger fa fa-id-card"></i>
                                Competences</h2>
                        </p>
                        <div class="row" v-for='competence in Competences'>
                            <div class="col-5">
                                <p class="card-text"><i class="fa fa-caret-right"></i>
                                    @{{competence.competence}}</p>
                            </div>
                            <div class="col-7">
                                <div class="progress">
                                    <div class="progress-bar-striped bg-success"
                                        v-bind:style="{width: competence.pourcentage+'%'}" role="progressbar"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        @{{competence.pourcentage}}%</div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
                <div class="row bg-light mt-1 ">
                    <div class="col-12">
                        <p class="card-text">
                            <h2 v-if='Langues.length' class="text-danger"><i class="text-danger fa fa-language"></i>
                                Langues</h2>
                        </p>
                        <div class="row" v-for='langue in Langues'>
                            <div class="col-5">
                                <p class="card-text"><i class="fa fa-caret-right"></i>
                                    @{{langue.langue}}</p>
                            </div>
                            <div class="col-7">
                                <div class="progress">
                                    <div class="progress-bar-striped bg-success"
                                        v-bind:style="{width: langue.pourcentage+'%'}" role="progressbar"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        @{{langue.pourcentage}}%</div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
            <div class="col-2  " :style="bgColor">


                <div class="mt-5 ">
                    <h5 class="card-title">
                        <h3><i class="fa fa-align-justify text-danger"></i>
                            Présentation </h3>
                    </h5>
                    <p class=" text-justify">@{{Cv.presentation}}</p>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
