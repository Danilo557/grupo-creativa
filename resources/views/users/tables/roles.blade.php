@php
    $user = App\Models\User::find($id);
    $roles = $user->roles;
@endphp

 
@foreach ($roles as $rol)
    <x-wire.badge slate :label="$rol->name" />
@endforeach
 
