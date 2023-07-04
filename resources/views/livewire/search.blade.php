<div class="flex-1 relative" x-data>

    <form action=" {{route('search')}} " autocomplete="off">
        <x-input name="name" wire:model="search" type="text" class="w-full" placeholder="¿Que es lo que buscas?" />
        <button class="absolute top-0 right-0 w-12 h-full bg-blueGray-500 flex items-center justify-center rounded-r-md">
            <x-search-logo size="35" color="white" />
        </button>
    </form>


    <div class="absolute w-full mt-1 hidden" :class="{ 'hidden': !$wire.open }" @click.away="$wire.open = false">
        <div class="bg-blueGray-600 rounded-lg shadow mt-1">
            <div class="px-4 py-3 space-y-2">
                @forelse ($products as $product)
                    <a href=" {{ route('products.show', $product) }} " class="flex">
                        <img class="w-16 h-12 object-cover" src="{{ Storage::url($product->images->first()->url) }}"
                            alt="">
                        <div class="ml-4 text-white">
                            <p class="text-lg font-semibold leading-5">
                                {{ $product->name }}
                            </p>

                            <p class="text-white">
                                Categoria: {{ $product->subcategory->category->name }}
                            </p>
                        </div>
                    </a>
                @empty
                    <p class="text-lg font-semibold leading-5 text-white">
                        No se encontro ningun producto...
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
