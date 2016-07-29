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
