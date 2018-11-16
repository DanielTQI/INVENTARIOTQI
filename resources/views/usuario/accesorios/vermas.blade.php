@extends('layouts.app')
	@section('content')
	<div class="container">
	<center>

    <h2 class="text">Accesorio</h2>
    <a href="{{ route ('reportes.create',['tipo'=>'accesorio','id'=>$accesorio->id])}}" class="btn btn-danger float-left  mb-2">Reportar</a>
	</center>

	<table class="table">
    <tbody>
        <tr>
          <th>Usuario</th>
            <td>{{ $accesorio->usuario_id }}</td>
            
        </tr>
        <tr>
          <th>Fecha entrega</th>
            <td>{{$accesorio->fecha_entrega}}</td>
            
        </tr>
        <tr>
          <th>Fecha mantenimiento</th>
            <td>{{$accesorio->fecha_mantenimiento}}</td>
            
        </tr>
        <tr>
          <th>Estado mantenimiento</th>
            <td>{{$accesorio->estado_mantenimiento}}</td>
            
        </tr>
        <tr>
          <th>Propiedad</th>
            <td>{{$accesorio->propiedad}}</td>
            
        </tr>
        <tr>
          <th>Tipo de accesorio</th>
            <td>{{$accesorio->tipo_de_accesorio}}</td>
            
        </tr>
        <tr>
          <th>Marca de accesorio</th>
            <td>{{$accesorio->marca_accesorio}}</td>
            
        </tr>
        <tr>
          <th>Ref accesorio</th>
            <td>{{$accesorio->referencia_accesorio}}</td>
            
        </tr>
        <tr>
          <th>Serial accesorio</th>
            <td>{{$accesorio->serial_accesorio}}</td>
            
        </tr>
        </tr>
          <th>FCC-ID accesorio</th>
            <td>{{$accesorio->fccid_accesorio}}</td>
            
        </tr>
        </tr>
          <th>IC-ID accesorio</th>
            <td>{{$accesorio->icid_accesorio}}</td>
            
        </tr>
        </tr>
          <th>Incluido</th>
            <td>{{$accesorio->incluido}}</td>
            
        </tr>
        </tr>
          <th>Proveedor</th>
            <td>{{$accesorio->proveedor}}</td>
            
        </tr>
        </tr>
          <th>Precio</th>
            <td>{{$accesorio->incluido}}</td>
            
    </tbody>
</table>
	
</div>
	@endsection