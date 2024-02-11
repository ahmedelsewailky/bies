<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('website') }}">
            <img src="{{ asset('assets/images/video-camera.png') }}" alt="">
            Ma<span>R</span>vel
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
                @foreach (\App\Models\Category::whereNull('parent_id')->get() as $parent)
                    @php
                        $subs = \App\Models\Category::where('parent_id', $parent->id)->get();
                    @endphp
                    @if (count($subs) > 0)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ $parent->name }}
                            </a>

                            <ul class="dropdown-menu dropdown-menu-start">
                                @foreach ($subs as $category)
                                    <li><a class="dropdown-item" href="{{ route('posts.category', $category->slug) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
            <form class="d-flex ms-3" role="search" action="{{ route('search') }}" method="get">
                <input class="form-control me-2" name="q" type="search" placeholder="البحث السريع" aria-label="Search">
                <button class="btn" type="submit"><i class="bx bx-search"></i></button>
            </form>
            <a href="{{ route('login') }}" class="btn btn-primary">تسجيل الدخول</a>
        </div>
    </div>
</nav>
