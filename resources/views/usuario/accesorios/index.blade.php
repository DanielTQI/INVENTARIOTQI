@extends('layouts.app')
	@section('content')
			<div class="container">
                <div class="row">
				<center>
                   <div class="col-md-12">
				    <table class="table table-sm mr-10 table-striped dt-responsive nowrap w-25" id="tablee">
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
                                <td><center><a href="{{ route ('reportes.create',['tipo'=>'accesorio','id'=>$accesorio->id])}}" class="btn btn-danger">Reportar</a></center></td>
                                </center>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                 </div>
				</center>
			</div>
           </div> 
	@endsection	