<div class="row  text-dark" id="divContent">

    <div class="col-12 " id="contentPrint">

        <div class="row " :style="bgColor">
            <div class=" p-3 col-3">
                <div class="text-center">
                    <img v-if='Cv.photo' :src="Cv.photo" alt="cv photo" width="200" height="200" class="rounded-circle">
                    <img v-else src="{{ asset('images/user.png') }}" alt="cv photo" width="200" height="200"
                        class="rounded-circle"> </div>
            </div>
            <div class=" p-3 col-7">
                <h1 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">@{{Infos.civilite}}
                    &nbsp; @{{Infos.nom}}&nbsp;&nbsp;@{{Infos.prenom}}</h1>
                <div :style="bgColorText">
                    <h3 :style="bgColorText">@{{Cv.titre}}</h3>
                </div>
            </div>


        </div>


        <div class="row">
            <div class="col-3  " :style="bgColor">


                <div class="mt-5 ">
                    <h5 id="print" class=" card-title ">
                        <h3 :style="bgColorText" style="text-decoration: underline"><i class="fa fa-info-circle "></i>
                            Info</h3>

                    </h5>
                    <p> <i :style="bgColorText" class="fa fa-birthday-cake"></i> @{{Infos.dateNaissance}}</p>
                    <p><i :style="bgColorText" class="fa fa-flag"></i> @{{Infos.paye}}</p>
                    <p> <i :style="bgColorText" class="fa fa-home"></i> @{{Infos.ville}} </p>
                    <p><i :style="bgColorText" class="fa fa-address-card"></i> @{{Infos.adresse}}</p>
                    <p> <i :style="bgColorText" class="fa fa-university"></i> @{{  Cv.niveau}}</p>

                    <h5 class="card-title">
                        <h3 :style="bgColorText" style="text-decoration: underline"><i class="fa fa-phone"></i> Contact
                        </h3>
                    </h5>
                    <p><i :style="bgColorText" class="fa fa-mobile"></i> @{{Infos.telephonne}}</p>
                    <p><i :style="bgColorText" class="fa fa-envelope"></i> @{{Infos.email}}</p>

                    <h5 class="card-title">
                        <h3 :style="bgColorText" style="text-decoration: underline"><i class="fa fa-align-justify"></i>
                            Présentation </h3>
                    </h5>
                    <p class=" text-justify">@{{Cv.presentation}}</p>
                </div>

            </div>
            <div class="col-9">
                <div class="row">

                    <div class="col col-7  ">
                        <div class="row mt-2 ml-1 ">
                            <div class="col-12">
                                <div class="row">
                                    <p class="card-text">
                                        <h2 v-if='Formations.length' :style="bgColorText"><i :style="bgColorText"
                                                class=" fa fa-graduation-cap"></i> Formations</h2>
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
                                                <i :style=" bgColorText" class="fa fa-calendar "></i> Date debut
                                                <div class=" card-text">@{{formation.dateDebut}}</div>
                                            </div>
                                            <div class="col-6">
                                                <i :style=" bgColorText" class="fa fa-calendar "></i> Date fin
                                                <div class=" card-text">@{{formation.dateFin}}</div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="row ml-1 mt-1">
                            <div class="col-12">
                                <div class="row mt-2">
                                    <p class="card-text">
                                        <h2 v-if='Experiences.length' :style="bgColorText"><i :style="bgColorText"
                                                class=" fa fa-suitcase"></i> Experiences </h2>
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
                                                <i :style=" bgColorText" class="fa fa-calendar "></i> Date debut
                                                <div class=" card-text">@{{experience.dateDebut}}
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <i :style=" bgColorText" class="fa fa-calendar "></i> Date fin
                                                <div class=" card-text">@{{experience.dateFin}}
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row ml-1 mt-1 ">
                            <div class="col-12">
                                <div class="row mt-2">
                                    <p class="card-text">
                                        <h2 v-if='Loisires.length' :style="bgColorText"><i :style="bgColorText"
                                                class=" fa fa-paper-plane-o"></i> Loisires</h2>
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
                    <div class="col col-5  ">
                        <div class="row  mr-1 ">
                            <div class="col-12">
                                <p class="card-text ">
                                    <h2 v-if='Competences.length' :style="bgColorText"><i :style="bgColorText"
                                            class=" fa fa-id-card"></i>
                                        Competences</h2>
                                </p>
                                <div class="row" v-for='competence in Competences'>
                                    <div class="col-5">
                                        <p class="card-text"><i class="fa fa-caret-right"></i>
                                            @{{competence.competence}}</p>
                                    </div>
                                    <div class="col-7">
                                        <div class="progress">
                                            <div class="progress-bar-striped "
                                                v-bind:style="'width:'+ competence.pourcentage+'% ;'+bgColor"
                                                role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                @{{competence.pourcentage}}%</div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                        <div class="row mt-1 ">
                            <div class="col-12">
                                <p class="card-text">
                                    <h2 v-if='Langues.length' :style="bgColorText"><i :style="bgColorText"
                                            class=" fa fa-language"></i>
                                        Langues</h2>
                                </p>
                                <div class="row" v-for='langue in Langues'>
                                    <div class="col-5">
                                        <p class="card-text"><i class="fa fa-caret-right"></i>
                                            @{{langue.langue}}</p>
                                    </div>
                                    <div class="col-7">
                                        <div class="progress">
                                            <div class="progress-bar-striped "
                                                v-bind:style="'width:'+ langue.pourcentage+'% ;'+bgColor"
                                                role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                @{{langue.pourcentage}}%</div>
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
</div>
