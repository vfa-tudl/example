@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/posts/{{$post->id}}/edit" method="post">
    @csrf
    @method('post')
        <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label">Title</label>

            <input id="title"
                    type="text"
                    class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                    name="display_name"
                    value="{{ old('address') ?? $post->title }}"
                    autocomplete="title" autofocus>

            @if ($errors->has('address'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>


        <div class="form-group row">
            <label for="content" class="col-md-4 col-form-label">Content</label>

            <input id="content"
                    type="text"
                    class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                    name="display_name"
                    value="{{ old('content') ?? $post->content }}"
                    autocomplete="content" autofocus>

            @if ($errors->has('content'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif
        </div>


        <div class="row pt-4">
            <button class="btn btn-primary" >Save Profile</button>
        </div>
         
    </form>
   
       
</div>
@endsection