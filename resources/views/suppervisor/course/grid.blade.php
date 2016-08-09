<div class="responstable-toolbar">
    <button class="ui circular blue icon button add-course" onclick="courseBuilder.utils().redirect(&quot;{{route('courses.create')}}&quot;)">
        <i class="add icon"></i>
    </button>

    <button class="ui circular red icon button del-course-multi">
        <i class="trash icon"></i>
    </button>

    <button class="ui circular yellow icon button btn-excel">
        <i class="file excel outline icon"></i>
    </button>

    <button class="ui circular orange icon button btn-csv">
        <i class="file text outline icon"></i>
    </button>

    <div class="f-right">
        <div class="ui fluid category search">
            <div class="ui icon input">
                <form role="form" name="search" method="GET" action="{{ url('/search') }}">
                    {{ csrf_field() }}
                    <input name="term" type="hidden">
                </form>
                <input class="prompt" type="text" placeholder="Search course...">
                <i class="search icon"></i>
            </div>
            <div class="results"></div>
        </div>
    </div>
</div>
<table class="responstable">
    <tbody>
    <tr>
        <th><input type="checkbox" name="select-all"/></th>
        <th>{{ trans('label.id') }}</th>
        <th>{{ trans('label.name') }}</th>
        <th>{{ trans('label.start_date') }}</th>
        <th>{{ trans('label.end_date') }}</th>
        <th>{{ trans('label.description') }}</th>
        <th>{{ trans('label.status') }}</th>
        <th>{{ trans('label.action') }}</th>
    </tr>
    @if(empty($course))
        @foreach ($courses as $course)
            {{ Form::open(['method' => 'DELETE', 'route' => ['courses.destroy', $course->id], 'name' => 'delRoute'.$course->id, 'id' => 'delRoute']) }}
            <tr class="row-{{$course->id}}">
                <td>
                    <input type="checkbox" name="radio-{{ $course->id }}" value="{{ $course->id }}" onclick="courseBuilder.saveStorage('{{$course->id}}')">
                </td>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->start_date }}</td>
                <td>{{ $course->end_date }}</td>
                <td>{{ $course->description }}</td>
                <td>{!! fill_status($course->status) !!}</td>
                <td>
                    <div class="field">
                        <button class="ui circular facebook icon button" onclick="courseBuilder.utils().redirect(&quot;{{route('courses.edit', ['course' => $course->id])}}&quot;)">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button class="ui circular twitter icon button" onclick="courseBuilder.utils().redirect(&quot;{{route('courses.show', ['course' => $course->id])}}&quot;)">
                            <i class="info icon"></i>
                        </button>
                        <button class="ui circular red icon button del-course" type="submit" onclick="courseBuilder.saveSelect('{{$course->id}}')">
                            <i class="trash icon"></i>
                        </button>
                    </div>
                </td>
            </tr>
            {{ Form::close() }}
        @endforeach
    @else
        <tr>
            <td>{{ trans('label.data_empty') }}</td>
        </tr>
    @endif
    </tbody>
</table>
{{ Form::open(['method' => 'GET', 'route' => 'courses.index', 'name' => 'show-entry']) }}
    <input type="hidden" name="entry"/>
{{ Form::close() }}
{!! show_entry($courses) !!}
@include('common.confirm')
