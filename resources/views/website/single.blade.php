{{-- Extend Mater Website Layout --}}
@extends('layouts.guest')

{{-- Page Title --}}
@section('title', $post->title)

@section('content')
    <div class="page-content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="post-image">
                        <img src="{{ get_image_from_storage($post) }}" class="mw-100" alt="{{ $post->title }}">
                    </div>
                </div>

                <div class="col-md-8">
                    <h1>{{ $post->title }}</h1>
                    <div class="video-meta my-3 position-relative">
                        <div class="video-meta-rate">
                            <i class="bx bx-folder"></i>
                            {{ $post->category->name }}
                        </div>
                        <div class="video-meta-rate">
                            <i class="bx bxs-star"></i>
                            6.2
                        </div>
                        <div class="video-meta-duration">
                            <i class="bx bx-time"></i>
                            1hr 2mins
                        </div>
                        <div class="video-meta-years">
                            <i class="bx bx-calendar"></i>
                            2023
                        </div>
                        <div class="video-meta-quality">
                            {{ DataArray::QUALITIES[$post->quality] }}
                            <span>الجودة</span>
                        </div>
                    </div>

                    <div class="post-description my-4">
                        <p>{{ $post->description }}</p>
                    </div>

                    <div class="block">
                        <div class="block-header">
                            <h6 class="cs-page-title">فريق العمل</h6>
                        </div>
                        <div class="block-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="actor-item">
                                        <div class="actor-item-image">
                                            <img src="https://via.placeholder.com/80" class="py-3" alt="actor name here">
                                        </div>
                                        <div class="actor-item-name">
                                            <a href="">احمد حلمي</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="actor-item">
                                        <div class="actor-item-image">
                                            <img src="https://via.placeholder.com/80" class="py-3" alt="actor name here">
                                        </div>
                                        <div class="actor-item-name">
                                            <a href="">كريم عبد العزيز</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="actor-item">
                                        <div class="actor-item-image">
                                            <img src="https://via.placeholder.com/80" class="py-3" alt="actor name here">
                                        </div>
                                        <div class="actor-item-name">
                                            <a href="">محمد هنيدي</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="block mt-4">
                        <div class="block-header">
                            <h6>شاهد اون لاين</h6>
                        </div>
                        <div class="block-body">
                            <div class="post-player my-4">
                                <iframe width="850" height="430"
                                    src="https://www.youtube.com/embed/jDs55BiCSBk?si=wfB7QxQdLinq1D9J" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>

                    <div class="block mt-4">
                        <div class="block-header">
                            <h6>روابط التحميل</h6>
                        </div>
                        <div class="block-body">
                            <a href="" class="download-link">رابط التحميل الأول</a>
                            <a href="" class="download-link">رابط التحميل الثاني</a>
                            <a href="" class="download-link">رابط التحميل الثالث</a>
                            <a href="" class="download-link">رابط التحميل الرابع</a>
                            <a href="" class="download-link">رابط التحميل الخامس</a>
                        </div>
                    </div>


                </div>

                <div class="col-md-12">
                    <div class="block">
                        <div class="block-header">
                            <h6>قد يعجبك أيضا</h6>
                        </div>
                        <div class="block-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
