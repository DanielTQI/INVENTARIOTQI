@extends('layouts.app')
	@section('content')
			<div class="container ml-12">
				<center>
				<a href="{{url('/reportes/create')}}" class="btn btn-primary float-right mb-3 mr-4 ">Crear reporte</a>
				<table class="table table-sm float-left mr-10 table table-sm float-left mr-10 table-striped table-bordered dt-responsive nowrap" id="tablee">
                    <thead class="thead-dark" >
                        <tr>
                            <th>Usuario</th>
                            <th>Tipo</th>
                            <th>Activo</th>
                            <th>Tipo reporte</th>
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
                        @foreach($reportes as $reporte)
                            <tr>
                            	<center>
                                <td><center>{{ $reporte->usuario_id }}</center></td>
                                <td><center>{{ $reporte->tipo_reporte }}</center></td>
                                <td><center>{{ $reporte->accesorio_id }}</center></td>
                                <td><center>{{ $reporte->tipo_reporte}}</center></td>
                                <td><center>{{ $reporte->descripcion_usuario }}</center></td>
                                <td><center>{{ $reporte->fecha_reporte }}</center></td>
                                <td><center>{{ $reporte->atendido }}</center></td>
                                <td><center>{{ $reporte->descripcion_soporte }}</center></td>
                                <td><center>{{ $reporte->fecha_soporte }}</center></td>
                                <td><center><a href="/telefonos/{{$reporte->id}}" class="btn btn-success">Atender</a></center></td>
                                
                                <td><center>{!! Form::open([ 'route' => ['telefonos.destroy', $reporte->id ], 'method' => 'DELETE' ]) !!}
									{!! Form::submit('Eliminar ', ['class' => 'btn btn-danger mb-2']) !!}
    							{!! Form::close()!!}   </center></td>                          
                                </center>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
			 </center>
			</div>
	
	@endsection	