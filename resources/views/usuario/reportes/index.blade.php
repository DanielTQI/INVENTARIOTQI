@extends('layouts.app')
    @section('content')
                <div class="row">
            <div class="container">
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
                    <a href="{{url('/activos')}}" class="btn btn-primary btn-sm float-right mr-2 mt-5">Mis activos</a>
                        <h2 class="text-center">Hola {{$users}}¡ estos son tus reportes registrados</h2>
                                <table class="table table-striped table-responsive  table-dark" id="tablee">
                                    <thead class="bg-primary" >
                                        <tr>
                                            <th><center>Categoría</th>
                                            <th><center>Tipo de falla</th>
                                            <th><center>Descripción falla</th>
                                            <th><center>Fecha del reporte</th>
                                            <th><center>Atendido</th>
                                            <th><center>Descripción soporte</th>
                                            <th><center>Fecha soporte</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            @foreach($reportes as $reporte)
                                                <tr>
                                                    <center>
                                                    <td><center>{{ $reporte->ncat }}</center></td>
                                                    <td><center>{{ $reporte->tipo_reporte }}</center></td>
                                                    <td><center>{{ $reporte->descripcion_usuario }}</center></td>
                                                    <td><center>{{ $reporte->fecha_reporte }}</center></td>
                                                    <td><center>{{ $reporte->atendido }}</center></td>
                                                    
                                                        @if($reporte->atendido=='SI'|| $reporte->atendido=='EN PROCESO' )
                                                            <td><center>{{ $reporte->descripcion_soporte }}</center></td>
                                                            <td><center>{{ $reporte->fecha_soporte }}</center></td>              
                                                        @elseif($reporte->atendido=='NO')  
                                                            <td><center>Sin atender</center></td>
                                                            <td><center>Sin atender</center></td>
                                                        @endif
                                                    
                                                    <td><center><a href="/reportes/{{$reporte->id}}/edit" class="btn btn-success btn-sm mt-2 ">Editar</a></center></td>
                                                    <td><center>{!! Form::open([ 'route' => ['reportes.destroy', $reporte->id ], 'method' => 'DELETE' ]) !!}
                                                        {!! Form::submit('Eliminar ', ['class' => 'btn btn-danger mb-2 btn-sm mt-2']) !!}
                                                    {!! Form::close()!!}   </center></td>                          
                                                    </center>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                            </div>
                       </div>
                 </div> 
             </div>
    @endsection 