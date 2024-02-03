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
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="website">
        <header class="header">
            <!-- Navbar -->
            @include('website.partials.navbar')
            <!-- ./Navbar -->

            <!-- Slider -->
            @if (request()->routeIs('website'))
                @include('website.partials.slider')
            @endif
            <!-- ./Slider -->
        </header>

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
</body>

</html>
