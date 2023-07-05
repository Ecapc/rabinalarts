<div>
    <x-dropdown width="96">
        <x-slot name='trigger'>
            <span class="relative inline-block cursor-pointer px-2 items-center justify-center ">
                <x-cart class=" px-5" size="35" />

                @if (Cart::count())
                    <span
                        class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"> {{Cart::count()}} </span>
                    </span>
                @else
                    <span class="inline-block w-2 h-2 mr-2 bg-red-600 rounded-full"></span>
                @endif      
        </x-slot>
        <x-slot name='content'>

            <ul class="text-white">
                @forelse (Cart::content() as $item)
                    <li class="flex p-2 border-b border-gray-500">
                        <img class="h-15 w-20 object-cover mr-4" src="{{$item->options->image}}" alt="">
                        <article class="flex-1">

                            <h1 class="font-bold "> {{$item->name}} </h1>

                            <div class="flex">

                                <p>Cant:{{$item->qty}} </p>

                                @isset($item->options['color'])
                                    <p class="mx-2">
                                        - Color: {{__($item->options['color'])}} 
                                    </p>
                                @endisset

                                @isset($item->options['size'])
                                    <p class="mx-2">
                                        {{__($item->options['size'])}} 
                                    </p>
                                @endisset

                            </div>
                            
                            <p>USD:{{$item->price}}</p>

                        </article>
                    </li>
                @empty
                    <li class="py-6 px-4">
                        <p class="text-center text-white">
                            No tiene agregado ni un producto al carrito
                        </p>
                    </li>
                @endforelse
            </ul>

            @if (Cart::count())
                <div class="py-2 px-3 text-white">
                    <p class="text-lg mt-2 mb-3">
                        <span class="font-bold">
                            Total:
                        </span>
                        USD {{Cart::subtotal()}}
                    </p>

                    <x-button-enlace href=" {{route('shopping-cart')}} " lass="w-full">
                        Ir al carrido de compras 
                    </x-button-enlace>

                </div>
            @endif

        </x-slot>
    </x-dropdown>
</div>
