<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>


    <title>CvDésigner</title>
</head>

<body class="body">
    <div class="container-fluid">

        <!----------------------section----------------------->
        @yield('body')



        <!----------------------scripts----------------------->
        <script src="{{asset('js/axios.min.js')}}"></script>
        <script src="{{asset('js/vue.js')}}"></script>
        <script src="{{asset('js/cv.js')}}"></script>
        <!----------------------footer----------------------->


    </div>
    </div>
    </div>

</body>

</html>
