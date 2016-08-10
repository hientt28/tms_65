@extends('layouts.app')

@section("content")
    <div class="page-content-wrapper">
        <h3 class="page-header"> {{ trans('user.edit_profile') }} </h3>
        <div class="row">
            {!! Form::model($user, ['method' => 'PUT', 'route' => ['admin.update', $user->id], 'class' => 'form-horizontal', 'files' => true]) !!}
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="text-center">
                        {!! Form::image($user->avatar, null, ['id' => 'show_avatar']) !!}
                        <h6> {{ trans('user.avatar') }} </h6>
                        {!! Form::file('avatar', ['class' => 'text-center center-block well well-sm']) !!}
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 personal-info">
                    <h4> {{ trans('user.information') }} </h4>
                    <div class="form-group">
                        {!! Form::label('name', trans('user.name'), ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-8 input-group">
                            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                            {!! Form::text('name', $user->name, ['class' => 'form-control', 'autofocus']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('address', trans('user.address'), ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-8 input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                            {!! Form::text('address', $user->address, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('phone', trans('user.phone'), ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-8 input-group">
                            <span class="input-group-addon"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                            {!! Form::text('phone', $user->phone, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', trans('user.email'), ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-8 input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                            {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-8">
                            {!! Form::button('<i class="fa fa-edit"></i>&nbsp;' . trans('user.update_profile'), [
                                'type' => 'submit',
                                'class' => 'btn btn-primary btn-md'
                            ]) !!}
                            {{ link_to_route('home', trans('user.cancel'), null, ['class' => 'btn btn-default']) }}
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
