
@extends('adminlte::page')

@section('title', 'Admin')



@section('content_header')
    
@stop

@section('content')

@livewire('user-blog')
  
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@livewireStyles
    
    
@stop

@section('js')

@livewireScripts


<script> console.log('Hi!'); </script>
@stop
