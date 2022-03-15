@extends('home')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Pagos</h1>

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message')}}
    </div>
@endif

<div class="row">
    <div class="col-md-8">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Gestionar pagos</h6>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Víaticos</th>
                                    <th>Gastos Administrativos</th>
                                    <th>Sueldo</th>
                                    <th>Pagos de servicios</th>
                                    <th>Mes</th>
                                    <th>Año</th>
                                    <th>Tienda</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Víaticos</th>
                                    <th>Gastos Administrativos</th>
                                    <th>Sueldo</th>
                                    <th>Pagos de servicios</th>
                                    <th>Mes</th>
                                    <th>Año</th>
                                    <th>Tienda</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ( $pagos as $pago)
                                    <tr>
                                        <td>{{ $pago->id }}</td>
                                        <td>{{ $pago->nombre}}</td>
                                        <td>{{ $pago->viaticos}}</td>
                                        <td>{{ $pago->gastos_administrativos}}</td>
                                        <td>{{ $pago->sueldo}}</td>
                                        <td>{{ $pago->pagos_de_servicios}}</td>
                                        <td>{{ $pago->mes}}</td>
                                        <td>{{ $pago->anio}}</td>
                                        <td>{{ $pago->tiendas->nombre_tienda}}</td>
                                        <td>
                                            <a href="{{ route('pagos.show', ['id' => $pago->id]) }}" class=" btn btn-primary my-1 mx-1 btn-sm">Editar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

        </div>
         <!--Pagination-->
         <div class="mt-3 d-flex align-items-center justify-content-md-center col-md-12">
            {{$pagos->appends(request()->except('page'))->links()}}
        </div>
    <!--End pagination-->
    </div>
    <div class="col-md-4">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Agregar pago</h6>
                    </div>
                <div class="card-body">
                    <form action="{{url('/pagos/crear')}}" method="post" class="row">
                        @csrf <!-- {{ csrf_field() }} -->
                        <div class="mb-3">
                            <label class="form-label">Nombre del pago</label>
                            <input type="text" class="form-control" id="nombre_pago" name="nombre_pago"  @error('nombre_pago') is-invalid @enderror />
                            @error('nombre_pago')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Víaticos</label>
                            <input type="text" class="form-control" id="viaticos" name="viaticos"  @error('viaticos') is-invalid @enderror />
                            @error('viaticos')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gastos Administrativos</label>
                            <input type="text" class="form-control" id="gastos_administrativos" name="gastos_administrativos"  @error('gastos_administrativos') is-invalid @enderror />
                            @error('gastos_administrativos')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sueldo</label>
                            <input type="text" class="form-control" id="sueldo" name="sueldo"  @error('sueldo') is-invalid @enderror />
                            @error('sueldo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pagos de servicios</label>
                            <input type="text" class="form-control" id="pago_servicios" name="pago_servicios"  @error('pago_servicios') is-invalid @enderror />
                            @error('pago_servicios')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha (Mes)</label>
                            <input type="text" class="form-control" id="fecha" name="fecha"  @error('fecha') is-invalid @enderror placeholder="Ejemplo: 04 = Abril" />
                            @error('fecha')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha (Año)</label>
                            <input type="text" class="form-control" id="anio" name="fecha-anio"  @error('fecha-anio') is-invalid @enderror />
                            @error('fecha-anio')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tienda</label>
                            <select  name="tienda" class="form-control @error('tienda') is-invalid @enderror" id="tienda">
                                <option>Seleccionar tienda</option>
                                 @foreach($tiendas as $tienda)
                                 <option value="{{ $tienda->id }}">{{ $tienda->nombre_tienda}}</option>
                                 @endforeach
                              </select>
                              @error('tienda')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="modal-footer d-block">
                            <button type="submit" id="#ajaxSubmit" class="btn btn-block btn-primary float-end">Enviar</button>
                        </div>

                    </form>
                </div>
            </div>
    </div>
</div>
<script type="text/javascript">

</script>
@endsection
