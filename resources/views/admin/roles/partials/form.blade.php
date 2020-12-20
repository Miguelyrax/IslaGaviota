<div class="form-group">
    {!! Form::label('name', 'Nombre: ') !!}
    {!! Form::text('name', null, ['class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''), 'placeholder' => 'Escriba un nombre']) !!} {{--$errors es una variable general, que podemos usar para preguntar si esta almacenando algun error en la variable name--}}

    @error('name')
    <span class="invalid-feedback"> {{--Necesita un input con la clase is-invalid por eso usamos otro abajo--}}
        <strong>{{$message}}</strong>
    </span>    
    @enderror
</div>

<strong>Permisos</strong>
<br>  
@error('permissions')
    <small class="text-danger">
        <strong>{{$message}}</strong>
    </small>  
    <br>  
    @enderror

@foreach ($permissions as $permission)
<div>
    <label>
        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
        {{$permission->name}}
    </label>
</div>
    
@endforeach