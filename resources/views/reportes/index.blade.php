@extends('layouts.app')
	@section('content')
			<div class="container">
                <div class="row">
				<center>
				<a href="{{url('/reportes/create')}}" class="btn btn-primary float-right mb-3 mr-4 ">Crear reporte</a>
                
                 <div class="card col-md-12 ">
                  <h5 class="card-header">Equipos</h5>
                   <div class="card-body">
        				<table class="table table-sm float-left mr-10 table table-sm float-left mr-10 table-striped table-bordered dt-responsive nowrap" id="tablee">
                            <thead class="thead-dark" >
                                <tr>
                                    <th>Usuario</th>
                                    <th>Tipo</th>
                                    <th>Id_equipo</th>
                                    <th>Tipo equipo</th>
                                    <th>Referencia</th>
                                    <th>D_user</th>
                                    <th>F_Reporte</th>
                                    <th>Atendido</th>
                                    <th>D_soporte</th>
                                    <th>F_Soporte</th>
                                    <th></th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($equipos as $equipo)
                                    <tr>
                                    	<center>
                                        <td><center>{{ $equipo->usuario_id }}</center></td>
                                        <td><center>{{ $equipo->tipo_reporte }}</center></td>
                                        <td><center>{{ $equipo->equipo_id }}</center></td>
                                        <td><center>{{ $equipo->tipo_de_equipo}}</center></td>
                                        <td><center>{{ $equipo->referencia_equipo }}</center></td>
                                        <td><center>{{ $equipo->descripcion_usuario }}</center></td>
                                        <td><center>{{ $equipo->fecha_reporte }}</center></td>
                                        <td><center>{{ $equipo->atendido }}</center></td>
                                        <td><center>{{ $equipo->descripcion_soporte }}</center></td>
                                        <td><center>{{ $equipo->fecha_soporte }}</center></td>
                                        <td><center><a href="/telefonos/{{$equipo->id}}" class="btn btn-success">Atender</a></center></td>
                                        
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