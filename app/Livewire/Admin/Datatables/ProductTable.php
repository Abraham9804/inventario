<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;

class ProductTable extends DataTableComponent
{
    protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "name")
                ->sortable(),
            Column::make("Descripción", "description")
                ->sortable(),
            Column::make("Precio", "price")
                ->sortable(),
            Column::make("Categoria", "category.name")
                ->sortable(),
            Column::make('Acciones')
                ->label(function($row){
                    return view('admin.products.actions', ['product' => $row]);
                })
        ];
    }
}
