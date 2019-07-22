@extends('pages.auth.master')


@section('body')
<div class="row">
    <div class="col-6 text-center mt-5">

        <img src="{{asset('images/cv-logo.png')}}" class=" h-75 w-50" alt="cv-logo">

    </div>
    <div class="col-6 text-light mt-5">
        <div class=" ">
            <div class="card">
                @if(session()->get('errorLogin'))
                <div class="alert alert-dark alert-dismissible fade show text-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Attention !!!</strong> {{session()->get('errorLogin')}}
                </div>
                @endif
                <div class="card-header text-center text-light">
                    <h3>Connexion par e-mail</h3>
                </div>
                <div class="text-center">

                    <img class="card-img-top" style="width: 50%" src="{{asset('images/user.png')}}" alt="user">
                </div>

                <div class="card-body">
                    <form method="POST">
                        @csrf
                        <div class="row ">
                            <div class="col col-md-6 ">
                                <div class=" form-group ">
                                    <label for="email">Email</label>
                                    <input type="email" name="Email" class="form-control " placeholder="E-mail "
                                        required>
                                </div>
                            </div>
                            <div class="col col-md-6 ">
                                <div class="form-group ">
                                    <label for="password">Mot de passe</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-eye" id="cursor" aria-hidden="true"
                                                    onclick="password()"></i>
                                            </div>
                                        </div>
                                        <input type="password" name="Password" id="myPasse" class="form-control "
                                            placeholder="Mot de passe " required>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <button class="btn btn-block btn-w btn-sm  ">Connexion</button>
                        </div>

                    </form>
                    <div class="row">
                        <div class=" col col-md-12 ">
                            <div class="d-flex justify-content-end links ">
                                <a href="/register " class="text-light ">Pas encore de compte ? </a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<script>
    function password(){
    var passe=document.getElementById('myPasse');
    if (passe.type==="password") {
        passe.type="text"
    }
    else
    passe.type="password"

}
</script>
@endsection

</html>
