<div class="row">
    <div class="col-12">
        <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 50% !important" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModal"><i class="fa fa-graduation-cap text-danger"
                                aria-hidden="true"></i> Formation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">

                                        <label for="Formation">Formation</label>
                                        <input v-model="Forms.titre" id="Formation" name="titre" type="text"
                                            class="form-control form-control-sm">
                                        <p class="text-danger">@{{errorsForm.titre}}</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">

                                        <label for="Etablissement">Etablissement</label>
                                        <input v-model="Forms.etablissement" id="Etablissement" name="etablissement"
                                            type="text" class="form-control form-control-sm">
                                        <p class="text-danger">@{{errorsForm.etablissement}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="Description">Description</label>
                                        <textarea v-model="Forms.description" class="form-control form-control-sm"
                                            name="description" id="Description" cols="30" rows="2"></textarea>
                                        <p class="text-danger">@{{errorsForm.description}}</p>
                                    </div>
                                </div>
                                <div class="col-4">

                                    <div class="form-group">
                                        <label for="DateDebut">Date Debut</label>
                                        <input v-model="Forms.dateDebut" type="date" name="dateDebut" id="dateDebut"
                                            class="form-control form-control-sm">
                                        <p class="text-danger">@{{errorsForm.dateDebut}}</p>
                                    </div>
                                </div>
                                <div class="col-4">

                                    <div class="form-group">
                                        <label for="DateFin">Date Fin</label>
                                        <input v-model="Forms.dateFin" :min="dateForm()" type="date" name="dateFin"
                                            id="dateFin" class="form-control form-control-sm">
                                        <p class="text-danger">@{{errorsForm.dateFin}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <button v-if='button' @click.prevent='addFormation' type="submit"
                                            class="btn btn-s btn-block btn-sm"><i class="fa fa-plus"></i>
                                            Ajouter</button>
                                        <button v-else @click.prevent="updateFormation(Forms)" type="submit"
                                            class="btn btn-w btn-block btn-sm"><i class="fa fa-edit"></i>
                                            Modifier</button> </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
