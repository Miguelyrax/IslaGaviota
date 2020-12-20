<div>
    <x-opp>
    <h1 class=" text font-bold text-lg mb-5 ">Blogs </h1>
    @include('livewire.blog-modal')
    
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
                <th>Titulo</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td>{{ $blog->id }}</td>
                <td>{{ $blog->title }}</td>
               
                
                
               
               
                <td class="w-10">
                    @if ($blog->status == 3)
                <button  wire:click="updateBajar({{ $blog->id }})" class="bg-danger text-white font-bold px-4 py-2 rounded hover:bg-red-700 mb-2">Dar de baja</button>
                @else 
                <button type="button" wire:click="updatePublicar({{ $blog->id }})" class="bg-primary text-white font-bold px-4 py-2 rounded hover:bg-red-700 mb-2">Publicar</button>
                @endif
                    <button data-toggle="modal" data-target="#ver" wire:click="edit({{ $blog }})"  class="bg-primary text-white font-bold px-4 py-2 rounded w-full  mb-2 hover:bg-blue-700">Ver</button>
                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $blog->id }})" class="bg-primary text-white font-bold px-4 py-2 rounded w-full  mb-2 hover:bg-blue-700">Editar</button>
                <button wire:click="delete({{ $blog->id }})" class="bg-danger text-white font-bold px-4 py-2 rounded hover:bg-red-700">Eliminar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mb-4">
        {{$blogs->links()}}
    </div>
    
    </x-opp>
</div>