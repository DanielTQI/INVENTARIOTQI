@extends('layouts.app')
	@section('content')
		<div class="row">
			<div class="container border ">
				<div class="float-right mt-4">
				  <a href="{{url('/activos')}}"><button class="btn btn-primary">Todos los activos</button></a>
				 </div> 
				<h2 class="mb-3 mt-3">Registrar activo.</h2>
				
					{!! Form::open(['route'=>'activos.store',  'method'=>'POST', 'files' =>true]) !!}
								<div class="form-group">
										{!! Form::label('Asignado', 'Asignado *', null, ['class' => 'form-label']) !!}
										{!! Form::select('user_id', $user, null, ['class' => 'form-control']) !!}
											<p class="help-block text-danger">{{ $errors->first('user_id') }}</p>
								</div>
								<div class="form-group">
										{!! Form::label('fecha entrega', 'Fecha de entrega *', null, ['class' => 'form-control']) !!}
										{!! Form::text('fecha_entrega',null, ['class' => 'form-control','placeholder' => 'MM/DD/AAAA', 'id'=>'datepickerfe']) !!}
											 <p class="help-block text-danger">{{ $errors->first('fecha_entrega') }}</p>
								</div>	
								<div class="form-group">
										{!! Form::label('fecha mantenimiento', 'Fecha de mantenimiento *', null, ['class' => 'form-control']) !!}
										{!! Form::text('fecha_mantenimiento',null, ['class' => 'form-control','placeholder' => 'MM/DD/AAAA', 'id'=>'datepickerfm']) !!}
											   <p class="help-block text-danger">{{ $errors->first('fecha_mantenimiento') }}</p>
								</div>
								<div class="form-group">
										{!! Form::label('Propiedad', 'Propiedad *', null, ['class' => 'form-control']) !!}
										{{  Form::select('propiedad',
											 [''=>'',
											 	'INDEFINIDO' => 'Indefinido',
											 	'TQI' => 'TQI',
											 	'PERSONAL' => 'Personal', 
											 	], null,['class' => 'form-control', 'id' => 'prop']) }}
											 		<p class="help-block text-danger">{{ $errors->first('propiedad') }}</p>	
								</div>
								<div class="form-group">
										{!! Form::label('marcaa', 'Marca *', null, ['class' => 'form-control']) !!}
										{!! Form::text('marca', null, ['class' => 'form-control','placeholder' => 'Marca']) !!}
											 		<p class="help-block text-danger">{{ $errors->first('marca') }}</p>	
								</div>
								<div class="form-group">
										{!! Form::label('ref', 'Referencia o modelo *', null, ['class' => 'form-control']) !!}
										{!! Form::text('referencia', null, ['class' => 'form-control','placeholder' => 'Referencia o modelo.']) !!}
											 		<p class="help-block text-danger">{{ $errors->first('referencia') }}</p>	
								</div> 	
								<div class="form-group">
										{!! Form::label('ser', 'Serial S/N *', null, ['class' => 'form-control']) !!}
										{!! Form::text('serial', null, ['class' => 'form-control','placeholder' => 'S/N']) !!}
											 		<p class="help-block text-danger">{{ $errors->first('serial') }}</p>	
								</div> 
								<div class="form-group">
										{!! Form::label('categoria', 'Categoria *', null, ['class' => 'form-control']) !!}
										{{  Form::select('categoria', $cate, null,['class' => 'form-control', 'id' => 'cat']) }}
											 		<p class="help-block text-danger">{{ $errors->first('categoria') }}</p>	
								</div>
							<div id="comput">
								<div class="form-group">
										<label  class="form-label" id="tipoctitle">Tipo de computador *</label>
										{!! Form::select('tipo_de_equipo',
											 [	''=>'',
											 	'Indefinido' => 'Indefinido',
											 	'DeskTop_TodoEnUno' => 'DeskTop todo en uno',
											 	'LapTop' => 'LapTop',
											 	'DeskTop' => 'DeskTop', 
											 	'iPad' => 'iPad', 
											 	], null,['class' => 'form-control','id' => 'tipocselect']) !!}
											 		<p class="help-block text-danger">{{ $errors->first('tipo_de_equipo') }}</p>
								</div>
								<div class="form-group">
										<label class="form-label" id="mtmtitle">MTM del computador *</label>
										{!! Form::text('mtm', null, ['class' => 'form-control','id' => 'mtm','placeholder' => 'Escriba el mtm, si tiene.']) !!}
												     <p class="help-block text-danger ">{{ $errors->first('mtm') }}</p>
								</div> 
								<div class="form-group">
										<label class="form-label" id="tiposoctitle">Tipo de sistema operativo del computador *</label>
										{!! Form::select('tipo_de_soc',
											 [	''=>'',
											 	'Windows' => 'Windows',
											 	'MacOS' => 'MacOS',
											 	'IOS' => 'IOS', 
											 	'Linux' => 'Linux', 
											 	'Solaris' => 'Solaris', 
											 	], null,['class' => 'form-control','id' => 'tiposoc']) !!}
											 		<p class="help-block text-danger">{{ $errors->first('tipo_de_soc') }}</p>
								</div>
								<div class="form-group">
										<label class="form-label" id="lictitle">Licencia del sistema operativo del computador *</label>
										{!! Form::select('tipo_de_lic',
											 [	''=>'',
											 	'OEM' => 'OEM',
											 	'Personal' => 'Personal', 
											 	'Javeriana' => 'Javeriana',
											 	'Otro' => 'Otro', 
											 	], null,['class' => 'form-control','id' => 'lic']) !!}
											 		<p class="help-block text-danger">{{ $errors->first('tipo_de_lic') }}</p>
								</div>  
								<div class="form-group">
										<label class="form-label" id="idwtitle">Numero ID de suscripcion, si tiene Windows</label>
										{!! Form::text('nid', null, ['class' => 'form-control','id' => 'idw','placeholder' => 'ID windows.']) !!}
												     <p class="help-block text-danger ">{{ $errors->first('nid') }}</p>
								</div>
								<div class="form-group">
										<label class="form-label" id="tipoofftitle">Tipo de office *</label>
										{!! Form::select('office',
											 [	''=>'',
											 	'Indefinido' => 'Indefinido',
											 	'Suscripcion_office.com' => 'Suscripcion office.com', 
											 	'Personal' => 'Personal',
											 	], null,['class' => 'form-control','id' => 'tipooff']) !!}
											 		<p class="help-block text-danger">{{ $errors->first('office') }}</p>
								</div>  
								<div class="form-group">
										<label class="form-label" id="workgtitle">WorkGroup del computador, si tiene Windows </label>
										{!! Form::text('workgroup_equipo', null, ['class' => 'form-control','id'=>'workg','placeholder' => 'WorkGroup.']) !!}
												     <p class="help-block text-danger ">{{ $errors->first('workgroup_equipo') }}</p>
								</div>
								<div class="form-group">
										<label class="form-label" id="lmactitle">Lan MAC, si tiene</label>
										{!! Form::text('lan_mac', null, ['class' => 'form-control','id'=>'lmac','placeholder' => 'Lan mac.']) !!}
												     <p class="help-block text-danger ">{{ $errors->first('lan_mac') }}</p>
								</div>
							</div>	
							<div id="accesori">
								<div class="form-group">
										<label  class="form-label" id="tipoacctitle">Tipo de accesorio *</label>
										{!! Form::text('tipo_accesorio', null, ['class' => 'form-control','id' =>'tipoacce','placeholder' => 'Escriba el tipo de accesorio.']) !!}
												     <p class="help-block text-danger ">{{ $errors->first('tipo_accesorio') }}</p>
								</div> 
								<div class="form-group">
										<label class="form-label" id="fccidtitle">FCCID del accesorio</label>
										{!! Form::text('fccid', null, ['class' => 'form-control','id' => 'fccid','placeholder' => 'FCCID, si tiene.']) !!}
												     <p class="help-block text-danger ">{{ $errors->first('fccid') }}</p>
								</div>
								<div class="form-group">
										<label class="form-label" id="icidtitle">ICID del accesorio</label>
										{!! Form::text('icid', null, ['class' => 'form-control','id' => 'icid','placeholder' => 'ICID, si tiene.']) !!}
												     <p class="help-block text-danger ">{{ $errors->first('icid') }}</p>
								</div>
								<div class="form-group">
										<label class="form-label" id="incluidotitle">¿Incluido? *</label>
										{!! Form::select('incluido',
											 [	''=>'',
											 	'Indefinido' => 'Indefinido',
											 	'Si' => 'Si', 
											 	'No' => 'No',
											 	], null,['class' => 'form-control','id' => 'incluido']) !!}
											 		<p class="help-block text-danger">{{ $errors->first('incluido') }}</p>
								</div>  	 
							</div>
							<div id="telef">
								<div class="form-group">
										<label class="form-label" id="tipoteltitle">Tipo de telefono *</label>
										{!! Form::select('tipo_de_telefono',
											 [	''=>'',
											 	'Movil' => 'Movil',
											 	'Fijo' => 'Fijo',
											 	'Otro' => 'Otro', 
											 	], null,['class' => 'form-control','id' => 'tipotel']) !!}
											 		<p class="help-block text-danger">{{ $errors->first('tipo_de_telefono') }}</p>
								</div>
								<div class="form-group">
										<label class="form-label" id="tiposottitle">Tipo del sistema operativo del telefono *</label>
										{!! Form::select('tipo_de_sot',
											 [	''=>'',
											 	'Android' => 'Android',
											 	'IOS' => 'IOS', 
											 	'Windows' => 'Windows',
											 	'Otro' => 'Otro', 
											 	], null,['class' => 'form-control','id' => 'tiposot']) !!}
											 		<p class="help-block text-danger">{{ $errors->first('tipo_de_sot') }}</p>
								</div>
								<div class="form-group">
										<label class="form-label" id="imei1title">IMEI 1 del celular *</label>
										{!! Form::number('imei_1', null, ['class' => 'form-control','id'=>'imei1','placeholder' => 'IMEI 1.']) !!}
												     <p class="help-block text-danger ">{{ $errors->first('imei_1') }}</p>
								</div>
								<div class="form-group">
										<label class="form-label" id="imei2title">IMEI 2 del celular</label>
										{!! Form::number('imei_2', null, ['class' => 'form-control','id'=>'imei2','placeholder' => 'IMEI 2, si tiene.']) !!}
												     <p class="help-block text-danger ">{{ $errors->first('imei_2') }}</p>
								</div>
							</div>
							<div id="comptel">
								<div class="form-group">
										<label class="form-label" id="nombretitle">Nombre del activo *</label>
										{!! Form::text('nombre', null, ['class' => 'form-control','id' =>'nombre','placeholder' => 'Nombre del activo']) !!}
												     <p class="help-block text-danger ">{{ $errors->first('nombre') }}</p>
								</div>	
								<div class="form-group">
									<label class="form-label" id="vsotitle">Version del sistema operativo *</label>
										{!! Form::text('vso', null, ['class' => 'form-control','id' => 'vso','placeholder' => 'Escriba la version del SO.']) !!}
												     <p class="help-block text-danger ">{{ $errors->first('vso') }}</p>
								</div>
								<div class="form-group">
										<label class="form-label" id="wmactitle">WiFi MAC *</label>
										{!! Form::text('wifi_mac', null, ['class' => 'form-control','id'=>'wmac', 'placeholder' => 'WiFi mac.']) !!}
												     <p class="help-block text-danger ">{{ $errors->first('wifi_mac') }}</p>
								</div>
								<div class="form-group">
										<label class="form-label" id="cadmintitle">Cuenta de admin *</label>
										{!! Form::text('cuenta_admin', null, ['class' => 'form-control','id'=>'cadmin','placeholder' => 'Escriba la cuenta del admin.']) !!}
												     <p class="help-block text-danger ">{{ $errors->first('cuenta_admin') }}</p>
								</div>
								<div class="form-group">
										<label class="form-label" id="passtitle">Contraseña del activo, si es personal no la escriba *</label>
										{!! Form::text('contraseña', null, ['class' => 'form-control','id'=>'pass','placeholder' => 'Escriba la contraseña.']) !!}
												     <p class="help-block text-danger ">{{ $errors->first('contraseña') }}</p>
								</div>
							</div>	
							<div id="general">
								
								<div class="form-group">
										<label class="form-label" id="provtitle">Proveedor del activo *</label>
										{!! Form::text('proveedor', null, ['class' => 'form-control','id'=>'prov','placeholder' => 'Proveedor del activo.']) !!}
												     <p class="help-block text-danger ">{{ $errors->first('proveedor') }}</p>
								</div>
								<div class="form-group">
										<label class="form-label" id="prectitle">Precio del activo *</label>
										{!! Form::number('precio', null, ['class' => 'form-control','id'=>'prec','placeholder' => 'Escriba el precio del activo.']) !!}
												     <p class="help-block text-danger ">{{ $errors->first('precio') }}</p>
								</div>
										{!! Form::submit('Registrar ', ['class' => 'btn btn-success form-control mb-3', 'id' => 'btn']) !!}
								
							</div>
						{!! Form::close() !!}
					</div>
				</div>	
		@endsection						