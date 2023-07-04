@props(['product'])

<li class="bg-blueGray-300 rounded-lg shadow mb-4">
    <article class="flex">
        <figure>
            <img class="h-48 w-56 object-cover object-center" src="{{ Storage::url($product->images->first()->url) }}"
                alt="">
        </figure>

        <div class="flex-1 py-4 px-6 flex flex-col">
            <div class="flex justify-between">
                <div>
                    <h1 class="text-lg font-semibold text-black">
                        {{ $product->name }}
                    </h1>
                    <p class="font-bold text-black">
                        US$ {{ $product->price }}
                    </p>
                </div>

                <div class="flex items-center">
                    <ul class="flex text-sm">
                        <li class="fas fa-star text-yellow-400"></li>
                        <li class="fas fa-star text-yellow-400"></li>
                        <li class="fas fa-star text-yellow-400"></li>
                        <li class="fas fa-star text-yellow-400"></li>
                        <li class="fas fa-star text-yellow-400"></li>
                    </ul>
                    <span class="text-black text-sm">
                        (77)
                    </span>
                </div>
            </div>

            <div class="mt-auto mb-4">
                <x-danger-enlace href="{{ route('products.show', $product) }}">
                    Mas informacion
                </x-danger-enlace>
            </div>
        </div>
    </article>
</li>
