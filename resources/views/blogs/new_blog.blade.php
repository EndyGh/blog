@extends('layouts.admin')

@section('content')

    <div class="container">
        @if(session()->has('flash_msg'))
            <div class="row flash_msg">
                <div class="col-md-7">
                    <div class="alert alert-success" style="margin-top:18px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                        <strong>Success!</strong> {{  session()->get('flash_msg') }}
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            {!! Form::open(['route' => 'blog.store', 'class' => 'form','files' => true]) !!}

            <div class="row">
                <div class="col-xs-6 col-md-7 form-group">
                    {!! Form::label('title','Blog title') !!}
                    {!! Form::text('title', null,
                        ['required',
                            'class'=>'form-control',
                            'placeholder'=>'Blog title']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6 col-md-7 form-group">
                    {!! Form::label('description','Enter description') !!}
                    {!! Form::text('description', null,
                        ['required',
                            'class'=>'form-control',
                            'placeholder'=>'Enter description']) !!}
                </div>
            </div>


            <div class="row">
                <div class="col-xs-6 col-md-7 form-group">
                    {!! Form::label('body','Your message') !!}
                    {!! Form::textarea('body', null,
                        ['required',
                              'class'=>'form-control',
                              'placeholder'=>'Your message']) !!}
                </div>
            </div>

            <div class="row">
                <div class="cols-xs-6 col-md-7 form-group">
                    {!! Form::file('image') !!}
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6 col-md-7 form-group">
                    {!! Form::submit('Create blog!',
                      ['class'=>'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(".flash_msg").fadeOut(5500)
    </script>
@endsection