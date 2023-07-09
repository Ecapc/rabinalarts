<div class="container py-8" x-data>
    <section class="bg-blueGray-300 rounded-lg shadow-lg p-6 text-white">
        <h1 class="text-black text-lg font-semibold mb-6">CARRO DE COMPRAS</h1>

        @if (Cart::count())
            <table class="table-auto text-black w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Cart::content() as $item)
                        <tr>
                            <td>
                                <div class="flex mt-3">
                                    <img class="h-15 w-20 object-cover" src=" {{ $item->options->image }} " alt="">
                                    <div class="px-3">
                                        <p class="font-bold"> {{ $item->name }} </p>
                                        @if ($item->options->color)
                                            <span class="mr-1">
                                                Color: {{ __($item->options->color) }}
                                            </span>
                                        @endif

                                        @if ($item->options->size)
                                            <span class="mx-1">
                                                -
                                            </span>

                                            <span>
                                                {{ $item->options->size }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <td class="text-center">
                                USD {{ $item->price }}
                                <a class="ml-6 cursor-pointer hover:text-red-600"
                                    wire:click="delete('{{$item->rowId}}')"
                                    wire:loading.class="text-red-600 opacity-25"
                                    wire:target="delete('{{$item->rowId}}')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>

                            <td class="">
                                <div class="flex justify-center">
                                    {{-- {{$item->rowId}}
                                    @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId)) --}}

                                    @if ($item->options->size)
                                        @livewire('update-cart-size', ['rowId' => $item->rowId], key($item->rowId))
                                    @elseif($item->options->color)
                                        @livewire('update-cart-color', ['rowId' => $item->rowId], key($item->rowId))
                                    @else
                                        @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                    @endif
                                </div>
                            </td>

                            <td class="text-center">
                                USD {{ $item->price * $item->qty }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a class="text-black text-sm cursor-pointer hover:underline mt-5 inline-block" wire:click="destroy">
                <i class="fas fa-trash"></i>
                Borrar Carrido de Compras
            </a>
        @else
            <div class="flex flex-col items-center">
                <x-cart color="black" />
                <p class="text-lg text-black mt-4">TU CARRO DE COMPRAS ESTA VACIO</p>

                <x-button-enlace href="/" class="mt-4 px-20">
                    Ir al inicio
                </x-button-enlace>
            </div>
        @endif

    </section>

    @if (Cart::count())
        <div class="bg-blueGray-600 rounded-lg shadow-lg px-6 py-4 mt-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-white">
                        <span class="font-bold text-lg">Total:</span>
                        USD {{Cart::subTotal()}}
                    </p>
                </div>

                <div>
                    <x-button-enlace href=" {{route('orders.create')}} ">
                        Continuar
                    </x-button-enlace>
                </div>
            </div>
        </div>
    @endif

</div>
