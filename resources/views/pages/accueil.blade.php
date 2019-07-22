@extends('pages.master')

@section('body')
<div class="row mr-1 mt-5">
    <div class="col-12 ">
        <div class="row mt-1">
            <div class="col-12">
                <div id="carouselId" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselId" data-slide-to="1"></li>
                        <li data-target="#carouselId" data-slide-to="2"></li>

                    </ol>
                    <div class="carousel-inner " role="listbox">

                        <div class="carousel-item active text-center">
                            <img class="img-fluid m-auto w-100 h-100" src="{{ asset('images/slide4.jpg') }}"
                                alt="Second slide">

                        </div>
                        <div class="carousel-item  text-center">
                            <img class="img-fluid m-auto w-100 h-100" src="{{ asset('images/slide3.jpg') }}"
                                alt="Second slide">

                        </div>
                        <div class="carousel-item  text-center">
                            <img class="img-fluid m-auto w-100 h-100" src="{{ asset('images/slide5.jpg') }}"
                                alt="Second slide">

                        </div>
                        <div class="row " style="margin-top: 20%">
                            <div class="col-6 offset-3">
                                <a class="btn btn-d btn-block btn-sm" href="/storeCv">
                                    <h3>démarrer votre cv online et gatuitement</h3>
                                </a>
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
            <div class="col-4 text-center mt-5">
                <h2 class="text-danger mt-5">CvDésigner ???</h2>
                <p class="text-justify">

                    CvDésigner est une service qui ne permet de céer des cv professionnelle pour attirer l'attention des
                    recruteurs et pour obtenir les
                    opportunités facilement et gratuitement...
                    pour plusieur informations n'hésitez pas de nous contacter <a href="mailto:remmanidev@gmail.com">
                        <i class="fa fa-envelope" aria-hidden="true"></i> </a> .
                    la video suivant qui montré comment crée un cv <h1><i class="fa fa-arrow-circle-o-right "
                            aria-hidden="true"></i></h1>
                    </span>

                </p>
            </div>
            <div class="col-8  text-center " id="commentMarche">
                <h2 class="text-dark"
                    style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                    Comment crée un cv gratuitement sur CvDésigner ???</h2>

                <iframe width="800" height="400" src="https://www.youtube.com/embed/ZXFZ6vqOuG8" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>



        @endsection
