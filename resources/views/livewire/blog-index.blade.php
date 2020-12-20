<div>
    {{-- Barra de navegacion --}}
    <div class="bg-gray-200 py-4 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button wire:click="resetFilters" class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4">
                <i class="fas fa-anchor text-xs mr-2"></i>
                Todos los blog</button>
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
                    
                       @foreach ($categories as $category)
                <a  href="#" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white" wire:click="$set('category_id', {{$category->id}})" >{{$category->name}}</a>
                       @endforeach 
                </div>
                <!-- // Dropdown Body -->
            </div>
            <!-- // Dropdown -->
            
  
        </div>
    </div>
    
    {{--BLOGS--}}
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="order-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 lg:col-span-2 lg:order-1 gap-6">
            @foreach ($blogs as $blog)
                <article class="bg-white shadow-lg rounded overflow-hidden">
                    <img class="h-36 w-full object-cover" src="{{Storage::url($blog->image->url)}}" alt="">
                    <div class="px-6 py-4">
                        <h1 class="text-xl text-gray-700 mb-2 leading-6">{{Str::limit($blog->title, 40)}}</h1>
                    <p class="text-gray-500 text-sm mb-2">Creador: {{$blog->creator->name}}</p>
                    

                    <div class="flex">

                            
                            <p>
                                <p class="text-sm text-gray-500 ml-auto">
                                    <i class="fas fa-users"></i>
                                    ({{$blog->vistas_count}})
                                </p>
                            </p>
                    </div>
            
                <a href="{{route('blogs.show', $blog)}}" class="block text-center w-full mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Mas información
                </a>
                </article>
            @endforeach
            <div></div>
            
            
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
                {{$blogs->links()}}
            </div>
        </div>
        <div class="order-1 lg:order-2 hidden lg:block">
            <section class="bg-white shadow-lg rounded overflow-hidden mb-4">
                <div class="px-6 py-4">
                    <div class="flex items-center">
                
                        <div class="ml-4">
                            <h1 class="font-bold text-gray-500 text-lg">Ultimos publicados</h1>
                            
                        </div>
                    </div>
                    
                </div>
            </section>
            <aside class="hidden lg:block">
                @foreach ($recientes as $reciente)
                    <article class="flex mb-6">
                    <img class="h-32 w-40 object-cover" src="{{Storage::url($reciente->image->url)}}" alt="">
                        <div class="ml-3">
                            <h1>
                            <a class="font bold text-gray-500 mb-3" href="{{route('blogs.show', $reciente)}}">{{Str::limit($reciente->title, 40)}}</a>
                            </h1>
                            <div class="flex items-center mb-2">
                            <img class="h-8 w-8 object-cover rounded-full shadow-lg" src="{{$reciente->creator->profile_photo_url}}" alt="">
                            <p class="text-gray-700 text-sm ml-2">{{$reciente->creator->name}}</p>
                            </div>
                            
                        </div>
                    </article>
                @endforeach
            </aside>
        </div>
    </div>
            
    
        
        
    

</div>

