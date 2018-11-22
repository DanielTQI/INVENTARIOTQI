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
                            <th>Precio COP</th>
                              <td>${{number_format($activo->precio)}}</td> 

                           </tr>   
                      </tbody>
                </table>

                    @if(isset($activo->imgqr))   
                       <img  src="{{ asset('images/'.$activo->imgqr) }}">
                    @else
                       <label>No hay QR</label>
                    @endif
          </div>
	@endsection