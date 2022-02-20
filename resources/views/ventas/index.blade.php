@extends('home')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Ventas</h1>

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
                    <h6 class="m-0 font-weight-bold text-primary">Gestionar ventas</h6>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Codigo producto</th>
                                    <th>Vendedor</th>
                                    <th>Tienda</th>
                                    <th>Precio de compra</th>
                                    <th>Precio de venta</th>
                                    <th>Utilidad</th>
                                    <th>Cantidad vendida</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Codigo producto</th>
                                    <th>Vendedor</th>
                                    <th>Tienda</th>
                                    <th>Precio de compra</th>
                                    <th>Precio de venta</th>
                                    <th>Utilidad</th>
                                    <th>Cantidad vendida</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ( $ventas as $venta)
                                    <tr>
                                        <td>{{ $venta->id }}</td>
                                        <td>{{ $venta->productos->codigo_producto }}</td>
                                        <td>{{ $venta->vendedores->nombre }} {{ $venta->vendedores->apellido }}</td>
                                        <td>{{ $venta->tiendas->nombre_tienda }}</td>
                                        <td>{{ $venta->productos->costo }}</td>
                                        <td>{{ $venta->precio_de_venta }}</td>
                                        <td>{{ $venta->utilidad }}</td>
                                        <td>{{ $venta->cantidad_vendida }}</td>
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
                        <h6 class="m-0 font-weight-bold text-primary">Registrar venta</h6>
                    </div>
                <div class="card-body">
                    <div class="row">

                        <form action="{{route('tiendas.store')}}" method="post" class="row">
                            @csrf <!-- {{ csrf_field() }} -->
                            <div class="mb-3">
                                <label class="form-label">Codigo del producto</label>
                                <select  name="codigo_producto" class="form-control @error('codigo_producto') is-invalid @enderror" id="codigo_producto">
                                    <option>Seleccionar el producto por codigo</option>
                                     @foreach($productos as $producto)
                                     <option value="{{ $producto->id }}">
                                        {{ $producto->codigo_producto }} - {{ $producto->tiposProductos->nombre_del_producto }} - Marca : {{ $producto->marcas->nombre_marca }}

                                        <div class="cantidad_elegida" style="display: none;">{{$producto->cantidad}}</div>
                                        <div class="precio_elegido" style="display: none;">{{$producto->precio}}</div>


                                    </option>
                                     @endforeach
                                  </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tienda</label>
                                <select  name="tienda" class="form-control @error('tienda') is-invalid @enderror" id="tienda">
                                    <option>Seleccionar tienda</option>
                                     @foreach($tiendas as $tienda)
                                     <option value="{{ $tienda->id }}">{{ $tienda->nombre_tienda }}</option>
                                     @endforeach
                                  </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Cantidad a vender</label>
                                <input type="number" class="form-control amt-venta" id="cantidad_vender" name="cantidad_vender"  @error('cantidad_vender') is-invalid @enderror />
                                @error('cantidad_vender')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="mensaje-enviar text-danger" style="display:none;">No hay stock suficiente</div>
                            </div>
                            <div class="col-md-6  mb-3">
                                <label class="form-label">Cantidad existente</label>
                                <input type="text" class="form-control" id="cantidad_exitente" name="cantidad_exitente"  @error('cantidad_exitente') is-invalid @enderror disabled />
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Precio de venta</label>
                                <input type="text" class="form-control amt" id="precio_venta" name="precio_venta "  @error('precio_venta') is-invalid @enderror />
                                @error('precio_venta')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label class="form-label">Precio de compra</label>
                                <input type="text" class="form-control" id="precio_compra" name="precio_compra "  @error('precio_compra') is-invalid @enderror value="{{ $producto->costo }}" disabled />
                                @error('precio_compra')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label class="form-label">Utilidad</label>
                                <input type="text" class="form-control" id="utilidad" name="utilidad"  @error('utilidad') is-invalid @enderror disabled />
                                @error('utilidad')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="mensaje text-danger" style="display:none;">No genera utilidad</div>
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label class="form-label">Total</label>
                                <input type="text" class="form-control" id="total" name="total"  @error('total') is-invalid @enderror disabled />
                                @error('total')
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
</div>
<script type="text/javascript">

var precio_compra = parseFloat($('#precio_compra').val());
var stock_actual = parseInt($('.cantidad_elegida').val());
var stock_producto;
$('.amt').keyup(function() {
    var importe_total = 0
    var precio_venta =parseFloat($('#precio_venta').val());
    var cantidad = parseInt($('#cantidad_vender').val());
    var total;
        if ( $.isNumeric( $(this).val() ) ){
            if(precio_venta <= precio_compra){
                $(".mensaje").show();

            }else{

                importe_total = Math.abs(precio_venta - precio_compra) ;
                $(".mensaje").hide();
            }
            console.log(importe_total);

        }


        $("#utilidad").val(importe_total);
});
$('#codigo_producto').change(function(){
    var id = $(this).find("option:selected").val();
        $.ajax({
                url: "/ventas/leer/producto/"+id,
                type: "get",
                dataType: 'json',
                success: function (data) {

                    $("#precio_compra").val(data.costo);
                    $("#cantidad_exitente").val(data.cantidad);

                    //console.log(data);
                    console.log(data.cantidad);
                    stock_producto = data.cantidad;
                },
                error: function (data) {
                }
        });

});

$( "#cantidad_vender" ).change(function() {
    var cantidad = parseInt($(this).val());
    if(cantidad > stock_producto){
        $(".mensaje-enviar").show();
    }else{
        $(".mensaje-enviar").hide();
    }
});

// $('.amt-venta').keyup(function() {

// });

</script>
@endsection
