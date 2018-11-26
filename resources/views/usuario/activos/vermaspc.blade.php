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
          <th>Categoría</th>
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
            
        </tr>
        <tr>
          <th>Tipo</th>
            <td>{{$activo->tipo_de_equipo}}</td>
            
        </tr>
        <tr>
          <th>Marca</th>
            <td>{{$activo->marca_equipo}}</td>
            
        </tr>
        <tr>
          <th>Referencia</th>
            <td>{{$activo->referencia_equipo}}</td>
            
        </tr>
        <tr>
          <th>Serial</th>
            <td>{{$activo->serial_equipo}}</td>
            
        </tr>
        <tr>
          <th>MTM</th>
            <td>{{$activo->mtm_equipo}}</td>
            
        </tr>
        <tr>
          <th>Sistema operativo</th>
            <td>{{$activo->tipo_so}}</td>
            
        </tr>
        <tr>
          <th>Licencia sistema operativo</th>
            <td>{{$activo->licencia}}</td>
            
        </tr>
        <tr>
          <th>Versión sistema operativo</th>
            <td>{{$activo->vso_equipo}}</td>
            
        </tr>
        <tr>
          <th>Numero id Windows</th>
            <td>{{$activo->nid_sistema_operativo}}</td>
            
        </tr>
        <tr>
          <th>Tipo Office</th>
            <td>{{$activo->tipo_office}}</td>
            
        </tr>
        <tr>
          <th>Nombre</th>
            <td>{{$activo->nombre_equipo}}</td>
            
        </tr>
        <tr>
          <th>Workgroup</th>
            <td>{{$activo->workgroup_equipo}}</td>
            
        </tr>
        <tr>
          <th>Administrador</th>
            <td>{{$activo->cuenta_admin_equipo}}</td>
            
        </tr>
        <tr>
          <th>LAN MAC</th>
            <td>{{$activo->lan_mac}}</td>
            
        </tr>
        <tr>
          <th>WI-FI MAC</th>
            <td>{{$activo->wifi_mac}}</td>
            
        </tr>
      </tbody>
    </table>
                <h5 class="text mt-3 ml-3">QRCode</h5>
            <div id="print" >  
                   <img src="{{ asset('ACT/'.$activo->id.'/'.$activo->imgqr) }}">
            </div>
                <button id="printer" class="btn btn-primary btn-sm ml-3">Imprimir</button>
  </div>

    
  </div>
@endsection