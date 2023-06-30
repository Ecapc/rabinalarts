<div x-data class="text-white">
   <div>
      <p class="text-xl"> Talla: </p>
      <select wire:model="size_id" class="form-control w-full"> 
         <option value="" selected disabled>Seleccione una Talla</option>   

         @foreach ($sizes as $size)
             <option value="{{$size->id}}">
               {{$size->name}}
             </option>
         @endforeach

      </select>
   </div>

   <div class="mt-2">
      <p class="text-xl"> Color: </p>
      <select class="form-control w-full"> 
         <option value="" selected disabled>Seleccione un Color</option>   

         @foreach ($colors as $color)
             <option  value="{{$color->id}}">
               {{$color->name}}
             </option>
         @endforeach
      </select>
   </div>
   
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
