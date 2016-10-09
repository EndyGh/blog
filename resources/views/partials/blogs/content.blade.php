<h2>
    <a href="{{route('blog.show',['slug'=>$blog->slug])}}">{{$blog->title}}</a>
</h2>
<p class="lead">
    About <a href="{{route('blog.show',['slug'=>$blog->slug])}}">{{$blog->description}}</a>
</p>
<p>
    <span class="glyphicon glyphicon-time"></span> Posted on
    {{$blog->created_at}}
    by <span style="font-weight: bold;">{{ $blog->author }}</span>
</p>
<hr>
<img class="img-responsive" src="http://placehold.it/900x300" alt=""> {{-- TODO --}}
<hr>