<div class="row">
    <div class="col-12">

<!-- Modal -->
<div class="modal fade" id="compModal" tabindex="-1" role="dialog" aria-labelledby="compModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="compModal"><i class="fa fa-id-card text-danger" aria-hidden="true"></i> Competence</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="Description">Competence</label>
                                <input required="" type="text" class="form-control form-control-sm" name="competence"
                                    v-model='Comps.competence'>
                                <p class="text-danger">@{{errorsComp.competence}}</p>
                            </div>

                        </div>
                        <div class="col-6">

                            <div class="form-group">
                                <label for="Description">Pourcentage</label>
                                <input min="0" max="100" required="" type="number" class="form-control form-control-sm"
                                    name="pourcentage" v-model='Comps.pourcentage'>
                                <p class="text-danger">@{{errorsComp.pourcentage}}</p>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <button v-if='button' @click.prevent='addCompetence' type="submit" class="btn btn-s btn-block btn-sm"><i
                                        class="fa fa-plus"></i> Ajouter</button>
                                <button v-else @click.prevent="updateCompetence(Comps)" type="submit"
                                    class="btn btn-w btn-block btn-sm"><i class="fa fa-edit"></i> Modifier</button>
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
