<div>
    {{-- Barra de navegacion --}}
    <div class="bg-gray-200 py-4 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button wire:click="resetFilters" class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4">
                <i class="fas fa-anchor text-xs mr-2"></i>
                Limpiar filtros</button>
                <!-- component -->

            <!-- Dropdown categorias -->
            <div class="relative mr-4" x-data="{ open: false }"> {{--Lo inicializamos en false--}}
                <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open= !open "> {{--on click evento de alpine--}}
                    <i class="fas fa-paw mr-2 "></i>
                    Categoría
                    <i class="fas fa-angle-down mr-2 ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl " x-show="open" x-on:click.away="open=false">   {{--x-show, es una funcin de alpine--}}
                    
                       @foreach ($kinds as $kind)
                <a href="#" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white" wire:click="$set('kind_id', {{$kind->id}})">{{$kind->name}}</a>
                       @endforeach 
                </div>
                <!-- // Dropdown Body -->
            </div>
            <!-- // Dropdown -->
            
  
        </div>
    </div>

    {{--BLOGS--}}
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 gap-y-8 gap-x-6 gap-y-8">
        @foreach ($species as $specie)
            <article class="bg-white shadow-lg rounded overflow-hidden">
                <img class="h-36 w-full object-cover" src="{{Storage::url($specie->image->url)}}" alt="">
                <div class="px-6 py-4">
                    <h1 class="text-xl text-gray-700 mb-2 leading-6">{{Str::limit($specie->name, 40)}}</h1>
                <p class="text-gray-500 text-sm mb-2">Agregado por : {{$specie->creador->name}}</p>
                

               
        
    <a href="{{route('faunas.show', $specie)}}" class="block text-center w-full mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    Mas información
    </a>
        </div>
            </article>
        @endforeach
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{$species->links()}}
    </div>
    
</div>
