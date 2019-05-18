<div class="row ml-1 mr-1">
<div  class="modal  fade  "   id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModal" aria-hidden="true">
    <div class="modal-dialog " style="max-width: 60% !important;right:0 !important"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoModal"><i class="fa fa-info text-danger" aria-hidden="true"></i> Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
              <form>

                    <div class="card-body">
                        @csrf
                        <div class="row ">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="text-light" for="civilite">Civilité </label>

                                    <select v-model='Infos.civilite' name="civilite" id="civilite" class="form-control">
                                        <option>M.</option>
                                        <option>Mme.</option>
                                        <option>Mlle.</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="text-light" for="Nom">Nom </label>

                                    <input type="text" v-model='Infos.nom' name="nom" id="Nom" class="form-control  " placeholder="Nom">
                                </div>
                                <p class="text-danger">@{{errorsInfo.nom}}</p>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="text-light" for="Prenom">Prénom </label>

                                    <input v-model='Infos.prenom' type="text" name="prenom" id="Prenom" class="form-control"
                                        placeholder="Prénom">
                                    <p class="text-danger">@{{errorsInfo.prenom}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-light" for="Photo">Photo </label>
                                    <input v-on:change='previewFiles' name="image" type="file" accept="image/*" id="file"
                                        class="form-control" placeholder="Photo">
                                    <p class="text-danger">@{{errorsCv.image}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-light" for="Telephonne">Telephonne </label>

                                    <input v-model='Infos.telephonne' type="number" name="telephonne" id="Telephonne"
                                        class="form-control" placeholder="Telephonne">
                                    <p class="text-danger">@{{errorsInfo.telephonne}}</p>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-light" for="Adresse ">Adresse</label> </label>

                                    <textarea v-model='Infos.adresse' name="adresse" id="Adresse" cols="30" rows="2"
                                        class="form-control">

                                                </textarea>
                                    <p class="text-danger">@{{errorsInfo.adresse}}</p>
                                </div>
                            </div>


                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-light" for="DateNaissance ">Date Naissance </label>


                                    <input v-model='Infos.dateNaissance' type="date" name="dateNaissance" id="DateNaissance "
                                        class="form-control">
                                    <p class="text-danger">@{{errorsInfo.dateNaissance}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-light" for="Paye">Paye </label>


                                    <select v-on:change='getVilles()' class="form-control form-block" v-model="Infos.paye" name="Paye"
                                        id="Paye">


                                        <option v-for='paye in payes'> @{{paye.paye}} </option>

                                    </select>
                                    <p class="text-danger">@{{errorsInfo.paye}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-light" for="Ville ">Ville </label>

                                    <select v-model="Infos.ville" name="Ville" id="Ville " class="form-control" placeholder="Ville ">

                                        <option v-for='ville in villes'>@{{ville}}</option>
                                    </select> </div>
                                <p class="text-danger">@{{errorsInfo.ville}}</p>
                            </div>
                        </div>
                        <div class="row justify-content-center">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-light" for="titre">Titre du cv </label>
                                    <input v-model='Cv.titre' type="text" name="titre" id="titre" class="form-control"
                                        placeholder="titre">
                                    <p class="text-danger">@{{errorsCv.titre}}</p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="text-light" for="presentation">Presentation du cv </label>
                                    <textarea v-model='Cv.presentation' class="form-control" name="presentation" id="presentation"
                                        cols="30" rows="2"></textarea>
                                    <p class="text-danger">@{{errorsCv.presentation}}</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="niveau">Niveau scolaire</label>
                                    <select v-model='Cv.niveau' class=" form-control">
                                        <option>Bac </option>
                                        <option>Bac + 1</option>
                                        <option>Bac + 2</option>
                                        <option>Bac + 3</option>
                                        <option>Bac + 4</option>
                                        <option>Bac + 5</option>

                                    </select>
                                    <p class="text-danger">@{{errorsCv.niveau}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input @click.prevent='updateInfo(),updateCv()' type="submit" value="Modifier"
                                class="btn btn-block btn-w btn-sm ">
                        </div>


                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
    <div class="col-12 ">

    </div>

</div>
