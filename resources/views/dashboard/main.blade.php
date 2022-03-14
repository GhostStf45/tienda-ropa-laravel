@extends('home')

@section('content')
<div class="row">
    <div class="col-md-6">
        <table class="table table-hover">
            <tr>..</tr>
          </table>
    </div>
    <div class="col-md-6">
        <form action="{{ route('dashboard.empleados')}}">
            <div class="form-group">
              <label for="">Empleados</label>
              <select class="form-control" name="empleados" id="empleados">
                @foreach($vendedores as $vendedor)
                <option value="{{ $vendedor->id }}">{{ $vendedor->nombre }} {{ $vendedor->apellido }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="">Fechas</label>
              <select class="form-control" name="fechas" id="fechas">
                @foreach($ventas as $venta)
                <option value="{{ $venta->id }}">{{ \Carbon\Carbon::parse($venta->created_at)->format('Y') }}</option>
                @endforeach
              </select>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
      setTimeout(function () {
        alert('Reloading Page');
        location.reload(true);
      }, 5000);
    });
</script>
@endsection
