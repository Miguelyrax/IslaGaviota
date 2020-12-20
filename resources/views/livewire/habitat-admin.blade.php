<div>
    <x-opp>
        <h1 class=" text font-bold text-lg mb-5 ">Hábitat</h1>
    @include('livewire.habitat-modal')
    
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
    <table class="table table-bordered mt-5 bg-white shadow">
        <thead class=" bg-cool-gray-200 ">
            <tr>
                <th>No.</th>
                <th>Hábitat</th>
            
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($habitats as $habitat)
            <tr>
                <td>{{ $habitat->id }}</td>
                <td>{{ $habitat->name }}</td>
               
                <td class="w-10">
                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $habitat->id }})" class="bg-primary text-white font-bold px-4 py-2 rounded w-full  mb-2 hover:bg-blue-700">Editar</button>
                <button wire:click="delete({{ $habitat->id }})" class="bg-danger text-white font-bold px-4 py-2 rounded hover:bg-red-700">Eliminar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mb-4">
        
    </div>
    
    </x-opp>
</div>