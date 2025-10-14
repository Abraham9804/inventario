<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $newCategory =Category::create($validated);

        session()->flash('swal',[
            'icon'=>'success',
            'title'=>'Categoria creada',
            'text'=>'La categoria se ha creado exitosamente',
            'showConfirmButton' => false,
            'timer'=>1000
        ]);

        return redirect()->route('admin.categories.index',$newCategory)->with('success', 'Categoria creada exitosamente.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
       

        if($category->products()->exists()){
            session()->flash('swal',[
                'icon'=>'error',
                'title'=>'Error al eliminar la categoria',
                'text'=>'La categoria tiene productos asociados',
                'showConfirmButton' => true,
                'confirmButtonColor' => '#3085d6',
                'confirmButtonText' => 'Aceptar'
            ]);

            return redirect()->route('admin.categories.index');
        }

        $category->delete();

        session()->flash('swal',[
            'icon'=>'success',
            'title'=>'Categoria eliminada',
            'text'=>'La categoria se ha eliminado exitosamente',
            'showConfirmButton' => false,
            'timer'=>1500
        ]);

        return redirect()->route('admin.categories.index');
    }
}
