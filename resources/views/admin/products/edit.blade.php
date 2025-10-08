<x-admin-layout title="Editar producto" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Productos',
        'href' => route('admin.products.index')
    ],
    [
        'name' => 'Editar producto'
    ]

]">

    <x-slot name="action">
        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
            Lista de productos
        </a>
    </x-slot>

    <x-wire-card>
        <form method="POST" action="{{ route('admin.products.update', $product)}}">
            @csrf
            <x-wire-input name="name" label="Nombre" placeholder="Nombre del producto" value="{{old('name', $product->name)}}"/>
            <x-wire-textarea name="description" label="Descripción" placeholder="Descripción del producto">{{old('description', $product->description)}}</x-wire-textarea>
            <x-wire-input name="price" label="Precio" placeholder="0.00" value="{{old('price', $product->price)}}" type="number" step="0.01" min="0"/>
            <x-wire-native-select name="category_id" label="Categoría">
                <option value="" disabled selected>Seleccione una categoría</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" selected="{{ old('category_id') == $category->id}}">{{$category->name}}</option>
                @endforeach
            </x-wire-native-select>
        </form>
    </x-wire-card>
</x-admin-layout>