<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use App\Models\Tienda;
use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ventas = Venta::orderBy('created_at', 'desc')->paginate(6);
        $vendedores = Vendedor::all();
        $productos = Producto::all();
        $tiendas = Tienda::all();
        return view('ventas.index', [
            'ventas' => $ventas,
            'productos' => $productos,
            'tiendas' => $tiendas,
            'vendedores' => $vendedores,

        ]);
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
        //
        $validator = Validator::make($request->all(),[
            'codigo_producto' => 'required|integer',
            'tienda' => 'required|integer',
            'vendedor' => 'required|integer',
            'cantidad_vender' => 'required|integer|min:0',
            'precio_venta' => 'required|numeric|min:0|not_in:0',
            'utilidad' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0'
        ],[
            'codigo_producto.integer' => 'Debe de seleccionar el codigo del producto',
            'tienda.integer' => 'Debe de seleccionar la tienda',
            'vendedor.integer' => 'Debe de seleccionar el vendedor'
        ]);

        $codigo_producto = $request->input('codigo_producto');
        $tienda = $request->input('tienda');
        $vendedor = $request->input('vendedor');
        $cantidad_vender = $request->input('cantidad_vender');
        $precio_venta = $request->input('precio_venta');
        $utilidad = $request->input('utilidad');
        $total = $request->input('total');

        if($validator->fails()){

            return Redirect::back()->withErrors($validator);

        }


        $venta = new Venta();
        $venta->codigo_producto_id= (int) $codigo_producto;
        $venta->tienda_id= (int) $tienda;
        $venta->vendedor_id= (int) $vendedor;
        $venta->cantidad_vendida= (int) $cantidad_vender;
        $venta->precio_de_venta= (float) $precio_venta;


        $venta->utilidad= (float) $utilidad;
        $venta->total= (float) $total;

        $venta->save();
        Producto::find($codigo_producto)->decrement('cantidad',$cantidad_vender );

        return redirect()->route('ventas.list')
                ->with(['message'=>'Venta registrada correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $productoAJAX = Producto::find($id);

        return response()->json($productoAJAX);
    }
    public function showProductos()
    {
        //
        $productosAJAX = Producto::all();

        return response()->json($productosAJAX);
    }
    public function showVendedores()
    {
        //
        $vendedoresAJAX = Vendedor::all();

        return response()->json($vendedoresAJAX);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
