
    <form class="pt-2 relative mx-auto text-gray-600" autocomplete="off">
        <input wire:model="search" class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg  text-sm focus:outline-none"
          type="search" name="search" placeholder="Search">

          <!-- Using utilities: -->
<button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2 ">
    Buscar
  </button>

        @if ($search)  {{--Si hay algo en search, me filtra la busqueda, de lo contrario no hace nada--}}
        <ul class="absolute z-50 left-0 w-full bg-white mt-1 rounded-lg ">
           
                @forelse ($this->results as $result) {{--enforelse es lo mismo que foreach, con la diferencia, que si no encuentra nada, podemos mostrar algo que queramos--}}
            <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-200 overflow-hidden">
            <a href="{{route('blogs.show', $result)}}">{{$result->title}}</a>
                </li>
                @empty
                <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-200 overflow-hidden">
                        Sin coincidencias
                        </li>
                
                @endforelse
                
            </ul> 
        @endif

        
      </form>