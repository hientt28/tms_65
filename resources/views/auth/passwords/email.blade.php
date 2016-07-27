@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('passwords.reset') }}</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ Form::open(['url' => '/password/email', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) }}
                        <div class="form-group{{ is_active_error($errors, 'email') }}">
                        {{ Form::label('name', trans('label.email_address'), ['class' =>'col-md-4 control-label']) }}
                           <div class="col-md-6">
                                {{ Form::email('email', null,['class'=>'form-control']) }}
                                {!! display_field_error($errors, 'email') !!}
                             </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-envelope"></i> {{ trans('passwords.send_password_reset_link') }}
                                </button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
