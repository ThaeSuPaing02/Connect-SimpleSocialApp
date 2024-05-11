@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-3">
        @include('shared._left-sidebar')
    </div>
    <div class="col-6">
        <h1>Terms</h1>
        <div class="">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis facilis ipsa, repellat odio earum eos voluptates adipisci quos, similique quae inventore necessitatibus dicta nihil! Nobis in quidem magnam voluptatem exercitationem. Debitis minima quidem mollitia laborum ratione corporis, facere aperiam eum, doloribus tenetur dolores animi quis iusto dolore provident exercitationem id.
        </div>
    </div>
    <div class="col-3">
        @include('shared._search-bar')
        @include('shared._follow-box')
    </div>
@endsection
