<x-app-layout>

    @if ($specie->habitat->name == 'Terrestres')
    <section class=" py-20 mb-12 bg-cover  " style="background-image: url({{asset('img/Ffauna/terre.jpg')}}) ">
    @else  
    <section id="fondo" class=" py-20 mb-12 bg-cover  " style="background-image: url({{asset('img/Ffauna/mar4.jpg')}})">
    @endif
    
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure class="">
                <img class=" border-solid border-8 border-gray-100  w-full h-60 object-cover" src="{{asset('storage/'.$specie->image->url)}}" alt="">
    
            </figure>
            <div class="text-white">
            <h1 class="text-4xl">Nombre: {{$specie->name}}</h1>
            
            <p class="mb-2"> <i class="fas fa-animal">Tipo: {{$specie->kind->name}}</i></p>
            <p class="mb-2"> <i class="fas fa-animal">Habitat: {{$specie->habitat->name}}</i></p>
            
            </div>
        
        </div>
    
    </section>
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-3 gap-6">
       <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="bg-white shadow-lg rounded overflow-hidden mb-12">
                <div class="px-6 py-4">
                    <h1 class="font-bold text-2xl mb-2">Blog</h1>
                    <img class="w-full h-100 object-cover" src="{{asset('storage/'.$specie->image->url)}}" alt="">
                </div>

            </section>
            <section class="bg-white shadow-lg rounded overflow-hidden mb-12">
                <div class="px-6 py-4">
                    <h1 class="font-bold text-2xl mb-2">Descripcion</h1>
                <p class="text-center">{{$specie->description}}</p>
                </div>

            </section>
            <section class="mb-8">
                <h1 class="font-bold text-3xl">Características</h1>

                <ul class="list-disc list-inside">
                    @foreach ($specie->features as $feature)
                <li class="text-gray-700 text-base">{{$feature->name}}</li>
                    @endforeach
                </ul>
            </section>
        </div>
        <div class="order-1 lg:order-2 hidden lg:block">
            <section class="bg-white shadow-lg rounded overflow-hidden mb-4">
                <div class="px-6 py-4">
                    <div class="flex items-center">
                    
                    <div class="ml-4">
                        <h1 class="font-bold text-gray-500 text-lg">Relacionado </h1>
                        
                    </div>
                    </div>
                    
                </div>
            </section>
            <aside class="hidden lg:block">
                @foreach ($similares as $similar)
                    <article class="flex mb-6">
                    <img class="h-32 w-40 object-cover" src="{{asset('storage/'.$similar->image->url)}}" alt="">
                        <div class="ml-3">
                            <h1>
                            <a class="font bold text-gray-500 mb-3" href="{{route('faunas.show', $similar)}}">{{Str::limit($similar->name, 40)}}</a>
                            </h1>
                            <div class="flex items-center mb-2">
                            <img class="h-8 w-8 object-cover rounded-full shadow-lg" src="{{$similar->creador->profile_photo_url}}" alt="">
                            <p class="text-gray-700 text-sm ml-2">{{$similar->creador->name}}</p>
                            </div>
                            
                        </div>
                    </article>
                @endforeach
            </aside>
        </div>
    </div>
    <x-footer>

    
    </x-footer>
    
</x-app-layout>