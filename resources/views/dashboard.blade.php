@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <span>Hi {{ Auth::user()->name }}! Here are some informations about your posts:</span>
                    <ul>
                        <li>Total posts: {{ $posts->count() }}</li>
                        <li>Published posts: {{ $posts->where('status', 1)->count() }}</li>
                        <li>Drafted posts: {{ $posts->where('status', 0)->count() }}</li>
                    </ul>
                    <span class="mt-2">If you wanna manage them, then click 'Posts' menu on the right navbar :)</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
