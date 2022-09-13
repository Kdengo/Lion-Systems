@extends('adminlte::page')

@section('title', 'CRUD')

@section('content_header')
    <h1>Administracion de Salas</h1>

@stop

@section('content')
<a href="salas/create" class="btn btn-primary mb-3">CREAR</a>

<table id="salas" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Asientos</th>
            <th scope="col">Hr Inicio</th>
            <th scope="col">Hr Fin</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($salas as $sala)
        <tr>
            <td>{{$sala->id}}</td>
            <td>{{$sala->nombre}}</td>
            <td>{{$sala->descripcion}}</td>
            <td>{{$sala->asientos}}</td>
            <td>{{$sala->hrinicio}}</td>
            <td>{{$sala->hrfin}}</td>
            <td>
            <form action="{{route ('salas.destroy', $sala->id)}}" method="POST">
                <a href="salas/{{$sala->id}}/edit" class="btn btn-info">Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Borrar</button>
            </form>    
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
    $('#salas').DataTable({
        "lengthMenu":[[5,10,50,-1],[5,10,50, "All"]]
    });
});
</script>
@stop