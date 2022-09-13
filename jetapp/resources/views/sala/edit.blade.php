@extends('adminlte::page')

@section('title', 'CRUD')

@section('content_header')
    <h1>Editar Sala</h1>

@stop

@section('content')
<form action="/salas/{{$sala->id}}" method="POST">
  @csrf
  @method('PUT')
<div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" value="{{$sala->nombre}}">    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descripción</label>
    <input id="descripcion" name="descripcion" type="text" class="form-control" value="{{$sala->descripcion}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Asientos</label>
    <input id="asientos" name="asientos" type="number" class="form-control" value="{{$sala->asientos}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Hrinicio</label>
    <input id="hrinicio" name="hrinicio" type="number" min="0" max="24" placeholder="hrs"  class="form-control" required value="{{$sala->hrinicio}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Hrfin</label>
    <input id="hrfin" name="hrfin" type="number" min="0" max="24" placeholder="hrs"  class="form-control" required value="{{$sala->hrfin}}">
  </div>
  <a href="/salas" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@stop

@section('js')

@stop