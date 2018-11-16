@extends('layouts.app')
   @section('content')
   	<div class="container">
		<center>
<h2 class="text-center">Informacíon del reporte</h2>
   <table class="table">
    <tbody>
        <tr>
          <th>Usuario</th>
            <td>{{$reporte->name}}</td>
            
        </tr>
        <tr>
          <th>Tipo de activo</th>
            <td>{{$reporte->tipo}}</td>
            
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
   
   			<h2 class="text-center">Atender reporte de {{$reporte->tipo}} </h2>
		{!! Form::model($reporte, ['route' => ['admin.reportes.atender',  $reporte] , 'method' => 'POST' ]) !!}

				<div class="lg-3  form-group mt-3">
					<center>
						<div class="container ml-8 border shadow-sm rounded w-75 shadow-lg p-3 mb-5 bg-white rounded ">
								<div class="form-group">
											{!! Form::label('suportuser', 'Usuario soporte *', ['class' => 'text-left']) !!}

											{!! Form::select('usuario_soporte', $usersup, null, ['class' => 'form-control border ']) !!}
										 		<p class="help-block text-danger">{{ $errors->first('usuario_suporte') }}</p>	
								</div>
												<br>
								<div class="form-group">
									{!! Form::label('tipor', '¿Atendido? *') !!}
												<br>
										{{Form::select('atendidoo',
										 [''=>'',
										 	'SI' => 'SI',
										 	'NO' => 'NO',
										 	'EN PROCESO' => 'EN PROCESO', 
										 	], null,['class' => 'form-control '])}}
										 		<p class="help-block text-danger">{{ $errors->first('atendidoo') }}</p>	
								</div> 
												<br>				
								<div class="form-group">
									{!! Form::label('desc', 'Descripcion del soporte *') !!}
												<br>
									{!! Form::text('descripcion_soporte', null, ['class' => 'form-control shadow-sm p-3  bg-white rounded w-5  h-50']) !!}
												<p class="help-block text-danger ">{{ $errors->first('descripcion_soporte') }}</p>
								</div> 	
												<br>
								<div class="form-group">
									{!! Form::label('fecha soporte', 'Fecha del soporte *') !!}
									<br>
									<input name="fecha_soporte" type="text" id="datepickerfe" class="form-control shadow-sm p-3 bg-white rounded w-75 ">
										<p class="help-block text-danger">{{ $errors->first('fecha_soporte') }}</p>
							    </div>	
							    <input type="hidden" name="tipo" value="{{$reporte->tipo}}">
							    <input type="hidden" name="idactivo" value="{{$reporte->id}}">	
						</div>
					{!! Form::submit('Realizar ', ['class' => 'btn btn-success mt-0']) !!}
				</center>	
			</div>		
		{!! Form::close() !!} 

		</center>
	</div>

		
@endsection