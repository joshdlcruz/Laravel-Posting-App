@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-outline-dark"> Go Back</a>
<br><br>
    <h1>{{$post->title}}</h1>
    <br><br>
    <img src="/storage/cover_images/{{$post->cover_image}}" style="width:100%">
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    @if (!Auth::guest())
        @if (Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-dark">Edit</a>

            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'btn float-right']) !!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection