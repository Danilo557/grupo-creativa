<div class="flex justify-center">
    <div class="contact">
        <div class="grid grid-cols-1 gap-4">
            
            <x-wire.input placeholder="Nombre Completo*" wire:model="name"/>
            <x-wire.input placeholder="Correo Electronico*" wire:model="email" />
            <x-wire.input placeholder="Telefono*" wire:model="phone"/>
            <x-wire.input placeholder="Ciudad*" wire:model="city"/>
            <x-wire.input placeholder="¿Qué marca te interesa?*" wire:model="brand"/>
            <x-wire.textarea placeholder="Mensaje*" wire:model="message"/>
            <x-wire.button lg  secondary  class="flex justify-center" wire:click='save'  wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                <span>Enviar</span>
            </x-wire.button>
        </div>

    </div>
</div>
