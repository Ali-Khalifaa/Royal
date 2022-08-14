<!DOCTYPE html>


<!-- Mirrored from solverwp.com/demo/html/mingrand/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Apr 2021 09:29:06 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <title>ROYAL- INSTITUTE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="deepmind" />
    <meta name="keywords" content="medical/deepmind/hospital" />
    <meta name="author" content="" />
    <meta name="MobileOptimized" content="320" />

    <!-- style -->
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/magnific-popup.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/owl.theme.default.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/flaticon.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/fonts.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/style_ar.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/responsive_ar.css')}}" />
        <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=hanimation" />
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/magnific-popup.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/owl.theme.default.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/flaticon.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/fonts.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/responsive.css')}}" />
    @endif
    <!-- favicon link-->
    <link rel="shortcut icon" type="image/icon" href="{{asset('frontend/assets/images/icon_logo.png')}}" />
    <script src='{{asset('frontend/assets/../../../google_analytics_auto.js')}}'></script>
</head>

<body>
    
    



    @if(session()->has('success'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         {{ session()->get('success') }}
    </div>
    @endif


    @include('layout.frontend.header')

    

    @yield('content')

    @include('layout.frontend.footer')











    


    <!--main js files-->
    <script src="{{asset('frontend/assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.countTo.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.inview.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/owl.carousel.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.magnific-popup.js')}}"></script>
    <script src="{{asset('frontend/assets/js/contact_form.js')}}"></script>
    <script src="{{asset('frontend/assets/js/custom.js')}}"></script>
    <script src="{{asset('frontend/assets/js/ajax.js')}}"></script>
    <!--js code-->
    <script>
        function initMap() {
            var uluru = {
                lat: -36.742775,
                lng: 174.731559
            };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                scrollwheel: false,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBctr8WYTfFDi_oGbPEolSDzn4VZaAKVK0&amp;callback=initMap">
    </script>
    <!-- map Script-->
    @yield('scripts')

</body>

<!-- Mirrored from solverwp.com/demo/html/mingrand/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Apr 2021 09:29:07 GMT -->

</html>