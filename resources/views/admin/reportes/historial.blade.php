 @extends('layouts.app')
    @section('content')
          <div class="row">
        <div class="container">
              <a href="{{url('/reportes')}}" class="btn btn-primary btn-sm float-right mr-2 mt-5">Reportes</a>
               <a href="{{url('/activos/create')}}" class="btn btn-primary btn-sm float-right mr-2 mt-5">Registrar Activos</a>
                <a href="{{url('/activos')}}" class="btn btn-primary btn-sm float-right mr-2 mt-5">Activos</a>
                  <h2 class="text-center mt-1">Historial</h2>
                            <table class="table table-striped table-responsive table-sm" id="tablee">
                                <thead class="bg-primary text-white" >
                                    <tr>
                                        <th>Usuario reporte</th>
                                        <th>Categoría</th>
                                        <th>Estado mantenimiento</th>
                                        <th>Reporte</th>
                                        <th>Descripción usuario</th>
                                        <th>Fecha reporte</th>
                                        <th>Atendido</th>
                                        <th>Descripción soporte</th>
                                        <th>Fecha soporte</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($histori as $histo)
                                        <tr>
                                            <center>
                                                <td><center>{{ $histo->nombreusuario }}</center></td>
                                                <td><center>{{ $histo->ncat }}</center></td>
                                                <td><center>{{ $histo->estado_mantenimiento }}</center></td>
                                                <td><center>{{ $histo->tipo_reporte }}</center></td>
                                                <td><center>{{ $histo->descripcion_usuario }}</center></td>
                                                <td><center>{{ $histo->fecha_reporte }}</center></td>
                                                <td><center>{{ $histo->atendido }}</center></td>

                                                @if($histo->atendido=='SI')
                                                    <td><center>{{ $histo->descripcion_soporte }}</center></td>
                                                    <td><center>{{ $histo->fecha_soporte }}</center></td>
                                                    <td data-toggle="tooltip" data-placement="top" title="El reporte ya fue atendido"><center><a href="" class="btn btn-success btn-sm disabled" >Atendido</a></center></td>
                                                @elseif($histo->atendido=='NO')  
                                                    <td><center>Sin atender</center></td>
                                                    <td><center>Sin atender</center></td>
                                                    <td><center><a href="/reportes/{{$histo->id}}" class="btn btn-success btn-sm">Atender</a></center></td>
                                                @elseif($histo->atendido=='EN PROCESO')
                                                    <td><center>{{ $histo->descripcion_soporte }}</center></td>
                                                    <td><center>{{ $histo->fecha_soporte }}</center></td>
                                                    <td><center><a href="/reportes/{{$histo->id}}" class="btn btn-success btn-sm">Seguir atendiendo</a></center></td>
                                                @endif

                                                <td><center>
                                                    {!! Form::open([ 'route' => ['activos.destroy', $histo->id ], 'method' => 'DELETE' ]) !!}
                                                       {!! Form::submit('Eliminar ', ['class' => 'btn btn-danger mb-2 btn-sm']) !!}
                                                    {!! Form::close()!!}   
                                                </center></td>    

                                            </center>
                                        </tr>
                                @endforeach
                           </tbody>
                          </table>
                         </div>
                        </div>
      @endsection                 



    