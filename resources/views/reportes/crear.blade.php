@extends('layouts.app')
   @section('content')

		{!! Form::open(['route'=>'reportes.store', 'name'=>'form1' , 'method'=>'POST', 'files' =>true]) !!}

				<div class="lg-3  form-group mt-5">
					<center>
						
						<div class="container ml-8 border shadow-sm rounded w-50 shadow-lg p-3 mb-5 bg-white rounded ">
								<div class="form-group">
											{!! Form::label('Asignado', 'Asignado *', ['class' => 'text-left']) !!}
												<br>
											{!! Form::select('user_id', $user,null, ['class' => 'form-control border border-primary']) !!}
										 		<p class="help-block text-danger">{{ $errors->first('user_id') }}</p>	
								</div>
												<br>
								<select class="form-control" id="select-tipo" onchange="cambia()">
									<option value="0">Seleccione
									<option value="1">Juegos
									<option value="2">Hardware
									<option value="3">Software
									<option value="4">Marcas
								</select>
			
								<select class="form-control" id="select.activo" name="opt">
									<option value="-">-
								</select>
												<br>
								<div class="form-group">
									{!! Form::label('tipor', 'Tipo de reporte *') !!}
												<br>
										{{Form::select('tipo_reporte',
										 [''=>'',
										 	'HARDWARD' => 'HARDWARD',
										 	'SOFTWARE' => 'SOFTWARE',
										 	'OTRO' => 'OTRO', 
										 	], null,['class' => 'form-control border-primary'])}}
										 		<p class="help-block text-danger">{{ $errors->first('propiedad') }}</p>	
								</div> 
												<br>				
								<div class="form-group">
									{!! Form::label('desc', 'Descripcion del reporte *') !!}
												<br>
									{!! Form::text('descr', null, ['class' => 'form-control shadow-sm p-3  bg-white rounded w-5 border-primary h-50']) !!}
												<p class="help-block text-danger ">{{ $errors->first('marca_equipo') }}</p>
								</div> 	
												<br>
								<div class="form-group">
									{!! Form::label('fecha reporte', 'Fecha donde inicío la causa del reporte *') !!}
									<br>
									<input name="fecha_entrega" type="text" id="datepickerfe" class="form-control shadow-sm p-3 bg-white rounded w-75 border-primary">
										<p class="help-block text-danger">{{ $errors->first('fecha_entrega') }}</p>
							    </div>		
						</div>
												<br>
	
			{!! Form::submit('Actualizar ', ['class' => 'btn btn-success mt-0']) !!}

				</center>	
	
			</div>		

		{!! Form::close() !!}

		<script type="text/javascript">
			$(function() {

				$('#select-tipo').on('change', onSelectActivo);
			});

			function onSelectActivo(){
				var tipo_select = $(this).val();
				alert(tipo_select);
			}

			
			
		</script>
@endsection