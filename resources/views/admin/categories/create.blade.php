<x-admin-layout title="Crear categoria" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Categorias',
        'href' => route('admin.categories.index')
    ],
    [
        'name' => 'Nueva categoria'
    ]
]"
title="Dashboard">
    <x-slot name="action">
        <a href="{{route('admin.categories.index')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
            Lista de categorias
        </a>
    </x-slot>
    <h1 class="text-2xl font-bold mb-6">Crear categoria</h1>

    <x-wire-card>
        <form action="{{route('admin.categories.store')}}" method="POST" class="space-y-4">
            @csrf
            <x-wire-input
                label="Nombre"
                placeholder="Nombre de la categoria"
                name="name"
                value="{{old('name')}}"
            />
            <x-wire-textarea label="Descripcion" placeholder="Descripcion de la categoria" name="description">
                {{old('description')}}
            </x-wire-textarea>

            <div class="flex justify-end">
                <x-button type="submit" primary class="float-right">
                Crear categoria
                </x-button>
            </div>

            
        </form>
    </x-wire-card>
</x-admin-layout>