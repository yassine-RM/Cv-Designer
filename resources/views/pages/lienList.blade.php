<div class="row">
    <div class="col-12">

        <!-- Modal -->
        <div class="modal fade" id="lienList" tabindex="-1" role="dialog" aria-labelledby="linkModal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 50%" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="linkModal"><i class="fa fa-link text-danger"></i> Mes
                            liens</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div style="background-color: cornsilk">
                        <div class="mt-5 mb-5 ml-2">
                            <div v-if='!Liens.length' class="text-center">
                                <h5 class="text-danger">Aucun lien existe !!!</h5>
                            </div>
                            <div v-else class="row" v-for='lien in Liens'>
                                <div class="col-5">
                                    <a :href="lien.url">
                                        <i class="fa fa-google-plus text-danger" v-if='lien.service=="Google"'></i>
                                        <i class="fa fa-facebook text-danger" v-if='lien.service=="Facebook"'></i>
                                        <i class="fa fa-twitter text-danger" v-if='lien.service=="Twitter"'></i>
                                        <i class="fa fa-youtube-play text-danger" v-if='lien.service=="Youtube"'></i>
                                        <i class="fa fa-linkedin text-danger" v-if='lien.service=="Linkedin"'></i>
                                        <i class="fa fa-github text-danger" v-if='lien.service=="GitHub"'></i>
                                        <i class="fa fa-link text-danger" v-if='lien.service=="Autres"'></i>
                                        <i class="fa fa-instagram text-danger" v-if='lien.service=="Instagram"'></i>
                                        <i class="fa fa-stack-overflow text-danger"
                                            v-if='lien.service=="StackOverFlow"'></i>

                                        @{{ lien.service }}
                                    </a>
                                </div>
                                <div class="col-7">
                                    <a :href="lien.url">@{{ lien.url.substring(0,50) }}...</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
