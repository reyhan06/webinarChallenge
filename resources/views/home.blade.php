@extends('layouts.blog')

@section('head')
<title>Home - {{ config('app.name') }}</title>
<meta name="description" content="Home description">
@endsection

@if ($posts->isNotEmpty())
@section('content')
<!-- BLOG POSTS -->
<div class="eskimo-masonry-grid">
    <div class="eskimo-two-columns" data-columns>
        <!-- POSTS -->
        @foreach ($posts as $post)
        <div class="card-masonry">
            <div class="card">
                <a href="single-post.html">
                        <img class="card-vertical-img" src="{{ asset('storage/'.$post->thumbnail) }}" alt="" />
                    </a>
                <div class="card-border">
                    <div class="card-body">
                        <h3 class="card-title"><a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></h3>
                        <p>{{ $post->excerpt }}</p>
                    </div>
                    <div class="card-footer">
                        <div class="eskimo-author-meta">
                            By <a class="author-meta" href="author.html">{{ $post->author }}</a>
                        </div>
                        <div class="eskimo-date-meta">
                            <a href="single-post.html">{{date("l, d F Y", strtotime($post->published_at))}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
{{ $posts->links() }}
@endsection
@endif
