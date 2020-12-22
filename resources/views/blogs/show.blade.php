<x-app-layout>

    <section class=" py-12 mb-12 bg-gray-700 ">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="w-full h-60 object-cover" src="{{asset('storage/'.$blog->image->url)}}" alt="">
    
            </figure>
            <div class="text-white">
            <h1 class="text-4xl">Nombre: {{$blog->title}}</h1>
            
            <p class="mb-2"> <i class="fas fa-animal">Tipo: {{$blog->category->name}}</i></p>
            </div>
        
        </div>
    
    </section>
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-3 gap-6">
       <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="bg-white shadow-lg rounded overflow-hidden mb-12">
                <div class="px-6 py-4">
                    <h1 class="font-bold text-2xl mb-2">Blog</h1>
                <p class="text-center">{{$blog->description}}</p>
                </div>

            </section>
        </div>
        <div class="order-1 lg:order-2">
            <section class="bg-white shadow-lg rounded overflow-hidden mb-4">
                <div class="px-6 py-4">
                    <div class="flex items-center">
                    <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$blog->creator->profile_photo_url}}" alt="{{$blog->creator->name}}">
                    <div class="ml-4">
                        <h1 class="font-bold text-gray-500 text-lg">Creador. {{$blog->creator->name}}</h1>
                        <a class="text-blue-400 text-sm font-bold" href="">{{'@' . Str::slug($blog->creator->name, '') }}</a>
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
                            <a class="font bold text-gray-500 mb-3" href="{{route('blogs.show', $similar)}}">{{Str::limit($similar->title, 40)}}</a>
                            </h1>
                            <div class="flex items-center mb-2">
                            <img class="h-8 w-8 object-cover rounded-full shadow-lg" src="{{$similar->creator->profile_photo_url}}" alt="">
                            <p class="text-gray-700 text-sm ml-2">{{$similar->creator->name}}</p>
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