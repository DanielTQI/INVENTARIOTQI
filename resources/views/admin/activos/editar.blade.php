@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="container border ">
		    <div class="float-right mt-4">
			   <a href="{{url('/activos')}}"><button class="btn btn-primary">Todos los activos</button></a>
			</div> 
			  <h2 class="mb-3 mt-3">Editar {{$nameca}}</h2>
				{!! Form::model($activo, ['route' => ['activos.update', $activo] , 'method' => 'PUT' ]) !!}
						<div class="form-row">
								<div class="form-group col-md-4">
										{!! Form::label('Asignado', 'Asignado *', null, ['class' => 'form-label']) !!}
										{!! Form::select('user_id', $user, $activo->usuario_id, ['class' => 'form-control']) !!}
											<p class="help-block text-danger">{{ $errors->first('user_id') }}</p>
								</div>
								<div class="form-group col-md-4">
										{!! Form::label('fecha entrega', 'Fecha de entrega *', null, ['class' => 'form-control']) !!}
										{!! Form::text('fecha_entrega', $activo->fecha_entrega, ['class' => 'form-control','placeholder' => 'MM/DD/AAAA', 'id'=>'datepickerfe']) !!}
											 <p class="help-block text-danger">{{ $errors->first('fecha_entrega') }}</p>
								</div>	
								<div class="form-group col-md-4">
										{!! Form::label('fecha mantenimiento', 'Fecha de mantenimiento *', null, ['class' => 'form-control']) !!}
										{!! Form::text('fecha_mantenimiento', $activo->fecha_mantenimiento, ['class' => 'form-control','placeholder' => 'MM/DD/AAAA', 'id'=>'datepickerfm']) !!}
											   <p class="help-block text-danger">{{ $errors->first('fecha_mantenimiento') }}</p>
								</div>
						</div>
						<div class="form-row">	
								<div class="form-group col-md-4">
										{!! Form::label('Propiedad', 'Propiedad *', null, ['class' => 'form-control']) !!}
										{{  Form::select('propiedad',
											 [''=>'',
											 	'Indefinido' => 'Indefinido',
											 	'TQI' => 'TQI',
											 	'Personal' => 'Personal', 
											 	], $activo->propiedad,['class' => 'form-control', 'id' => 'prop']) }}
											 		<p class="help-block text-danger">{{ $errors->first('propiedad') }}</p>	
								</div>
								<div class="form-group col-md-4">
										{!! Form::label('marcaa', 'Marca *', null, ['class' => 'form-control']) !!}
										{!! Form::text('marca', $activo->marca_equipo, ['class' => 'form-control','placeholder' => 'Marca']) !!}
											 		<p class="help-block text-danger">{{ $errors->first('marca') }}</p>	
								</div>
								<div class="form-group col-md-4">
										{!! Form::label('ref', 'Referencia o modelo *', null, ['class' => 'form-control']) !!}
										{!! Form::text('referencia', $activo->referencia_equipo, ['class' => 'form-control','placeholder' => 'Referencia o modelo.']) !!}
											 		<p class="help-block text-danger">{{ $errors->first('referencia') }}</p>	
								</div>
						     </div> 	
								<div class="form-group">
										{!! Form::label('ser', 'Serial S/N *', null, ['class' => 'form-control']) !!}
										{!! Form::text('serial', $activo->serial_equipo, ['class' => 'form-control','placeholder' => 'S/N']) !!}
											 		<p class="help-block text-danger">{{ $errors->first('serial') }}</p>	
								</div> 
								<div class="form-group">
										{!! Form::label('categ', 'Categoría *', null, ['class' => 'form-control']) !!}
										{{  Form::select('categoria', $cate, $activo->categoria_id, ['class' => 'form-control', 'id' => 'cat']) }}
											 		<p class="help-block text-danger">{{ $errors->first('categoria') }}</p>	
								</div>
						  <div id="comput">
						    <div class="form-row">	
								<div class="form-group col-md-4">
										<label  class="form-label" id="tipoctitle">Tipo de computador *</label>
										{!! Form::select('tipo_de_equipo',
											 [	''=>'',
											 	'Indefinido' => 'Indefinido',
											 	'Escritorio todo en uno' => 'Escritorio todo en uno',
											 	'Portátil' => 'Portátil',
											 	'Escritorio' => 'Escritorio', 
											 	'iPad' => 'iPad', 
											 	], $activo->tipo_de_equipo,['class' => 'form-control','id' => 'tipocselect']) !!}
											 		<p class="help-block text-danger">{{ $errors->first('tipo_de_equipo') }}</p>
								</div>
								 <div class="form-group col-md-4">
										<label class="form-label" id="tiposoctitle">Tipo de sistema operativo del computador *</label>
										{!! Form::select('tipo_de_soc',
											 [	''=>'',
											 	'Windows' => 'Windows',
											 	'MacOS' => 'MacOS',
											 	'IOS' => 'IOS', 
											 	'Linux' => 'Linux', 
											 	'Solaris' => 'Solaris', 
											 	], $activo->tipo_so,['class' => 'form-control','id' => 'tiposoc']) !!}
											 		<p class="help-block text-danger">{{ $errors->first('tipo_de_soc') }}</p>
								</div>
								 <div class="form-group col-md-4">
										<label class="form-label" id="lictitle">Licencia del sistema operativo del computador *</label>
										{!! Form::select('tipo_de_lic',
											 [	''=>'',
											 	'OEM' => 'OEM',
											 	'Personal' => 'Personal', 
											 	'Javeriana' => 'Javeriana',
											 	'Otro' => 'Otro', 
											 	], $activo->licencia,['class' => 'form-control','id' => 'lic']) !!}
											 		<p class="help-block text-danger">{{ $errors->first('tipo_de_lic') }}</p>
								</div>
						   </div>
						 <div class="form-row">  
							<div class="form-group col-md-4">
										<label class="form-label" id="tipoofftitle">Tipo de office *</label>
										{!! Form::select('office',
											 [	''=>'',
											 	'OEM' => 'OEM',
											 	'Licencia fisica' =>'Licencia fisica',
											 	'Suscripcion office.com' => 'Suscripcion office.com', 
											 	'Personal' => 'Personal',
											 	'Indefinido' => 'Indefinido',
											 	], $activo->tipo_office,['class' => 'form-control','id' => 'tipooff']) !!}
											 		<p class="help-block text-danger">{{ $errors->first('office') }}</p>
								</div>  
								<div class="form-group col-md-4">
										<label class="form-label" id="idwtitle">Numero ID de suscripción, si tiene Windows</label>
										{!! Form::text('nid', $activo->nid_sistema_operativo, ['class' => 'form-control','id' => 'idw','placeholder' => 'ID windows.']) !!}
												     <p class="help-block text-danger ">{{ $errors->first('nid') }}</p>
								</div>
								<div class="form-group col-md-4">
										<label class="form-label" id="workgtitle">WorkGroup del computador, si tiene Windows </label>
										{!! Form::text('workgroup_equipo', $activo->workgroup_equipo, ['class' => 'form-control','id'=>'workg','placeholder' => 'WorkGroup.']) !!}
												     <p class="help-block text-danger ">{{ $errors->first('workgroup_equipo') }}</p>
								</div>
						     </div>
								<div class="form-group">
										<label class="form-label" id="mtmtitle">MTM del computador *</label>
										{!! Form::text('mtm', $activo->mtm_equipo, ['class' => 'form-control','id' => 'mtm','placeholder' => 'Escriba el mtm, si tiene.']) !!}
												     <p class="help-block text-danger ">{{ $errors->first('mtm') }}</p>
								</div> 
								<div class="form-group">
										<label class="form-label" id="lmactitle">Lan MAC, si tiene</label>
										{!! Form::text('lan_mac', $activo->lan_mac, ['class' => 'form-control','id'=>'lmac','placeholder' => 'Lan mac.']) !!}
												     <p class="help-block text-danger ">{{ $errors->first('lan_mac') }}</p>
								</div>
						</div>	
						<div id="accesori">
							  <div class="form-row">	
								<div class="form-group col-md-6">
										<label  class="form-label" id="tipoacctitle">Tipo de accesorio *</label>
										{!! Form::text('tipo_accesorio', $activo->tipo_de_equipo, ['class' => 'form-control','id' =>'tipoacce','placeholder' => 'Escriba el tipo de accesorio.']) !!}
												     <p class="help-block text-danger ">{{ $errors->first('tipo_accesorio') }}</p>
								</div> 
								<div class="form-group col-md-6">
										<label class="form-label" id="incluidotitle">¿Incluido? *</label>
										{!! Form::select('incluido',
											 [	''=>'',
											 	'Indefinido' => 'Indefinido',
											 	'Si' => 'Si', 
											 	'No' => 'No',
											 	], $activo->incluido,['class' => 'form-control','id' => 'incluido']) !!}
											 		<p class="help-block text-danger">{{ $errors->first('incluido') }}</p>
							   </div> 
							  </div>
						   <div class="form-row">	
							<div class="form-group col-md-6">
									<label class="form-label" id="fccidtitle">FCCID del accesorio</label>
									{!! Form::text('fccid', $activo->fccid_equipo, ['class' => 'form-control','id' => 'fccid','placeholder' => 'FCCID, si tiene.']) !!}
											     <p class="help-block text-danger ">{{ $errors->first('fccid') }}</p>
							</div>
							<div class="form-group col-md-6">
									<label class="form-label" id="icidtitle">ICID del accesorio</label>
									{!! Form::text('icid', $activo->icid_equipo, ['class' => 'form-control','id' => 'icid','placeholder' => 'ICID, si tiene.']) !!}
											     <p class="help-block text-danger ">{{ $errors->first('icid') }}</p>
							</div>
						</div>
					</div>
						<div id="telef">
						   <div class="form-row">
							<div class="form-group col-md-6">
									<label class="form-label" id="tipoteltitle">Tipo de teléfono *</label>
									{!! Form::select('tipo_de_telefono',
										 [	''=>'',
										 	'Móvil' => 'Móvil',
										 	'Fijo' => 'Fijo',
										 	'Otro' => 'Otro', 
										 	], $activo->tipo_de_equipo,['class' => 'form-control','id' => 'tipotel']) !!}
										 		<p class="help-block text-danger">{{ $errors->first('tipo_de_telefono') }}</p>
							</div>
							<div class="form-group col-md-6">
									<label class="form-label" id="tiposottitle">Tipo del sistema operativo del teléfono *</label>
									{!! Form::select('tipo_de_sot',
										 [	''=>'',
										 	'Android' => 'Android',
										 	'IOS' => 'IOS', 
										 	'Windows' => 'Windows',
										 	'Otro' => 'Otro', 
										 	], $activo->tipo_so,['class' => 'form-control','id' => 'tiposot']) !!}
										 		<p class="help-block text-danger">{{ $errors->first('tipo_de_sot') }}</p>
							</div>
						</div>
						 <div class="form-row">
							<div class="form-group col-md-6">
									<label class="form-label" id="imei1title">IMEI 1 del celular *</label>
									{!! Form::number('imei_1', $activo->imei_1, ['class' => 'form-control','id'=>'imei1','placeholder' => 'IMEI 1.']) !!}
											     <p class="help-block text-danger ">{{ $errors->first('imei_1') }}</p>
							</div>
							<div class="form-group col-md-6">
									<label class="form-label" id="imei2title">IMEI 2 del celular</label>
									{!! Form::number('imei_2', $activo->imei_2, ['class' => 'form-control','id'=>'imei2','placeholder' => 'IMEI 2, si tiene.']) !!}
											     <p class="help-block text-danger ">{{ $errors->first('imei_2') }}</p>
							</div>
						  </div>
						</div>
						  <div id="comptel">
							<div class="form-group">
									<label class="form-label" id="wmactitle">WiFi MAC *</label>
									{!! Form::text('wifi_mac', $activo->wifi_mac, ['class' => 'form-control','id'=>'wmac', 'placeholder' => 'WiFi mac.']) !!}
											     <p class="help-block text-danger ">{{ $errors->first('wifi_mac') }}</p>
							</div>
						<div class="form-row">	
							<div class="form-group col-md-6">
								<label class="form-label" id="vsotitle">Versión del sistema operativo *</label>
									{!! Form::text('vso', $activo->vso_equipo, ['class' => 'form-control','id' => 'vso','placeholder' => 'Escriba la version del SO.']) !!}
											     <p class="help-block text-danger ">{{ $errors->first('vso') }}</p>
							</div>
							<div class="form-group col-md-6">
									<label class="form-label" id="nombretitle">Nombre del activo *</label>
									{!! Form::text('nombre', $activo->nombre_equipo, ['class' => 'form-control','id' =>'nombre','placeholder' => 'Nombre del activo']) !!}
											     <p class="help-block text-danger ">{{ $errors->first('nombre') }}</p>
							</div>	
						</div>	
						 <div class="form-row">
							<div class="form-group col-md-6">
									<label class="form-label" id="cadmintitle">Cuenta de admin, si no es personal *</label>
									{!! Form::text('cuenta_admin', $activo->cuenta_admin_equipo, ['class' => 'form-control','id'=>'cadmin','placeholder' => 'Escriba la cuenta del admin.']) !!}
											     <p class="help-block text-danger ">{{ $errors->first('cuenta_admin') }}</p>
							</div>
							<div class="form-group col-md-6">
									<label class="form-label" id="passtitle">Contraseña del activo, si no es personal *</label>
									{!! Form::text('contraseña', $activo->pass_admin, ['class' => 'form-control','id'=>'pass','placeholder' => 'Escriba la contraseña.']) !!}
											     <p class="help-block text-danger ">{{ $errors->first('contraseña') }}</p>
							</div>
						  </div>	
						</div>	
						<div id="general">
						  <div class="form-row">	
							<div class="form-group col-md-4">
									{!! Form::label('fecha entrega', 'Fecha de compra *', null, ['class' => 'form-control']) !!}
									{!! Form::text('fecha_compra',$activo->fecha_compra, ['class' => 'form-control','placeholder' => 'MM/DD/AAAA', 'id'=>'datepickerfecom','autocomplete'=>'off','required']) !!}
										 <p class="help-block text-danger">{{ $errors->first('fecha_compra') }}</p>
							</div>
							<div class="form-group col-md-4">
									<label class="form-label" id="provtitle">Proveedor del activo *</label>
									{!! Form::text('proveedor', $activo->proveedor, ['class' => 'form-control','id'=>'prov','placeholder' => 'Proveedor del activo.']) !!}
											     <p class="help-block text-danger ">{{ $errors->first('proveedor') }}</p>
							</div>
							<div class="form-group col-md-4">
									<label class="form-label" id="prectitle">Precio del activo *</label>
									{!! Form::number('precio', $activo->precio, ['class' => 'form-control','id'=>'prec','placeholder' => 'Escriba el precio del activo.']) !!}
											     <p class="help-block text-danger ">{{ $errors->first('precio') }}</p>
							</div>
						</div>	
									{!! Form::submit('Editar ', ['class' => 'btn btn-success form-control mb-3', 'id' => 'btn']) !!}
							
						</div>
				{!! Form::close() !!}
			  </div>
		 </div>	
