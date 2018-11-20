@extends('layouts.app')
	
	@section('content')
	<center>
		<div class="row">
			<div class="container">
		<h2 class="form-title">Crear Accesorios</h2>

			{!! Form::open(['route'=>'accesorios.store',  'method'=>'POST', 'files' =>true]) !!}
						<div class="form-group">
								{!! Form::label('Asignado', 'Asignado *', null, ['class' => 'form-control']) !!}
								{!! Form::select('usuario_id', $user, null, ['class' => 'form-control']) !!}
									<p class="help-block text-danger">{{ $errors->first('usuario_id') }}</p>
						</div>
							<div class="form-group">
								{!! Form::label('fecha entrega', 'Fecha de Entrega *') !!}
								<input name="fecha_entrega" type="text" id="datepickerfe" class="form-control shadow-sm p-3 bg-white rounded w-75">
									<p class="help-block text-danger">{{ $errors->first('fecha_entrega') }}</p>			
					    	</div>	
							<div class="form-group">
									{!! Form::label('fecha mantenimiento', 'Fecha de Mantenimiento *') !!}
									<input name="fecha_mantenimiento" type="text" id="datepickerfm" class="form-control shadow-sm p-3 bg-white rounded w-75">
										 <p class="help-block text-danger">{{ $errors->first('fecha_mantenimiento') }}</p>
							</div>	
						<div class="form-group">
							{!! Form::label('Propiedad', 'Propiedad *', null, ['class' => 'form-control']) !!}
							{{Form::select('propiedad',
							 [''=>'',
							 	'INDEFINIDO' => 'INDEFINIDO',
	 							'TQI' => 'TQI',
	 							'PERSONAL' => 'PERSONAL', 
							 	], null,['class' => 'form-control'])}}
							 	<p class="help-block text-danger">{{ $errors->first('propiedad') }}</p>
						</div> 	
						<div class="form-group">
							{!! Form::label('Tipo de accesorio', 'Tipo de accesorio *') !!}
							{!! Form::text('tipo_accesorio', null, ['class' => 'form-control shadow-sm p-3  bg-white rounded w-5 ']) !!}
								<p class="help-block text-danger">{{ $errors->first('tipo_accesorio') }}</p>	
						</div> 	
						<div class="form-group">
							{!! Form::label('marca del accesorio', 'Marca del accesorio *') !!}	
							{!! Form::text('marca_accesorio', null, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5 ']) !!}
								<p class="help-block text-danger">{{ $errors->first('marca_accesorio') }}</p>
						</div>
							<br>
						<div class="form-group">
							{!! Form::label('referencia', 'Referencia Accesorio *') !!}
							{!! Form::text('referencia_accesorio', null, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5']) !!}
								<p class="help-block text-danger">{{ $errors->first('referencia_accesorio') }}</p>
						</div>
							<br>
						<div class="form-group">
							{!! Form::label('serial', 'Serial accesorio *') !!}
							{!! Form::text('serial_accesorio', null, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5']) !!}
								<p class="help-block text-danger">{{ $errors->first('serial_accesorio') }}</p>
						</div>
							<br>
						<div class="form-group">
							{!! Form::label('mtm', 'FCC-ID accesorio') !!}
							{!! Form::text('fccid_accesorio', null, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5']) !!}
								<p class="help-block text-danger">{{ $errors->first('fccid_accesorio') }}</p>
						</div>
							<br>
						<div class="form-group">
							{!! Form::label('mtm', 'FCC-ID accesorio') !!}
							{!! Form::text('icid_accesorio', null, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5']) !!}
								<p class="help-block text-danger">{{ $errors->first('icid_accesorio') }}</p>
						</div>
						    <br>
						<div class="form-group">
							{!! Form::label('Tipo de Sistema Operativo', 'Incluido *') !!}
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
							{!! Form::label('proveedor', 'Proveedor *') !!}
							{!! Form::text('proveedor', null, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5']) !!}
								<p class="help-block text-danger">{{ $errors->first('proveedor') }}</p>
						</div>
							<br>
						<div class="form-group">
							{!! Form::label('precio', 'Precio *') !!}
							{!! Form::text('precio', null, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5']) !!}
								<p class="help-block text-danger">{{ $errors->first('precio') }}</p>
						</div>
					
							<br>
					{!! Form::submit('Registrar ', ['class' => 'btn btn-success']) !!}
		
			{!! Form::close() !!}
			</div>
			</div>

	@endsection