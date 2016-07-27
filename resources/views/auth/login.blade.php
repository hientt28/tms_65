@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('label.login') }}</div>
                <div class="panel-body">
                    {{ Form::open(['url' => '/login', 'method'=>'POST', 'class'=> 'form-horizontal', 'role'=>'form']) }}
                       <div class="form-group{{ is_active_error($errors, 'email') }}">
                            {{ Form::label('email', trans('label.email_address'), ['class' => 'col-md-4 control-label']) }}
                           <div class="col-md-6">
                                {{ Form::email('email', old('email'), ['class' => 'form-control']) }}
                                {!! display_field_error($errors, 'email') !!}
                          </div>
                        </div>

                        <div class="form-group{{ is_active_error($errors, 'password') }}">
                            {{ Form::label('password', trans('label.password'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::password('password', ['class' => 'form-control', 'name'=>'password']) }}
                                {!! display_field_error($errors, 'password') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                {{ Form::checkbox('remember', '') }}
                                {{ Form::label('password', trans('label.remember'), ['class'=>'col-md-4 control-label']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> {{ trans('label.login') }}
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">{{ trans('passwords.forgot_password') }}
                                </a>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
