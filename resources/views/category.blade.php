@extends('layouts.layout')

@section('content')

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Category:{{ $category->name}}</h1>
    </div>
</div>

<main class="main">
            
    <div class="row">


        @foreach ($category->posts as $post)

        <a href="{{ route('single',['slug' => $post->slug])}}">

        <div class="case-item-wrap">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="case-item">
                    <div class="case-item__thumb">
                        <img src="{{ $post->featured}}" alt="our case">
                    </div>
                    <h6 class="case-item__title"><a href="{{ route('single',['slug' => $post->slug])}}">{{ $post->title}}</a></h6>
                </div>
            </div>
        </a>
        @endforeach
                {{-- <div class="case-item-wrap">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="case-item">
                            <div class="case-item__thumb">
                                <img src="app/img/3.jpg" alt="our case">
                            </div>
                            <h6 class="case-item__title"><a href="#">Investigationes demonstraverunt legere</a></h6>
                        </div>
                    </div> --}}

                    {{-- <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                        <div class="case-item">
                            <div class="case-item__thumb">
                                <img src="app/img/1.png" alt="our case">
                            </div>
                            <h6 class="case-item__title">Claritas est etiam processus dynamicus</h6>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                        <div class="case-item">
                            <div class="case-item__thumb mouseover poster-3d lightbox shadow animation-disabled" data-offset="5">
                                <img src="app/img/2.png" alt="our case">
                            </div>
                            <h6 class="case-item__title">quod mazim placerat facer possim assum</h6>
                        </div>
                    </div>
                </div> --}}
    </div>

    <!-- End Post Details -->
    <br>
    <br>
    <br>
    <!-- Sidebar-->

    {{-- <div class="col-lg-12">
        <aside aria-label="sidebar" class="sidebar sidebar-right">
            <div  class="widget w-tags">
                <div class="heading text-center">
                    <h4 class="heading-title">ALL BLOG TAGS</h4>
                    <div class="heading-line">
                        <span class="short-line"></span>
                        <span class="long-line"></span>
                    </div>
                </div>

                <div class="tags-wrap">
                    <a href="#" class="w-tags-item">SEO</a>
                    <a href="#" class="w-tags-item">Advertising</a>
                    <a href="#" class="w-tags-item">Business</a>
                    <a href="#" class="w-tags-item">Optimization</a>
                    <a href="#" class="w-tags-item">Digital Marketing</a>
                    <a href="#" class="w-tags-item">Social</a>
                    <a href="#" class="w-tags-item">Keyword</a>
                    <a href="#" class="w-tags-item">Strategy</a>
                    <a href="#" class="w-tags-item">Audience</a>
                </div>
            </div>
        </aside>
    </div> --}}

    <!-- End Sidebar-->

</main>
@endsection