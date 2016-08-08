@extends('layouts.app')

@section('title', trans('label.app_name'))

@section('content')

    <div id="_loader" class="loadingArea" style="display: none;">
        <img src="{{ asset('images/loading.gif') }}" alt="Loading..."/>
    </div>

    <div class="login-container ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui teal image header">
                <div class="text-shadow content">
                    {{ trans('label.login_title') }}
                </div>
            </h2>
            {{ Form::open(['url' => '/login', 'method' => 'POST', 'class' => 'ui large form form-login', 'role' => 'form']) }}
            <div class="ui stacked segment">
                <div class="field">
                    <div class="ui left icon input {!! is_active_error($errors, 'email') !!}">
                        <i class="icon-login fa fa-user"></i>
                        {{ Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => trans('label.email_address')]) }}
                    </div>
                </div>
                <div class="f-left field">
                    {!! display_field_error($errors, 'email') !!}
                </div>
                <div class="field">
                    <div class="ui left icon input {{ $errors->has('password') ? ' has-error' : '' }}">
                        <i class="fa fa-lock icon-login"></i>
                        {{ Form::password('password', ['placeholder' => trans('label.password'), 'name' => 'password', 'value' => old('password')]) }}
                    </div>
                </div>
                <div class="f-left field">
                    {!! display_field_error($errors, 'password') !!}
                </div>
                <div class="f-left ui toggle checkbox field">
                    <input type="checkbox" name="public">
                    <label>{{ trans('label.remember') }}</label>
                </div>
                <button type="submit" class="ui fluid large teal submit button btn-login">
                    {{ trans('label.login') }}
                </button>
            </div>
            {{ Form::close() }}
            <div class="ui margin-top-15">
                {{ trans('label.new_to_us') }}
                <a class='sign-up' data-toggle="modal" data-target="#registerModal">
                    {{ trans('label.signup') }}
                </a>
            </div>

            <a class="btn btn-link" data-toggle="modal" data-target="#resetPasswordModal">
                {{ trans('label.forgot_password') }}
            </a>

            <div class="social-container">
                <a class="ui circular facebook icon button" href="login/facebook/redirect">
                    <i class="facebook icon"></i>
                </a>
                <a class="ui circular twitter icon button" href="login/twitter/redirect">
                    <i class="twitter icon"></i>
                </a>
                <a class="ui circular linkedin icon button">
                    <i class="linkedin icon"></i>
                </a>
                <a class="ui circular google plus icon button" href="login/google/redirect">
                    <i class="google plus icon"></i>
                </a>
            </div>
        </div>
    </div>

    @if(Auth::guest())
        @include('auth.register')
        @include('auth.passwords.email')
    @endif

@endsection
