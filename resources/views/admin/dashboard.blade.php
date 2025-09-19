<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Pruebas',
    ]
]"
title="Dashboard">
    <x-slot name="action">
        <a href="#" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
            Action
        </a>
    </x-slot>
    <h1 class="text-2xl font-bold">Dashboard</h1>
    <x-wire-button label="Default" >
        test
    </x-wire-button>
</x-admin-layout>
