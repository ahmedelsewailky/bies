{{-- Extend Mater Website Layout --}}
@extends('layouts.guest')

{{-- Page Title --}}
@section('title', $category->name)

@section('content')
    <div class="page-header-cover">
        <span class="overlay"></span>
    </div>

    <div class="page-title">
        <h4>تصفح جديد <span>{{ $category->name }}</span></h4>
    </div>

    <section class="section">
        <div class="section-body">
            <div class="container">
                <div class="row">
                    @forelse ($category->posts as $post)
                        <div class="col-12 col-md-3 mb-4">
                            <div class="post">
                                <span class="quality">WEB-DL</span>
                                <div class="post-thumb"
                                    style="background-image: url('{{ asset('storage') . '/' . $post->image }}')">
                                </div>
                                <span class="play-icon"><i class="bx bx-play"></i></span>
                                <div class="post-content">
                                    <div class="post-meta meta-category">{{ $post->category->name }}</div>
                                    <h6 class="post-title">
                                        <a href="#">{{ $post->title }}</a>
                                    </h6>
                                    <p>{{ str($post->description)->words(10) }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>لا توجد منشورات</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
