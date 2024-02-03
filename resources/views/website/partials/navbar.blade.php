<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('website') }}">
            <img src="{{ asset('logo.png') }}" alt="{{ env('APP_NAME') }}">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavigationMenu"
            aria-controls="mainNavigationMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="bx bx-menu-alt-left"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavigationMenu">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('website') }}">الرئيسية</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        أفلام
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">افلام عربية</a></li>
                        <li><a class="dropdown-item" href="#">افلام أجنبية</a></li>
                        <li><a class="dropdown-item" href="#">افلام تركية</a></li>
                        <li><a class="dropdown-item" href="#">افلام آسيوية</a></li>
                        <li><a class="dropdown-item" href="#">افلام انمي</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        مسلسلات
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">مسلسلات عربية</a></li>
                        <li><a class="dropdown-item" href="#">مسلسلات اجنبية</a></li>
                        <li><a class="dropdown-item" href="#">مسلسلات تركية</a></li>
                        <li><a class="dropdown-item" href="#">مسلسلات كورية</a></li>
                        <li><a class="dropdown-item" href="#">مسلسلات رمضان</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">برامج</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">مصارعة</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">بودكاست</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="البحث السريع" aria-label="Search">
                <button class="btn" type="submit"><i class="bx bx-search"></i></button>
            </form>
            <a href="{{ route('login') }}" class="btn btn-primary">تسجيل الدخول</a>
        </div>
    </div>
</nav>
