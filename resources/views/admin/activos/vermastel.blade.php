@extends('layouts.app')
    @section('content')
        <div class="row">
            <div class="container ">
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
                  <table class="table">
                      <tbody>
                          <tr>
                            <th>Usuario</th>
                              <td>{{ $activo->name }}</td>
                              
                          </tr>
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
                          <tr>
                            <th>Proveedor</th>
                              <td>{{$activo->proveedor}}</td> 

                          </tr>
                          <tr>
                            <th>Precio COP</th>
                              <td>${{number_format($activo->precio,0,' ','.')}}</td> 

                           </tr>   
                      </tbody>
                </table>

                   <h5 class="text mt-3 ml-3">QRCode</h5>
                    <div id="print" >
                         <img src="{{ asset('ACT/'.$activo->id.'/'.$activo->imgqr) }}">
                    </div>
                        <button id="printer" class="btn btn-primary btn-sm ml-3 mb-2">Imprimir</button> 
          </div>
	@endsection