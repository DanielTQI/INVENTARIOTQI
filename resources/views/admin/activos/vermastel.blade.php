@extends('layouts.app')
    @section('content')
        <div class="row">
            <div class="container border ">
              <center>
                <h2 class="text-center mb-4">{{$activo->nombre}}</h2>
                    <a href="/activos/{{$activo->id}}/edit" class="btn btn-primary float-left btn-sm">Editar</a>
                    <a href="{{ route ('reportes.create',['tipo'=>'equipo','id'=>$activo->id])}}" class="btn btn-success float-left ml-5 btn-sm">Reportar</a>
                    {!! Form::open([ 'route' => ['activos.destroy', $activo->id ], 'method' => 'DELETE' ]) !!}
                      {!! Form::submit('Eliminar ', ['class' => 'btn btn-danger mb-2 float-left ml-5 btn-sm']) !!}
                    {!! Form::close()!!}
              </center>
                  <table class="table">
                      <tbody>
                          <tr>
                            <th>Usuario</th>
                              <td>{{ $activo->name }}</td>
                              
                          </tr>
                          <tr>
                            <th>Usuario</th>
                              <td>{{ $activo->nombre }}</td>
                              
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
                            <th>Tipo de telefono</th>
                              <td>{{$activo->tipo_de_equipo}}</td>
                              
                          </tr><tr>
                            <th>Marca de telefono</th>
                              <td>{{$activo->marca_equipo}}</td>
                              
                          </tr>
                          <tr>
                            <th>Ref telefono</th>
                              <td>{{$activo->referencia_equipo}}</td>
                              
                          </tr><tr>

                            <th>Tipo de SO</th>
                              <td>{{$activo->tipo_so}}</td>
                              
                          </tr>
                          </tr><tr>

                            <th>Version SO</th>
                              <td>{{$activo->vso_equipo}}</td>
                              
                          </tr>
                          </tr><tr>
                            <th>Serial Telefono</th>
                              <td>{{$activo->serial_equipo}}</td>
                              
                          </tr>
                          </tr><tr>
                            <th>IMEI 1</th>
                              <td>{{$activo->imei_1}}</td>
                              
                          </tr>
                          </tr><tr>
                            <th>IMEI 2</th>
                              <td>{{$activo->imei_2}}</td>
                              
                          </tr>
                          </tr><tr>
                            <th>MAC</th>
                              <td>{{$activo->wifi_mac}}</td>
                              
                          </tr>
                          </tr><tr>
                            <th>Incluido</th>
                              <td>{{$activo->incluido}}</td>

                          </tr>
                          </tr><tr>
                            <th>Proveedor</th>
                              <td>{{$activo->proveedor}}</td> 

                          </tr>
                          </tr><tr>
                            <th>Precio</th>
                              <td>{{$activo->precio}}</td> 

                           </tr>   
                      </tbody>
                </table>
          </div>
	@endsection