@extends('layouts.app')
	@section('content')
		<div class="row">
			<div class="container border ">
				<div class="float-right mt-4">
				  <a href="{{url('/activos')}}"><button class="btn btn-primary">Todos los activos</button></a>
				   </div> 
				     <h2 class="mb-3 mt-3">Registrar reporte.</h2>
						{!! Form::open(['route'=>'reportes.store',  'method'=>'POST', 'files' =>true]) !!}
									 <div class="form-group">
												{!! Form::label('Asignado', 'Asignado *', ['class' => 'text-left']) !!}
												{!! Form::select('user_id', $users, $usi, ['class' => 'form-control','required']) !!}
											 				<p class="help-block text-danger">{{ $errors->first('user_id') }}</p>	
									</div>
									<div class="form-group">
												{!! Form::label('tipor', 'Tipo de reporte *', null, ['class'=>'form-control']) !!}
												{{Form::select('tipo_reporte',
													 [''=>'',
													 	'FISICO' => 'FISICO',
													 	'PROGRAMAS' => 'PROGRAMAS',
													 	'OTRO' => 'OTRO', 
													 	], null,['class' => 'form-control','required'])}}
													 		<p class="help-block text-danger">{{ $errors->first('tipo_reporte') }}</p>	
									</div> 			
									<div class="form-group">
												{!! Form::label('desc', 'Descripcion del reporte *', null, ['class'=>'form-control']) !!}
												{!! Form::textarea('descripcion_usuario', null, ['class' => 'form-control shadow-sm p-3  bg-white rounded w-5 h-50','required']) !!}
															<p class="help-block text-danger ">{{ $errors->first('descripcion_usuario') }}</p>
									</div> 	
									<div class="form-group">
												{!! Form::label('fecha reporte', 'Fecha donde inicío la causa del reporte *', null, ['class'=>'form-control']) !!}
												{!! Form::text('fecha_reporte',null, ['class' => 'form-control','placeholder' => 'MM/DD/AAAA', 'id'=>'datepickerfecom','autocomplete'=>'off','required']) !!}
													        <p class="help-block text-danger">{{ $errors->first('fecha_reporte') }}</p>
								    </div>	
								    <input type="hidden" name="idactivo" value="{{$info->ida}}">
						{!! Form::submit('Crear Reporte ', ['class' => 'btn btn-success form-control mb-3']) !!}		
			{!! Form::close() !!}
		   </div>	
		</div>	
@endsection