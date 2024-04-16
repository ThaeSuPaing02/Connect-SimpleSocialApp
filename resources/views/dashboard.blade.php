@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-3">
        @include('shared._left-sidebar')
    </div>
    <div class="col-6">
        @include('shared._success-message')
        @include('shared._submit-ideas')
        <hr>
        <div class="mt-3">
            @foreach ($ideas as $idea)
                @include('shared._idea-card')
            @endforeach
            <div class="mt-3 "></div>
            {{$ideas->links()}}
        </div>
    </div>
    <div class="col-3">
        @include('shared._search-bar')
        @include('shared._follow-box')
    </div>
</div>
@endsection
