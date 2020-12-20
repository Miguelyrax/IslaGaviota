<div>
    <x-opp>
        <h1 class=" text font-bold text-lg mb-5 ">Especies</h1>
    @include('livewire.specie-modal')
    
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
          {{ session('message') }}
        </div>
        
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger" style="margin-top:30px;">x
          {{ session('error') }}
        </div>
        
    @endif
    <table  class="table table-bordered mt-5 bg-white shadow">
        <thead class=" bg-cool-gray-200 ">
            <tr>
                <th>No.</th>
                <th>Nombre</th>
                <th>Características</th>
               
                
                <th>Acción</th>
                
                
            </tr>
        </thead>
        <tbody>
            @foreach($species as $specie)
            <tr>
                <td>{{ $specie->id }}</td>
                <td>{{ $specie->name }}</td>
                <td>
                    @if ($specie->features)
                    <button data-toggle="modal" data-target="#feature" wire:click="$set('idReserva', {{$specie->id}})" class="bg-primary text-white font-bold  rounded-full w-5  mb-2 hover:bg-blue-700">+</button>
                    @foreach ($specie->features as $feature)
                    {{$feature->name }}
                    @endforeach
                    @else 
                    Sin Características
                    @endif
                
            </td>
                
                
                
               
                <td class="w-2">
                    @if ($specie->status == 3)
                <button  wire:click="updateBajar({{ $specie->id }})" class="bg-danger text-white font-bold px-4 py-2 rounded hover:bg-red-700 mb-2">Dar de baja</button>
                @else 
                 <button type="button" wire:click="updatePublicar({{$specie->id}})" class="bg-primary text-white font-bold px-4 py-2 rounded hover:bg-red-700 mb-2">Publicar</button>
                @endif
                    <button data-toggle="modal" data-target="#ver" wire:click="edit({{ $specie }})"  class="bg-primary text-white font-bold px-4 py-2 rounded w-full  mb-2 hover:bg-blue-700">Ver</button>
                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $specie->id }})" class="bg-primary text-white font-bold px-4 py-2 rounded w-full  mb-2 hover:bg-blue-700">Editar</button>
                <button wire:click="delete({{ $specie->id }})" class="bg-danger text-white font-bold px-4 py-2 rounded hover:bg-red-700">Eliminar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mb-4">
        {{$species->links()}}
    </div>
    
    </x-opp>
</div>