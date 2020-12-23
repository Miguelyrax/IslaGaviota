<x-app-layout>

    <section class="w-screen mb-7 h-96 bg-cover bg-center " style="background-image: url({{asset('storage/'.$blog->image->url)}})">
        
            <div class="bg-gray-900 bg-opacity-75 h-96">
            <div class="text-white grid grid-cols-1 justify-center w-2/3 m-auto py-20 lg:py-32  ">
            <h1 class=" text-5xl text-">Título: {{$blog->title}}</h1>
           
            <p class="mb-2"> <i class="fas fa-animal">Tipo: {{$blog->category->name}}</i></p>
            </div>
        
        </div>
    
    </section>
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-3 gap-6">
       <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="bg-white relative shadow-lg rounded overflow-hidden mb-12">
                <div class="px-6 py-4">
                    <h1 class="font-bold text-2xl mt-6 mb-6">{{$blog->title}}</h1>
                    <img class="w-full h-100 object-cover" src="{{asset('storage/'.$blog->image->url)}}" alt="">
                    <h1 class="font-bold text-2xl mt-6 mb-6">Descripción</h1>
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