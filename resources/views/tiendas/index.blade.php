@extends('home')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tiendas</h1>

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
                    <h6 class="m-0 font-weight-bold text-primary">Gestionar tiendas</h6>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre de la tienda</th>
                                    <th>Descripcion</th>
                                    <th>Alquiler</th>
                                    <th width="45%">Acciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre de la tienda</th>
                                    <th>Descripcion</th>
                                    <th>Alquiler</th>
                                    <th width="45%">Acciones</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ( $tiendas as $tienda)
                                    <tr>
                                        <td>{{ $tienda->id }}</td>
                                        <td>{{ $tienda->nombre_tienda }}</td>
                                        <td>{{ $tienda->descripcion }}</td>
                                        <td>{{ $tienda->alquiler }}</td>
                                        <td>
                                            <a href="{{ route('tiendas.show', ['id' => $tienda->id]) }}" class=" btn btn-primary my-1 mx-1 btn-sm">Editar</a>
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
                        <h6 class="m-0 font-weight-bold text-primary">Agregar tienda</h6>
                    </div>
                <div class="card-body">
                    <form action="{{route('tiendas.store')}}" method="post" class="row">
                        @csrf <!-- {{ csrf_field() }} -->
                        <div class="mb-3">
                            <label class="form-label">Nombre de la tienda</label>
                            <input type="text" class="form-control" id="nombre_tienda" name="nombre_tienda"  @error('nombre_tienda') is-invalid @enderror />
                            @error('nombre_tienda')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alquiler</label>
                            <input type="text" class="form-control" id="alquiler" name="alquiler"  @error('alquiler') is-invalid @enderror />
                            @error('alquiler')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripción (Ubicación)</label>
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
