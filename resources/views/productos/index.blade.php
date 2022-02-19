@extends('home')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Ropa</h1>

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
                    <h6 class="m-0 font-weight-bold text-primary">Gestionar ropa</h6>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Codigo del producto</th>
                                    <th>Tipo de producto</th>
                                    <th>Marca del producto</th>
                                    <th>Costo del producto</th>
                                    <th>Cantidad del producto</th>
                                    <th>Descripción del producto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Codigo del producto</th>
                                    <th>Tipo de producto</th>
                                    <th>Marca del producto</th>
                                    <th>Costo del producto</th>
                                    <th>Cantidad del producto</th>
                                    <th>Descripción del producto</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ( $productos as $producto)
                                    <tr>
                                        <td>{{ $producto->codigo_producto}}</td>
                                        <td>{{ $producto->tiposProductos->nombre_del_producto}}</td>
                                        <td>{{ $producto->marcas->nombre_marca}}</td>
                                        <td>{{ $producto->costo}}</td>
                                        <td>{{ $producto->cantidad}}</td>
                                        <td>{{ $producto->descripcion}}</td>
                                        <td>
                                            <a href="{{ route('productos.show', ['id' => $producto->id]) }}" class=" btn btn-primary my-1 mx-1 btn-sm">Editar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

        </div>
    </div>
    <div class="col-md-4">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Agregar ropa</h6>
                    </div>
                <div class="card-body">
                    <form action="{{ route('productos.store')}}" method="post" class="row">
                        @csrf <!-- {{ csrf_field() }} -->
                        <div class="mb-3">
                            <label class="form-label">Codigo del producto</label>
                            <input type="text" class="form-control" id="codigo_producto" name="codigo_producto"  @error('codigo_producto') is-invalid @enderror />
                            @error('codigo_producto')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tipo del producto</label>
                            <select  name="tipo_producto" class="form-control @error('tipo_producto') is-invalid @enderror" id="tipo_producto">
                                <option>Seleccionar tipo del producto</option>
                                 @foreach($tiposProducto as $tipoProducto)
                                 <option value="{{ $tipoProducto->id }}">{{ $tipoProducto->nombre_del_producto }}</option>
                                 @endforeach
                              </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Marcas</label>
                            <select  name="marca" class="form-control @error('marca') is-invalid @enderror" id="marca">
                                <option>Seleccionar marca del producto</option>
                                 @foreach($marcas as $marca)
                                 <option value="{{ $marca->id }}">{{ $marca->nombre_marca }}</option>
                                 @endforeach
                              </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Costo</label>
                            <input type="text" class="form-control" id="costo" name="costo"  @error('costo') is-invalid @enderror />
                            @error('costo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cantidad inicial</label>
                            <input type="number" class="form-control" id="costo" name="cantidad"  @error('cantidad') is-invalid @enderror />
                            @error('cantidad')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
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

