@extends('layouts.app')

@section('content')
     <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3>&raquo; {{ trans('trainee.create_trainee') }} </h3>
            </div>
        </div>
     </div>

    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"> {{ trans('trainee.trainee_title_form') }} </h3>
                </div>
                <div class="panel-body">
                    @include('errors.error')
                    {!! Form::open(['route' => ['admin.trainees.store'], 'method' => 'post', 'class' => 'form-horizontal']) !!}
                        <div class="form-group">
                            {!! Form::label('name', trans('trainee.name'), ['class' => 'col-md-3 control-label required']) !!}
                            <div class="col-md-7">
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', trans('trainee.email'), ['class' => 'col-md-3 control-label required']) !!}
                            <div class="col-md-7">
                                {!! Form::email('email', old('email'), ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', trans('trainee.password'), ['class' => 'col-md-3 control-label required']) !!}
                            <div class="col-md-7">
                                {!! Form::password('password', ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-7">
                                {{ Form::button('<i class="fa fa-btn fa-user"></i> ' . trans("trainee.save"), ['type' => 'submit', 'class' => 'btn btn-primary']) }}
                                {{ link_to_route('admin.trainees.index', trans('trainee.back'), null, ['class' => 'btn btn-success']) }}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
