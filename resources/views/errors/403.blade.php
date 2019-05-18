@extends('pages.master')

@section('title')
error
@endsection

@section('body')
<div class="row">
    <div class="col-6 offset-3">
        <div class=" mt-5 alert alert-danger" role="alert">
            <strong>Error !!!</strong> cette page n'est pas authorisé <a href="/mesCvs" class="alert-link">reteur</a>
        </div>
    </div>
</div>
@endsection
