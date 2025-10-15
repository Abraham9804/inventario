<?php

namespace App\Livewire\Admin\Datatables;

use App\Models\Image;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

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
            ImageColumn::make("Imagen")
                ->location(fn($row) => $row->image)
                ->attributes(
                    fn($row)=>[
                            'class' => 'product-image'
                        ]
                    
                    ),
            Column::make("Nombre", "name")
                ->sortable()
                ->searchable(),
            Column::make("Descripción", "description")
                ->sortable()
                ->searchable(),
            Column::make("Precio", "price")
                ->sortable()
                ->searchable(),
            Column::make("Categoria", "category.name")
                ->sortable()
                ->searchable(),
            Column::make('Acciones')
                ->label(function($row){
                    return view('admin.products.actions', ['product' => $row]);
                })
        ];
    }
}
