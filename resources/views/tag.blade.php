@extends('layouts.layout')

@section('content')

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Tag:{{ $tag->tag}}</h1>
    </div>
</div>

<main class="main">
            
    <div class="row">


        @foreach ($tag->posts as $post)

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
               

</main>
@endsection