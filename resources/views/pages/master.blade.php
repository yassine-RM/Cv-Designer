<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{!! asset('images/cvico.png') !!}" />
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>


    <title>CvDésigner</title>
</head>

<body class="bg">

    <div class="container-fluid " id="app">

        <!----------------------navBar----------------------->
        <div class="row ">
            <div class="col col-md-12 ">
                @include('pages.navBar')
            </div>
        </div>
        <div class="row">
            <div class="col-12 ">

                <!----------------------section----------------------->
                @yield('body')

            </div>
        </div>
        <!----------------------get profile----------------------->
        <div class="row">
            <div class="col-6">
                @include('pages.profile')
            </div>
        </div>
        <!----------------------footer----------------------->
        <div class="row " id="footer">
            <div class="col-12">
                @include('pages.footer')
            </div>
        </div>
    </div>
    @yield('script')
    <!----------------------scripts static ----------------------->
    <script src="{{asset('js/sweetall.min.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/vue.js')}}"></script>
    <script src="{{asset('js/cv.js')}}"></script>
</body>

</html>