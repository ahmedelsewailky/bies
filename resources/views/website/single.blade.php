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
                    <div class="video-short-description">
                        <p>{{ $post->description }}</p>
                    </div>

                    <div class="acctress">
                        <h6 class="cs-page-title">فريق العمل</h6>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="actor-thumb">
                                    <img src="https://via.placeholder.com/80" alt="actor name here">
                                    <a href="">احمد حلمي</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
