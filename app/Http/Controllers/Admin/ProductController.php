<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create($validated);

        session()->flash('swal',[
            'icon'=>'success',
            'title'=>'Producto creado',
            'text'=>'El producto se ha creado exitosamente',
            'showConfirmButton' => false,
            'timer'=>1000
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {   
        $categories = Category::all();
         $product->load('category');
        return view('admin.products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:products,name,'.$product->id,
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update($validated);

        session()->flash('swal',[
            'icon'=>'success',
            'title'=>'Producto actualizado',
            'text'=>'El producto se ha actualizado exitosamente',
            'showConfirmButton' => false,
            'timer'=>1000
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if($product->inventaries()->exists()){
            session()->flash('swal',[
                'icon'=>'error',
                'title'=>'No se puede eliminar',
                'text'=>'El producto tiene inventario asociado',
                'showConfirmButton' => true,
            ]);
            return redirect()->back();
        }

        if($product->quotes()->exists() || $product->purchaseOrders()->exists())
        {
            session()->flash('swal',[
                'icon'=>'error',
                'title'=>'No se puede eliminar',
                'text'=>'El producto tiene registros asociados',
                'showConfirmButton' => true,
            ]);
            return redirect()->back();
        }

        $product->delete();
        
        session()->flash('swal',[
            'icon'=>'success',
            'title'=>'Producto eliminado',
            'text'=>'El producto se ha eliminado exitosamente',
            'showConfirmButton' => false,
            'timer'=>1000
        ]);

        return redirect()->route('admin.products.index');
    }
}
