
@extends('adminlte::page')

@section('title', 'Admin')



@section('content_header')
    
@stop

@section('content')

@livewire('tipo-admin')
  
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@livewireStyles
    
    
@stop

@section('js')

@livewireScripts

<script type="text/javascript">
  window.livewire.on('userStore', () => {
      $('#exampleModal').modal('hide');
  });
</script>

<script> console.log('Hi!'); </script>
@stop
