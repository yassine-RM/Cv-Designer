@extends('pages.master')

@section('body')
<div class="row mt-3">
    <div class="col-8 offset-2">
        <h3 class="bg-light text-center">Les Commentes</h3>
        <table class="table table-striped">

            <tbody>
                @foreach ($comments as $comment)
                <tr>
                    <td>
                        <img src="{{ asset('storage/'.$comment->photo) }}" alt="" height="50" width="50"
                            class="rounded-circle">
                    </td>
                    <td>
                        {{ $comment->nom }} {{ $comment->prenom }}
                    </td>

                    <td>{{ $comment->commentaire }}</td>
                    <td>{{ $comment->created_at }}</td>
                    <td><a href="{{ url('/showCv/'.$comment->cv_id) }}">
                            @if ($comment->state==1)
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            @else
                            <i @click.prevent="editState({{ $comment->cv_id }})" class="fa fa-eye-slash"
                                aria-hidden="true"></i>
                            @endif
                        </a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="row  mb-5">


    <div class="mb-5 pagination col-2 offset-5 ">
        {{ $comments->links() }}
    </div>

</div>
@endsection
