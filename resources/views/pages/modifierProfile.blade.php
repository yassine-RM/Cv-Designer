@extends('pages.master')
@section('body')
<script>
    function passe(){

    var passe=document.getElementById('myPasse');

    if (passe.type==="password") {
        passe.type="text"
    }
    else
    passe.type="password"

}
</script>
<div class="row mb-5 mt-5">
    <div class="col-8 offset-2 modal-body">
        @if (session()->get('profileSuccess'))

        <div class="row">
            <div class="col-8 offset-2">

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Ok</strong> {{ session()->get('profileSuccess') }}.
                </div>
            </div>
        </div>

        @endif
        <div class="row mt-2">
            <div class="col">
                <h3 class="text-center"><i class="fa fa-user text-warning" aria-hidden="true"></i>
                    Editer mon profile</h3>
                <form method="post" action="{{ url('updateProfile') }}" enctype="multipart/form-data" class="mt-5">
                    @csrf
                    <input name="_method" type="hidden" value="PUT">
                    <div class="row justify-content-center">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="civilite">Civilité </label>

                                <select value="{{ Auth::user()->civilite }}" name="civilite" id="civilite"
                                    class="form-control">
                                    <option>M.</option>
                                    <option>Mme</option>
                                    <option>Mlle</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group ">
                                <label for="Nom">Nom </label>
                                <input type="text" value="{{ Auth::user()->nom }}" name="nom" id="Nom"
                                    class="form-control  @if($errors->get('nom')) is-invalid @endif" placeholder="Nom">
                                <div class="invalid-feedback text-warning "> @if ($errors->get('nom'))
                                    @foreach ($errors->get('nom') as $error) {{ $error }} @endforeach @endif</div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="Prenom">Prénom </label>
                                <input type="text" value="{{ Auth::user()->prenom }}" name="prenom" id="Prenom"
                                    class="form-control @if($errors->get('prenom')) is-invalid @endif"
                                    placeholder="Prenom">
                                <div class="invalid-feedback text-warning "> @if ($errors->get('prenom'))
                                    @foreach ($errors->get('prenom') as $error) {{ $error }} @endforeach @endif
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Telephonne">Telephonne </label>

                                <input type="number" value="{{ Auth::user()->telephonne }}" min="0" name="telephonne"
                                    class="form-control @if($errors->get('telephonne')) is-invalid @endif"
                                    placeholder="Telephonne">
                                <div class="invalid-feedback text-warning ">
                                    @if($errors->get('telephonne')) @foreach ($errors->get('telephonne') as $error)
                                    {{ $error }} @endforeach @endif</div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Adresse ">Adresse</label> </label>

                                <textarea name="adresse" id="Adresse" cols="30" rows="2"
                                    class="form-control @if($errors->get('adresse')) is-invalid @endif">
                                                               {{ Auth::user()->adresse }}
                                                        </textarea>
                                <div class="invalid-feedback text-warning "> @if ($errors->get('adresse'))
                                    @foreach ($errors->get('adresse') as $error) {{ $error }} @endforeach @endif
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="DateNaissance ">Date Naissance </label>

                                <input type="date" value="{{ Auth::user()->dateNaissance }}" name="dateNaissance"
                                    id="DateNaissance "
                                    class="form-control @if($errors->get('dateNaissance')) is-invalid @endif">
                                <div class="invalid-feedback text-warning ">
                                    @if ($errors->get('dateNaissance')) @foreach ($errors->get('dateNaissance') as
                                    $error) {{ $error }} @endforeach @endif</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="paye">Paye </label>

                                <select v-on:change='Villes()' value="{{ Auth::user()->paye }}" v-model='paye'
                                    class="form-control @if($errors->get('paye')) is-invalid @endif form-block"
                                    name="paye" id="Paye">
                                    @foreach ($data as $paye)

                                    <option>{{$paye['paye']}}</option>
                                    @endforeach

                                </select>
                                <div class="invalid-feedback text-warning "> @if ($errors->get('paye'))
                                    @foreach ($errors->get('paye') as $error) {{ $error }} @endforeach @endif</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Ville ">Ville </label>

                                <select name="ville" id="Ville "
                                    class="form-control @if($errors->get('ville')) is-invalid @endif"
                                    placeholder="Ville ">

                                    <option v-for='ville in villes'>@{{ville}}</option>
                                </select>
                                <div class="invalid-feedback text-warning "> @if ($errors->get('ville'))
                                    @foreach ($errors->get('ville') as $error) {{ $error }} @endforeach @endif</div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Photo">Photo </label>
                                <input name="photo" type="file" accept="image/*" id="file"
                                    class="form-control @if($errors->get('photo')) is-invalid @endif"
                                    placeholder="Photo">
                                <div class="invalid-feedback text-warning "> @if ($errors->get('photo'))
                                    @foreach ($errors->get('photo') as $error) {{ $error }} @endforeach @endif</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Email">Email </label>

                                <input type="Email" value="{{ Auth::user()->email }}" name="email" id="Email"
                                    class="form-control @if($errors->get('email')) is-invalid @endif form-block"
                                    placeholder="Email">
                                <div class="invalid-feedback text-warning "> @if ($errors->get('email'))
                                    @foreach ($errors->get('email') as $error) {{ $error }} @endforeach @endif</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Password">Mot de passe </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-eye" id="cursor" aria-hidden="true" onclick="passe()"></i>
                                        </div>
                                    </div>
                                    <input type="password" name="password" id="myPasse"
                                        class="form-control @if($errors->get('password')) is-invalid @endif"
                                        placeholder="Password">
                                </div>
                                <div class="invalid-feedback text-warning "> @if ($errors->get('password'))
                                    @foreach ($errors->get('password') as $error) {{ $error }} @endforeach @endif
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="form-group">
                        <button class="btn btn-block btn-w btn-sm">
                            <i class="fa fa-edit    "></i>
                            Modifier
                        </button>
                    </div>


                </form>

            </div>
        </div>
    </div>
</div>

@endsection
