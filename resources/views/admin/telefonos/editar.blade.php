@extends('layouts.app')
	@section('content')
	<center><h2 class="text-title">Editar Telefono</h2></center>
		{!! Form::model($telefono, ['route' => ['telefonos.update', $telefono] , 'method' => 'PUT' ]) !!}

			<div class="lg-3  mt-5 form-group">
				<center>
				
				<div class="lg-3  form-group mt-5">
				  <center>
					<div class="container ml-8 border shadow-sm rounded w-50 ">

						<div class="form-group">
							{!! Form::label('Asignado', 'Asignado *') !!}
							{!! Form::select('usuario_id', $user, $telefono->usuario_id, ['class' => 'form-control']) !!}
							<p class="help-block text-danger">{{ $errors->first('usuario_id') }}</p>	
						</div>
							<br>
						<div class="form-group">
							{!! Form::label('fecha entrega', 'Fecha de Entrega *') !!}
							<input name="fecha_entrega" type="text" id="datepickerfe" value="{{$telefono->fecha_entrega}}" class="form-control shadow-sm p-3 bg-white rounded w-75">
							 <p class="help-block text-danger">{{ $errors->first('fecha_entrega') }}</p>	
					    </div>	
							<br>
						<div class="form-group">
							{!! Form::label('fecha mantenimiento', 'Fecha de Mantenimiento *') !!}
							<input name="fecha_mantenimiento" type="text" id="datepickerfm" value="{{$telefono->fecha_mantenimiento}}" class="form-control shadow-sm p-3 bg-white rounded w-75">
							 <p class="help-block text-danger">{{ $errors->first('fecha_mantenimiento') }}</p>	
						</div>	
 	                        <br>
						<div class="form-group">
							{!! Form::label('Propiedad', 'Propiedad *') !!}
							{{Form::select('propiedad',
							 [''=>'',
							 	'INDEFINIDO' => 'INDEFINIDO',
	 							'TQI' => 'TQI',
	 							'PERSONAL' => 'PERSONAL', 
							 	], $telefono->propiedad, ['class' => 'form-control'])}}
							<p  class="help-block text-danger">{{ $errors->first('propiedad') }}</p>	


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
							 	], $telefono->tipo_de_telefono, ['class' => 'form-control'])}}
							<p  class="help-block text-danger">{{ $errors->first('tipo_de_telefono') }}</p>	


						</div>
								<br> 	
						<div class="form-group">
							{!! Form::label('marca del telefono', 'Marca del telefono *') !!}	
							{!! Form::text('marca_telefono', $telefono->marca_telefono, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5 ']) !!}
							 <p class="help-block text-danger">{{ $errors->first('marca_telefono') }}</p>	
						</div>
								<br>
						<div class="form-group">
							{!! Form::label('referencia', 'Referencia del Telefono *') !!}
							{!! Form::text('referencia_telefono', $telefono->referencia_telefono, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5']) !!}
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
							 	], $telefono->tipo_so,['class' => 'form-control'])}}
							 <p  class="help-block text-danger">{{ $errors->first('tipo_so') }}</p>	


						</div>
								<br>
						<div class="form-group">
							{!! Form::label('version', 'Version del Sistema Operativo *') !!}
							{!! Form::text('version_so', $telefono->version_so, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5']) !!}
							 <p class="help-block text-danger">{{ $errors->first('version_so') }}</p>	
						</div>
								<br>
						<div class="form-group">
							{!! Form::label('serial', 'Serial telefono *') !!}
							{!! Form::text('serial_telefono', $telefono->serial_telefono, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5']) !!}
							 <p class="help-block text-danger">{{ $errors->first('serial_telefono') }}</p>	
						</div>
								<br>
						<div class="form-group">
							{!! Form::label('imei1', 'IMEI-1 Telefono *') !!}
							{!! Form::text('imei_1', $telefono->imei_1, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5']) !!}
							 <p class="help-block text-danger">{{ $errors->first('imei_1') }}</p>	
						</div>
								<br>
						<div class="form-group">
							{!! Form::label('imei2', 'IMEI-2 Telefono') !!}
							{!! Form::text('imei_2', $telefono->imei_2, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5']) !!}
							 <p class="help-block text-danger">{{ $errors->first('imei_2') }}</p>	
						</div>
								<br>
						<div class="form-group">
							{!! Form::label('mac', 'MAC Telefono *') !!}
							{!! Form::text('mac_telefono', $telefono->mac_telefono, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5']) !!}
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
							 	], $telefono->incluido,['class' => 'form-control'])}}
							  <p class="help-block text-danger">{{ $errors->first('incluido') }}</p>	


						</div>
								<br>
						<div class="form-group">
							{!! Form::label('proveed', 'Proveedor *') !!}
							{!! Form::text('proveedor', $telefono->proveedor, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5']) !!}
							 <p class="help-block text-danger">{{ $errors->first('proveedor') }}</p>	
						</div>
						<div class="form-group">
							{!! Form::label('precio', 'Precio *') !!}
							{!! Form::text('precio', $telefono->precio, ['class' => 'form-control shadow-sm p-3 bg-white rounded w-5']) !!}
							 <p class="help-block text-danger">{{ $errors->first('precio') }}</p>	
						</div>
					</div>
							<br>
	
		{!! Form::submit('Actualizar ', ['class' => 'btn btn-success']) !!}

				</center>	
	
			</div>		

		{!! Form::close() !!}

		
@endsection