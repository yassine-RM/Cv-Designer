<div class="row">
    <div class="col-12">
<div class="modal fade" id="loisModal" tabindex="-1" role="dialog" aria-labelledby="loisModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loisModal"><i class="fa fa-paper-plane text-danger" aria-hidden="true"></i> Loisire</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form action="{{url('/cvTemplate')}}" method="POST" enctype="multipart/form-data" >
                        <div class="form-group">

                            <label for="loisire">Loisir </label>
                            <input v-model='Lois.titre' name="loisire" id="loisir" type="text" class="form-control form-control-sm">
                            <p class="text-danger">@{{errorsLois.titre}}</p>
                        </div>

                        <div class="form-group">
                            <button v-if='button' @click.prevent='addLoisire' type="submit" class="btn btn-s btn-block btn-sm"><i
                                    class="fa fa-plus"></i> Ajouter</button>
                            <button v-else @click.prevent="updateLoisire(Lois)" type="submit" class="btn btn-w btn-block btn-sm"><i
                                    class="fa fa-edit"></i> Modifier</button>
                        </div>

                    </form>
            </div>

        </div>
    </div>
</div>

    </div>
</div>
