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
                  <a href="{{url('/reportes')}}" class="btn btn-primary btn-sm float-right mr-2 mt-5">Mis reportes</a>
                  <h2 class="text-center mt-1">Tus activos asignados.</h2>
            				<table class="table table-striped table-responsive table-sm" id="tablee">
                                <thead class="bg-primary text-white" >
                                    <tr>
                                        <th>Categoría</th>
                                        <th>Fecha de entrega</th>
                                        <th>Fecha de mantenimiento</th>
                                        <th>Estado mantenimiento</th>
                                        <th>Propiedad</th>
                                        <th>Tipo</th>
                                        <th>Marca</th>
                                        <th>Referencia</th>
                                        <th>Serial</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                  </thead>
                                <tbody>
                                 @foreach($activos as $activo)
                                        <tr>
                                        	<center>
                                                <td><center>{{ $activo->ncate }}</center></td>
                                                <td><center>{{ $activo->fecha_entrega }}</center></td>
                                                <td><center>{{ $activo->fecha_mantenimiento }}</center></td>
                                                <td><center>{{ $activo->estado_mantenimiento }}</center></td>
                                                <td><center>{{ $activo->propiedad }}</center></td>
                                                <td><center>{{ $activo->tipo_de_equipo }}</center></td>
                                                <td><center>{{ $activo->marca_equipo }}</center></td>
                                                <td><center>{{ $activo->referencia_equipo }}</center></td>
                                                <td><center>{{ $activo->serial_equipo }}</center></td>
                                                <td><center><a href="/activos/{{$activo->id}}"><button class="btn btn-primary btn-sm" >Ver más...</button></a></center></td>
                                                <td ><center><a href="{{ route ('reportes.create',['id'=>$activo->id])}}"><button class="btn btn-danger btn-sm">Reportar</button></a></center></td>
                                            </center>
                                        </tr>
                                @endforeach
                              </tbody>
                          </table>
        		     </div>
        	    </div>
          @endsection	