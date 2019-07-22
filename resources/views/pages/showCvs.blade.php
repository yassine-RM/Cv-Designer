@extends('pages.master')

@section('body')

@if (!count($cvs))

<div class="row mt-5">
    <div class="col-6 offset-3">

        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <h2>Auccun cv trouvé !!! </h2> <a href="/"> crée un cv gratuitement ??</a>
        </div>

    </div>
</div>
@else
<div class="row m-auto">
    @foreach ($cvs as $cv)
    <div class="col-md-4 col-sm-12  mt-2">
        <div class="card img-fluid" style="width: 25rem;">
            <img class="card-img-top h-50" src="{{ asset($cv->photo) }}" alt="Card image cap">
            <div class="h-25 card-body text-light">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col">

                                <h5 class="card-title ">
                                    <h3 class="card-text text-center text-warning "
                                        style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
                                        {{ Auth::user()->civilite }} {{ Auth::user()->nom }} {{ Auth::user()->prenom }}
                                    </h3>
                                    <h4 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
                                        {{ $cv->titre }}</h4>
                                </h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="card-text">{{  str_limit($cv->presentation,45)}}</p>
                                <p class="card-text ">

                                    <i class="text-warning">Date de creation :</i> {{  $cv->created_at}}

                                </p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col text-warning">

                                Télechargements <i class="fa fa-download"></i> <span
                                    class="badge badge-light">{{ $cv->download }}</span>


                            </div>
                            <div class="col ">
                                <a href="{{ url('/showCv/'.$cv->id.'#comment') }}" class="text-warning">
                                    Commentaires <i class="fa fa-comment"></i> <span
                                        class="badge badge-light">{{ $cv->comments->count() }}</span>

                                </a>
                            </div>


                        </div>
                        <div class="row mt-3">
                            <div class="col">

                                <p class="card-text text-center ">

                                    <a @click.prevent='lienList({{ $cv->id }})' class="btn btn-success btn-sm "
                                        id="cursor" data-toggle="modal" data-target="#lienList">
                                        <i class="fa fa-link"></i></a>

                                </p>
                            </div>
                            <div class="col text-center ">
                                <a @click="visite({{ $cv->id}})" href="{{ url('/showCv/'.$cv->id ) }}">
                                    <button class="btn-sm btn btn-primary">


                                        <i style="font-size:130%" class="fa fa-eye"> </i>
                                        <span class="badge badge-light">{{ $cv->visite }}

                                        </span>
                                    </button>
                                </a>
                            </div>

                            <div class="col text-center ">
                                <a href="{{ url('cvTemplate/'.$cv->id) }}">
                                    <button class="btn-sm btn btn-warning">
                                        <i style="font-size:130%" class="fa fa-edit"> </i>

                                    </button>
                                </a>
                            </div>
                            <div class="col text-center">
                                <button @click.prevent="deleteCv({{ $cv->id}})" class="btn-sm btn btn-danger">
                                    <i style="font-size:130%" class="fa fa-trash"> </i>
                                </button>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
@include('pages.lienList')
<div class="row mt-5">
    <div class="col-6">
        <!-- Modal -->
        <div class="modal fade" id="cvModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" style="max-width: 60% " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cvModalLabel"><i class="fa fa-pencil-square-o text-danger"></i>
                            Création d'un cv</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        <form>
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
                                        <textarea name="presentation" v-model="Cv.presentation" class="form-control"
                                            name="presentation" id="presentation" cols="30" rows="4"></textarea>

                                        <p class="text-danger">@{{errorsCv.presentation}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="photo">photo</label>
                                        <input name="image" @change="previewFiles()" type="file" accept="image/*"
                                            name="image" id="photo" class="form-control">
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
<div class="row  mt-1">


    <div class=" pagination col-2 offset-5 ">
        {{ $cvs->links() }}
    </div>

</div>
@endsection
