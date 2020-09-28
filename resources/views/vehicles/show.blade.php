@extends('layouts.app')
@section('content')

<div class="row">
  <div class="col">
    <div class="pull-left">
      <h2>Veículos Cadastrados</h2>
    </div>
  </div>
</div>
<div class="row">
  <div class="col">
    <div class="form-group">
      <strong>Id:</strong>
      {{$vehicle->id}}
    </div>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="form-group">
      <strong>Board:</strong>
      {{$vehicle->board}}
    </div>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="form-group">
      <strong>Model:</strong>
      {{$vehicle->model}}
    </div>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="form-group">
      <strong>User:</strong>
      {{$vehicle->user->name}}
    </div>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="form-group">
      <strong>updated:</strong>
      {{$vehicle->updated_at}}
    </div>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="form-group">
      <strong>Created:</strong>
      {{$vehicle->created_at}}
    </div>
  </div>
</div>

@endsection