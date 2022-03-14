<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Tienda;
use App\Models\Producto;
use App\Models\Marca;
use App\Models\Vendedor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;


class DashboardController extends Controller
{
    //
    public function index(){



        $ventas = Venta::all();

        $aniosUnicos =  $ventas->unique('created_at');

        $tiendas = Tienda::all();
        $productos = Producto::all();
        $marcas = Marca::all();
        $vendedores = Vendedor::all();
        return view('dashboard.main', [
            'ventas' => $ventas,
            'tiendas' => $tiendas,
            'productos' => $productos,
            'marcas' => $marcas,
            'vendedores' => $vendedores
        ]);
    }
    public function getSellsByEmployeeEachMonth(Request $request){
        $ventasPorEmpleado = DB::table('ventas')
        ->where('vendedor_id', $request->input('vendedor_id'))
        ->whereMonth('created_at', $request->input('mn'))
        ->whereYear('created_at', $request->input('yr'))
        ->get();

        //return view('dashboard.principal', ['ventas' => $ventasPorEmpleado]);
        return response()->json($ventasPorEmpleado);
    }
}
