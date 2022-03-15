@extends('home')

@section('content')
<div class="h-100 p-5 text-white bg-dark rounded-3 mb-3">
    <h2>Sistema de ventas de ropa</h2>
    <p>Listado de opciones para usar <i class="fas fa-angle-double-down"></i></p>
</div>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                           Vendedores </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Administrar Vendedores</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-cog fa-2x"></i>
                    </div>
                    <a href="{{ route('vendedores.list') }}" class="btn btn-primary my-3">Ir a la pagina.</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                           Ventas </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Administrar Ventas</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-briefcase fa-2x"></i>
                    </div>
                    <a href="{{ route('ventas.list') }}" class="btn btn-warning my-3">Ir a la pagina.</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                           Tiendas </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Administrar Tiendas</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fas fa-building fa-2x"></i>
                    </div>
                    <a href="{{ route('tiendas.list') }}" class="btn btn-success my-3">Ir a la pagina.</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                           Pagos </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Administrar Pagos</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-coins fa-2x"></i>
                    </div>
                    <a href="{{ route('pagos.list') }}" class="btn btn-dark my-3">Ir a la pagina.</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-danger">Productos</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample" style="">
                <div class="card-body"><strong>Listado de opciones para administrar sus productos </strong><i class="fas fa-angle-double-down"></i>
                </div>
                <div class="col-md-12 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                       Ropa </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Administrar Ropa</div>
                                </div>
                                <div class="col-auto">
                                    <i class=" fas fa-tshirt fa-2x"></i>
                                </div>
                                <a href="{{ route('productos.list') }}" class="btn btn-danger my-3">Ir a la pagina.</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                       Tipos de ropa </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Administrar Tipos de ropa</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clone fa-2x"></i>
                                </div>
                                <a href="{{ route('tiposRopa.list') }}" class="btn btn-danger my-3">Ir a la pagina.</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                       Marcas </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Administrar Marcas</div>
                                </div>
                                <div class="col-auto">
                                    <i class=" fab fa-fedex fa-2x"></i>
                                </div>
                                <a href="{{ route('marcas.list') }}" class="btn btn-danger my-3">Ir a la pagina.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
