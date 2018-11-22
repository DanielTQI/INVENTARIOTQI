@extends('layouts.app')
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
	@endsection	
    