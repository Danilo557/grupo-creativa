<x-admin-layout>
    <div class="container py-12 mx-auto">

        <x-wire.button primary class="float-left mb-3" icon="arrow-left" href="{{ route('admin.messages.index') }}" />
        <x-wire.card title="Messages">
            <div class="grid grid-cols-1 gap-4">
                <x-wire.input label="name" readonly value="{{ $message->name }}" />
                <x-wire.input label="email" readonly value="{{ $message->email }}" />
                <x-wire.input label="phone" readonly value="{{ $message->phone }}" />
                <x-wire.input label="city" readonly value="{{ $message->city }}" />
                <x-wire.input label="brand" readonly value="{{ $message->brand }}" />

 
                <x-wire.textarea   label="message" readonly wire:model='message.message' />
            </div>
        </x-wire.card>
    </div>
</x-admin-layout>
