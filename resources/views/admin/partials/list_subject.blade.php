<table class="table table-striped table-hover" id="tblSubject">
    <thead>
    <tr>
        <th class="th"><input type="checkbox" id="checkAll"></th>
        <th class="th">{{ trans('common.title_th.name') }}</th>
        <th class="th">{{ trans('common.title_th.description') }}</th>
        <th class="th">{{ trans('common.title_th.update') }}</th>
        <th class="th" colspan="3">{{ trans('common.title_th.action') }}</th>
    </tr>
    </thead>
    <tbody>
    @if(count($listSubjects) > 0)
        @foreach($listSubjects as $subject)
            <tr id="{{ $subject['id'] }}">
                <td class="chk">
                    <input type="checkbox" class="case" value="{{ $subject['id'] }}"/>
                </td>
                <td class="td_subject_name">{{ $subject['name'] }}</td>
                <td class="td_subject_description">{{ $subject['description'] }}</td>
                <td class="td_subject_update">{{ $subject['updated_at_status'] }}</td>

                <td class="td_subject_action">
                    <a href="{{ route('admin.subjects.show', [$subject['id']]) }}" class="btn btn-link">
                        <i class="fa fa-th-list fa-fw"></i>{{ trans('common.button.list_task') }}
                    </a>
                </td>

                <td class="td_subject_action">
                    <a href="{{ route('admin.subjects.edit', [$subject['id']]) }}" class="btn btn-link">
                        <i class="fa fa-pencil fa-fw"></i>{{ trans('common.button.edit') }}
                    </a>
                </td>

                <td class="td_subject_action">
                    {!! Form::open(['route' => ['admin.subjects.destroy', $subject['id']], 'method' => 'DELETE']) !!}
                    {{ Form::button('<i class="fa fa-btn fa-sign-in"></i> ' . trans('common.button.delete'), [
                        'type' => 'submit',
                        'class' => 'btn btn-link',
                        'onclick' => "return confirm('" . trans('common.confirm.delete') . "')"
                    ]) }}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<div id="pagination" class="pull-right">
    @if(count($listSubjects) > 0)
        {{ $listSubjects->render() }}
    @endif
</div>
