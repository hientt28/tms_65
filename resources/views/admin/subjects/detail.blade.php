@extends('layouts.app')

@section('title', trans('common.title_page.detail_subject'))

@section('content')
    <div class="row">
        <div class="col-lg-12 body-content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('common.title_page.detail_subject') }}
                </div>

                {!! Form::open(['class' => 'form-horizontal', 'id' => 'formDialog']) !!}
                <div class="panel-body">
                    <div class="form-group">
                        {!! Form::label('name', trans('label.name'), ['class' => 'col-md-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', $subject['name'], [
                                'id' => 'name',
                                'class' => 'form-control',
                                'disabled' => 'disabled'
                            ]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', trans('label.description'), ['class' => 'col-md-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('description', $subject['description'], [
                                'id' => 'description',
                                'class' => 'form-control',
                                'rows' => '2',
                                'disabled' => 'disabled'
                            ]) !!}
                        </div>
                    </div>

                    <div>
                        {!! Form::label('tasks', trans('common.title_page.list_task'), ['class' => 'col-md-2']) !!}
                    </div>

                    <div>
                        <table id="dsTask" class="table table-bordered" style="margin-top: 1%">
                            <thead>
                            <tr>
                                <th>{{ trans('common.title_th.task') }}</th>
                                <th>{{ trans('common.title_th.description') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if(count($listTasks) > 0)
                                @foreach($listTasks as $task)
                                    <tr>
                                        <td>{{ $task['name'] }}</td>
                                        <td>{{ $task['description'] }}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="pull-right">
                        {!! link_to_route('admin.subjects.index', trans('common.button.ok'), '', ['class' => 'btn btn-default']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
