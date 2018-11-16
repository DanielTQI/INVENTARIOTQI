@extends('layouts.app')
	@section('content')
	<div class="container">
    <h2 class="text-center">Accesorio</h2>
		<center>
		<a href="/accesorios/{{$accesorio->id}}/edit" class="btn btn-primary float-left">Editar.</a>
    <a href="{{ route ('reportes.create',['tipo'=>'accesorio','id'=>$accesorio->id])}}" class="btn btn-success float-left ml-5">Reportar</a>
		{!! Form::open([ 'route' => ['accesorios.destroy', $accesorio->id ], 'method' => 'DELETE' ]) !!}

			{!! Form::submit('Eliminar ', ['class' => 'btn btn-danger ml-5 mb-2 float-left']) !!}

    {!! Form::close()!!}

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
            
        </tr><tr>
          <th>Tipo de accesorio</th>
            <td>{{$accesorio->tipo_de_accesorio}}</td>
            
        </tr><tr>
          <th>Marca de accesorio</th>
            <td>{{$accesorio->marca_accesorio}}</td>
            
        </tr>
        <tr>
          <th>Ref accesorio</th>
            <td>{{$accesorio->referencia_accesorio}}</td>
            
        </tr><tr>
          <th>Serial accesorio</th>
            <td>{{$accesorio->serial_accesorio}}</td>
            
        </tr>
        </tr><tr>
          <th>FCC-ID accesorio</th>
            <td>{{$accesorio->fccid_accesorio}}</td>
            
        </tr>
        </tr><tr>
          <th>IC-ID accesorio</th>
            <td>{{$accesorio->icid_accesorio}}</td>
            
        </tr>
        </tr><tr>
          <th>Incluido</th>
            <td>{{$accesorio->incluido}}</td>
            
        </tr>
        </tr><tr>
          <th>Proveedor</th>
            <td>{{$accesorio->proveedor}}</td>
            
        </tr>
        </tr><tr>
          <th>Precio</th>
            <td>{{$accesorio->incluido}}</td>
            
    </tbody>
</table>
	
</div>
	@endsection