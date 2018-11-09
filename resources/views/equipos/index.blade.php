 @extends('layouts.app')
	@section('content')
			<div class="container ml-12">
				<center>
				<a href="{{url('/equipos/create')}}" class="btn btn-primary float-right mb-3 mr-4">Registrar Equipos</a>
				<table class="table table-sm float-left mr-10 table-striped table-bordered dt-responsive nowrap" id="tablee">
                    <thead class="thead-dark" >
                        <tr>
                            <th>Usuario</th>
                            <th>F_entrega</th>
                            <th>F_mantenimiento</th>
                            <th>E_mantenimiento</th>
                            <th>Propiedad</th>
                            <th>Tipo equipo</th>
                            <th>M_equipo</th>
                            <th>R_equipo</th>
                            <th>SN_equipo</th>
                            <th>Tipo_so</th>
                            <th></th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($equipos as $equipo)
                            <tr>
                            	<center>
                                <td><center>{{ $equipo->user->name }}</center></td>
                                <td><center>{{ $equipo->fecha_entrega }}</center></td>
                                <td><center>{{ $equipo->fecha_mantenimiento }}</center></td>
                                <td><center>{{ $equipo->estado_mantenimiento }}</center></td>
                                <td><center>{{ $equipo->propiedad }}</center></td>
                                <td><center>{{ $equipo->tipo_de_equipo }}</center></td>
                                <td><center>{{ $equipo->marca_equipo }}</center></td>
                                <td><center>{{ $equipo->referencia_equipo }}</center></td>
                                <td><center>{{ $equipo->serial_equipo }}</center></td>
                                <td><center>{{ $equipo->tipo_so }}</center></td>
                                <td><center><a href="/equipos/{{$equipo->id}}" class="btn btn-primary">Ver más...</a></center></td>
                                
                                <td><center>{!! Form::open([ 'route' => ['equipos.destroy', $equipo->id ], 'method' => 'DELETE' ]) !!}
									{!! Form::submit('Eliminar ', ['class' => 'btn btn-danger mb-2']) !!}
    							{!! Form::close()!!}   </center></td>                          
                                </center>
                                {{-- <td><a href="/equipos/{{$equipo->id}}" class="btn btn-primary">Ver mas...</a></td>
                                <td><a href="/equipos/{{$equipo->id}}" class="btn btn-danger">Eliminar</a></td> --}}
                            </tr>
                    @endforeach
                  </tbody>
                 </table>
				</center>
			</div>
	
	@endsection	