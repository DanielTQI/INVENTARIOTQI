@extends('layouts.app')
   @section('content')
   <div class="row">
   	<div class="container">
			<h2 class="text-center">Informacíon del reporte</h2>
			   <table class="table table-bordered">
			    <tbody>
			        <tr>
			          <th>Usuario</th>
			            <td>{{$reporte->name}}</td>
			            
			        </tr>
			        <tr>
			          <th>Categoria</th>
			            <td>{{$reporte->ncat}}</td>
			            
			        </tr>
			        <tr>
			          <th>Serial</th>
			            <td>{{$reporte->serial_equipo}}</td>
			            
			        </tr>
			        <tr>
			          <th>Tipo de reporte</th>
			            <td>{{$reporte->tipo_reporte}}</td>
			            
			        </tr>
			        <tr>
			          <th>descripcion del usuario</th>
			            <td>{{$reporte->descripcion_usuario}}</td>
			            
			        </tr>
			        <tr>
			          <th>Fecha del reporte</th>
			            <td>{{$reporte->fecha_reporte}}</td>
			            
			        </tr>
			        <tr>
			          <th>Atendido</th>
			            <td>{{$reporte->atendido}}</td>
			            
			        </tr>
			    </tbody>
   		</table>

   		<!-- Button trigger modal -->

   		{{-- <button class="btn btn-primary btn-block">Historial del activo</button> --}}
   	<h3 class="text mt-3">Atender reporte de {{$reporte->ncat}}</h3>
		{!! Form::model($reporte, ['route' => ['admin.reportes.soporte',  $reporte] , 'method' => 'POST' ]) !!}
				<div class="lg-3  form-group mt-3">
						 <div class="form-group">
											{!! Form::label('Asignado', 'Quen hace el soporte *', ['class' => 'text-left']) !!}
											{!! Form::select('usuario_soportee', $usersup, null, ['class' => 'form-control']) !!}
											</select>
										 		<p class="help-block text-danger">{{ $errors->first('usuario_soportee') }}</p>	
								</div>
								<div class="form-group">
									{!! Form::label('tipor', '¿Atendido? *', null, ['class'=>'form-control']) !!}
										{{Form::select('atendidoo',
										 [''=>'',
										 	'SI' => 'SI',
										 	'NO' => 'NO',
										 	'EN PROCESO' => 'EN PROCESO', 
										 	], null,['class' => 'form-control '])}}
										 		<p class="help-block text-danger">{{ $errors->first('atendidoo') }}</p>	
								</div> 		
								<div class="form-group">
									{!! Form::label('descr', 'Descripcion del soporte *', null, ['class'=>'form-control']) !!}
									{!! Form::textarea('descripcion_soportee', null, ['class' => 'form-control']) !!}
												<p class="help-block text-danger ">{{ $errors->first('descripcion_soportee') }}</p>
								</div> 	
								<div class="form-group">
									{!! Form::label('fecha soportee', 'Fecha donde se ejecutó el soporte *', null, ['class'=>'form-control']) !!}
									<input name="fecha_soportee" type="text" id="datepickerfe" class="form-control shadow-sm p-3 bg-white rounded">
										        <p class="help-block text-danger">{{ $errors->first('fecha_soportee') }}</p>
							    </div>	
					{!! Form::submit('Soporte ', ['class' => 'btn btn-success form-control mb-3']) !!}			
		 {!! Form::close() !!} 
	  </center>
    </div>
  </div> 
@endsection

