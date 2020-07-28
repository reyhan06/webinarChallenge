@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Posts - Index</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($posts->isEmpty())
                    <span>
                        Hi {{ Auth::user()->name }}! Currently, there are no any posts to see. Let's add a new one!
                        <a href="{{ route('post.add') }}">click here</a>
                    </span>
                    @else
                    <div class="table-responsive-lg">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Published at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <th>{{ $post->id }}</th>
                                    <th>{{ $post->title }}</th>
                                    <th>{{ $post->status ? 'published' : 'drafted' }}</th>
                                    <th>{{ $post->published_at }}</th>
                                    <th><a href="{{ route('post.show', $post->slug) }}" class="text-primary" target="_blank">View</a> |
                                        <a href="{{ route('post.edit', $post->slug) }}" class="text-info">Edit</a> |
                                        <a href="{{ route('post.switch-status', $post->slug) }}"
                                            class="switch-status {{ $post->status ? 'text-secondary' : 'text-primary' }}"
                                            data-url="{{ route('post.switch-status', $post->slug) }}">
                                            {{ $post->status ? 'Draft it' : 'Publish it' }}
                                        </a> |
                                        <a href="{{ route('post.delete', $post->id) }}" class="text-danger delete-confirmation-button"
                                        data-url="{{ route('post.delete', $post->id) }}" data-title="{{ $post->title }}">Delete</a>
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $posts->links() }}
                    <form id="switch-status-form" action="#" method="post" style="display:none;">
                        @csrf
                        @method('patch')
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@if ($posts->isNotEmpty())
<!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete the post entitled <strong id="post-title">Post Title</strong>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger" id="delete-submit-button">Yes</button>
        <form id="delete-form" action="#" method="post" style="display:none;">
            @csrf
            @method('delete')
        </form>
      </div>
    </div>
  </div>
</div>
@endif
@endsection

@if ($posts->isNotEmpty())
@section('js')
<script>
    $(document).ready(function() {
        $('.switch-status').click(function(event) {
            event.preventDefault();
            $('#switch-status-form').prop('action', $(this).attr('data-url')).submit();
        });

        var delete_form = $('#delete-form');
        $('.delete-confirmation-button').click(function(event) {
            event.preventDefault();
            $('#post-title').text($(this).attr('data-title'));
            delete_form.prop('action', $(this).attr('data-url'));
            $('#delete-modal').modal();
        });

        $('#delete-submit-button').click(function(event) {
            event.preventDefault();
            delete_form.submit();
        });
    });
</script>
@endsection
@endif
