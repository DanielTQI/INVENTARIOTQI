@extends('layouts.app')
	@section('content')
			<div class="container">
                <div class="row">
				    <center>
                        <h2 class="text-center">Historial del {{$tipo}}</h2>
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
                                            
                                        </tr>
                                    </thead>
                                        <tbody>
                                            @foreach($reportes as $reporte)
                                                <tr>
                                                	<center>
                                                    <td><center>{{ $reporte->name }}</center></td>
                                                    <td><center>{{ $reporte->tipo }}</center></td>
                                                    <td><center>{{ $reporte->tipo_reporte }}</center></td>
                                                    <td><center>{{ $reporte->descripcion_usuario }}</center></td>
                                                    <td><center>{{ $reporte->fecha_reporte }}</center></td>
                                                    <td><center>{{ $reporte->atendido }}</center></td>
                                                    <td><center>{{ $reporte->descripcion_soporte }}</center></td>
                                                    <td><center>{{ $reporte->fecha_soporte }}</center></td>
                                                    <td><center><a href="/reportes/{{$reporte->id}}" class="btn btn-success">Atender</a></center></td>                         
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