@extends('layouts.app')

@section('content')

    @foreach ($vehicles as $vehicle)
    <div class="card">
        <div class="card-header">
            <h1>{{$vehicle->title}}</h1>
        </div>
    </div>
    <div class="card-body">
        <p class="card-title">User: {{$vehicle->user->name}}</p>
        <p class="card-text">Board{{$vehicle->board}}</p>
        <p class="card-text">Model{{$vehicle->model}}</p>
    </div>

    @endforeach

    {{$vehicles->links()}}

@endsection
