@extends('layouts.app')
	@section('content')
	<div class="container">
		<center>
      <h2 class="text">Telefono</h2>
		<a href="/telefonos/{{$telefono->id}}/edit" class="btn btn-primary float-left">Editar.</a>
    <a href="{{ route ('reportes.create',['tipo'=>'telefono','id'=>$telefono->id])}}" class="btn btn-success float-left ml-5">Reportar</a>

		{!! Form::open([ 'route' => ['telefonos.destroy', $telefono->id ], 'method' => 'DELETE' ]) !!}

			{!! Form::submit('Eliminar ', ['class' => 'btn btn-danger mb-2 float-left ml-5']) !!}

    	{!! Form::close()!!}
                  </center>
                  	<table class="table">
                      <tbody>
                          <tr>
                            <th>Usuario</th>
                              <td>{{ $telefono->usuario_id }}</td>
                              
                          </tr>
                          <tr>
                            <th>Fecha entrega</th>
                              <td>{{$telefono->fecha_entrega}}</td>
                              
                          </tr>
                          <tr>
                            <th>Fecha mantenimiento</th>
                              <td>{{$telefono->fecha_mantenimiento}}</td>
                              
                          </tr>
                          <tr>
                            <th>Estado mantenimiento</th>
                              <td>{{$telefono->estado_mantenimiento}}</td>
                              
                          </tr>
                          <tr>
                            <th>Propiedad</th>
                              <td>{{$telefono->propiedad}}</td>
                              
                          </tr><tr>
                            <th>Tipo de telefono</th>
                              <td>{{$telefono->tipo_de_telefono}}</td>
                              
                          </tr><tr>
                            <th>Marca de telefono</th>
                              <td>{{$telefono->marca_telefono}}</td>
                              
                          </tr>
                          <tr>
                            <th>Ref telefono</th>
                              <td>{{$telefono->referencia_telefono}}</td>
                              
                          </tr><tr>

                            <th>Tipo de SO</th>
                              <td>{{$telefono->tipo_so}}</td>
                              
                          </tr>
                          </tr><tr>

                            <th>Version SO</th>
                              <td>{{$telefono->version_so}}</td>
                              
                          </tr>
                          </tr><tr>
                            <th>Serial Telefono</th>
                              <td>{{$telefono->serial_telefono}}</td>
                              
                          </tr>
                          </tr><tr>
                            <th>IMEI 1</th>
                              <td>{{$telefono->imei_1}}</td>
                              
                          </tr>
                          </tr><tr>
                            <th>IMEI 2</th>
                              <td>{{$telefono->imei_2}}</td>
                              
                          </tr>
                          </tr><tr>
                            <th>MAC</th>
                              <td>{{$telefono->mac_telefono}}</td>
                              
                          </tr>
                          </tr><tr>
                            <th>Incluido</th>
                              <td>{{$telefono->incluido}}</td>

                          </tr>
                          </tr><tr>
                            <th>Proveedor</th>
                              <td>{{$telefono->proveedor}}</td> 

                          </tr>
                          </tr><tr>
                            <th>Precio</th>
                              <td>{{$telefono->precio}}</td> 

                           </tr>   
                      </tbody>
                </table>
            </div>
@endsection