@extends('layouts.app')
    @section('content')
        <div class="row">
            <div class="container border ">
                <h2 class="text-center mb-4">Teléfono</h2>
                    <a href="/activos" class="btn btn-primary float-left ml-2 mb-2 ">Ver todos mis activos</a>
                      <a href="{{ route ('reportes.create',['tipo'=>'equipo','id'=>$activo->id])}}" class="btn btn-danger float-left ml-2 ">Reportar </a>
                       <table class="table">
                          <tbody>
                              <tr>
                                <th>Categoría</th>
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
                                <th>Sistema operativo</th>   
                                  <td>{{$activo->tipo_so}}</td>
                                  
                              </tr>
                              <tr>
                                <th>Versión sistema operativo</th>
                                  <td>{{$activo->vso_equipo}}</td>
                                  
                              </tr>
                              <tr>
                                <th>Serial</th>
                                  <td>{{$activo->serial_equipo}}</td>
                                  
                              </tr>
                              <tr>
                                <th>IMEI 1</th>
                                  <td>{{$activo->imei_1}}</td>
                                  
                              </tr>
                              <tr>
                                <th>IMEI 2</th>
                                  <td>{{$activo->imei_2}}</td>
                                  
                              </tr>
                              <tr>
                                <th>MAC-WiFi</th>
                                  <td>{{$activo->wifi_mac}}</td>
                                  
                              </tr>
                      </tbody>
                </table>
                        <h5 class="text mt-3 ml-3">QRCode</h5>
                    <div id="print" >
                        <img src="{{ asset('images/'.$activo->imgqr) }}">
                    </div>
                        <button id="printer" class="btn btn-primary btn-sm ml-3 mb-2">Imprimir</button> 
          </div>
	@endsection