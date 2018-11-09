@extends('layouts.app')
   @section('content')

		{!! Form::model($equipo, ['route' => ['equipos.update', $equipo] , 'method' => 'PUT' ]) !!}

				<div class="lg-3  form-group mt-5">
					<center>
						
						<div class="container ml-8 border shadow-sm rounded w-50 shadow-lg p-3 mb-5 bg-white rounded ">
								<div class="form-group">
											{!! Form::label('Asignado', 'Asignado *', ['class' => 'text-left']) !!}
												<br>
											{!! Form::select('user_id', $user, $equipo->usuario_id, ['class' => 'form-control border border-primary']) !!}
										 		<p class="help-block text-danger">{{ $errors->first('user_id') }}</p>	
								</div>
												<br>
								<div class="form-group">
									{!! Form::label('fecha entrega', 'Fecha de Entrega *') !!}
												<br>
										<input name="fecha_entrega" type="text" id="datepickerfe" value="{{$equipo->fecha_entrega}}" class="form-control shadow-sm p-3 bg-white rounded w-75 border-primary">
												<p class="help-block text-danger">{{ $errors->first('fecha_entrega') }}</p>
								</div>	
												<br>
								<div class="form-group">
									{!! Form::label('fecha mantenimiento', 'Fecha de Mantenimiento *') !!}
												<br>
										<input name="fecha_mantenimiento" type="text" id="datepickerfm" value="{{$equipo->fecha_mantenimiento}}" class="form-control shadow-sm p-3 bg-white rounded w-75 border-primary">
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
										 	], $equipo->propiedad,['class' => 'form-control border-primary'])}}
										 		<p class="help-block text-danger">{{ $errors->first('propiedad') }}</p>	
								</div> 	
												<br>
								<div class="form-group">
									{!! Form::label('Tipo de equipo', 'Tipo de equipo *') !!}
												<br>
										{!! Form::select('tipo_de_equipo',
										 [	''=>'',
										 	'INDEFINIDO' => 'INDEFINIDO',
										 	'DeskTopTodoEnUno' => 'DeskTopTodoEnUno',
										 	'LapTop' => 'LapTop',
										 	'DeskTop' => 'DeskTop', 
										 	'iPad' => 'iPad', 
										 	], $equipo->tipo_de_equipo,['class' => 'form-control border-primary']) !!}
										 		<p class="help-block text-danger">{{ $errors->first('tipo_de_equipo') }}</p>
								</div> 	
												<br>	
								<div class="form-group">
									{!! Form::label('marca del equipo', 'Marca del equipo *') !!}	
									{!! Form::text('marca_equipo', $equipo->marca_equipo, ['class' => 'form-control shadow-sm p-3  bg-white rounded w-5 border-primary']) !!}
												<p class="help-block text-danger ">{{ $errors->first('marca_equipo') }}</p>
								</div>
												<br>	
								<div class="form-group">
									{!! Form::label('referencia', 'Referencia Equipo *') !!}
									{!! Form::text('referencia_equipo',$equipo->referencia_equipo, ['class' => 'form-control shadow-sm p-3  bg-white rounded w-5 border-primary']) !!}
												<p class="help-block text-danger">{{ $errors->first('referencia_equipo') }}</p>
								</div>
												<br>	
								<div class="form-group">
									{!! Form::label('serial', 'Serial Equipo *') !!}
									{!! Form::text('serial_equipo', $equipo->serial_equipo, ['class' => 'form-control shadow-sm p-3  bg-white rounded w-5 border-primary']) !!}
												<p class="help-block text-danger">{{ $errors->first('serial_equipo') }}</p>
								</div>
												<br>	
								<div class="form-group">
									{!! Form::label('mtm', 'MTM equipo') !!}
									{!! Form::text('mtm_equipo', $equipo->mtm_equipo, ['class' => 'form-control shadow-sm p-3  bg-white rounded w-5 border-primary']) !!}
												<p class="help-block text-danger">{{ $errors->first('mtm_equipo') }}</p>	
								</div>
												<br>	
								<div class="form-group">
									{!! Form::label('Tipo de Sistema Operativo', 'Tipo de Sistema Operativo *') !!}
												<br>
										{{Form::select('tipo_de_so',
										 [''=>'',
											 'INDEFINIDO' => 'INDEFINIDO',
											 'WINDOWS' => 'WINDOWS',
											 'IOS' => 'IOS',
											 'LINUX' => 'LINUX', 
											 'SOLARIS' => 'SOLARIS', 
											 ], $equipo->tipo_so,['class' => 'form-control border-primary'])}}
											 	 <p class="help-block text-danger">{{ $errors->first('tipo_de_so') }}</p>
                                </div>
												<br>	
								<div class="form-group">
									{!! Form::label('licenciaa', 'licencia del Sistema Operativo *') !!}
												<br>
										{{Form::select('licencia',
									 	 [''=>'',
									 		'INDEFINIDO' => 'INDEFINIDO',
									 		'OEM' => 'OEM',
									 		'ADQUIRIDA' => 'ADQUIRIDA',
									 		'JAVERIANA' => 'JAVERIANA', 
									 		'PERSONAL' => 'PERSONAL', 
									 		], $equipo->licencia,['class' => 'form-control border-primary'])}}
									 			  <p class="help-block text-danger">{{ $errors->first('licencia') }}</p>
								</div> 
												<br>	
								<div class="form-group">
									{!! Form::label('version', 'Version del Sistema Operativo *') !!}
									{!! Form::text('vso_equipo', $equipo->vso_equipo, ['class' => 'form-control shadow-sm p-3  bg-white rounded w-5 border-primary']) !!}
									 			  <p class="help-block text-danger">{{ $errors->first('vso_equipo') }}</p>
								</div>
												<br>	
								<div class="form-group">
									{!! Form::label('nid', 'Numero ID del Sistema Operativo') !!}
									{!! Form::text('nidso_equipo', $equipo->nid_sistema_operativo, ['class' => 'form-control shadow-sm p-3  bg-white rounded w-5 border-primary']) !!}
									 			  <p class="help-block text-danger">{{ $errors->first('nidso_equipo') }}</p>
								</div>
												<br>	
								<div class="form-group">
									{!! Form::label('Tipo de Office', 'Tipo de Office *') !!}
												<br>
										{{Form::select('tipo_de_office',
										 [''=>'',
										 	'INDEFINIDO' => 'INDEFINIDO',
										 	'Suscripcion' => 'Suscripcion',
										 	'Lic. Fisica' => 'Lic. Fisica', 
										 	], $equipo->tipo_office,['class' => 'form-control border-primary'])}}
									 			  <p class="help-block text-danger">{{ $errors->first('tipo_de_office') }}</p>
								</div>
												<br>
								<div class="form-group">
									{!! Form::label('Nombre del equipo', 'Nombre del equipo *') !!}
												<br>
									{!! Form::text('nombre_equipo', $equipo->nombre_equipo, ['class' => 'form-control shadow-sm p-3  bg-white rounded w-5 border-primary'])  !!}
									 			  <p class="help-block text-danger">{{ $errors->first('nombre_equipo') }}</p>
								</div> 
												<br>	
								<div class="form-group">
									{!! Form::label('WorkGroup', 'Workgroup ') !!}
												<br>
									{!! Form::text('workgroup_equipo', $equipo->workgroup_equipo, ['class' => 'form-control shadow-sm p-3  bg-white rounded w-5 border-primary'])  !!}
									 			  <p class="help-block text-danger">{{ $errors->first('workgroup_equipo') }}</p>
								</div> 
												<br>	
								<div class="form-group">
									{!! Form::label('Cuenta Administrador', 'Cuenta Administrador Equipo *') !!}
												<br>
										{{Form::select('cuenta_admin',
										 [''=>'',
										 	'INDEFINIDO' => 'INDEFINIDO',
										 	'WebAdmin' => 'WebAdmin',
										 	'PERSONAL' => 'PERSONAL', 
										 	], $equipo->cuenta_admin_equipo,['class' => 'form-control border-primary'])}}
									 			  <p class="help-block text-danger">{{ $errors->first('cuenta_admin') }}</p>
								</div>
												<br>
								<div class="form-group">
									{!! Form::label('LanMac', 'LAN MAC') !!}
												<br>
									{!! Form::text('lan_mac', $equipo->lan_mac, ['class' => 'form-control shadow-sm p-3  bg-white rounded w-5 border-primary'])  !!}
									 			  <p class="help-block text-danger">{{ $errors->first('lan_mac') }}</p>
								</div>
												<br>
								<div class="form-group">
									{!! Form::label('WifiMac', 'WI-FI MAC *') !!}
												<br>
									{!! Form::text('wifi_mac', $equipo->wifi_mac, ['class' => 'form-control shadow-sm p-3  bg-white rounded w-5 border-primary'])  !!}
									 			  <p class="help-block text-danger">{{ $errors->first('wifi_mac') }}</p>
								</div>  
												<br>
								<div class="form-group">
									{!! Form::label('Pasword', 'CONTRASEÑA ADMIN *') !!}
												<br>
									{!! Form::text('pass_admin', $equipo->pass_admin, ['class' => 'form-control shadow-sm p-3  bg-white rounded w-5 border-primary'])  !!}
									 			  <p class="help-block text-danger">{{ $errors->first('pass_admin') }}</p>
								</div> 
												<br>
								<div class="form-group">
									{!! Form::label('Proveedor', 'Proveedor *') !!}
												<br>
									{!! Form::text('proveedor', $equipo->proveedor, ['class' => 'form-control shadow-sm p-3  bg-white rounded w-5 border-primary'])  !!}
									 			  <p class="help-block text-danger">{{ $errors->first('proveedor') }}</p>
								</div> 
												<br>
								<div class="form-group">
									{!! Form::label('Precio', 'Precio EQUIPO *') !!}
												<br>
									{!! Form::text('precio_equipo', $equipo->precio, ['class' => 'form-control shadow-sm p-3  bg-white rounded w-5 border-primary'])  !!}
									 			  <p class="help-block text-danger mb-3">{{ $errors->first('precio_equipo') }}</p>
								</div> 
												<br>
						</div>
												<br>
	
			{!! Form::submit('Actualizar ', ['class' => 'btn btn-success']) !!}

				</center>	
	
			</div>		

		{!! Form::close() !!}
@endsection