@extends('layouts.app')
	@section('content')
		<div class="row">
			<div class="container border ">
				<div class="float-right mt-4">
				  <a href="{{url('/reportes')}}"><button class="btn btn-primary">Todos los reportes</button></a>
				 </div> 
				<h2 class="mb-3 mt-3">Editar reporte.</h2>
					{!! Form::model($reporte, ['route' => ['reportes.update', $reporte] , 'method' => 'PUT' ]) !!}
								<div class="form-group">
									{!! Form::label('tipor', 'Tipo de reporte *', null, ['class'=>'form-control']) !!}
									{{Form::select('tipo_reporte',
										 [''=>'',
										 	'Físico' => 'Físico',
										 	'Programas' => 'Programas',
										 	'Otro' => 'Otro', 
										 	], $reporte->tipo_reporte,['class' => 'form-control'])}}
										 		<p class="help-block text-danger">{{ $errors->first('tipo_reporte') }}</p>	
								</div> 			
								<div class="form-group">
									{!! Form::label('desc', 'Descripción del reporte *', null, ['class'=>'form-control']) !!}
									{!! Form::textarea('descripcion_usuario', $reporte->descripcion_usuario, ['class' => 'form-control shadow-sm p-3  bg-white rounded w-5']) !!}
												<p class="help-block text-danger ">{{ $errors->first('descripcion_usuario') }}</p>
								</div> 	
								<div class="form-group">
									{!! Form::label('fecha reporte', 'Fecha donde inició la causa del reporte *', null, ['class'=>'form-control']) !!}
									<input name="fecha_reporte" value="{{$reporte->fecha_reporte}}" type="text" id="datepickerfe" class="form-control shadow-sm p-3 bg-white rounded">
										        <p class="help-block text-danger">{{ $errors->first('fecha_reporte') }}</p>
							    </div>	
					{!! Form::submit('Editar reporte ', ['class' => 'btn btn-success form-control mb-3']) !!}		
		{!! Form::close() !!}
	</div>	
  </div>	
@endsection