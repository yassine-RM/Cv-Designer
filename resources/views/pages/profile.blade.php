<!-- Modal -->
<div class="modal fade" id="profile">
    <div class="modal-dialog" style="max-width: 50% !important;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-user text-danger"></i> Mon profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 offset-3 text-center">
                            <img src="{{  asset('storage/'. Auth::user()->photo) }}" width="100" height="100"
                                class="rounded-circle" alt="">
                            <br>
                            <h3> {{ Auth::user()->civilite }} {{ Auth::user()->nom }} {{ Auth::user()->prenom }}</h3>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-6">

                            <p class="text-danger"> Date Naissance : <span class="text-warning">
                                    {{ Auth::user()->dateNaissance }}</span></p>
                            <p class="text-danger"> Adresse : <span class="text-warning">
                                    {{ Auth::user()->adresse }}</span>
                            </p>
                            <p class="text-danger"> Gmail : <span class="text-warning"> {{ Auth::user()->email }}</span>
                            </p>
                        </div>

                        <div class="col-6">
                            <p class="text-danger"> Téléphonne : <span
                                    class="text-warning">{{ Auth::user()->telephonne }}</span> </p>
                            <p class="text-danger"> Paye : <span class="text-warning">{{ Auth::user()->paye }}</span>
                            </p>
                            <p class="text-danger"> Ville : <span class="text-warning"> {{ Auth::user()->ville }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right ">
                            <a href="/getProfile" class="btn btn-warning btn-sm  ">
                                <i class="fa fa-edit    "></i> Modifier
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
