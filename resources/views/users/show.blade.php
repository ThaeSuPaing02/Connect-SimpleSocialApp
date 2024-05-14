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
            @include('users.shared._user-card')
            <div class="mt-3">
                @forelse ($ideas as $idea)
                    @include('ideas.shared._idea-card')
                    @empty
                    <p class="text-center">No results found.</p>
                @endforelse
                <div class="mt-3 "></div>
                {{$ideas->withQueryString()->links()}}
            </div>
            <div class="mt-3 "></div>
        </div>
    </div>
    <div class="col-3">
       @include('shared._search-bar')
       @include('shared._follow-box')
    </div>
</div>
@endsection
