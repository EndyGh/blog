@foreach($comments->reverse() as $comment)
    <ul>
        <li class="media">
           <div class="media">
               <a class="pull-left" href="#">
                   <img class="media-object" src="http://placehold.it/64x64" alt="">
               </a>
               <div class="media-body" data-comment-id="{{$comment->id}}">
                   <h4 class="media-heading" style="cursor: pointer;">{{$comment->owner->name}}
                       <small>{{$comment->created_at}}</small>
                   </h4>
                   {{$comment->body}}
                   {{ Form::open(['route' => ['comment.like',$comment->id],'data-comment-id'=>$comment->id]) }} {{ Form::close() }}
                   <strong>
                       <i class="fa fa-thumbs-up like_comment" data-id="{{$comment->id}}" aria-hidden="true" style="cursor: pointer;"></i>  {{ $comment->likes->count() }}
                   </strong>
               </div>
           </div>
        </li>
        @if($comment->relationLoaded('allRepliesWithOwner'))
            @include('partials.blogs.comments', ['comments' => $comment->allRepliesWithOwner])
        @endif
    </ul>
@endforeach