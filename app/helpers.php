<?php

if (!function_exists('display_field_error')) {
    function display_field_error($errors, $fieldName)
    {
        if ($errors->has($fieldName)) {
            return '<span class="help-block"><strong>' . $errors->first($fieldName) . '</strong></span>';
        }
    }
}

if (!function_exists('is_active_error')) {
    function is_active_error($errors, $fieldName)
    {
        return ($errors->has($fieldName)) ? ' has-error' : '';
    }
}

if (!function_exists('render_field')) {
    function render_field($obj, $get_field_name, $type)
    {
        if ($type !== 'date') {
            return !empty($obj) ? $obj->$get_field_name : '';
        } else {
            return !empty($obj) ? $obj->$get_field_name : \Carbon\Carbon::now();
        }
    }
}

if (!function_exists('show_entry')) {
    function show_entry($records)
    {
        $entry_default = app('request')->input('entry');
        $entry_default = empty($entry_default) ? 5 : $entry_default;
        return
            '<div class="paginate f-left">' .
            '<span class="paginate-entry">
                    Total ' . Form::select('size', ['5' => 5, '10' => 10, '15' => 15], $entry_default,
                ["class" => "dropdown-entry"]) . ' in ' . $records->total() . ' records
                </span>
            </div>' .
            '<div class="paginate f-right">'
            . $records->links() .
            '</div >';
    }
}

if (!function_exists('fill_status')) {
    function fill_status($status)
    {
        switch ($status) {
            case 1: {
                return '<label class="ui blue ribbon label">' . trans("label.created") . '</label>';
            }
            case 2: {
                return '<label class="ui yellow ribbon label">' . trans("label.in_progress") . '</label>';
            }
            case 3: {
                return '<label class="ui red ribbon label">' . trans("label.pending") . '</label>';
            }
            case 4: {
                return '<label class="ui red ribbon label">' . trans("label.cancel") . '</label>';
            }
        }
    }
}
