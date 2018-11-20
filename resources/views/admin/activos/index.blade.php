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
                <a href="{{url('/activos/create')}}" class="btn btn-primary btn-sm float-right mr-2 mt-5">Registrar Activos</a>
                  <h2 class="text-center mt-1">Activos registrados</h2>
            				<table class="table table-striped table-responsive table-sm table-dark" id="tablee">
                                <thead class="bg-primary" >
                                    <tr>
                                        <th>Usuario</th>
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
                                        <th></th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($activos as $activo)
                                        <tr>
                                        	<center>
                                            <td><center>{{ $activo->name }}</center></td>
                                            <td><center>{{ $activo->nombre }}</center></td>
                                            <td><center>{{ $activo->fecha_entrega }}</center></td>
                                            <td><center>{{ $activo->propiedad }}</center></td>
                                            <td><center>{{ $activo->tipo_de_equipo }}</center></td>
                                            <td><center>{{ $activo->marca_equipo }}</center></td>
                                            <td><center>{{ $activo->referencia_equipo }}</center></td>
                                            <td><center>{{ $activo->serial_equipo }}</center></td>
                                            <td><center><a href="/activos/{{$activo->id}}"><button class="btn btn-primary btn-sm">Ver más...</button></a>
                                            <td><center><a href="/activos/{{$activo->id}}"><button class="btn btn-success btn-sm">Editar</button></a>

                                               {{--  @if($activo->id==1)
                                                    <a href="/activos/{{$activo->id}}"><button class="btn btn-primary btn-sm" disabled>Ver más...</button></a>
                                                @endif --}}
                                            </center></td>
                                            <td><center><a href="{{ route ('admin.reportes.historial',['tipo'=>'activo','id'=>$activo->id])}}" class="btn btn-warning btn-sm">Historial</a></center></td>
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