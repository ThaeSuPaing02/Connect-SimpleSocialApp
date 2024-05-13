@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-3">
        @include('shared._left-sidebar')
    </div>
    <div class="col-6">
        @include('shared._success-message')
        <hr>
        <div class="mt-3">
             @include('ideas.shared._idea-card')
            <div class="mt-3 "></div>
        </div>
    </div>
    <div class="col-3">
       @include('shared._search-bar')
       @include('shared._follow-box')
    </div>
</div>
@endsection
