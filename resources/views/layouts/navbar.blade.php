<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav in" id="side-menu">
            <li>
                <a href="#" class="active"><i class="fa fa-dashboard fa-fw"></i>
                    {{ trans('label.dashboard') }}
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class="fa fa-bar-chart-o fa-fw"></i>
                    {{ trans('label.chart') }}
                    <span class="fa arrow"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('courses.index') }}">
                    <i class="fa fa-table fa-fw"></i>
                    {{ trans('label.course') }}
                </a>
            </li>
            <li>
                <a href="{{ route('admin.subjects.index') }}">
                    <i class="fa fa-book fa-fw"></i>
                    {{ trans('label.subject') }}
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-tasks fa-fw"></i>
                    {{ trans('label.task') }}
                </a>
            </li>
        </ul>
    </div>
</div>
