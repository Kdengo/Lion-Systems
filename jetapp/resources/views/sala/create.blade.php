@extends('adminlte::page')

@section('title', 'CRUD')

@section('content_header')
    <h1>Cear Sala</h1>

@stop

@section('content')
<form action="/salas" method="POST">
  @csrf

<div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descripción</label>
    <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="2">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Asientos</label>
    <input id="asientos" name="asientos" type="number"  class="form-control" tabindex="3">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Hrinicio</label>
    <input id="hrinicio" name="hrinicio" type="number"  min="0" max="24" placeholder="hrs"  class="form-control" required tabindex="3">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Hrfin</label>
    <input id="hrfin"  name="hrfin" type="number"  min="0" max="24" placeholder="hrs"  class="form-control" required tabindex="3">
  </div>
  
  

  <a href="/salas" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary"  tabindex="4">Guardar</button>
</form>


    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript">
    function calcularTiempo(){
      try{
        var a = document.getElementById("hrfin").value || 0,
            b = document.getElementById("hrinicio").value || 0;

            document.getElementById("tiempo").value = a-b;
      }catch (e){}
    }
  </script>
</script>
@stop