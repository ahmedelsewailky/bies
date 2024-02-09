<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title', 'صفحة غير معرفة')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lalezar&family=Tajawal:wght@300;400;500;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
   <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.rtl.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/libs/boxicons/css/boxicons.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/libs/owlcarousel/assets/owl.carousel.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div id="website">
        <!-- Navbar -->
        @include('website.partials.navbar')
        <!-- ./Navbar -->

        @yield('content')

        <footer class="footer">
            <div class="container">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a href="#" class="nav-link">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">بنود الخدمة</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">سياسة الخصوصية</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">اتصل بنا</a>
                    </li>
                </ul>
                <p class="text-center">
                    جميع الحقوق محفوطة لـ <a href="{{ route('website') }}">شبكة مارفيل</a> © {{ date('Y') }}
                </p>
            </div>
        </footer>
    </div>


    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/owlcarousel/owl.carousel.min.js') }}"></script>
    <script type="module">
        $(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 30,
                rtl:true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 5,
                        nav: true,
                        loop: false
                    }
                }
            });

            $(window).on("scroll", function() {
                if ($(window).scrollTop() > 0) {
                    $(".navbar").addClass("sticky");
                } else {
                    $(".navbar").removeClass("sticky");
                }
            });
        });
    </script>
    @yield('js')
</body>

</html>
