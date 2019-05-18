@extends('pages.master')

@section('body')
<div class="row text-light bg-light">
    <div class="col-12">
        <div class="row">
            <div class="col-4 offset-4 text-center">
                <a data-toggle="modal" data-target="#theme" class="btn btn-d mt-1  text-danger btn-sm  text-dark">

                    <i class="fa fa-paint-brush" aria-hidden="true"></i>
                    Coisissez un thème


                </a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @include('pages.theme')
            </div>
        </div>

        <div class="row mt-1 mr-1">
            <div class="col-12 text-right">

                <a href="{{ url('cvTemplate/'.$idCv) }}" class="btn btn-danger btn-sm"><i class="fa fa-edit"></i> Editer
                </a>&nbsp;

                <a href="#" class="btn btn-info btn-sm" @click.prevent='editDownload(),printDiv()'><i
                        class="fa fa-download"></i> Télécharger</a>
            </div>
        </div>
        <div class="row  ml-1 mr-1">
            <div class="col-12 mt-1">

                <div class="mr-1 ml-1" v-if="show=='t1'">
                    @include('pages.showCv3')
                </div>
                <div class="mr-1 ml-1" v-if="show=='t2'">
                    @include('pages.showCv4')
                </div>
                <div class="mr-1 ml-1" v-if="show=='t3'">
                    @include('pages.showCv1')
                </div>
                <div class="mr-1 ml-1" v-if="show=='t4'">
                    @include('pages.showCv')
                </div>
                <div class="mr-1 ml-1" v-if="show=='t5'">
                    @include('pages.showCv2')
                </div>


            </div>
        </div>
        <div class="row bg-light " id="comment">
            <div class="col-12">
                @include('pages.comment')
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')
<script>
    var idcv =
        <?php echo json_encode($idCv) ?>;
        window.Laravel = <?php echo json_encode([
                    'csrfToken' => csrf_token(),
                ]); ?>

</script>

@endsection
