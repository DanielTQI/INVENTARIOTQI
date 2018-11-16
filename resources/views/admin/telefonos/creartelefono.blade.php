@extends('layouts.app')
	
	@section('content')
	<center>
		<h1 class="text-title">CREAR TELEFONO</h1>

			{!! Form::open(['route'=>'telefonos.store',  'method'=>'POST', 'files' =>true]) !!}
				<div class="lg-3  form-group mt-5">
				  <center>
					<div class="container ml-8 border shadow-sm rounded w-50 shadow-lg p-3 mb-5 bg-white rounded ">

						<div class="form-group">
							{!! Form::label('Asignado', 'Asignado *') !!}
							<br>
							{!! Form::select('usuario_id', $user, null, ['class' => 'form-control']) !!}
								<p class="help-block text-danger">{{ $errors->first('usuario_id') }}</p>
						</div>
							<br>
						<div class="form-group">
							{!! Form::label('fecha entrega', 'Fecha de Entrega *') !!}
							<br>
							<input name="fecha_entrega" type="text" id="datepickerfe" class="form-control shadow-sm p-3 bg-white rounded w-75">
								<p class="help-block text-danger">{{ $errors->first('fecha_entrega') }}</p>
					    </div>	
							<br>
						<div class="form-group">
							{!! Form::label('fecha mantenimiento', 'Fecha de Mantenimiento *') !!}
							<br>
							<input name="fecha_mantenimiento" type="text" id="datepickerfm" class="form-control shadow-sm p-3 bg-white rounded w-75">
								<p class="help-block text-danger">{{ $errors->first('fecha_mantenimiento') }}</p>
						</div>	
 	                        <br>
						<div class="form-group">
							{!! Form::label('Propiedad', 'Propiedad *') !!}
							<br>
							{{Form::select('propiedad',
							 [''=>'',
							 	'INDEFINIDO' => 'INDEFINIDO',
	 							'TQI' => 'TQI',
	 							'PERSONAL' => 'PERSONAL', 
							 	], null,['class' => 'form-control'])}}
								<p class="help-block text-danger">{{ $errors->first('propiedad') }}</p>
						</div> 	
							<br>
						<div class="form-group">
							{!! Form::label('Tipo de telefono', 'Tipo de telefono *') !!}
							<br>
							{{Form::select('tipo_de_telefono',
							 [''=>'',
							 	'INDEFINIDO' => 'INDEFINIDO',
	 							'MOVIL' => 'MOVIL',
	 							'FIJO' => 'FIJO', 
							 	], null,['class' => 'form-control'])}}
								<p class="help-block text-danger">{{ $errors->first('tipo_de_telefono') }}</p>
						</div> 	
							<br>	
						<div class="form-group">
							{!! Form::label('marca del telefono', 'Marca del telefono *') !!}	
							{!! Form::text('marca_telefono', null, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5 ']) !!}
								<p class="help-block text-danger">{{ $errors->first('marca_telefono') }}</p>
						</div>
							<br>
						<div class="form-group">
							{!! Form::label('referencia', 'Referencia del Telefono *') !!}
							{!! Form::text('referencia_telefono', null, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5']) !!}
								<p class="help-block text-danger">{{ $errors->first('referencia_telefono') }}</p>
						</div>
							<br>
						<div class="form-group">
							{!! Form::label('tipo_so', 'Tipo de Sistema Operativo *') !!}
							{{Form::select('tipo_so',
							 [''=>'',
							 	'INDEFINIDO' => 'INDEFINIDO',
							 	'ANDROID' => 'ANDROID',
							 	'IOS' => 'IOS',
							 	'WINDOWS' => 'WINDOWS', 
							 	'JAVA' => 'JAVA',						
							 	], null,['class' => 'form-control'])}}
								<p class="help-block text-danger">{{ $errors->first('tipo_so') }}</p>
						</div>
							<br>
						<div class="form-group">
							{!! Form::label('version', 'Version del Sistema Operativo *') !!}
							{!! Form::text('version_so', null, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5']) !!}
								<p class="help-block text-danger">{{ $errors->first('version_so') }}</p>
						</div>
							<br>
						<div class="form-group">
							{!! Form::label('serial', 'Serial telefono *') !!}
							{!! Form::text('serial_telefono', null, ['class' => 'form-control shadow-sm p- bg-white rounded w-5']) !!}
								<p class="help-block text-danger">{{ $errors->first('serial_telefono') }}</p>
						</div>
							<br>
						<div class="form-group">
							{!! Form::label('imei1', 'IMEI-1 Telefono *') !!}
							{!! Form::text('imei_1', null, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5']) !!}
								<p class="help-block text-danger">{{ $errors->first('imei_1') }}</p>
						</div>
							<br>
						<div class="form-group">
							{!! Form::label('imei2', 'IMEI-2 Telefono') !!}
							{!! Form::text('imei_2', null, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5']) !!}
								<p class="help-block text-danger">{{ $errors->first('imei_2') }}</p>
						</div>
							<br>
						<div class="form-group">
							{!! Form::label('mac', 'MAC Telefono *') !!}
							{!! Form::text('mac_telefono', null, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5']) !!}
								<p class="help-block text-danger">{{ $errors->first('mac_telefono') }}</p>
						</div>
							<br>
						<div class="form-group">
							{!! Form::label('incluido', 'Incluido *') !!}
							<br>
							{{Form::select('incluido',
							 [''=>'',
							 	'INDEFINIDO' => 'INDEFINIDO',
							 	'SI' => 'SI',
							 	'NO' => 'NO', 
							 	], null,['class' => 'form-control'])}}
								<p class="help-block text-danger">{{ $errors->first('incluido') }}</p>
						</div>
							<br>
						<div class="form-group">
							{!! Form::label('proveed', 'Proveedor *') !!}
							{!! Form::text('proveedor', null, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5']) !!}
								<p class="help-block text-danger">{{ $errors->first('proveedor') }}</p>
						</div>
							<br>
						<div class="form-group">
							{!! Form::label('precio', 'Precio *') !!}
							{!! Form::text('precio', null, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5']) !!}
								<p class="help-block text-danger">{{ $errors->first('precio') }}</p>
						</div>
							
					</div>
							<br>
					{!! Form::submit('Registrar ', ['class' => 'btn btn-success']) !!}

					</center>	
				</div>		
			{!! Form::close() !!}
	</center>

	
	@endsection