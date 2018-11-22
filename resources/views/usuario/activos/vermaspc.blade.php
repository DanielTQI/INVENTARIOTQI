@extends('layouts.app')
	@section('content')
	<div class="container">
		<center>
    <h2 class="text-center mb-4">{{$activo->ncate}}</h2>

        <a href="/activos" class="btn btn-primary float-left ml-2 mb-2">Ver todos mis activos</a>

        <a href="{{ route ('reportes.create',['tipo'=>'equipo','id'=>$activo->id])}}" class="btn btn-danger float-left ml-2 ">Reportar</a>

	</center>

	<table class="table ">
    <tbody >
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
      </tbody>
    </table>
  </div>
@endsection