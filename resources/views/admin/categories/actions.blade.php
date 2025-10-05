<div class="flex items-center space-x-2">
    <x-wire-button href="{{route('admin.categories.edit',$category)}}" blue>
        Editar
    </x-wire-button>

    <form action="{{route('admin.categories.destroy', $category)}}" method="POST" >
        @csrf 
        @method('DELETE')
        <x-wire-button type="submit" red>
            Eliminar
        </x-wire-button>
    </form>
</div>