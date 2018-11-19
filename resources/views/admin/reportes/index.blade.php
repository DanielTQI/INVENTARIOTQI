@extends('layouts.app')
	@section('content')
			<div class="container">
                <div class="row">
				    <center>
                        <h2 class="text-center">Reportes registrados</h2>
                				<table class="table table-sm float-left mr-10 table table-sm float-left mr-10 table-striped table-bordered dt-responsive nowrap" id="tablee">
                                    <thead class="thead-dark" >
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Tipo activo</th>
                                            <th>Tipo de falla</th>
                                            <th>Desc falla</th>
                                            <th>Fecha del reporte</th>
                                            <th>Atendido</th>
                                            <th>Desc soporte</th>
                                            <th>Fecha soporte</th>
                                            <th></th>
                                            <th></th>
                                            

                                        </tr>
                                    </thead>
                                        <tbody>
                                            @foreach($equipos as $equipo)
                                                <tr>
                                                	<center>
                                                    <td><center>{{ $equipo->name }}</center></td>
                                                    <td><center>{{ $equipo->tipo }}</center></td>
                                                    <td><center>{{ $equipo->tipo_reporte }}</center></td>
                                                    <td><center>{{ $equipo->descripcion_usuario }}</center></td>
                                                    <td><center>{{ $equipo->fecha_reporte }}</center></td>
                                                    <td><center>{{ $equipo->atendido }}</center></td>
                                                    <td><center>{{ $equipo->descripcion_soporte }}</center></td>
                                                    <td><center>{{ $equipo->fecha_soporte }}</center></td>
                                                    <td><center><a href="/reportes/{{$equipo->id}}" class="btn btn-success">Atender</a></center></td>
                                                    

                                                    <td><center>{!! Form::open([ 'route' => ['reportes.destroy', $equipo->id ], 'method' => 'DELETE' ]) !!}
                    									{!! Form::submit('Eliminar ', ['class' => 'btn btn-danger mb-2']) !!}
                        							{!! Form::close()!!}   </center></td>                          
                                                    </center>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                            </div>
                       </div>
        			</center>
        		 </div> 
             </div>
	@endsection	