@endsection
@section('js')
	<script type="text/javascript">	
		 $.datepicker.regional['es'] = {
		     closeText: 'Cerrar',
		     prevText: '< Ant',
		     nextText: 'Sig >',
		     currentText: 'Hoy',
		     monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		     monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
		     dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		     dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		     dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
		     };
		  $.datepicker.setDefaults($.datepicker.regional['es']);
		      $(document).ready(function() {
		          setTimeout(function() {
		            $('#aviso').fadeOut(1500);
		          },3000);
					  $( "#datepickerfe" ).datepicker();
					  $( "#datepickerfecom" ).datepicker();
					  $( "#datepickerfm" ).datepicker();
			          $('#general').hide();
			          $('#comput').hide();
			          $('#accesori').hide();
			          $('#telef').hide();
			          $('#comptel').hide();
			          $('#butd').attr('disabled',true);
		       $("#cat").on("change",function(){
		          var valor= $("#cat").val();
		            if (valor=='0') {
		                $('#general').hide();
		                $('#comput').hide();
		                $('#accesori').hide();
		                $('#telef').hide();
		                $('#comptel').hide();
		            }else if (valor=='1') {
		                $('#general').show();
		                $('#comput').show();
		                $('#comptel').show();
		                $('#accesori').hide();
		                $('#telef').hide();
		            }else if (valor=='2') {
		                $('#accesori').show();
		                $('#general').show();
		                $('#comput').hide();
		                $('#telef').hide();
		                $('#comptel').hide();
		            }else if (valor=='3') {
		                $('#accesori').hide();
		                $('#general').show();
		                $('#comput').hide();
		                $('#telef').show();
		                $('#comptel').show();
		            }else if (valor=='4') {
		                $('#general').hide();
		                $('#comput').hide();
		                $('#accesori').hide();
		                $('#telef').hide();
		                $('#comptel').hide();
		            }
					});
		               $("#cat").trigger('change');
		         });
	      </script>
@endsection											