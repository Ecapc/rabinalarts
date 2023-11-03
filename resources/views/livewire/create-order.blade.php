<div class="container py-8 grid grid-cols-5 gap-6">
    <div class="col-span-3">

        <div class="bg-blueGray-600 rounded-lg shadow p-6"> {{-- Nombre y Numero de Telefono--}}
            <div class="mb-4">
                <x-label value="Nombre de contacto" />
                <x-input type="text" placeholder=" Ingrese el nombre que recibira el producto" class="w-full"
                    wire:model.defer="contact" />
                <x-input-error for="contact" /> {{-- Validacion de errores--}}
            </div>

            <div class="text-black">
                <x-label value="Telefono de contacto" />
                <x-input type="text" placeholder=" Ingrese un numero de telefono de contacto" class="w-full"
                    wire:model.defer="phone" />
                <x-input-error for="phone" /> {{-- Validacion de errores--}}
            </div>
        </div>

        <div x-data="{ envio_type: @entangle('envio_type') }"> {{-- Entrega en tienda y Entrega a Domicilio --}}
            <p class="mt-6 mb-3 text-lg text-white font-semibold">Envíos</p>

            <label class="bg-blueGray-600 rounded-lg shadow px-6 py-4 flex items-center mb-4 cursor-pointer">
                <input x-model="envio_type" type="radio" value="1" name="envio_type" class="text-cyan-700">
                <span class="text-white ml-2">
                    Recojo en tienda
                </span>
                <span class="font-semibold text-green-400 ml-auto">
                    Gratis
                </span>
            </label>

            <div class="bg-blueGray-600 rounded-lg shadow">
                <label class="px-6 py-4 flex items-center mb-4 cursor-pointer">
                    <input x-model="envio_type" type="radio" value="2" name="envio_type" class="text-cyan-700">
                    <span class="text-white ml-2">
                        Envio a Domiciolio
                    </span>
                </label>

                <div class="px-6 pb-6 grid grid-cols-2 gap-6 hidden" :class="{ 'hidden': envio_type != 2 }">
                    {{-- Departamentos --}}
                    <div>
                        <x-label value="Departamento" />
                        <select class="bg-blueGray-200 form-control w-full text-black" wire:model="department_id">
                            <option value="" disabled selected> Seleccione un departamento</option>
                            @foreach ($departments as $department)
                                <option value=" {{ $department->id }} "> {{ $department->name }} </option>
                            @endforeach
                        </select>
                        <x-input-error for="department_id" /> {{-- Validacion de errores--}}
                    </div>

                    {{-- Ciudades --}}
                    <div>
                        <x-label value="Ciudad" />
                        <select class="bg-blueGray-200 form-control w-full text-black" wire:model="city_id">
                            <option value="" disabled selected> Seleccione una ciudad</option>
                            @foreach ($cities as $city)
                                <option value=" {{ $city->id }} "> {{ $city->name }} </option>
                            @endforeach
                        </select>
                        <x-input-error for="city_id" /> {{-- Validacion de errores--}}
                    </div>

                    {{-- Ditritos --}}
                    <div class="">
                        <x-label value="Distrito" />
                        <select class="bg-blueGray-200 form-control w-full text-black" wire:model="district_id">
                            <option value="" disabled selected> Seleccione un distrito</option>
                            @foreach ($districts as $district)
                                <option value=" {{ $district->id }} "> {{ $district->name }} </option>
                            @endforeach
                        </select>
                        <x-input-error for="district_id" /> {{-- Validacion de errores--}}
                    </div>
                    <div>
                        <x-label value="Direccion" />
                        <x-input class="w-full" wire:model="address" type="text" />
                        <x-input-error for="address" /> {{-- Validacion de errores--}}
                    </div>

                    <div class="col-span-2">
                        <x-label value="Referencias" />
                        <x-input class="w-full" wire:model="references" type="text" />
                        <x-input-error for="references" /> {{-- Validacion de errores--}}
                    </div>
                </div>
            </div>
        </div>

        <div> {{-- Boton seguir y Politicas y Privacidad --}}
            <x-button wire:loading.attr="disabled" wire:target="create_order" class="mt-6 mb-4" wire:click="create_order" >
                Continuar con la Compra
            </x-button>

            <hr>

            <p class="text-white text-sm mt-2">
                RabinalArts Handicraft Ceramic se compromete a proteger tu privacidad y cuidar tus datos personales. Esta Política de Privacidad describe cómo recopilamos, usamos y protegemos la información que recopilamos de los usuarios de nuestra tienda en línea
                <a href="" class="font-semibold text-orange-300 ">Politicas y Privacidad</a>
            </p>
        </div>
    </div>

    <div class="col-span-2"> {{-- Muestra de productos y Precio --}}
        <div class="bg-blueGray-800 rounded-lg shadow p-6">
            <ul class="text-white">
                @forelse (Cart::content() as $item)
                    <li class="flex p-2 border-b border-gray-500">
                        <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                        <article class="flex-1">

                            <h1 class="font-bold "> {{ $item->name }} </h1>

                            <div class="flex">

                                <p>Cant:{{ $item->qty }} </p>

                                @isset($item->options['color'])
                                    <p class="mx-2">
                                        - Color: {{ __($item->options['color']) }}
                                    </p>
                                @endisset

                                @isset($item->options['size'])
                                    <p class="mx-2">
                                        {{ __($item->options['size']) }}
                                    </p>
                                @endisset

                            </div>

                            <p>USD:{{ $item->price }}</p>

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

            <hr class="mt-4 mb-3">

            <div class="text-white">
                <p class="flex justify-between">
                    Subtotal
                    <span class="font-semibold">
                        {{ Cart::subtotal() }} USD
                    </span>
                </p>
                <p class="flex justify-between">
                    Envio
                    <span class="font-semibold">
                        @if ($envio_type == 1 || $shipping_cost == 0)
                            Gratis
                        @else
                            {{$shipping_cost}} USD
                        @endif
                    </span>
                </p>

                <hr class="mt-4 mb-3">

                <p class="flex justify-between font-semibold">
                    <span class="text-lg">Total</span>
                    @if ($envio_type == 1 )
                        {{Cart::subtotal()}} USD
                    @else
                    {{Cart::subtotal() + $shipping_cost}} USD
                    @endif
                </p>

            </div>
        </div>
    </div>
</div>
