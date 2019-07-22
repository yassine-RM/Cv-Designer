<div class="row">
    <div class="col-12">


        <!-- Modal -->
        <div class="modal fade" id="expModal" tabindex="-1" role="dialog" aria-labelledby="expModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 60% !important" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="expModal"><i class="fa fa-suitcase text-danger"
                                aria-hidden="true"></i> Experience</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-3 ">
                                    <div class="form-group">

                                        <label for="titre">Titre</label>
                                        <input v-model='Exps.titre' type="text" name="titre" id="titre"
                                            class="form-control form-control-sm">
                                        <p class="text-danger">@{{errorsExp.titre}}</p>
                                    </div>
                                </div>
                                <div class="col-6 ">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea v-model='Exps.description' class="form-control form-control-sm"
                                            name="description" id="description" cols="30" rows="2"></textarea>
                                        <p class="text-danger">@{{errorsExp.description}}</p>
                                    </div>
                                </div>
                                <div class="col-3 ">
                                    <div class="form-group">

                                        <label for="entreprise">Entreprise</label>
                                        <input v-model='Exps.entreprise' type="text" name="entreprise" id="entreprise"
                                            class="form-control form-control-sm">
                                        <p class="text-danger">@{{errorsExp.entreprise}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-12 ">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">

                                                <label for="logo">logo </label>
                                                <input @change="previewFilesExp" type="file" name="logo" id="logo"
                                                    class=" input-file form-control form-control-sm" accept="image/*">
                                                <p class="text-danger">@{{errorsExp.logo}}</p>
                                            </div>
                                        </div>

                                        <div class="col-4">

                                            <div class="form-group">
                                                <label for="dateDebut">Date Debut</label>
                                                <input v-model='Exps.dateDebut' type="date" name="dateDebut"
                                                    id="dateDebut" class="form-control form-control-sm">
                                                <p class="text-danger">@{{errorsExp.dateDebut}}</p>
                                            </div>
                                        </div>
                                        <div class="col-4">

                                            <div class="form-group">
                                                <label for="dateFin">Date Fin</label>
                                                <input v-model='Exps.dateFin' :min="dateExp()" type="date"
                                                    name="dateFin" id="dateFin" class="form-control form-control-sm">
                                                <p class="text-danger">@{{errorsExp.dateFin}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 ">
                                    <div class="form-group">
                                        <button v-if='button' @click.prevent='addExperience' type="submit"
                                            class="btn btn-s btn-block btn-sm"><i class="fa fa-plus"></i>
                                            Ajouter</button>
                                        <button v-else @click.prevent="updateExperience(Exps)" type="submit"
                                            class="btn btn-w btn-block btn-sm"><i class="fa fa-edit"></i>
                                            Modifier</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
