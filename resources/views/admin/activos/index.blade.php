@extends('layouts.app')
    @section('content')       
        <div class="row">
            <div class="container  ">
                            @if(session('status'))
                                <div class="alert alert-success mt-2" id="aviso">
                                    {{session('status')}}
                                </div>
                            @endif
                            @if(session('statuselim'))
                                <div class="alert alert-danger mt-2" id="aviso">
                                    {{session('statuselim')}}
                                </div>
                            @endif
                <a href="{{url('/activos/create')}}" class="btn btn-primary btn-sm float-right mr-2 mt-5">Registrar Activos</a>
                <a href="{{url('/reportes')}}" class="btn btn-primary btn-sm float-right mr-2 mt-5">Reportes</a>

                  <h2 class="text-center mt-1">Activos registrados</h2>
            				<table class="table table-striped table-responsive table-sm" id="tablee">
                                <thead class="bg-primary text-white" >
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Categoría</th>
                                        <th>Estado mantenimiento</th>
                                        <th>Propiedad</th>
                                        <th>Tipo</th>
                                        <th>Marca</th>
                                        <th>Referencia</th>
                                        <th>Serial</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($activos as $activo)
                                        <tr>
                                        	<center>
                                                <td><center>{{ $activo->nus }}</center></td>
                                                <td><center>{{ $activo->ncate }}</center></td>
                                                <td><center>{{ $activo->estado_mantenimiento }}</center></td>
                                                <td><center>{{ $activo->propiedad }}</center></td>
                                                <td><center>{{ $activo->tipo_de_equipo }}</center></td>
                                                <td><center>{{ $activo->marca_equipo }}</center></td>
                                                <td><center>{{ $activo->referencia_equipo }}</center></td>
                                                <td><center>{{ $activo->serial_equipo }}</center></td>
                                                <td><center><a href="/activos/{{$activo->id}}"><button class="btn btn-primary btn-sm">Ver más...</button></a></td>
                                                <td><center><a href="/activos/{{$activo->id}}/edit"><button class="btn btn-primary btn-sm">Editar</button></a></td>
                                                <td><center><a href="{{ route ('reportes.create',['id'=>$activo->id])}}" class="btn btn-success btn-sm ">Reportar</a></td>

                                                   @if(isset($activo->repor))
                                                    <td><center><a href="{{ route ('admin.reportes.historial',['id'=>$activo->id])}}" class="btn btn-warning btn-sm">Historial</a></center></td>
                                                   @else 
                                                    <td><center><a class="btn btn-warning btn-sm disabled">Historial</a></center></td>
                                                   @endif 
                                                      
                                                <td><center>
                                                    {!! Form::open([ 'route' => ['activos.destroy', $activo->id ], 'method' => 'DELETE' ]) !!}
                									   {!! Form::submit('Eliminar ', ['class' => 'btn btn-danger mb-2 btn-sm']) !!}
                    							    {!! Form::close()!!}   </center></td>                          
                                            </center>
                                        </tr>
                                @endforeach
                              </tbody>
                          </table>
        		    </div>
        	    </div>
          @endsection	