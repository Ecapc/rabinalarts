<header class="bg-blueGray-800">
    <div class="container flex items-center h-16"> 
        <a class="flex flex-col items-center justify-center px-4 bg-black bg-opacity-25 text-white cursor-pointer h-full">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path lass="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span>
                Categoriasasas
            </span>
        </a> 
        <a href="/" class="mx-6"> 
            <x-application-mark class="block h-9 w-auto" />      
        </a>
        @livewire('search')
        <x-search-logo size="35"/>
    </div>
</header>
