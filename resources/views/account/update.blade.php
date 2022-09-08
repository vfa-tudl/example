@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post"  action="/account">
    @csrf
    @method('post')
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Edit Profile</h1>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Display Name</label>

                    <input id="name"
                           type="text"
                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           name="name"
                           value="{{ old('name') ?? $user->name }}"
                           autocomplete="name" autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="display_name" class="col-md-4 col-form-label">display_name</label>

                    <input id="display_name"
                           type="text"
                           class="form-control{{ $errors->has('display_name') ? ' is-invalid' : '' }}"
                           name="display_name"
                           value="{{ old('display_name') ?? $user->display_name }}"
                           autocomplete="display_name" autofocus>

                    @if ($errors->has('display_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('display_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="fb_url" class="col-md-4 col-form-label">Facebook Url</label>

                    <input id="fb_url"
                           type="text"
                           class="form-control{{ $errors->has('fb_url') ? ' is-invalid' : '' }}"
                           name="display_name"
                           value="{{ old('fb_url') ?? $user->fb_url }}"
                           autocomplete="fb_url" autofocus>

                    @if ($errors->has('fb_url'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('fb_url') }}</strong>
                        </span>
                    @endif
                </div>
            
                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label">Address</label>

                    <input id="address"
                           type="text"
                           class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                           name="display_name"
                           value="{{ old('address') ?? $user->address }}"
                           autocomplete="address" autofocus>

                    @if ($errors->has('address'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>


                

                <div class="row">
                    <label for="avatar" class="col-md-4 col-form-label">Profile Image</label>
                    <img src="{{$user->avatar}}" alt="">
                    <input type="file" class="form-control-file" id="avatar" name="avatar">

                    
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary" >Save Profile</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection