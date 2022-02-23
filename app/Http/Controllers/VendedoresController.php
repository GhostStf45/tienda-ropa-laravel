<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Validation\Rule;

class VendedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vendedores = Vendedor::orderBy('nombre', 'asc')->paginate(6);
        return view('vendedores.index',['vendedores' => $vendedores]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vendedores.index');
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
            'nombre' => 'required',
            'apellido' => 'required',
            'celular' => 'required|integer|between:100000000, 999999999',
            'fecha_nacimiento' => 'required|date',
            'direccion' => 'required',
            'dni' => 'required|integer|between:10000000, 99999999|unique:vendedores,DNI',
        ]);


        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $celular = $request->input('celular');
        $fecha_nacimiento = $request->input('fecha_nacimiento');
        $direccion = $request->input('direccion');
        $DNI = $request->input('dni');

        if($validator->fails()){

            return Redirect::back()->withErrors($validator);

        }

        $vendedor = new Vendedor();
        $vendedor->nombre = $nombre;
        $vendedor->apellido = $apellido;
        $vendedor->celular = $celular;
        $vendedor->fecha_nacimiento = $fecha_nacimiento;
        $vendedor->direccion = $direccion;
        $vendedor->Estado = 1;
        $vendedor->DNI = $DNI;
        $vendedor->save();

        return redirect()->route('vendedores.list')
                ->with(['message'=>'Vendedor registrado correctamente']);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $vendedor = Vendedor::find($id);
        return view('vendedores.edit',[
            'vendedor' => $vendedor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendedor $vendedor)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
         //
         //
         $vendedor = Vendedor::find($id);
         $validator = Validator::make($request->all(),[
            'nombre' => 'required',
            'apellido' => 'required',
            'celular' => 'required|integer|between:100000000, 999999999',
            'fecha_nacimiento' => 'required|date',
            'direccion' => 'required',
            'dni' => 'required|integer|between:10000000, 99999999|unique:vendedores,DNI,'.$vendedor->id,
        ]);


        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $celular = $request->input('celular');
        $fecha_nacimiento = $request->input('fecha_nacimiento');
        $direccion = $request->input('direccion');
        $estado = $request->input('estado');
        $DNI = $request->input('dni');

        $vendedor->nombre = $nombre;
        $vendedor->apellido = $apellido;
        $vendedor->celular = $celular;
        $vendedor->fecha_nacimiento = $fecha_nacimiento;
        $vendedor->direccion = $direccion;
        $vendedor->Estado = (int) $estado ;
        $vendedor->DNI = $DNI;

        if($validator->fails()){

            return Redirect::back()->withErrors($validator);

        }


        $vendedor->update();

        return redirect()->route('vendedores.list')
                ->with(['message'=>'Vendedor actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendedor $vendedor)
    {
        //
    }
}
