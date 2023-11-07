<div class="form-group">
    <x-label>Nombre</x-label>
    {!!Form::text('name',null,['class'=>'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-4','placeholder'=>'Nombre'])!!}
    @error('name')
        <small class="text-sm text-red-600">
            {{$message}}
        <small>
    @enderror
</div>
<div class="h3">Listado de permisos<div>
@foreach ($permissions as $permission)
    <div>
        <x-label>
            {!!Form::checkbox('permissions[]',$permission->id,null, ['class'=>'mr-1']);!!}
            {{$permission->name}}
        </x-label>
    </div>
@endforeach
<div class="mb-3"></div>