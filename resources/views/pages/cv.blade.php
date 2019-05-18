<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-6 offset-3">
                <button data-toggle="modal" data-target="#cvModal"  class="btn btn-d btn-block mt-3 ">
                    <h3> Démmarer votre cv gratuitement </h3>

                    </button>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6">
                <!-- Modal -->
                <div class="modal fade" id="cvModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" style="max-width: 60% " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="cvModalLabel"><i class="fa fa-pencil-square-o text-danger"></i> Création d'un cv</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body " >
                              <form >
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="titre">Titre</label>
                                            <input name="titre" type="text" class="form-control " v-model="Cv.titre">
                                            <p class="text-danger">@{{errorsCv.titre}}</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="niveau">Niveau scolaire</label>
                                            <select v-model='Cv.niveau' name="niveau" class=" form-control">
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
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="presentation">Présentation</label>
                                            <textarea name="presentation" v-model="Cv.presentation" class="form-control" name="presentation"
                                                id="presentation" cols="30" rows="4"></textarea>

                                            <p class="text-danger">@{{errorsCv.presentation}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="photo">photo</label>
                                            <input name="image" @change="previewFiles" type="file" accept="image/*" name="image" id="photo"
                                                class="form-control">
                                            <p class="text-danger">@{{errorsCv.image}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button @click.prevent='addCv(Cv)' type="submit" class="btn btn-s btn-block">
                                        Créer
                                    </button>
                                </div>

                            </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
