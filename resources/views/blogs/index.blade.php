<x-app-layout>
    <section class="bg-cover  " style="background-image: url({{asset('img/blogs/blog-970722_1920.jpg')}}) ">
    
        <div class="max-w-3xl flex items-center text-center mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="w-full ">
                <h1 class="text-white font-bold text-4xl">¿Estas buscando algo en particular?</h1>
                <p class="text-white  text-lg mt-2 mb-4">Prueba con el buscador de isla gaviota.</p>
      
                @livewire('search')
            </div>
            
        </div>
    
    </section>

    @livewire('blog-index')
    <x-footer>

    
    </x-footer>
    
</x-app-layout>