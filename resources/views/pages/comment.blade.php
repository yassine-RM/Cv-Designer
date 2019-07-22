<div class="row">
    <div class="col-10 offset-1 text-center">

        <h5 class="bg-success mt-2"> <i class="fa fa-comment-o text-danger"></i> liste des
            commentaires
        </h5>

    </div>
</div>
<div class="row">
    <div class="col-10 offset-1 text-right">
        <button class="btn btn-d mt-3 btn-sm " data-target='#commentaire' data-toggle="modal">
            <i class="fa fa-plus text-dark"></i> Ajouter un
            commentaire

        </button>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="commentaire" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-comment-o  text-danger"
                        aria-hidden="true"></i>
                    Commentaire</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="row">
                    <div class="col">
                        <form method="POST">
                            <label for="comment"> Commentaire</label>
                            <textarea class="form-control" name="commentaire" v-model='coments.commentaire' cols="30"
                                rows="3"></textarea>
                            <p class="text-danger">
                                @{{errorsComment.commentaire}}</p>
                            <button v-if='addCmt' @click.prevent='addComment(),showAllComments=true'
                                class="btn-s btn-block mt-1">Commenter</button>
                            <button v-else @click.prevent='editComment()' class="btn-w btn-block mt-1">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="row  mt-2">
    <div class="col-10 offset-1 text-center" v-if='Comments.length'>

        <table class="table borderless  ">
            <thead>
                <tr class="text-danger">
                    <th>Utiisateur</th>
                    <th>Commentaire</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for='comment in Comments'>
                    <td>
                        <div class="text-center">
                            <img :src="'/storage/'+comment.photo" alt="cc" width="50" height="50"
                                class="rounded-circle">
                        </div>
                        <div class="text-center">
                            @{{ comment.nom }} @{{ comment.prenom }}
                        </div>
                    </td>

                    <td>@{{ comment.commentaire }}</td>
                    <td>@{{ comment.created_at }}</td>

                    <td class="text-right">
                        <div v-if='comment.cvsUserId==comment.user_id && comment.user_id=={{ Auth::user()->id }}'>
                            <a id="cursor" data-target="#commentaire" data-toggle="modal"
                                @click.prevent='CommentOpen(comment.idcmt,comment)' class="text-success"><i
                                    class="fa fa-edit"></i></a>
                            <a href="" @click.prevent='deleteComment(comment.idcmt)' class="text-danger"><i
                                    class="fa fa-trash"></i></a>
                        </div>

                        <div v-if='comment.cvsUserId!=comment.user_id && comment.user_id=={{ Auth::user()->id }}'>

                            <a id="cursor" data-target="#commentaire" data-toggle="modal"
                                @click.prevent='CommentOpen(comment.idcmt,comment)' class="text-success"><i
                                    class="fa fa-edit"></i></a>
                            <a href="" @click.prevent='deleteComment(comment.idcmt)' class="text-danger"><i
                                    class="fa fa-trash"></i></a>
                        </div>
                        <div v-if='comment.cvsUserId!=comment.user_id && comment.user_id!={{ Auth::user()->id }}'>

                            <a href="" @click.prevent='deleteComment(comment.idcmt)' class="text-danger"><i
                                    class="fa fa-trash"></i></a>
                        </div>
                    </td>



                </tr>

            </tbody>
        </table>

    </div>

</div>
<div class="row">
    <div class="col-6 offset-3">

    </div>
</div>
