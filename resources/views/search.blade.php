<x-app-layout>

    <div class="container py-8">
        <ul class="text-white">
            @forelse($products as $product)
                <li>
                    <x-product-list :product="$product" />
                </li>
            @empty
                <li class="bg-blueGray-500 font-semibold rounded-lg shadow-xxl ">
                    <div class="p-4">
                        <p class="text-lg text-white">
                            No se encontro ningun producto...
                        </p>
                    </div>
                </li>
            @endforelse
        </ul>
        <div class="mt-4">
            {{$products->links()}}
        </div>
    </div>

</x-app-layout>
