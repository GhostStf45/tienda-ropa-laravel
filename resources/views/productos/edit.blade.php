@extends('home')

@section('content')
<div class="col-md-6">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Modificar prenda</h6>
            </div>
        <div class="card-body">
            <div class="row">
                <form action="{{ route('productos.update',['id' => $producto->id])}}" method="post" class="row">
                    @csrf <!-- {{ csrf_field() }} -->
                    <input type="hidden" name="_method" value="put" />
                    <div class="mb-3">
                        <label class="form-label">Codigo del producto</label>
                        <input type="text" class="form-control" id="codigo_producto" name="codigo_producto"  @error('codigo_producto') is-invalid @enderror value="{{ $producto->codigo_producto }}"/>
                        @error('codigo_producto')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Tipo del producto</label>
                        <select  name="tipo_producto" class="form-control @error('tipo_producto') is-invalid @enderror" id="tipo_producto">
                            <option>Seleccionar tipo del producto</option>
                             @foreach($tiposProducto as $tipoProducto)
                                <option value="{{ $tipoProducto->id }}" {{$producto->tipo_producto_id == $tipoProducto->id  ? 'selected' : ''}}>{{ $tipoProducto->nombre_del_producto }}</option>
                             @endforeach
                          </select>
                          @error('tipo_producto')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Marcas</label>
                        <select  name="marca" class="form-control @error('marca') is-invalid @enderror" id="marca">
                            <option>Seleccionar marca del producto</option>
                             @foreach($marcas as $marca)
                                <option value="{{ $marca->id }}" {{$producto->marca_id == $marca->id  ? 'selected' : ''}}>{{ $marca->nombre_marca }}</option>
                             @endforeach
                          </select>
                        @error('marca')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Costo</label>
                        <input type="text" class="form-control" id="costo" name="costo"  @error('costo') is-invalid @enderror value="{{ $producto->costo }}"/>
                        @error('costo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label"> Aumentar cantidad </label>
                        <input type="number" class="form-control" id="costo" name="nueva_cantidad"  @error('nueva_cantidad') is-invalid @enderror value="0"/>
                        @error('nueva_cantidad')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Cantidad actual</label>
                        <input type="text" class="form-control" value="{{ $producto->cantidad}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3">{{ $producto->descripcion }}</textarea>
                        @error('descripcion')
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

@endsection
