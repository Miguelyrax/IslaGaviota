
@extends('adminlte::page')

@section('title', 'Admin')



@section('content_header')
    
@stop

@section('content')

<div class="card">
    <div class="card-body">
        {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}
            
        @include('admin.roles.partials.form')
            

            {!! Form::submit('Actualizar rol', ['class' => 'btn btn-primary mt-2']) !!}

        {!! Form::close() !!}
    </div>
</div>
  
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@livewireStyles
    
    
@stop

@section('js')

@livewireScripts

 

<script> console.log('Hi!'); </script>
@stop
