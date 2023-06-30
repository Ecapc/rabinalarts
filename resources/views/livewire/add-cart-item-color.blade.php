<div x-data>
    <p class="text-xl text-white">
        Color
    </p>
    <select wire:model="color_id" class="form-control w-full">
        <option value="" selected disabled>
            Seleccionar color
        </option>
        @foreach ($colors as $color)
            <option value="{{ $color->id }}"> {{ $color->name }} </option>
        @endforeach
    </select>

    <div class="flex text-white mt-4">
        <div class="mr-4">
            <x-secondary-button wire:click="decrement" disabled wire:loading.attr="disabled" wire:target="decrement"
                x-bind:disabled="$wire.qty <= 1">
                -
            </x-secondary-button>
            <span class="mx-2"> {{ $qty }} </span>
            <x-secondary-button wire:target="increment" wire:loading.attr="disabled"
                x-bind:disabled="$wire.qty >= $wire.quantity" wire:click="increment">
                +
            </x-secondary-button>
        </div>
        
        <div class="flex-1">
            <x-button-my
            x-bind:disabled="!$wire.quantity"
            class="w-full">
                Agregar al carrito de compras
            </x-button-my>
        </div>
    </div>

</div>
