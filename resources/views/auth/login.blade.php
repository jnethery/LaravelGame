@extends('layouts.app')

@section('title', 'Login')
@section('content')

<div id="loginForm" class="panel panel-default" style="width:50%;margin:auto;">
    <div class="panel-body">
        @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif
        {!! Form::open(['url' => 'auth/login', 'method' => 'post']) !!}
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="john_smith" >
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" class="form-control" name="password" id="pass" v-model="pass" />
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" id="remember" /> Remember Me
                </label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection