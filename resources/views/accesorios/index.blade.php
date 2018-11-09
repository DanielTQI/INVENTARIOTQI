@extends('layouts.app')
	@section('content')
			<div class="container ml-12">
				<center>
				<a href="{{url('/accesorios/create')}}" class="btn btn-primary float-right mb-3 mr-4 ">Registrar Accesorios</a>
				<table class="table table-sm float-left mr-10 table-striped table-bordered dt-responsive nowrap" id="tablee">
                    <thead class="thead-dark" >
                        <tr>
                            <th>Usuario</th>
                            <th>F_entrega</th>
                            <th>F_mantenimiento</th>
                            <th>E_mantenimiento</th>
                            <th>Propiedad</th>
                            <th>Tipo Accesorio</th>
                            <th>M_Accesorio</th>
                            <th>R_Accesorio</th>
                            <th>SN_Accesorio</th>
                            <th>Incluido</th>
                            <th></th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($accesorios as $accesorio)
                            <tr>
                            	<center>
                                <td><center>{{ $accesorio->user->name }}</center></td>
                                <td><center>{{ $accesorio->fecha_entrega }}</center></td>
                                <td><center>{{ $accesorio->fecha_mantenimiento }}</center></td>
                                <td><center>{{ $accesorio->estado_mantenimiento }}</center></td>
                                <td><center>{{ $accesorio->propiedad }}</center></td>
                                <td><center>{{ $accesorio->tipo_de_accesorio }}</center></td>
                                <td><center>{{ $accesorio->marca_accesorio }}</center></td>
                                <td><center>{{ $accesorio->referencia_accesorio }}</center></td>
                                <td><center>{{ $accesorio->serial_accesorio }}</center></td>
                                <td><center>{{ $accesorio->incluido }}</center></td>
                                <td><center><a href="/accesorios/{{$accesorio->id}}" class="btn btn-primary">Ver más...</a></center></td>
                                
                                <td><center>{!! Form::open([ 'route' => ['accesorios.destroy', $accesorio->id ], 'method' => 'DELETE' ]) !!}
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