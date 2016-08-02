<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav in" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    {{ Form::text('search', null, ['class'=>'form-control', 'placeholder'=>trans('label.search')]) }}
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </li>
            <li>
                <a href="index.html" class="active"><i class="fa fa-dashboard fa-fw"></i>
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
                <a href="tables.html">
                    <i class="fa fa-table fa-fw"></i>
                    {{ trans('label.course') }}
                </a>
            </li>
            <li>
                <a href="forms.html">
                    <i class="fa fa-book fa-fw"></i>
                    {{ trans('label.subject') }}
                </a>
            </li>
            <li>
                <a href="forms.html">
                    <i class="fa fa-tasks fa-fw"></i>
                    {{ trans('label.task') }}
                </a>
            </li>
        </ul>
    </div>
</div>
