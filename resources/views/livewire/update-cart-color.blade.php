<div class="flex items-center" x-data>
    <x-secondary-button wire:click="decrement" disabled wire:loading.attr="disabled" wire:target="decrement"
        x-bind:disabled="$wire.qty <= 1">
        -
    </x-secondary-button>

    <span class="mx-2"> {{ $qty }} </span>
    
    <x-secondary-button wire:target="increment" wire:loading.attr="disabled" x-bind:disabled="$wire.qty >= $wire.quantity"
        wire:click="increment">
        +
    </x-secondary-button>
</div>
