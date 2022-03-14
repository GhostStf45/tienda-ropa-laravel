@extends('home')

@section('content')
<div class="col-md-6">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Actualizar pago</h6>
            </div>
        <div class="card-body">
            <form action="{{route('pagos.update',['id' => $pago->id])}}" method="post" class="row">
                @csrf <!-- {{ csrf_field() }} -->
                <input type="hidden" name="_method" value="put" />
                <div class="mb-3">
                    <label class="form-label">Nombre del pago</label>
                    <input type="text" class="form-control" id="nombre_pago" name="nombre_pago"  @error('nombre_pago') is-invalid @enderror value="{{ $pago->nombre }}" />
                    @error('nombre_pago')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Víaticos</label>
                    <input type="text" class="form-control" id="viaticos" name="viaticos"  @error('viaticos') is-invalid @enderror value="{{ $pago->viaticos }}" />
                    @error('viaticos')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Gastos Administrativos</label>
                    <input type="text" class="form-control" id="gastos_administrativos" name="gastos_administrativos"  @error('gastos_administrativos') is-invalid @enderror value="{{ $pago->gastos_administrativos }}" />
                    @error('gastos_administrativos')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Sueldo</label>
                    <input type="text" class="form-control" id="sueldo" name="sueldo"  @error('sueldo') is-invalid @enderror value="{{ $pago->sueldo }}"/>
                    @error('sueldo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Pagos de servicios</label>
                    <input type="text" class="form-control" id="pago_servicios" name="pago_servicios"  @error('pago_servicios') is-invalid @enderror  value="{{ $pago->pagos_de_servicios }}"/>
                    @error('pago_servicios')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha (Mes)</label>
                    <input type="text" class="form-control" id="fecha" name="fecha"  @error('fecha') is-invalid @enderror placeholder="Ejemplo: 04 = Abril" value="{{ $pago->mes }}"/>
                    @error('fecha')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha (Año)</label>
                    <input type="text" class="form-control" id="anio" name="fecha-anio"  @error('fecha-anio') is-invalid @enderror value="{{ $pago->anio }}"/>
                    @error('fecha-anio')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Tienda</label>
                    <select  name="tienda" class="form-control @error('tienda') is-invalid @enderror" id="tienda">
                        <option>Seleccionar tienda</option>
                         @foreach($tiendas as $tienda)
                            <option value="{{ $tienda->id }}" {{$pago->tienda_id == $tienda->id  ? 'selected' : ''}}>{{ $tienda->nombre_tienda }}</option>
                         @endforeach
                    </select>
                </div>
                <div class="modal-footer d-block">
                    <button type="submit" id="#ajaxSubmit" class="btn btn-block btn-primary float-end">Enviar</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
