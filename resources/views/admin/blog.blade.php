
@extends('adminlte::page')

@section('title', 'Admin')



@section('content_header')
    
@stop

@section('content')

@livewire('blog-admin')
  
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@livewireStyles
    
    
@stop

@section('js')

@livewireScripts

  <script>
    const file = document.querySelector('#control');
    const buton = document.querySelector('#btn');
    const buton2 = document.querySelector('#btn2');
  
    buton.addEventListener('click', ()=>{
        file.value = '';
    });
    buton2.addEventListener('click', ()=>{
        file.value = '';
    });
    
  
  </script>

<script> console.log('Hi!'); </script>
@stop
