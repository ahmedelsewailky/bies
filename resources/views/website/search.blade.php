{{-- Extend Mater Website Layout --}}
@extends('layouts.guest')

{{-- Page Title --}}
@section('title', 'بحث')

@section('content')
    <div class="page-header-cover">
        <span class="overlay"></span>
    </div>

    <div class="page-title">
        <h4>انت الآن تحاول البحث عن : <span>{{ request()->get('q') }}</span></h4>
    </div>

    <section class="section">
        <div class="section-body">
            <div class="container">
                <div class="row">
                    @forelse ($posts as $post)
                        <div class="col-12 col-md-3 mb-4">
                            <div class="post">
                                <span class="quality">{{ DataArray::QUALITIES[$post->quality] }}</span>
                                <div class="post-thumb"
                                    style="background-image: url('{{ get_image_from_storage($post) }}')">
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
                {!! $posts->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </section>
@endsection
