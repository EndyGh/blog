@extends('layouts.blog')

{{-- MAIN BLOG PAGE http://blog-host.com/ --}}

@section('content')
    <!-- Blog Post -->
    @forelse ($blogs as $blog)

        @include('partials.blogs.content',compact('blog'))

        <p>{{ str_limit($blog->body,327) }}</p>


        <a class="btn btn-primary" href="{{ route('blog.show',['slug'=>$blog->slug]) }}">
            Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        <hr>
    @empty
        <p>No posts</p>
    @endforelse

    <hr>

    <!-- Pager -->
    {{ $blogs->links() }}
@endsection