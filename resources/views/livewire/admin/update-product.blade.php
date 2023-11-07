<div>
 <x-wire.button href="{{ route('admin.products.index') }}" primary icon="arrow-left" class="mb-3" />
    <x-wire.card title="Products">
        <div class="grid grid-cols-1 gap-4">

            <div class="bg-white shadow-lg rounded-lg p-6 my-6" wire:ignore>
                <form method="POST" action="{{ route('admin.products.files', $product) }}" class="dropzone"
                    id="my-great-dropzone">
                </form>
            </div>

            @if ($product->images)
            <div class="bg-white shadow-xl rounded-lg p-6 mb-4">
                <h2 class="text-2xl text-center font-semibold mb-2">Imagenes del producto</h2>
                <ul class="flex flex-wrap">
                    @foreach ($product->images as $image)

                    <li class="relative" wire:key="image-{{$image->id}}">
                        <img class="w-32 h-20 object-cover" src="{{asset('/storage/'. $image->url)}}" />
                        <x-danger-button class="absolute right-1 top-2" wire:click="deleteImage({{$image->id}})"
                            wire:loading.attr="disabled" wire:target="deleteImage({{$image->id}})">
                            x
                        </x-danger-button>
                    </li>
                    @endforeach


                </ul>


            </div>
            @endif

            <x-wire.input right-icon="pencil" label="Name" placeholder="name" wire:model.defer="name" />
            <x-wire.input right-icon="pencil" label="Slug" placeholder="slug" wire:model.defer="slug" disabled
                class="bg-gray-100" />
            <x-wire.select label="Search a Brand" placeholder="Select some brand"
                :async-data="route('admin.brands.select')" option-label="name" option-value="id"
                wire:model.defer="brand_id" />
            <x-wire.select label="Search a Category" placeholder="Select some category"
                :async-data="route('admin.category.select')" option-label="name" option-value="id"
                wire:model.defer="category_id" />

            <x-wire.select name="features[]" wire:model.defer="features" multiselect label="Search a Feature"
                placeholder="Select some feature" :async-data="route('admin.features.select')" option-label="name"
                option-value="id" />
            <x-wire.select name="ideals[]" wire:model.defer="ideals" multiselect label="Search a Ideals"
                placeholder="Select some Ideals" :async-data="route('admin.ideals.select')" option-label="name"
                option-value="id" />
            <x-wire.select name="colors[]" wire:model.defer="colors" multiselect label="Search a Colors"
                placeholder="Select some Ideals" :async-data="route('admin.colors.select')" option-label="name"
                option-value="id" />
            <x-wire.select name="materials[]" wire:model.defer="materials" multiselect label="Search a Materials"
                placeholder="Select some Materials" :async-data="route('admin.materials.select')" option-label="name"
                option-value="id" />

            @livewire('admin.product-store', ['product' => $product], key('product-store-'.$product->id))
            @livewire('admin.product-size', ['product' => $product], key('product-size-'.$product->id))

            <x-wire.card title="Status" >
            <x-wire.toggle lg wire:model.defer="status" label="Published" />
        </x-wire.card>

        </div>

        

        <x-slot name="footer">
            <x-button wire:click="updateproduct" wire:loading.attr="disabled" wire:target="updateproduct"
                class="disabled:opacity-25">
                Update
            </x-button>

        </x-slot>
    </x-wire.card>




    @push('js')
    <script>
        Dropzone.options.myGreatDropzone = { // camelized version of the `id`
            //Token CSRF
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            //Mensaje default
            dictDefaultMessage: 'Arrastre una imagen al recuadro',
            acceptedFiles: 'image/*',
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            complete: function (file) {
                //Remueve(visualmente) del formulario la imagen despues de cargada
                this.removeFile(file)
            },
            queuecomplete: function () {
                Livewire.emit('refreshProduct');
            }

        };
    </script>
    @endpush

</div>