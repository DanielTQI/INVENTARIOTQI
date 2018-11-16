@extends('layouts.app')
	@section('content')
			<div class="container ml-12">
				<center>
                  <h2 class="text">Telefonos Registrados</h2>
				    <a href="{{url('/telefonos/create')}}" class="btn btn-primary float-right mb-3 mr-4 ">Registrar Telefonos</a>
				      <table class="table table-sm float-left mr-10 table table-sm float-left mr-10 table-striped table-bordered dt-responsive nowrap" id="tablee">
                        <thead class="thead-dark" >
                            <tr>
                            <th>Usuario</th>
                            <th>F_entrega</th>
                            <th>F_mantenimiento</th>
                            <th>E_mantenimiento</th>
                            <th>Propiedad</th>
                            <th>Tipo Telefono</th>
                            <th>M_Telefono</th>
                            <th>R_Telefono</th>
                            <th>SN_Telefono</th>
                            <th>Tipo SO</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($telefonos as $telefono)
                            <tr>
                            	<center>
                                <td><center>{{ $telefono->name}}</center></td>
                                <td><center>{{ $telefono->fecha_entrega }}</center></td>
                                <td><center>{{ $telefono->fecha_mantenimiento }}</center></td>
                                <td><center>{{ $telefono->estado_mantenimiento }}</center></td>
                                <td><center>{{ $telefono->propiedad }}</center></td>
                                <td><center>{{ $telefono->tipo_de_telefono }}</center></td>
                                <td><center>{{ $telefono->marca_telefono }}</center></td>
                                <td><center>{{ $telefono->referencia_telefono }}</center></td>
                                <td><center>{{ $telefono->serial_telefono }}</center></td>
                                <td><center>{{ $telefono->tipo_so }}</center></td>
                                <td><center><a href="/telefonos/{{$telefono->id}}" class="btn btn-primary">Ver más...</a></center></td>
                                <td><center><a href="{{ route ('admin.reportes.historial',['tipo'=>'accesorio','id'=>$telefono->id])}}" class="btn btn-warning">Historial</a></center></td>

                                
                                <td><center>{!! Form::open([ 'route' => ['telefonos.destroy', $telefono->id ], 'method' => 'DELETE' ]) !!}
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