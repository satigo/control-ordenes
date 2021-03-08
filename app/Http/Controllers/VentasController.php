<?php

namespace App\Http\Controllers;

use App\models\Venta;
use App\Producto;
use App\models\detalle_venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Venta $model)
    {
        //
        return view('ventas.index', ['ventas' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Producto $producto)
    {
        //
        return view('ventas.create',compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Venta $model)
    {
        //      

        $total=$request->precio * $request->cantidad;
        $venta = Venta::create(['id_user' => auth()->id(),
                                 'total'=> $total]);
        //Actualizar stock de producto        
        $producto = Producto::find($request->id);
        $stock=$producto->cantidad;
        $producto->cantidad = $stock-$request->cantidad;
        $producto->save();                         
        //Agregar detalle de venta.
        $last_id_sale=Venta::latest('id')->first();
        $detalle_venta=Detalle_venta::create(['venta_id'=>$last_id_sale->id,
                                              'producto_id'=>$request->id,
                                              'cantidad'=>$request->cantidad,
                                              'precio'=>$request->precio]);
        $detalle_venta->timestamps = false;
        $detalle_venta->save();
         return redirect()->route('productos.index')->withStatus(__('Venta realizada correctamente'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
        return view('ventas.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
