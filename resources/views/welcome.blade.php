<x-app-layout>

    {{--Portada--}}
<section class="bg-cover" style="background-image: url({{asset('img/home/bird-3158784_1920.jpg')}})">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-56">
        <div class="w-full md:w-3/4 lg:w-1/2">
            <h1 class="text-white font-bold text-4xl">Bienvenido a la aventura de isla gaviota</h1>
            <p class="text-white text-lg mt-2 mb-4">En isla gaviota encotraras distintas especies de animales y flora unica en el pais.</p>
            <!-- component -->
<!-- This is an example component -->
             
       
               @livewire('search')

             
        </div>
        
    </div>

</section>
<section class="mt-24">
    <h1 class="text-gray-600 text-center text-3xl mb-6">ANIMALES</h1>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 gap-y-8">
        
        @foreach ($animales as $animal)
        <article>
            <figure>
                <img class="rounded-xl h-36 w-full object-cover" src="{{asset('storage/'.$animal->image->url)}}" alt="">
            </figure>
            <header class="mt-2">
            <a href="{{route('faunas.show', $animal)}}"><h1 class="text-center text-xl text-gray-700">{{$animal->name}}</h1></a>
            </header>
           

        </article>
        @endforeach
        
        
    </div>

</section>
<section class="mt-24 bg-gray-700 py-12">
    <h1 class="text-center text-white text-3xl">¿No sabes como llegar?</h1>
    <p class="text-center text-white">Aqui te mostraremos</p>
    <div class="flex justify-center mt-4">
    <a href="#mapa" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded   ">
            Ubicación
        </a>
    </div>
    

</section>

<section class="my-24">
    <h1 class="text-center text-3xl text-gray-600">ULTIMOS BLOG</h1>
    <P class="text-center text-gray-500 text-sm mb-6">Blogs de la comunidad de isla gaviota</P>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 gap-y-8 gap-x-6 gap-y-8">
        @foreach ($blogs as $blog)
        <article class="bg-white shadow-lg rounded overflow-hidden">
            <img class="h-36 w-full object-cover" src="{{asset('storage/'.$blog->image->url)}}" alt="">
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
        </div>
        </article>
        @endforeach
    </div>

</section>
<section id="mapa" class="mt-24 bg-gray-700 grid grid-cols-1 lg:grid-cols-2">
    <div class="flex  justify-center order-2 lg:order-1 ">
        
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13922.889814997656!2d-71.48792146851952!3d-29.261110364782823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9691142a40935c29%3A0x34e3ed00b6ea9717!2sIsla%20Gaviota!5e0!3m2!1ses!2scl!4v1606860919359!5m2!1ses!2scl" width="1920" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <div class="mt-24 mb-24 order-1 lg:order-2">
        <h1 class="text-center text-white text-3xl">Ubicacion de la isla gaviota</h1>
        <p class="text-center text-white">Ven a conocernos</p>
        <figure class="flex justify-center mt-4 ">
            <img class="border-solid border-8 border-white " src="{{asset('img/home/unnamed.jpg')}}" alt="">
        </figure>
    </div>
   
    


</section>
{{--<section id="mapa" class="mt-24 bg-gray-700 py-12">
    <h1 class="text-center text-white text-3xl">Ubicacion de la isla gaviota</h1>
    <p class="text-center text-white">Ven a conocernos</p>
    <div class="flex justify-center mt-4">
        
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13922.889814997656!2d-71.48792146851952!3d-29.261110364782823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9691142a40935c29%3A0x34e3ed00b6ea9717!2sIsla%20Gaviota!5e0!3m2!1ses!2scl!4v1606860919359!5m2!1ses!2scl" width="1920" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>


</section>--}}

<section>
    <div class="mt-24 py-12 ">
        
        <h1 class="text-black text-3xl text-center">Sigue conociendonos</h1>
        <p class="text-black text-1xl text-center">Envianos un correo</p>
        <div class="flex justify-center mt-4  ">
            <form action="">
                <input class="mr-2 h-10 bg-gray-200 outline-none border border-4" type="text-center"><button class="bg-blue-500 text-white py-2 px-2 font-bold rounded">Enviar</button>
            </form>
        </div>
        
    </div>
</section>

<x-footer>

    
</x-footer>


</x-app-layout>

