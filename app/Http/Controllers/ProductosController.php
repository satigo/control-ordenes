<?php

namespace App\Http\Controllers;

//use App\Models\Producto;
use App\Producto;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \App\Producto $model
     * @return \Illuminate\View\View
     */
    public function index(Producto $model)
    {
        //
        return view('productos.index', ['productos' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Producto $model)
    {
        //
         //Agregamos el producto a la BD pasando por validacion.
         $model->create($request->all());
         return redirect()->route('productos.index')->withStatus(__('Producto agregado correctamente'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
        //LLamamos a la vista de Edicion.
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
        //
        $producto->update($request->all());
        return redirect()->route('productos.index')->withStatus(__('Producto actualizado correctamente.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
        $producto->delete();
        return redirect()->route('productos.index')->withStatus(__('Producto eliminado correctamente.'));
    }
}
