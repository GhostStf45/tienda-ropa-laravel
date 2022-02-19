<?php

namespace App\Http\Controllers;

use App\Models\Tienda;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class TiendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tiendas = Tienda::all();
        return view('tiendas.index',['tiendas' => $tiendas]);
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
            'nombre_tienda' => 'required',
            'alquiler' => 'required|numeric|min:0|not_in:0',
            'descripcion' => 'required'
        ]);

        $nombre_tienda  = $request->input('nombre_tienda');
        $alquiler  = $request->input('alquiler');
        $descripcion  = $request->input('descripcion');

        if($validator->fails()){

            return Redirect::back()->withErrors($validator);

        }
        $tienda = new Tienda();

        $tienda->nombre_tienda = $nombre_tienda;
        $tienda->descripcion = $descripcion;
        $tienda->alquiler = $alquiler;

        $tienda->save();

        return redirect()->route('tiendas.list')
                ->with(['message'=>'Tienda creada correctamente']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tienda = Tienda::find($id);
        return view('tiendas.edit',[
            'tienda'=> $tienda
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function edit(Tienda $tienda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $tienda = Tienda::find($id);
        $validator = Validator::make($request->all(),[
            'nombre_tienda' => 'required',
            'alquiler' => 'required|numeric|min:0|not_in:0',
            'descripcion' => 'required'
        ]);

        $nombre_tienda  = $request->input('nombre_tienda');
        $alquiler  = $request->input('alquiler');
        $descripcion  = $request->input('descripcion');

        if($validator->fails()){

            return Redirect::back()->withErrors($validator);

        }

        $tienda->nombre_tienda = $nombre_tienda;
        $tienda->descripcion = $descripcion;
        $tienda->alquiler = $alquiler;

        $tienda->update();
        return redirect()->route('tiendas.list')
                ->with(['message'=>'Tienda actualizada correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tienda $tienda)
    {
        //
    }
}
