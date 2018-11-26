{{-- @extends('layouts.app')
	@section('content')
        <div class="container">
          <div class="row">
                  <h2 class="text-center mt-1 mb-5">Historial</h2>
            <h1 class=" form-control bg-success text-white">Reportes atendidos</h1>
             @foreach($histori as $histo)
                @if($histo->atendido=='SI')
                 <div class="card ml-5 mt-2 w-25 bg-success text-white">
                        <h3 class="card-header">{{$histo->tipo}}</h3>
                            <div class="card-body">
                                <h4 class="card-title">{{$histo->descripcion_usuario}}</h4>
                                <h5 class="card-title">Fecha del reporte: {{$histo->tipo_reporte}}</h5>
                                <h5 class="card-title">Tipo de reporte: {{$histo->fecha_reporte}}</h5>
                                <h5 class="card-title">El reporte {{$histo->atendido}} esta atendido</h5>

                            <p class="card-text">Descripcion soporte: {{$histo->descripcion_soporte}}</p>
                    </div>
                </div>
                @endif()
            @endforeach 
            <h1 class=" form-control mt-5 bg-primary text-white">Reportes en proceso</h1>
             @foreach($histori as $histo)
                @if($histo->atendido=='EN PROCESO')
                 <div class="card ml-5 mt-2 w-25 bg-primary text-white">
                        <h3 class="card-header">{{$histo->tipo}}</h3>
                            <div class="card-body">
                                <h4 class="card-title">{{$histo->descripcion_usuario}}</h4>
                                <h5 class="card-title">Fecha del reporte: {{$histo->tipo_reporte}}</h5>
                                <h5 class="card-title">Tipo de reporte: {{$histo->fecha_reporte}}</h5>
                                <h5 class="card-title">El reporte esta en {{$histo->atendido}} </h5>

                            <p class="card-text">Descripcion soporte: {{$histo->descripcion_soporte}}</p>
                    </div>
                </div>
                @endif()
            @endforeach 
            <h1 class=" form-control mt-5 bg-danger text-white">Reportes no atendidos</h1>
             @foreach($histori as $histo)
                @if($histo->atendido=='NO')
                 <div class="card ml-5 mt-2 w-25 bg-danger text-white">
                        <h3 class="card-header">{{$histo->tipo}}</h3>
                            <div class="card-body">
                                <h4 class="card-title">{{$histo->descripcion_usuario}}</h4>
                                <h5 class="card-title">Fecha del reporte: {{$histo->tipo_reporte}}</h5>
                                <h5 class="card-title">Tipo de reporte: {{$histo->fecha_reporte}}</h5>
                                <h5 class="card-title">El reporte {{$histo->atendido}} esta atendido</h5>

                            <p class="card-text">Descripcion soporte: {{$histo->descripcion_soporte}}</p>
                    </div>
                </div>
                @endif()
            @endforeach 
          </div>
       </div>
	@endsection	 --}}

 @extends('layouts.app')
    @section('content')
        <div class="container">
          <div class="row">
                  <h2 class="text-center mt-1 mb-5">Historial</h2>
                     <a href="{{url('/activos/create')}}" class="btn btn-primary btn-sm float-right mr-2 mt-5">Registrar Activos</a>
                <a href="{{url('/reportes')}}" class="btn btn-primary btn-sm float-right mr-2 mt-5">Reportes</a>
                  <h2 class="text-center mt-1">Activos registrados</h2>
                            <table class="table table-striped table-responsive table-sm" id="tablee">
                                <thead class="bg-primary text-white" >
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Categoría</th>
                                        <th>Estado mantenimiento</th>
                                        <th>Propiedad</th>
                                        <th>Tipo</th>
                                        <th>Marca</th>
                                        <th>Referencia</th>
                                        <th>Serial</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($activos as $activo)
                                        <tr>
                                            <center>
                                                <td><center>{{ $activo->nus }}</center></td>
                                                <td><center>{{ $activo->ncate }}</center></td>
                                                <td><center>{{ $activo->estado_mantenimiento }}</center></td>
                                                <td><center>{{ $activo->fecha_mantenimiento }}</center></td>
                                                <td><center>{{ $activo->tipo_reporte }}</center></td>
                                                <td><center>{{ $activo->descripcion_usuario }}</center></td>
                                                <td><center>{{ $activo->fecha_reporte }}</center></td>
                                                <td><center>{{ $activo->atendido }}</center></td>
                                                <td><center>{{ $activo->descripcion_soporte }}</td>
                                                <td><center><a href="/activos/{{$activo->id}}/edit"><button class="btn btn-primary btn-sm">Editar</button></a></td>
                                                <td><center><a href="{{ route ('reportes.create',['id'=>$activo->id])}}" class="btn btn-success btn-sm ">Reportar</a></td>

                                                   @if(isset($activo->repor))
                                                    <td><center><a href="{{ route ('admin.reportes.historial',['id'=>$activo->id])}}" class="btn btn-warning btn-sm">Historial</a></center></td>
                                                   @else 
                                                    <td><center><a class="btn btn-warning btn-sm disabled">Historial</a></center></td>
                                                   @endif 
                                                      
                                                <td><center>
                                                    {!! Form::open([ 'route' => ['activos.destroy', $activo->id ], 'method' => 'DELETE' ]) !!}
                                                       {!! Form::submit('Eliminar ', ['class' => 'btn btn-danger mb-2 btn-sm']) !!}
                                                    {!! Form::close()!!}   </center></td>                          
                                            </center>
                                        </tr>
                                @endforeach
                           </tbody>
                          </table>
                         </div>
                        </div>
 @endsection                 



    