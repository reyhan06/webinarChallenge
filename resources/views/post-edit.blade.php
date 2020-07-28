@extends('layouts.app')

@section('css')
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Posts - Edit</div>

                <div class="card-body">
                    <form action="{{ route('post.update', $post->slug) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter title" value="{{ $post->title }}" required>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" id="author" value="{{ Auth::user()->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control summernote @error('content') is-invalid @enderror" id="content" name="content">{!! $post->content !!}</textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Excerpt</label>
                            <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" placeholder="Enter excerpt" aria-describedby="excerptHelp" required>{{ $post->excerpt }}</textarea>
                            <small id="excerptHelp" class="form-text text-muted">Max 255 characters.</small>
                            @error('excerpt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail" aria-describedby="thumbnailHelp">
                            <small id="thumbnailHelp" class="form-text text-muted">Resolution 1200 px 600 px | Format JPG/JPEG/PNG | Max 2 MB.</small>
                            @error('thumbnail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="statusSelect">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status" id="statusSelect" required>
                                <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Publish</option>
                                <option value="0" {{ $post->status == 0 ? 'selected' : '' }}>Draft</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300,
        });
    });
</script>
@endsection
