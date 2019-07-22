<!-- Modal -->
<div class="modal fade" id="notif">
    <div class="modal-dialog" style="max-width: 50% !important;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark"><i class="fa fa-bell text-danger"></i> liste des notifications</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="text-dark" style="background-color: cornsilk">
                <div class="container-fluid">
                    <div class="row mt-5 mb-5 " v-if='!NotifList.length'>
                        <div class="col-12 text-center">
                            Aucun notifications existe !!!</div>
                    </div>
                    <div class="row mt-1 mb-1" v-for='notif in NotifList'>
                        <div class="col-2  text-center">
                            <img :src="'/storage/'+notif.photo" width="40" height="40" class="rounded-circle" alt="">

                        </div>
                        <div class="col-7  text-center">
                            <p>@{{ notif.civilite }} @{{ notif.nom }} @{{ notif.prenom }} a créer
                                le cv de titre @{{ notif.titre }}</p>
                        </div>
                        <div class="col-2  text-center">
                            <p> @{{ notif.created_at }}</p>
                        </div>
                        <div class="col-1  text-center">
                            <a @click='EditState(notif.id)' :href="'/showCv/' +notif.id">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
