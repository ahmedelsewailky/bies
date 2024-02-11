{{-- Extend Mater Website Layout --}}
@extends('layouts.guest')

{{-- Page Title --}}
@section('title', 'الصفحة الرئيسية')

@section('content')

    @include('website.partials.slider')

    <!-- Latest Movies -->
    <section class="section latest-movies-section">
        <div class="container">
            <div class="section-header">
                <h6>جديد الأفلام</h6>
                <a href="#" class="ms-auto"> مشاهدة المزيد <i class='bx bx-left-arrow-alt'></i> </a>
            </div>

            <div class="section-body">
                <div class="section-content-filter" id="filterOptions">
                    @foreach ($movies as $name => $id)
                        <a href="#" class="{{ $name }}">{{ $name }}</a>
                    @endforeach
                </div>

                <div id="ourHolder">
                    <div class="owl-carousel">
                        @forelse ($posts->whereIn('category_id', $movies)->take(10)->get() as $post)
                            <div class="post {{ $post->category->name }}">
                                <span class="quality">{{ $post->quality }}</span>
                                <div class="post-thumb"
                                    style="background-image: url('{{ get_image_from_storage($post) }}')">
                                </div>
                                <span class="play-icon"><i class="bx bx-play"></i></span>
                                <div class="post-content">
                                    <div class="post-meta meta-category">{{ $post->category->name }}</div>
                                    <h6 class="post-title">
                                        <a href="{{ route('posts.single', $post->slug) }}">{{ $post->title }}</a>
                                    </h6>
                                    <p>{{ str($post->description)->words(10) }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">لا يوجود منشورات</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./Latest Movies -->


    <!-- Latest Series -->
    <section class="section latest-series-section">
        <div class="container">
            <div class="section-header">
                <h6>جديد المسلسلات</h6>
                <a href="#" class="ms-auto"> مشاهدة المزيد <i class='bx bx-left-arrow-alt'></i> </a>
            </div>

            <div class="section-body">
                <div class="section-content-filter">
                    @foreach ($series as $name => $id)
                        <a href="{{ $id }}">{{ $name }}</a>
                    @endforeach
                </div>

                <div class="owl-carousel">
                    @forelse ($posts->whereIn('category_id', $series)->take(10)->get() as $post)
                        <div class="post">
                            <span class="quality">WEB-DL</span>
                            <div class="post-thumb"
                                style="background-image: url('{{ get_image_from_storage($post) }}')">
                            </div>
                            <span class="play-icon"><i class="bx bx-play"></i></span>
                            <div class="post-content">
                                <div class="post-meta meta-category">{{ $post->category->name }}</div>
                                <h6 class="post-title">
                                    <a href="{{ route('posts.single', $post->slug) }}">{{ $post->title }}</a>
                                </h6>
                                <p>{{ str($post->description)->words(10) }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">لا يوجود منشورات</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <!-- ./Latest Series -->


    <!-- Latest Added -->
    <section class="section last-added-section">
        <div class="container">
            <div class="my-3 text-center mb-5">
                <h4>مضافة حديثاً</h4>
                <p>تصفح أجدد الأعمال الفنية علي مارفيل</p>
            </div>

            <div class="section-body">
                <div class="row">
                    @forelse ($latest as $post)
                        <div class="col-12 col-md-3 mb-4">
                            <div class="post">
                                <span class="quality">WEB-DL</span>
                                <div class="post-thumb"
                                    style="background-image: url('{{ get_image_from_storage($post) }}')">
                                </div>
                                <span class="play-icon"><i class="bx bx-play"></i></span>
                                <div class="post-content">
                                    <div class="post-meta meta-category">{{ $post->category->name }}</div>
                                    <h6 class="post-title">
                                        <a href="{{ route('posts.single', $post->slug) }}">{{ $post->title }}</a>
                                    </h6>
                                    <p>{{ str($post->description)->words(10) }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>لا توجد منشورات</p>
                    @endforelse
                </div>

                {!! $latest->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </section>
    <!-- ./Latest Added -->
@endsection

@section('js')
    <script>
        $(function() {
            $('#filterOptions a').on("click", function() {
                // fetch the class of the clicked item
                var ourClass = $(this).attr('class');

                console.log(ourClass);


            });
        });
    </script>
@endsection
