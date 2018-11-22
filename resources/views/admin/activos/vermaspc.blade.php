@extends('layouts.app')
	@section('content')
	<div class="container">
		<center>
    <h2 class="text-center mb-4">{{$activo->ncate}}</h2>

    		<a href="/activos/{{$activo->id}}/edit" class="btn btn-primary float-left  ">Editar</a>
        <a href="/activos" class="btn btn-info float-left ml-2 text-white ">Ver todos los activos</a>
        <a href="/activos/create" class="btn btn-success float-left ml-2  ">Registrar activo</a>

        <a href="{{ route ('reportes.create',['id'=>$activo->id])}}" class="btn btn-warning float-left ml-2 ">Reportar</a>

    		{!! Form::open([ 'route' => ['activos.destroy', $activo->id ], 'method' => 'DELETE' ]) !!}

    			{!! Form::submit('Eliminar ', ['class' => 'btn btn-danger mb-2 float-left ml-2 ']) !!}

        {!! Form::close()!!}
	</center>

	<table class="table ">
    <tbody >
        <tr>
          <th>Usuario</th>
            <td>{{$activo->name}}</td>
            
        </tr>
        <tr>
          <th>Categoria</th>
            <td>{{$activo->ncate}}</td>
            
        </tr>
        <tr>
          <th>Fecha entrega</th>
            <td>{{$activo->fecha_entrega}}</td>
            
        </tr>
        <tr>
          <th>Fecha mantenimiento</th>
            <td>{{$activo->fecha_mantenimiento}}</td>
            
        </tr>
        <tr>
          <th>Estado mantenimiento</th>
            <td>{{$activo->estado_mantenimiento}}</td>
            
        </tr>
        <tr>
          <th>Propiedad</th>
            <td>{{$activo->propiedad}}</td>
            
        </tr><tr>
          <th>Tipo de equipo</th>
            <td>{{$activo->tipo_de_equipo}}</td>
            
        </tr><tr>
          <th>Marca de equipo</th>
            <td>{{$activo->marca_equipo}}</td>
            
        </tr>
        <tr>
          <th>Ref equipo</th>
            <td>{{$activo->referencia_equipo}}</td>
            
        </tr><tr>
          <th>Serial equipo</th>
            <td>{{$activo->serial_equipo}}</td>
            
        </tr>
        </tr><tr>
          <th>MTM equipo</th>
            <td>{{$activo->mtm_equipo}}</td>
            
        </tr>
        </tr><tr>
          <th>Tipo SO equipo</th>
            <td>{{$activo->tipo_so}}</td>
            
        </tr>
        </tr><tr>
          <th>Licencia equipo</th>
            <td>{{$activo->licencia}}</td>
            
        </tr>
        </tr><tr>
          <th>Version SO equipo</th>
            <td>{{$activo->vso_equipo}}</td>
            
        </tr>
        </tr><tr>
          <th>Nid Windows</th>
            <td>{{$activo->nid_sistema_operativo}}</td>
            
        </tr>
        </tr><tr>
          <th>Tipo office</th>
            <td>{{$activo->tipo_office}}</td>
            
        </tr>
        </tr><tr>
          <th>Nombre equipo</th>
            <td>{{$activo->nombre_equipo}}</td>
            
        </tr>
        </tr><tr>
          <th>Workgroup equipo</th>
            <td>{{$activo->workgroup_equipo}}</td>
            
        </tr>
        </tr><tr>
          <th>Admin equipo</th>
            <td>{{$activo->cuenta_admin_equipo}}</td>
            
        </tr>
        </tr><tr>
          <th>LAN MAC</th>
            <td>{{$activo->lan_mac}}</td>
            
        </tr>
        </tr><tr>
          <th>WI-FI MAC</th>
            <td>{{$activo->wifi_mac}}</td>
            
        </tr>
        </tr><tr>
          <th>Pass admin</th>
            <td>{{$activo->pass_admin}}</td>
            
        </tr>
        </tr><tr>
          <th>Proveedor</th>
            <td>{{$activo->proveedor}}</td>
            
        </tr>
        </tr><tr>
          <th>Precio COP</th>
            <td>$ {{number_format($activo->precio)}}</td>
            
          </tr>
      </tbody>
    </table>
      <img  src="{{ asset('images/'.$activo->imgqr) }}">
  </div>
@endsection