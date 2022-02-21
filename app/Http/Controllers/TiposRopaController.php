<?php

namespace App\Http\Controllers;

use App\Models\TipoRopa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class TiposRopaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tiposRopa = TipoRopa::orderBy('nombre_del_producto', 'asc')->paginate(6);
        return view('tipo_ropa.index', ['tiposRopa' => $tiposRopa]);
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
        //
        $validator = Validator::make($request->all(),[
            'nombre_del_producto' => 'required'
        ]);

        $nombre_del_producto = $request->input('nombre_del_producto');



        if($validator->fails()){

            return Redirect::back()->withErrors($validator);

        }

        $tipoRopa = new TipoRopa();
        $tipoRopa->nombre_del_producto = $nombre_del_producto;


        $tipoRopa->save();
        return redirect()->route('tiposRopa.list')
                ->with(['message'=>'Tipo de ropa creado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoRopa  $tipoRopa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tipoRopa = TipoRopa::find($id);
        return view('tipo_ropa.edit',[
            'tipoRopa' => $tipoRopa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoRopa  $tipoRopa
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoRopa $tipoRopa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoRopa  $tipoRopa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $tipoRopa = TipoRopa::find($id);
        $validator = Validator::make($request->all(),[
            'nombre_del_producto' => 'required'
        ]);

        $nombre_del_producto = $request->input('nombre_del_producto');

        $tipoRopa->nombre_del_producto = $nombre_del_producto;
        if($validator->fails()){

            return Redirect::back()->withErrors($validator);

        }
        $tipoRopa->update();
        return redirect()->route('tiposRopa.list')
                ->with(['message'=>'Tipo de ropa actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoRopa  $tipoRopa
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoRopa $tipoRopa)
    {
        //
    }
}
