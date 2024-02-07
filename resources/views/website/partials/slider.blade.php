@php
    $moviesCategories =  \App\Models\Category::whereParentId(1)->select('id', 'name')->pluck('id', 'name');
    $latest = \App\Models\Post::whereIn('id', $moviesCategories)->orderBy('id', 'desc')->take(3)->get();
@endphp
<div class="slider">
    <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-interval="5000" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($latest as $post)
                <div class="carousel-item active"
                    style="background: url('{{ asset('storage') . '/' . $post->image }}')">
                    <div class="container">
                        <div class="video-inner-information">
                            <div class="video-meta-category">
                                <a href="#">{{ $post->category->name }}</a>
                            </div>
                            <h2>{{ $post->title }}</h2>
                            <div class="video-meta my-3 position-relative">
                                <div class="video-meta-rate">
                                    <i class="bx bxs-star"></i>
                                    6.2
                                </div>
                                <div class="video-meta-duration">
                                    1hr 2mins
                                </div>
                                <div class="video-meta-years">
                                    2023
                                </div>
                                <div class="video-meta-quality">
                                    720
                                    <span>HD</span>
                                </div>
                            </div>
                            <div class="video-short-description">
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                                    مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى
                                    إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                                    إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد
                                    الفقرات كما تريد</p>
                            </div>
                            <a href="#" class="btn btn-primary mt-3">
                                <i class='bx bx-play-circle'></i>
                                مشاهدة الآن
                            </a>
                        </div>
                        <div class="overlay"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
