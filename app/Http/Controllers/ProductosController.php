<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\TipoRopa;
use App\Models\Marca;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = Producto::orderBy('codigo_producto', 'asc')->paginate(6);
        $marcas = Marca::all();
        $tiposProducto = TipoRopa::all();
        return view('productos.index', [
            'productos' => $productos,
            'marcas' => $marcas,
            'tiposProducto' => $tiposProducto
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'codigo_producto' => 'required|unique:productos,codigo_producto',
            'tipo_producto' => 'required|integer',
            'marca' => 'required|integer',
            'costo' => 'required|numeric|min:0|not_in:0',
            'cantidad' => 'required|integer|min:1',
            'descripcion' => 'required'
        ],[
            'tipo_producto.integer' => 'Debe de seleccionar el tipo del producto',
            'marca.integer' => 'Debe de seleccionar la marca del producto'
        ]);

        $codigo_producto = $request->input('codigo_producto');
        $tipo_producto = $request->input('tipo_producto');
        $marca = $request->input('marca');
        $costo = $request->input('costo');
        $cantidad = $request->input('cantidad');
        $descripcion = $request->input('descripcion');

        if($validator->fails()){

            return Redirect::back()->withErrors($validator);

        }

        $producto = new Producto();
        $producto->codigo_producto = $codigo_producto;
        $producto->tipo_producto_id = (int) $tipo_producto;
        $producto->marca_id = (int) $marca;
        $producto->cantidad = (int) $cantidad;
        $producto->costo = (float) $costo;
        $producto->descripcion = $descripcion;

        $producto->save();

        return redirect()->route('productos.list')
                ->with(['message'=>'Producto creado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $producto = Producto::find($id);
        $marcas = Marca::all();
        $tiposProducto = TipoRopa::all();
        return view('productos.edit',[
            'producto' => $producto,
            'marcas' => $marcas,
            'tiposProducto' => $tiposProducto
        ]);
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $producto = Producto::find($id);
        $validator = Validator::make($request->all(),[
            'codigo_producto' => 'required|unique:productos,codigo_producto,'.$producto->id,
            'tipo_producto' => 'required|integer',
            'marca' => 'required|integer',
            'costo' => 'required|numeric|min:0|not_in:0',
            'nueva_cantidad' => 'integer|min:0',
            'descripcion' => 'required'
        ],[
            'tipo_producto.integer' => 'Debe de seleccionar el tipo del producto',
            'marca.integer' => 'Debe de seleccionar la marca del producto'
        ]);
        $codigo_producto = $request->input('codigo_producto');
        $tipo_producto = $request->input('tipo_producto');
        $marca = $request->input('marca');
        $costo = $request->input('costo');
        $nueva_cantidad = $request->input('nueva_cantidad');
        $descripcion = $request->input('descripcion');


        if($validator->fails()){

            return Redirect::back()->withErrors($validator);

        }

        $producto->codigo_producto = $codigo_producto;
        if($nueva_cantidad > 0){
            $producto->cantidad = $producto->cantidad + (int) $nueva_cantidad;
        }
        $producto->tipo_producto_id = (int) $tipo_producto;
        $producto->marca_id = (int) $marca;
        $producto->costo = (float) $costo;
        $producto->descripcion = $descripcion;



        $producto->update();

        return redirect()->route('productos.list')
                ->with(['message'=>'Producto actualizado correctamente']);

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
    }
}
