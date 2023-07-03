<div class="text-white" x-data>
    <p class="mb-4">
        <span class="font-semibold texl-lg"> Stock disponible:</span> {{ $quantity }}
    </p>
    <div class="flex">
        <div class="mr-4">
            <x-secondary-button wire:click="decrement" disabled wire:loading.attr="disabled" wire:target="decrement"
                x-bind:disabled="$wire.qty <= 1">
                -
            </x-secondary-button>

            <span class="mx-2"> {{ $qty }} </span>
            
            <x-secondary-button wire:target="increment" 
                                wire:loading.attr="disabled"
                                x-bind:disabled="$wire.qty >= $wire.quantity" 
                                wire:click="increment">
                +
            </x-secondary-button>
        </div>
        <div class="flex-1">
            <x-button-my class="w-full"
                x-bind:disabled="$wire.qty > $wire.quantity"
                wire:click="addItem"
                wire:loading.attr="disabled"
                wire:target="addItem">
                Agregar al carrito de compras
            </x-button-my>
        </div>
    </div>
</div>
