@php 
    $names = [];

    foreach ($categories as $category) {
        $names[] = $category->name;
    }

   

@endphp
<x-admin-layout title="Crear producto" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Crear Producto'
    ]
]">

    <x-slot name="action">
        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
            Lista de productos
        </a>
    </x-slot>
   
    <x-wire-card>
        <form method="POST" action="{{ route('admin.products.store')}}" class="space-y-4">
            @csrf
            <x-wire-input name="name" label="Nombre" placeholder="Nombre del producto" value="{{old('name')}}"/>
            <x-wire-textarea name="description" label="Descripción" placeholder="Descripción del producto">{{old('description')}}</x-wire-textarea>
            <x-wire-input name="price" label="Precio" placeholder="0.00" value="{{old('price')}}" type="number" step="0.01" min="0"/>
            <x-wire-select label="Categoria" placeholder="Selecciona la categoria" name="category_id">
                @foreach($categories as $category)
                    <x-wire-select.option value="{{$category->id}}" selected="{{ old('category_id') == $category->id}}" label="{{$category->name}}"/>
                @endforeach
            </x-wire-select>
            <div class="flex justify-end">
                <x-button type="submit" primary class="float-right">
                Crear producto
                </x-button>
            </div>
        </form>
    </x-wire-card>

</x-admin-layout>