@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="card-content">
                       <h4> User Name: {{$user->name}}
                       </h4>
                    </div>
                    <div class="card-content">
                        <h4>Provider: {{$user->provider}}</h4>
                    </div>
                    <div class="card-content">
                        <h4>Provider Token: {{$user->access_token}}</h4>
                    </div>
                </div>
                <!-- <div class="card-body">
                    <div class="card-content">
                        <button class="btn" style="border:1px solid #black"><a href="/account">Update User Profile</a></button>
                    </div>
                    <div class="card-content">
                        <button class="btn" style="border:1px solid #black"><a href="posts/create">New Post</a></button>
                    </div>
                </div> -->
                .

            </div>
        </div>
    </div>
</div>
<!-- <div class="container d-flex justify-content-center mt-50 mb-50">
    <div class="row">    
        @foreach($orders as $order)
        <div class="col-md-4 mt-2">               
            <div class="card">
                <div class="card-body">
                    <div class="card-img-actions">
                        <img src="data:image/jpeg;base64,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" class="card-img img-fluid" width="96" height="350" alt="">
                    </div>
                </div>
                <div class="card-body bg-light text-center">
                    <div class="mb-2">
                        <h6 class="font-weight-semibold mb-2">
                            <a href="/posts/{{$order->id}}" class="text-default mb-2" data-abc="true">{{$order->title}}</a>
                        </h6>
                    </div>
                    <div class="text-muted mb-3">34 reviews</div>
                    <div class="card-content">
                        <button class="btn" style="border:1px solid #black"><a href="posts/{{$order->id}}">Edit Post</a></button>
                    </div>
                </div>
            </div>
       </div> 
        @endforeach
    </div>
</div> -->
@endsection
