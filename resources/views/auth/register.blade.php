@extends('layouts.app')

@section('title', 'Create a New Account!')
@section('content')

<div id="registrationForm" class="panel panel-default" style="width:50%;margin:auto;">
    <div class="panel-body">
        @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif
        <div v-show="hasErrors" class="alert alert-warning" role="alert">
            <p v-show="!emailCharValid">Your email cannot contain spaces</p>
            <p v-show="!emailExists">You must enter an email address</p>
            <p v-show="!emailLenValid">Your email must be less than @{{maxLen}} characters</p>
            <p v-show="!userCharValid">Your username cannot contain spaces</p>
            <p v-show="!userExists">You must enter a username</p>
            <p v-show="!userLenValid">Your username must be less than @{{maxLen}} characters</p>
            <p v-show="!passCharValid">Your password cannot contain spaces</p>
            <p v-show="!passMinLenValid">Your password must be at least @{{minPassLen}} characters</p>
            <p v-show="!passMaxLenValid">Your password must be less than @{{maxLen}} characters</p>
            <p v-show="!passMatch">Your password and confirmation do not match</p>
        </div>
        <div v-else class="alert alert-success" role="alert">
            Looking good!
        </div>
        {!! Form::open(['url' => 'auth/register', 'method' => 'post']) !!}
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="john_smith@gmail.com" v-model="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="john_smith" v-model="user" value="{{ old('name') }}">
            </div>
            <div class="form-group" v-bind:class="passClass">
                <label for="pass">Password</label>
                <input type="password" class="form-control" name="password" id="pass" v-model="pass" />
            </div>
            <div class="form-group" v-bind:class="passClass">
                <label for="pass_conf">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="pass_conf" v-model="pass_conf"/>
            </div>
            <div class="form-group">
                <button :disabled="hasErrors" type="submit" class="btn btn-primary">Register</button>
            </div>
        {!! Form::close() !!}
    </div>
</div>

<script type="text/javascript">
    new Vue({
        el : '#registrationForm',
        data : {
            maxLen : 255,
            minPassLen : 8,
            user : '',
            email : '',
            pass : '',
            pass_conf : ''
        },
        computed : {
            passMatch : function () {
                if (!this.pass.length === 0 || this.pass !== this.pass_conf) {
                    return false;
                }
                return true;
            },
            passMinLenValid : function () {
                return this.pass.length >= this.minPassLen;
            },
            passMaxLenValid : function () {
                return this.pass.length <= this.maxLen;
            },
            passLenValid : function () {
                return this.passMinLenValid && this.passMaxLenValid;
            },
            passCharValid : function () {
                return !this.pass.includes(' ');
            },
            passValid : function () {
                return (this.passCharValid && this.passMatch && this.passLenValid);
            },
            emailExists : function () {
                return this.email.length > 0;
            },
            emailLenValid : function () {
                return this.email.length <= this.maxLen; 
            },
            emailCharValid : function () {
                return !(this.email.includes(' '));
            },
            emailValid : function () {
                return (this.emailExists && this.emailCharValid && this.emailLenValid);
            },
            userExists : function () {
                return this.user.length > 0;
            },
            userLenValid : function () {
                return this.user.length <= this.maxLen; 
            },
            userCharValid : function () {
                return !(this.user.includes(' '));
            },
            userValid : function () {
                return (this.userExists && this.userCharValid && this.userLenValid);
            },
            passClass : function () {
                if (this.passValid) {
                    return 'has-success';
                }
                return 'has-error';
            },
            hasErrors : function () {
                return !(this.passValid && this.userValid && this.emailValid);
            }
        }
    });
</script>
@endsection