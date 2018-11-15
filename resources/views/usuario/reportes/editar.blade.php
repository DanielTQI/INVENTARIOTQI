@extends('layouts.app')
   @section('content')
   	<center><h1 class="form-group"> Editar Reporte de {{$reporte->tipo}} </h1></center>
		{!! Form::model($reporte, ['route' => ['reportes.update', $reporte] , 'method' => 'PUT' ]) !!}

				<div class="lg-3  form-group mt-5">
					<center>
						<div class="container ml-8 border shadow-sm rounded w-50 shadow-lg p-3 mb-5 bg-white rounded ">
								<div class="form-group">
											{!! Form::label('Asignado', 'Asignado *', ['class' => 'text-left']) !!}
												<br>
											{{-- {!! Form::select('user_id', $user->name,null, ['class' => 'form-control border border-primary']) !!} --}}
											<select name="usuario_id" class="form-control">
													<option value="{{$user['id']}}">{{$user['name']}}</option>
											</select>
										 		<p class="help-block text-danger">{{ $errors->first('usuario_id') }}</p>	
								</div>
												<br>
								<div class="form-group">
									{!! Form::label('tipor', 'Tipo de reporte *') !!}
												<br>
										{{Form::select('tipo_reporte',
										 [''=>'',
										 	'HARDWARD' => 'HARDWARD',
										 	'SOFTWARE' => 'SOFTWARE',
										 	'OTRO' => 'OTRO', 
										 	], $reporte->tipo_reporte,['class' => 'form-control '])}}
										 		<p class="help-block text-danger">{{ $errors->first('tipo_reporte') }}</p>	
								</div> 
												<br>				
								<div class="form-group">
									{!! Form::label('desc', 'Descripcion del reporte *') !!}
												<br>
									{!! Form::text('descripcion_usuario', $reporte->descripcion_usuario, ['class' => 'form-control shadow-sm p-3  bg-white rounded w-5 h-50']) !!}
												<p class="help-block text-danger ">{{ $errors->first('descripcion_usuario') }}</p>
								</div> 	
												<br>
								<div class="form-group">
									{!! Form::label('fecha reporte', 'Fecha donde inicío la causa del reporte *') !!}
									<br>
									<input name="fecha_reporte" type="text" id="datepickerfe" value="{{$reporte->fecha_reporte}}" class="form-control shadow-sm p-3 bg-white rounded w-75 ">
										<p class="help-block text-danger">{{ $errors->first('fecha_reporte') }}</p>
							    </div>	
							    <input type="hidden" name="tipo" value="{{$reporte->tipo}}">
							    {{-- <input type="hidden" name="idactivo" value="{{$reporte->id}}">	 --}}
						</div>
					{!! Form::submit('Crear ', ['class' => 'btn btn-success mt-0']) !!}
				</center>	
			</div>		
		{!! Form::close() !!}

		
@endsection