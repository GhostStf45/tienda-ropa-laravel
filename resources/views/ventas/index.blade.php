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
                                    <th>Precio de compra (S/.)</th>
                                    <th>Precio de venta (S/.)</th>
                                    <th>Utilidad (S/.)</th>
                                    <th>Cantidad vendida</th>
                                    <th>Total vendido (S/.)</th>
                                    <th>Fecha de registro</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Codigo producto</th>
                                    <th>Vendedor</th>
                                    <th>Tienda</th>
                                    <th>Precio de compra (S/.)</th>
                                    <th>Precio de venta (S/.)</th>
                                    <th>Utilidad (S/.)</th>
                                    <th>Cantidad vendida</th>
                                    <th>Total vendido (S/.)</th>
                                    <th>Fecha de registro</th>
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
                                        <td>{{ $venta->total }}</td>
                                        <td>{{ $venta->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>




        </div>
        <!--Pagination-->
            <div class="mt-3 d-flex align-items-center justify-content-md-center col-md-12">

                {{$ventas->appends(request()->except('page'))->links()}}
            </div>
        <!--End pagination-->
    </div>

    <div class="col-md-4">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Registrar venta</h6>
                    </div>
                <div class="card-body">
                    <div class="row">

                        <form action="{{route('ventas.store')}}" method="post" class="row" name="form-venta">
                            @csrf <!-- {{ csrf_field() }} -->
                            <div class="mb-3">
                                <label class="form-label">Codigo del producto</label>
                                <select  name="codigo_producto" class="form-control @error('codigo_producto') is-invalid @enderror" id="codigo_producto">
                                    <option>Seleccionar el producto por codigo</option>
                                     @foreach($productos as $producto)
                                     <option value="{{ $producto->id }}">
                                        {{ $producto->codigo_producto }} - {{ $producto->tiposProductos->nombre_del_producto }} - Marca : {{ $producto->marcas->nombre_marca }}
                                    </option>
                                     @endforeach
                                  </select>
                                @error('codigo_producto')
                                  <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tienda</label>
                                <select  name="tienda" class="form-control @error('tienda') is-invalid @enderror" id="tienda">
                                    <option>Seleccionar tienda</option>
                                     @foreach($tiendas as $tienda)
                                     <option value="{{ $tienda->id }}">{{ $tienda->nombre_tienda }}</option>
                                     @endforeach
                                  </select>
                                  @error('tienda')
                                  <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Vendedores</label>
                                <select  name="vendedor" class="form-control @error('vendedor') is-invalid @enderror" id="vendedor">
                                    <option>Seleccionar vendedor</option>
                                     @foreach($vendedores as $vendedor)
                                     <option value="{{ $vendedor->id }}">{{ $vendedor->nombre }} {{ $vendedor->apellido }}</option>
                                     @endforeach
                                </select>
                                @error('vendedor')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
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

                            <label class="form-label">Precio de venta</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">S/.</span>
                                <input type="text" class="form-control amt" id="precio_venta" name="precio_venta"  @error('precio_venta') is-invalid @enderror />

                            </div>
                            @error('precio_venta')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label class="form-label">Precio de compra</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">S/.</span>
                                <input type="text" class="form-control" id="precio_compra" name="precio_compra "  @error('precio_compra') is-invalid @enderror value="{{ $producto->costo }}" disabled />
                                @error('precio_compra')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <label class="form-label">Utilidad</label>
                            <div class="input-group  mb-3">
                                <span class="input-group-text" id="basic-addon1">S/.</span>
                                <input type="text" class="form-control total" id="utilidad1" name="utilidad1" disabled />

                                <input type="text" class="form-control" id="utilidad" name="utilidad"  @error('utilidad') is-invalid @enderror />
                            </div>
                            @error('utilidad')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="mensaje text-danger my-2" style="display:none;">No genera utilidad</div>

                            <label class="form-label">Total</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">S/.</span>
                                <input type="text" class="form-control total" id="total1" name="total1" disabled />
                                <input type="text" class="form-control total" id="total" name="total"  @error('total') is-invalid @enderror />

                            </div>
                            @error('total')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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

$(document).ready(function () {
    $(':input[type="submit"]').prop('disabled', false);
    $('#utilidad').hide();
    $('#total').hide();

    $.ajax({
        url: "/ventas/productos",
        type: "get",
        dataType: 'json',
        success: function (data) {
            $.each(data, function(index, value){
                if(value.cantidad <= 0){
                    $("#codigo_producto option[value="+value.id+"]").hide();
                }
                console.log(value.cantidad);
            });
        },
        error: function (data) {
        }
    });
    $.ajax({
        url: "/ventas/vendedores",
        type: "get",
        dataType: 'json',
        success: function (data) {
            console.log(data);

            $.each(data, function(index, value){
                if(value.Estado == 0){
                    $("#vendedor option[value="+value.id+"]").hide();
                }

            });
        },
        error: function (data) {
        }
    });

    $('.amt').keyup(function() {
        var importe_total = 0
        var total;
        var precio_venta =parseFloat($('#precio_venta').val());
        var precio_compra = parseFloat($('#precio_compra').val());
        var cantidad = parseInt($('#cantidad_vender').val());
            if ( $.isNumeric( $(this).val() ) ){
                if(precio_venta <= precio_compra){
                    $(".mensaje").show();

                }else{

                    total = precio_venta * cantidad;
                    importe_total = Math.abs(precio_venta - precio_compra) ;

                    $(".mensaje").hide();
                    $("#total").val(total);
                    $("#total1").val(total);
                    $(':input[type="submit"]').prop('disabled', false);
                }
                console.log(importe_total);
                console.log(total);

            }


            $("#utilidad").val(importe_total);
            $("#utilidad1").val(importe_total);
    });
    var stock_producto;
    var stock_actual = parseInt($('.cantidad_elegida').val());


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
            $(".total").val("");
            $(':input[type="submit"]').prop('disabled', true);
        }else{
            $(".mensaje-enviar").hide();
        }
    });



});

// $('.amt-venta').keyup(function() {

// });

</script>
@endsection
