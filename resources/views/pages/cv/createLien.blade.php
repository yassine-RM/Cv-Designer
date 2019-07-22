<div class="row">
    <div class="col-12">

        <!-- Modal -->
        <div class="modal fade" id="linkModal" tabindex="-1" role="dialog" aria-labelledby="linkModal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="linkModal"><i class="fa fa-link text-danger"></i> Lien</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/cvTemplate')}}" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">

                                        <label for="service">Service </label>

                                        <select v-model='Lien.service' class="form-control form-control-sm">
                                            <option>Google</option>
                                            <option>Facebook</option>
                                            <option>Instagram</option>
                                            <option>Twitter</option>
                                            <option>Linkedin</option>
                                            <option>GitHub</option>
                                            <option>StackOverFlow</option>
                                            <option>Youtube</option>
                                            <option>Autres</option>
                                        </select>
                                        <p class="text-danger">@{{errorsLien.service}}</p>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="url">Url</label>
                                        <input v-model='Lien.url' type="url" class="form-control form-control-sm">
                                        <p class="text-danger">@{{errorsLien.url}}</p>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <button v-if='button' @click.prevent='addLien' type="submit"
                                            class="btn btn-s btn-block btn-sm"><i class="fa fa-plus"></i>
                                            Ajouter</button>
                                        <button v-else @click.prevent="updateLien(Lien)" type="submit"
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
