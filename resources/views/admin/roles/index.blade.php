
@extends('adminlte::page')

@section('title', 'Admin')



@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-primary" role="alert">
    <strong>Well done!</strong> {{session('info')}}
</div>
@endif
<div class="card">
    <div class="card-header">
    <a href="{{route('admin.roles.create')}}">Crear rol</a>
    </div>
    <div class="card-body">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $rol)
                    <tr>
                        <td>{{$rol->id}}</td>
                        <td>{{$rol->name}}</td>
                        <td width="10px">
                        <a class="btn btn-secondary" href="{{route('admin.roles.edit', $rol)}}">Editar</a>
                        </td>
                        <td width="10px">
                        <form action="{{route('admin.roles.destroy', $rol)}}" method="POST">
                            @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="4">No hay ningun rol registrado</td>
                </tr>
                    
                @endforelse
            </tbody>
        </table>
    </div>
</div>
  
  
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">


    
    
@stop

@section('js')

@livewireScripts

 

<script> console.log('Hi!'); </script>
@stop
