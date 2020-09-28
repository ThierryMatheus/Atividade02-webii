@extends('layouts.app')
@section('content')

<div class="row">
  <div class="col">
    <div class="pull-left">
      <h2>Editar Veículos</h2>
    </div>
  </div>
</div>

<form action="{{route('vehicles.update', $vehicle->id)}}" method="POST">
  @csrf
  @method('PUT')

  <div class="form-group">
    <label for="exampleInputEmail1">Placa do Veículo</label>
  <input type="text" class="form-control" name="board" value="{{$vehicle->board}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Modelo do Veicu lo</label>
    <input type="text" class="form-control" name="model" value="{{$vehicle->model}}">
  </div>  
  <button type="submit" class="btn btn-primary">Editar</button>
</form>

@endsection