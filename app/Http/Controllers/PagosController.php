<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Tienda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;


class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagos = Pago::orderBy('id', 'asc')->paginate(6);
        $tiendas = Tienda::all();

        return view('pagos.index',[
            'pagos' => $pagos,
            'tiendas' => $tiendas
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
            'nombre_pago' => 'required',
            'viaticos' => 'required|numeric|min:0|not_in:0',
            'gastos_administrativos' => 'required|numeric|min:0|not_in:0',
            'sueldo' => 'required|numeric|min:0|not_in:0',
            'pago_servicios' => 'required|numeric|min:0|not_in:0',
            'fecha' => 'date_format:m',
            'fecha-anio' => 'date_format:Y',
            'tienda' => 'required|integer',
        ],[
            'tienda.integer' => 'Debe de seleccionar la tienda',
        ]);


        $nombre_pago = $request->input('nombre_pago');
        $viaticos = $request->input('viaticos');
        $gastos_administrativos = $request->input('gastos_administrativos');
        $sueldo = $request->input('sueldo');
        $pago_servicios = $request->input('pago_servicios');
        $fecha = $request->input('fecha');
        $fecha_anio = $request->input('fecha-anio');
        $tienda = $request->input('tienda');

        if($validator->fails()){

            return Redirect::back()->withErrors($validator);

        }

        $pago = new Pago();
        $pago->nombre = $nombre_pago;
        $pago->viaticos = $viaticos;
        $pago->gastos_administrativos = $gastos_administrativos;
        $pago->sueldo = $sueldo;
        $pago->pagos_de_servicios = $pago_servicios;
        $pago->mes = $fecha;
        $pago->anio = $fecha_anio;
        $pago->tienda_id = $tienda;
        $pago->save();

        return redirect()->route('pagos.list')->with(['message'=>'Pago creado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tiendas = Tienda::all();
        $pago = Pago::find($id);
        return view('pagos.edit',[
            'pago' => $pago,
            'tiendas' => $tiendas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
        $pago = Pago::find($id);
        $validator = Validator::make($request->all(),[
            'nombre_pago' => 'required',
            'viaticos' => 'required|numeric|min:0|not_in:0',
            'gastos_administrativos' => 'required|numeric|min:0|not_in:0',
            'sueldo' => 'required|numeric|min:0|not_in:0',
            'pago_servicios' => 'required|numeric|min:0|not_in:0',
            'fecha' => 'date_format:m',
            'fecha-anio' => 'date_format:Y',
            'tienda' => 'required|integer',
        ],[
            'tienda.integer' => 'Debe de seleccionar la tienda',
        ]);


        $nombre_pago = $request->input('nombre_pago');
        $viaticos = $request->input('viaticos');
        $gastos_administrativos = $request->input('gastos_administrativos');
        $sueldo = $request->input('sueldo');
        $pago_servicios = $request->input('pago_servicios');
        $fecha = $request->input('fecha');
        $fecha_anio = $request->input('fecha-anio');
        $tienda = $request->input('tienda');

        if($validator->fails()){

            return Redirect::back()->withErrors($validator);

        }

        $pago->nombre = $nombre_pago;
        $pago->viaticos = $viaticos;
        $pago->gastos_administrativos = $gastos_administrativos;
        $pago->sueldo = $sueldo;
        $pago->pagos_de_servicios = $pago_servicios;
        $pago->mes = $fecha;
        $pago->anio = $fecha_anio;
        $pago->tienda_id = $tienda;
        $pago->update();

        return redirect()->route('pagos.list')
                ->with(['message'=>'Pago actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
        //
    }
}
