<div class="row">
    <div class="col-12">

<!-- Modal -->
<div class="modal fade" id="langModal" tabindex="-1" role="dialog" aria-labelledby="langModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="langModal"><i class="fa fa-language text-danger"></i> Langue</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form action="{{url('/cvTemplate')}}" method="POST" enctype="multipart/form-data" >
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">

                            <label for="langue">langue </label>

                            <input v-model='Langs.langue' name="langue" id="langue" type="text"
                                class="form-control form-control-sm">
                            <p class="text-danger">@{{errorsLang.langue}}</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="pourcentage">Pourcentage</label>
                            <input v-model='Langs.pourcentage' max="100" min="0" name="pourcentage" id="pourcentage" type="number"
                                class="form-control form-control-sm">
                            <p class="text-danger">@{{errorsLang.pourcentage}}</p>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <button v-if='button' @click.prevent='addLangue' type="submit" class="btn btn-s btn-block btn-sm"><i
                                    class="fa fa-plus"></i> Ajouter</button>
                            <button v-else @click.prevent="updateLangue(Langs)" type="submit" class="btn btn-w btn-block btn-sm"><i
                                    class="fa fa-edit"></i> Modifier</button> </div>
                    </div>
                </div>
            </form>
            </div>

        </div>
    </div>
</div>

    </div>
</div>
