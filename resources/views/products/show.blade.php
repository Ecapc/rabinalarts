<x-app-layout>
    <div class="container">
        <div class="grid grid-cols-2 gap-6 py-8">
            <div>
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images as $images)
                            <li data-thumb="{{ Storage::url($images->url) }}">
                                <img src="{{ Storage::url($images->url) }}" />
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="">
                <h1 class="text-xl font-bold text-white">
                    {{ $product->name }}
                </h1>
                <div class="flex">
                    <p class="text-white">Marca: <a class=" underline capitalize hover:text-yellow-500" href="">
                            {{ $product->brand->name }} </a></p>
                    <p class="text-white ml-6">7 <i class="fas fa-star text-yellow-300 text-sm"></i></p>
                    <a class="text-white ml-4 hover:text-yellow-400 underline" href=""> 39 reseñas</a>
                </div>
                <p class="text-2xl font-semibold text-white my-4">
                    USD {{ $product->price }}
                </p>
                <div class="bg-white rounded-lg shadow-lg mb-6">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-green-500">
                            <i class="fas fa-truck text-white text-sm"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-green-500 ">
                                Se hacen envios a Estados Unidos
                            </p>
                            <p class="">
                                Recibelo el {{ Date::now()->addDay(30)->locale('es')->format('l j F') }}
                            </p>
                        </div>
                    </div>
                </div>

                {{--
                @if ($product->subcategory->size)
                    @livewire('add-cart-item-size', ['product' => $product])
                @endif
                @if ($product->subcategory->color)
                    @livewire('add-cart-item-color', ['product' => $product])
                @endif
                @livewire('add-cart-item', ['product' => $product])
                --}}

                @if ($product->subcategory->size)
                    @livewire('add-cart-item-size', ['product' => $product])
                @elseif ($product->subcategory->color)
                    @livewire('add-cart-item-color', ['product' => $product])
                @else
                    @livewire('add-cart-item', ['product' => $product])
                @endif


            </div>
        </div>
    </div>


    @push('script')
        <script>
            // Can also be used with $(document).ready()
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush
</x-app-layout>
