@extends('pages.auth.master')

@section('body')
<div class="row" id="app">

    <div class="col-8 offset-2 ">
        <div class="d-flex justify-content-end">
            <div class="card " id="card">
                <div class="card-header text-center text-light">
                    <h3>Inscrivez-vous sur CvDésigner</h3>
                    <p>les informations doivent etre correct !!!</p>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="text-light" for="civilite">Civilité <span
                                            class="etoil">*</span></label>

                                    <select value="{{old('Civilite')}}" name="Civilite" id="civilite"
                                        class="form-control">
                                        <option>M.</option>
                                        <option>Mme</option>
                                        <option>Mlle</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group ">
                                    <label class="text-light" for="Nom">Nom <span class="etoil">*</span></label>
                                    <input type="text" value="{{old('Nom')}}" name="Nom" id="Nom"
                                        class="form-control  @if($errors->get('Nom')) is-invalid @endif"
                                        placeholder="Nom">
                                    <div class="invalid-feedback " style="color:yellow"> @if ($errors->get('Nom'))
                                        @foreach ($errors->get('Nom') as $error) {{ $error }} @endforeach @endif</div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="text-light" for="Prenom">Prénom <span class="etoil">*</span></label>
                                    <input type="text" value="{{old('Prenom')}}" name="Prenom" id="Prenom"
                                        class="form-control @if($errors->get('Prenom')) is-invalid @endif"
                                        placeholder="Prenom">
                                    <div class="invalid-feedback " style="color:yellow"> @if ($errors->get('Prenom'))
                                        @foreach ($errors->get('Prenom') as $error) {{ $error }} @endforeach @endif
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-light" for="Telephonne">Telephonne <span
                                            class="etoil">*</span></label>

                                    <input type="number" value="{{old('Telephonne')}}" min="0" name="Telephonne"
                                        class="form-control @if($errors->get('Telephonne')) is-invalid @endif"
                                        placeholder="Telephonne">
                                    <div class="invalid-feedback " style="color:yellow">
                                        @if($errors->get('Telephonne')) @foreach ($errors->get('Telephonne') as $error)
                                        {{ $error }} @endforeach @endif</div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-light" for="Adresse ">Adresse</label> <span
                                        class="etoil">*</span></label>

                                    <textarea name="Adresse" id="Adresse" cols="30" rows="2"
                                        class="form-control @if($errors->get('Adresse')) is-invalid @endif">
                                        {{old('Adresse')}}
                                </textarea>
                                    <div class="invalid-feedback " style="color:yellow"> @if ($errors->get('Adresse'))
                                        @foreach ($errors->get('Adresse') as $error) {{ $error }} @endforeach @endif
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-light" for="DateNaissance ">Date Naissance <span
                                            class="etoil">*</span></label>

                                    <input type="date" value="{{old('DateNaissance')}}" name="DateNaissance"
                                        id="DateNaissance "
                                        class="form-control @if($errors->get('DateNaissance')) is-invalid @endif">
                                    <div class="invalid-feedback " style="color:yellow">
                                        @if ($errors->get('DateNaissance')) @foreach ($errors->get('DateNaissance') as
                                        $error) {{ $error }} @endforeach @endif</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-light" for="Paye">Paye <span class="etoil">*</span></label>

                                    <select v-on:change='getVilles()' value="{{old('Paye')}}" v-model='Infos.paye'
                                        class="form-control @if($errors->get('Paye')) is-invalid @endif form-block"
                                        name="Paye" id="Paye">
                                        @foreach ($data as $paye)

                                        <option>{{$paye['paye']}}</option>
                                        @endforeach

                                    </select>
                                    <div class="invalid-feedback " style="color:yellow"> @if ($errors->get('Paye'))
                                        @foreach ($errors->get('Paye') as $error) {{ $error }} @endforeach @endif</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-light" for="Ville ">Ville <span class="etoil">*</span></label>

                                    <select name="Ville" id="Ville " value="{{old('Vile')}}"
                                        class="form-control @if($errors->get('Ville')) is-invalid @endif"
                                        placeholder="Ville ">

                                        <option v-for='ville in villes'>@{{ville}}</option>
                                    </select>
                                    <div class="invalid-feedback " style="color:yellow"> @if ($errors->get('Ville'))
                                        @foreach ($errors->get('Ville') as $error) {{ $error }} @endforeach @endif</div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-light" for="Photo">Photo <span class="etoil">*</span></label>
                                    <input name="Photo" type="file" accept="image/*" id="file"
                                        class="form-control @if($errors->get('Photo')) is-invalid @endif"
                                        placeholder="Photo">
                                    <div class="invalid-feedback " style="color:yellow"> @if ($errors->get('Photo'))
                                        @foreach ($errors->get('Photo') as $error) {{ $error }} @endforeach @endif</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-light" for="Email">Email <span class="etoil">*</span></label>

                                    <input type="Email" value="{{old('Email')}}" name="Email" id="Email"
                                        class="form-control @if($errors->get('Email')) is-invalid @endif form-block"
                                        placeholder="Email">
                                    <div class="invalid-feedback " style="color:yellow"> @if ($errors->get('Email'))
                                        @foreach ($errors->get('Email') as $error) {{ $error }} @endforeach @endif</div>
                                </div>
                            </div>

                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-light" for="Password">Mot de passe <span
                                            class="etoil">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-eye" id="cursor" aria-hidden="true"
                                                    onclick="password()"></i>
                                            </div>
                                        </div>
                                        <input type="password" name="Password" id="myPasse"
                                            class="form-control @if($errors->get('Password')) is-invalid @endif"
                                            placeholder="Password" id="Password">
                                    </div>
                                    <div class="invalid-feedback " style="color:yellow"> @if ($errors->get('Password'))
                                        @foreach ($errors->get('Password') as $error) {{ $error }} @endforeach @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-light" for="Password_confirmation">Confirmer le mot de passe
                                        <span class="etoil">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-eye" id="cursor" aria-hidden="true"
                                                    onclick="passwordRepeat()"></i>
                                            </div>
                                        </div>
                                        <input type="password" name="Password_confirmation" id="myPasseRepeat"
                                            class="form-control @if($errors->get('Password_confirmation')) is-invalid @endif"
                                            placeholder="password confirmation" id="Password_confirmation">
                                    </div>
                                    <div class="invalid-feedback " style="color:yellow">
                                        @if($errors->get('Password_confirmation'))
                                        @foreach($errors->get('Password_confirmation') as $error)
                                        {{ $error }}
                                        @endforeach
                                        @endif</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Crée compte" class="btn btn-block btn-w btn-sm">
                        </div>
                        <div class="form-group">
                            <a class="btn btn-info btn-sm " href="/login"><span class="fa fa-arrow-left "></span>
                                S'identifier</a>
                        </div>

                    </form>
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
    function passwordRepeat(){

    var passe=document.getElementById('myPasseRepeat');

    if (passe.type==="password") {
        passe.type="text"
    }
    else
    passe.type="password"

}
</script>
@endsection



































































































































































</html>
