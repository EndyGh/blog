@extends('layouts.blog')

@section('content')

    @include('partials.blogs.content',['blog'=>$blog])

    <p>{{$blog->body}}</p>
    <hr>
    {{ Form::open(['route' => ['blog.like',$blog->id],'id'=>'blog-like']) }} {{ Form::close() }}
    <strong>
        <i class="fa fa-thumbs-up" aria-hidden="true" style="cursor: pointer;"></i>  {{ $blog->likes->count() }}
    </strong>
    <hr>

    @include('partials.blogs.leave_comment',['blog_id'=>$blog->id])

    <div class='comments'>
    <h3 class='comment_header'>{{$count = $blog->comments->count()}} Comments</h3>

    @if($count && $blog->relationLoaded('parentComments'))
        @include('partials.blogs.comments', ['comments' => $blog->parentComments])
    @endif

    </div>
@endsection

@section('js')
    <script>
        var parentIdInput = $('#parent_id_input');
        var likeBtn = $('.fa-thumbs-up').eq(0);

        $('.media-heading').click(function () {

          var parent_id = $(this).parent().eq(0).data('comment-id');

            parentIdInput.val(parent_id);
            $('textarea').focus();
        });

        likeBtn.click(function () {
                $('#blog-like').submit();
        });

        $('.like_comment').click(function () {
            var id = $(this).data('id');
            $("form[data-comment-id="+id+"]").submit();
        });

    </script>
@endsection