@extends('pages.master')

@section('body')
<div class="row mr-1">
    <div class="col-12 ">
        <div class="row mt-1">
            <div class="col-12">
                <div id="carouselId" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselId" data-slide-to="1"></li>

                    </ol>
                    <div class="carousel-inner " role="listbox">

                        <div class="carousel-item active text-center">
                            <img class="img-fluid m-auto w-100 h-100" src="{{ asset('images/slide3.jpg') }}"
                                alt="Second slide">

                        </div>
                        <div class="carousel-item  text-center">
                            <img class="img-fluid m-auto w-100 h-100" src="{{ asset('images/slide4.jpg') }}"
                                alt="Second slide">

                        </div>
                        <div class="row " style="margin-top: 20%">
                            <div class="col-12">
                                @include('pages.cv')
                            </div>
                        </div>


                    </div>
                    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-5 mb-5 ">
            <div class="col-4  text-center " id="commentMarche">

            </div>
            <div class="col-8  text-center " id="commentMarche">
                <h2 class="text-light"
                    style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                    Comment crée un cv gratuitement sur CvDésigner ???</h2>

                <video width="800" height="500" controls autoplay>
                    <source src="{{ asset('video/v.mp4') }}" type="video/mp4">

                </video>
            </div>
        </div>



        @endsection
