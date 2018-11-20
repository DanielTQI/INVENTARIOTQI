@extends('layouts.app')
    @section('content')       
        <div class="row">
            <div class="container border ">
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
                  <h2 class="text-center mt-1">Hola {{$user->name}}¡ estos son tus activos asignados.</h2>
            				<table class="table table-striped table-responsive table-sm table-dark" id="tablee">
                                <thead class="bg-primary" >
                                    <tr>
                                        <th>Categoria</th>
                                        <th>Estado mantenimiento</th>
                                        <th>Propiedad</th>
                                        <th>Tipo activo</th>
                                        <th>Marca activo</th>
                                        <th>Referencia activo</th>
                                        <th>Serial activo</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($activos as $activo)
                                        <tr>
                                        	<center>
                                            <td><center>{{ $activo->ncate }}</center></td>
                                            <td><center>{{ $activo->estado_mantenimiento }}</center></td>
                                            <td><center>{{ $activo->propiedad }}</center></td>
                                            <td><center>{{ $activo->tipo_de_equipo }}</center></td>
                                            <td><center>{{ $activo->marca_equipo }}</center></td>
                                            <td><center>{{ $activo->referencia_equipo }}</center></td>
                                            <td><center>{{ $activo->serial_equipo }}</center></td>
                                            <td><center><a href="/activos/{{$activo->id}}"><button class="btn btn-primary btn-sm" >Ver más...</button></a></center></td>
                                            <td><center><a href="/activos/{{$activo->id}}"><button class="btn btn-danger btn-sm">Reportar</button></a></center></td>
                                           @if(isset($activo->repor))
                                            <td><center><a href="{{ route ('admin.reportes.historial',['tipo'=>'activo','id'=>$activo->id])}}" class="btn btn-warning btn-sm">Historial</a></center></td>
                                           @else 
                                            <td><center><a class="btn btn-warning btn-sm disabled">Historial</a></center></td>
                                           @endif     
                                            </center>
                                            
                                        </tr>
                                @endforeach
                              </tbody>
                          </table>
        		    </div>
        	    </div>
          @endsection	