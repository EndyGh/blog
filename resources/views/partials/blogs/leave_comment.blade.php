@if(auth()->user())
    <div class="well">
        <h4>Leave a Comment:</h4>
        {!! Form::open(['route' => 'comments.store', 'class' => 'form']) !!}

        <div class="form-group">
            {!! Form::textarea('body', null,['required','class'=>'form-control','rows'=>3]) !!}
        </div>

        {!! Form::hidden('blog_id', $blog_id) !!}
        {!! Form::hidden('parent_id', 0,['id'=>'parent_id_input']) !!} <!-- TODO -->

        {!! Form::submit('Leave comment',
                  ['class'=>'btn btn-primary']) !!}


        <div style="margin-top: 7px;">
            {!! app('captcha')->display() !!}
        </div>

        {!! Form::close() !!}
    </div>
    <hr>
@endif