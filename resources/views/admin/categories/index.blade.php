<x-admin-layout title="Categorias" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Categorias',
    ]
]" title="Dashboard">
    <x-slot name="action">
        <a href="{{route('admin.categories.create')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
            Crear categoria
        </a>
    </x-slot>
    <h1 class="text-2xl font-bold mb-6">Lista de categorias</h1>
    @livewire('Admin.Datatables.CategoryTable')

    @push('js')
        <script>
                document.addEventListener('submit', function(e){
                    if(e.target && e.target.classList.contains('delete-form')){
                        e.preventDefault()
                        Swal.fire({
                            title: "Desea eliminar la categoria?",
                            text: "Esta acción no es reversible!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Eliminar",
                            cancelButtonText: "Cancelar"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                e.target.submit()
                            }
                        });
                    }
                    
                    
                    
                })
        </script>
    @endpush
</x-admin-layout>