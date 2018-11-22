@extends('layouts.app')
    @section('content')
        <div class="row">
            <div class="container border ">
              <center>
                <h2 class="text-center mb-4">{{$activo->ncate}}</h2>
                    <a href="/activos" class="btn btn-primary float-left ml-2 mb-2 ">Ver todos mis activos</a>
                    <a href="{{ route ('reportes.create',['tipo'=>'equipo','id'=>$activo->id])}}" class="btn btn-danger float-left ml-2 ">Reportar</a>
              </center>
                  <table class="table">
                      <tbody>
                          <tr>
                          <tr>
                            <th>Categoria</th>
                              <td>{{ $activo->ncate }}</td>
                              
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
                            <th>Tipo de telefono</th>
                              <td>{{$activo->tipo_de_equipo}}</td>
                              
                          </tr>
                          <tr>
                            <th>Marca de telefono</th>
                              <td>{{$activo->marca_equipo}}</td>
                              
                          </tr>
                          <tr>
                            <th>Ref telefono</th>
                              <td>{{$activo->referencia_equipo}}</td>
                              
                          </tr>
                          <tr>
                            <th>Tipo de SO</th>
                              <td>{{$activo->tipo_so}}</td>
                              
                          </tr>
                          </tr>
                            <th>Version SO</th>
                              <td>{{$activo->vso_equipo}}</td>
                              
                          </tr>
                          </tr>
                            <th>Serial Telefono</th>
                              <td>{{$activo->serial_equipo}}</td>
                              
                          </tr>
                          </tr>>
                            <th>IMEI 1</th>
                              <td>{{$activo->imei_1}}</td>
                              
                          </tr>
                          </tr>
                            <th>IMEI 2</th>
                              <td>{{$activo->imei_2}}</td>
                              
                          </tr>
                          </tr>
                            <th>MAC</th>
                              <td>{{$activo->wifi_mac}}</td>
                              
                          </tr>
                          </tr>
                            <th>Incluido</th>
                              <td>{{$activo->incluido}}</td>

                          </tr>
                          
                          
                      </tbody>
                </table>
          </div>
	@endsection