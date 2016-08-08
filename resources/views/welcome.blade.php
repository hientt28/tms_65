@extends('layouts.app')

@section('title', trans('label.app_name'))

@section('content')
<div class="intro-header">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 landing-page">
                {{ trans('label.welcome') }}
            </div>
        </div>
    </div>
</div>
@endsection
