@extends('layouts.blog')

@section('head')
<title>{{ $post->title }} - {{ config('app.name') }}</title>
<meta name="description" content="excerpt content">
<link href="{{ asset('blog/css/featherlight.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('blog/css/rrssb.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
@if (!$post->status)
<div class="float-right">
    <h3 class="text-info bg-dark p-2">Draft Mode</h3>
</div>
<div class="clearfix"></div>
@endif
<div class="eskimo-page-title">
    <h1><span>{{ $post->title }}</span></h1>
    <div class="eskimo-page-title-meta">
        <div class="eskimo-author-meta">
            By <a class="author-meta" href="author.html">{{ $post->author }}</a>
        </div>
        <div class="eskimo-date-meta">{{date("l, d F Y", strtotime($post->published_at))}}</div>
    </div>
</div>
<!-- FEATURED IMAGE -->
<div class="eskimo-featured-img">
    <img src="{{ asset('storage/'.$post->thumbnail) }}" alt="" />
</div>
<!-- POST CONTENT -->
<div class="eskimo-page-content">{!! $post->content !!}</div>
@endsection

@section('js')
<script src="{{ asset('blog/js/rrssb.min.js') }}"></script>
<script src="{{ asset('blog/js/featherlight.js') }}"></script>
@endsection
