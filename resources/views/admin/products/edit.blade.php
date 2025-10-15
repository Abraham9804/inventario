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
        <form method="POST" action="{{ route('admin.products.update', $product)}}" class="space-y-4">
            @csrf
            @method('PUT')
            <x-wire-input name="name" label="Nombre" placeholder="Nombre del producto" value="{{old('name', $product->name)}}"/>
            <x-wire-textarea name="description" label="Descripción" placeholder="Descripción del producto">{{old('description', $product->description)}}</x-wire-textarea>
            <x-wire-input name="price" label="Precio" placeholder="0.00" value="{{old('price', $product->price)}}" type="number" step="0.01" min="0"/>
            <div class="space-y-1">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Categoria</label>
                <select 
                    id="category_id"
                    name="category_id"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-900 shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-200 focus:ring-opacity-50"
                >
                    <option value="">Selecciona la categoria</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>









            <div class="flex justify-end">
                <x-button type="submit" primary class="float-right">
                    Editar
                </x-button>
            </div>
        </form>
    </x-wire-card>

    <x-wire-card class="mt-6">
        <h1>Subir imagen</h1>
        <form action="{{ route('admin.products.dropzone', $product) }}" method="POST" 
        class="dropzone flex flex-col items-center justify-around" id="my-dropzone">
            @csrf
            <i class="fa-solid fa-cloud-arrow-up fa-6x"></i>
            <span class="text-gray-600">Suelta tus archivos aquí para subirlos</span>
       </form>
    </x-wire-card>

    @push('js')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                let myDropzone = new Dropzone("#my-dropzone", { 
                    paramName: "file",
                    
                });

                /*const dropzoneElement = document.getElementById("my-dropzone");

                if (dropzoneElement) {
                    new Dropzone(dropzoneElement, {
                        url: dropzoneElement.action,
                        paramName: "file",
                        maxFilesize: 2,
                        acceptedFiles: ".jpg,.jpeg,.png",
                        headers: {
                            "X-CSRF-TOKEN": document
                                .querySelector('meta[name="csrf-token"]')
                                .getAttribute("content"),
                        },
                        
                        success: (file, response) => {
                            console.log("Archivo subido:", response.path);
                        },
                    });
                }*/
            });
        </script>
    @endpush
</x-admin-layout>