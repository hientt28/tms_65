@extends('layouts.app')

@section('title', trans('common.title_page.create_subject'))

@section('content')
    <div class="row">
        <div class="col-lg-12 body-content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('common.title_page.create_subject') }}
                </div>

                {!! Form::open(['url' => 'admin/subjects', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'formDialog']) !!}
                <div class="panel-body">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label('name', trans('label.name'), ['class' => 'col-md-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', old('name'), [
                                'id' => 'name',
                                'class' => 'form-control',
                                'placeholder' => trans('common.placeholder.name')
                            ]) !!}

                            @if ($errors->has('name'))
                                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', trans('label.description'), ['class' => 'col-md-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('description', old('description'), [
                                'id' => 'description',
                                'class' => 'form-control',
                                'rows' => '2',
                                'placeholder' => trans('common.placeholder.description')
                            ]) !!}
                        </div>
                    </div>

                    <div class="pull-right">
                        <a href="{{ route('admin.subjects.index') }}" class="btn btn-default">
                            {{ trans('common.button.cancel') }}
                        </a>
                        <button type="submit" class="btn btn-primary">{{ trans('common.button.save') }}</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
