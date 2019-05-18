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
    <div class="col-4 mt-1">
        <div class="card h-75 img-fluid" style="width: 25rem;">
            <img class="card-img-top h-50" src="{{ asset($cv->photo) }}" alt="Card image cap">
            <div id="card-body-body" class="h-25 card-body text-light">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col">

                                <h5 class="card-title text-center text-warning">
                                    <p class="card-text">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</p>
                                    <h3>{{ $cv->titre }}</h3>
                                </h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="card-text">{{  str_limit($cv->presentation,45)}}</p>
                                <p class="card-text text-success">

                                    Date de creation : {{  $cv->created_at}}

                                </p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col text-success">

                                Download <i class="fa fa-download"></i> <span
                                    class="badge badge-light">{{ $cv->download }}</span>


                            </div>
                            <div class="col ">
                                <a href="{{ url('/showCv/'.$cv->id) }}" class="text-warning">
                                    Comments <i class="fa fa-comment"></i> <span
                                        class="badge badge-light">{{ $cv->comments->count() }}</span>

                                </a>
                            </div>
                        </div>
                        <div class="row mt-3">

                            <div class="col text-center ">
                                <a @click="visite({{ $cv->id}})" href="{{ url('/showCv/'.$cv->id ) }}">
                                    <button class="btn btn-primary">


                                        <i style="font-size:130%" class="fa fa-eye"> </i>
                                        <span class="badge badge-light">{{ $cv->visite }}

                                        </span>
                                    </button>
                                </a>
                            </div>
                            @if (Auth::user()->id==$cv->user->id)
                            <div class="col text-center ">
                                <a href="{{ url('cvTemplate/'.$cv->id) }}">
                                    <button class="btn btn-warning">
                                        <i style="font-size:130%" class="fa fa-edit"> </i>

                                    </button>
                                </a>
                            </div>
                            <div class="col text-center">
                                <button @click.prevent="deleteCv({{ $cv->id}})" class="btn btn-danger">
                                    <i style="font-size:130%" class="fa fa-trash"> </i>
                                </button>

                            </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
<div class="row  mb-5">


    <div class="mb-5 pagination col-2 offset-5 ">
        {{ $cvs->links() }}
    </div>

</div>
@endsection
