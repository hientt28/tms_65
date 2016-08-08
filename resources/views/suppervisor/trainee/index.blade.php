@extends('layouts.app')

@section('content')
    <div class="container">
        <section>
            <div class="row page-title-row">
                <div class="col-md-6">
                    <h3>&raquo; {{ trans('trainee.manager_trainee') }} </h3>
                </div>
                <div class="col-md-6 text-right">
                    {{ link_to_route('admin.trainees.create', trans('trainee.new_trainee'), null, ['class' => 'btn btn-success']) }}
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            {{ trans('trainee.trainee_table') }}
                        </div>
                        <div class="panel-body">
                            @include('common.success')
                            @include('errors.error')
                            <table class="table" id="myTable">
                                <thead>
                                    <tr class="filters">
                                        <th><input type="checkbox" id="checkAll"/></th>
                                        <th> {{ trans('trainee.id') }} </th>
                                        <th> {{ trans('trainee.name') }} </th>
                                        <th> {{ trans('trainee.email') }} </th>
                                        <th title="edit">{{ trans('trainee.edit') }}</th>
                                        <th title="delete">{{ trans('trainee.delete') }}</th>
                                        <th title="detail">{{ trans('trainee.detail') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($users))
                                        @foreach ($users as $user)
                                            <tr>
                                                <td><input type="checkbox" class="checkthis" name="checkbox[]" value="{{ $user->id }}"/></td>
                                                <td>{{ link_to_route('admin.profile', $user['id'], [ $user->id ]) }}</td>
                                                <td> {{ $user->name }} </td>
                                                <td> {{ $user->email }} </td>
                                                <td>
                                                    {{ link_to_route('admin.trainees.edit', trans('trainee.edit'), [ $user->id ], ['class' => 'btn btn-success']) }}
                                                </td>
                                                <td>
                                                    {!! Form::open(['route' => ['admin.trainees.destroy', $user->id], 'method' => 'DELETE']) !!}
                                                        {{ Form::button("<i class=\"fa fa-trash-o\"></i> ", [
                                                            'class' => 'btn btn-danger',
                                                            'onclick' => "return confirm('" . trans('trainee.confirm_delete') . "')",
                                                            'type' => 'submit',
                                                        ]) }}
                                                    {!! Form::close() !!}
                                                </td>
                                                <td>
                                                    {{ link_to_route('admin.trainees.show', trans('trainee.detail'), [ $user->id ], ['class' => 'btn btn-success']) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                        <div class="pagination pull-right">
                            {!! $users->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
