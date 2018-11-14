@extends('layouts.app')
	@section('content')
	<div class="container">
		<center>

		<a href="/equipos/{{$equipo->id}}/edit" class="btn btn-primary float-left">Editar.</a>
    <a href="{{ route ('reportes.create',['tipo'=>'equipo','id'=>$equipo->id])}}" class="btn btn-success float-left ml-5">Reportar</a>
    {{-- {!! Form::open([ 'route' => ['reportes.create', $equipo->id ], 'method' => 'GET' ]) !!}

      {!! Form::submit('Reportar ', ['class' => 'float-left ml-5']) !!}

      {!! Form::close()!!} --}}

		{!! Form::open([ 'route' => ['equipos.destroy', $equipo->id ], 'method' => 'DELETE' ]) !!}

			{!! Form::submit('Eliminar ', ['class' => 'btn btn-danger mb-2 float-left ml-5']) !!}

    	{!! Form::close()!!}
	</center>

	<table class="table">
    <tbody>
        <tr>
          <th>Usuario</th>
            <td>{{$equipo->usuario_id}}</td>
            
        </tr>
        <tr>
          <th>Fecha entrega</th>
            <td>{{$equipo->fecha_entrega}}</td>
            
        </tr>
        <tr>
          <th>Fecha mantenimiento</th>
            <td>{{$equipo->fecha_mantenimiento}}</td>
            
        </tr>
        <tr>
          <th>Estado mantenimiento</th>
            <td>{{$equipo->estado_mantenimiento}}</td>
            
        </tr>
        <tr>
          <th>Propiedad</th>
            <td>{{$equipo->propiedad}}</td>
            
        </tr><tr>
          <th>Tipo de equipo</th>
            <td>{{$equipo->tipo_de_equipo}}</td>
            
        </tr><tr>
          <th>Marca de equipo</th>
            <td>{{$equipo->marca_equipo}}</td>
            
        </tr>
        <tr>
          <th>Ref equipo</th>
            <td>{{$equipo->referencia_equipo}}</td>
            
        </tr><tr>
          <th>Serial equipo</th>
            <td>{{$equipo->serial_equipo}}</td>
            
        </tr>
        </tr><tr>
          <th>MTM equipo</th>
            <td>{{$equipo->mtm_equipo}}</td>
            
        </tr>
        </tr><tr>
          <th>Tipo SO equipo</th>
            <td>{{$equipo->tipo_so}}</td>
            
        </tr>
        </tr><tr>
          <th>Licencia equipo</th>
            <td>{{$equipo->licencia}}</td>
            
        </tr>
        </tr><tr>
          <th>Version SO equipo</th>
            <td>{{$equipo->vso_equipo}}</td>
            
        </tr>
        </tr><tr>
          <th>Nid Windows</th>
            <td>{{$equipo->nid_sistema_operativo}}</td>
            
        </tr>
        </tr><tr>
          <th>Tipo office</th>
            <td>{{$equipo->tipo_office}}</td>
            
        </tr>
        </tr><tr>
          <th>Nombre equipo</th>
            <td>{{$equipo->nombre_equipo}}</td>
            
        </tr>
        </tr><tr>
          <th>Workgroup equipo</th>
            <td>{{$equipo->workgroup_equipo}}</td>
            
        </tr>
        </tr><tr>
          <th>Admin equipo</th>
            <td>{{$equipo->cuenta_admin_equipo}}</td>
            
        </tr>
        </tr><tr>
          <th>LAN MAC</th>
            <td>{{$equipo->lan_mac}}</td>
            
        </tr>
        </tr><tr>
          <th>WI-FI MAC</th>
            <td>{{$equipo->wifi_mac}}</td>
            
        </tr>
        </tr><tr>
          <th>Pass admin</th>
            <td>{{$equipo->pass_admin}}</td>
            
        </tr>
        </tr><tr>
          <th>Proveedor</th>
            <td>{{$equipo->proveedor}}</td>
            
        </tr>
        </tr><tr>
          <th>Precio</th>
            <td>{{$equipo->precio}}</td>
            
        </tr>
    </tbody>
</table>
	
</div>
	@endsection