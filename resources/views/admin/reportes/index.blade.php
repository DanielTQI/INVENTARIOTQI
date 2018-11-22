@extends('layouts.app')
	@section('content')
			<div class="container">
                <div class="row">
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
				    <center>
                        <h2 class="text-center">Hola {{$users}}¡ estos son los reportes registrados</h2>
        <a href="/activos" class="btn btn-primary btn-sm float-right ">Ver todos los activos</a>

                				<table class="table table-striped table-responsive table-sm table-dark" id="tablee">
                                    <thead class="bg-primary" >
                                        <tr>
                                            <th><center>Usuario</th>
                                            <th><center>Tipo activo</th>
                                            <th><center>Tipo de falla</th>
                                            <th><center>Desc falla</th>
                                            <th><center>Fecha del reporte</th>
                                            <th><center>Atendido</th>
                                            <th><center>Desc soporte</th>
                                            <th><center>Fecha soporte</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            @foreach($reportes as $reporte)
                                                <tr>
                                                	<center>
                                                    <td><center>{{ $reporte->nombreuser }}</center></td>
                                                    <td><center>{{ $reporte->ncat }}</center></td>
                                                    <td><center>{{ $reporte->tipo_reporte }}</center></td>
                                                    <td><center>{{ $reporte->descripcion_usuario }}</center></td>
                                                    <td><center>{{ $reporte->fecha_reporte }}</center></td>
                                                    <td><center>{{ $reporte->atendido }}</center></td>
                                                    <td><center>{{ $reporte->descripcion_soporte }}</center></td>
                                                    <td><center>{{ $reporte->fecha_soporte }}</center></td>
                                                        @if($reporte->atendido=='SI')
                                                            <td data-toggle="tooltip" data-placement="top" title="El reporte ya fue atendido"><center><a href="" class="btn btn-success btn-sm disabled" >Atender</a></center></td>
                                                        @else    
                                                            <td><center><a href="/reportes/{{$reporte->id}}" class="btn btn-success btn-sm">Atender</a></center></td>
                                                        @endif    
                                                    <td><center>{!! Form::open([ 'route' => ['reportes.destroy', $reporte->id ], 'method' => 'DELETE' ]) !!}
                    									{!! Form::submit('Eliminar ', ['class' => 'btn btn-danger mb-2 btn-sm']) !!}
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