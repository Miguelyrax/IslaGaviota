<x-app-layout>

    <section class="bg-cover" style="background-image: url({{asset('img/Ffauna/fox-5064828_1920.jpg')}})">
    
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-56">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">Bienvenido a la seccion de flora y fauna</h1>
                <p class="text-white text-lg mt-2 mb-4">Aqui encontraras toda la diversidad de plantas y animales que posee isla gaviota.</p>
      
                @livewire('search-fauna')
            </div>
            
        </div>
    
    </section>
    @livewire('fauna-index');
    <x-footer>

    
    </x-footer>
    
    
</x-app-layout>