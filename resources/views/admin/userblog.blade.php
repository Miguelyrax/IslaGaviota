
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
<script type="text/javascript">
    const file = document.querySelector('#control');
    window.livewire.on('userStore', () => {
        $('#exampleModal').modal('hide');
        file.value = '';
    });
  </script>
<script>
   const file2 = document.querySelector('#control2');
   const buton = document.querySelector('#btn');
   const buton2 = document.querySelector('#btn2');
   const buton3 = document.querySelector('#btn3');

   buton.addEventListener('click', ()=>{
       file.value = '';
   });
   buton2.addEventListener('click', ()=>{
       file2.value = '';
   });
   buton3.addEventListener('click', ()=>{
       file2.value = '';
   });

</script>
<script> console.log('Hi!'); </script>
@stop
