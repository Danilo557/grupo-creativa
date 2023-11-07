<div>
    <div class="flex items-center" x-data>
        <x-wire.button primary   disabled x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled" wire:target="decrement"
            wire:click="decrement()">-</x-wire.button>
        <span class="mx-2">{{ $qty }}</span>
        <x-wire.button primary  x-bind:disabled="$wire.qty >= $wire.quantity" wire:loading.attr="disabled" wire:target="increment"
            wire:click="increment()">+</x-wire.button>
    </div>
</div>
