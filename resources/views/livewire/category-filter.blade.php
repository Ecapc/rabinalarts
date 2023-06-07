<div>
    <div class="bg-blueGray-300 rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-gray-800 uppercase">{{ $category->name }}</h1>
            <div class="grid grid-cols-2 border border-blueGray-800 divide-x divide-blueGray-800 text-blueGray-600">
                <i class="fas fa-border-all p-3 cursor-pointer "></i>
                <i class="fas fa-th-list p-3 cursor-pointer "></i>
            </div>
        </div>
    </div>
    <div class="grid  grid-cols-5 gap-6">
        <aside>
            <h2 class="font-semibold text-white text-center mb-2">Subcategorias</h2>
            <ul class="divide-y divide-blueGray-300">
                @foreach ($category->subcategories as $subcategory)
                    <li class="py-2 text-white text-sm cursor-pointer hover:text-cyan-400 capitalize {{$subcategoria==$subcategory->name ? 'text-cyan-300 font-semibold' : ''}}">
                        <a wire:click="$set('subcategoria', '{{$subcategory->name}}')"> {{ $subcategory->name }} </a>
                    </li>
                @endforeach
            </ul>

            <h2 class="font-semibold text-white text-center mb-2">Subcategorias</h2>
            <ul class="divide-y divide-blueGray-300">
                @foreach ($category->brands as $brand)
                    <li class="py-2 text-white text-sm cursor-pointer hover:text-cyan-400 capitalize {{$marca==$brand->name ? 'text-cyan-300 font-semibold' : ''}}">
                        <a wire:click="$set('marca', '{{$brand->name}}')"> {{ $brand->name }} </a>
                    </li>
                @endforeach
            </ul>
            <x-button class="mt-4" wire:click="limpiar">
                Eliminar filtros
            </x-button>
        </aside>

        <div class="col-span-4">
            <ul class="grid grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <li class="bg-white rounded-lg shadow">
                        <article>
                            <figure>
                                <img class="h-48 w-full object-cover object-center"
                                    src="{{ Storage::url($product->images->first()->url) }}" alt="">
                            </figure>
                            <div class="py-4 px-6">
                                <h1 class="text-lg font-semibold ">
                                    <a href="">
                                        {{ Str::limit($product->name, 20) }}
                                    </a>
                                </h1>
                                <p class="font-bold text-blueGray-900">
                                    US$ {{ $product->price }}
                                </p>
                            </div>
                        </article>
                    </li>
                @endforeach
            </ul>
            <div class="mt-4 ">
                {{$products->links()}}
            </div>
        </div>
    </div>
</div>
