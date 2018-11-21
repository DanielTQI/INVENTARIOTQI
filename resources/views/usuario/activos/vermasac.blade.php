@extends('layouts.app')
    @section('content')
        <div class="row">
            <div class="container border ">
              <center>
                <h2 class="text-center mb-4">{{$activo->nombre}}</h2>
                    <a href="/activos" class="btn btn-primary float-left ml-2 mb-2 ">Ver todos mis activos</a>
                    <a href="{{ route ('reportes.create',['id'=>$activo->id])}}" class="btn btn-danger float-left ml-2 mb-2">Reportar</a>
              </center>
              <table class="table">
                  <tbody>
                      <tr>
                        <th>Categoria</th>
                          <td>{{ $activo->ncate }}</td>
                          
                      </tr>
                      <tr>
                        <th>Fecha entrega</th>
                          <td>{{$activo->fecha_entrega}}</td>
                          
                      </tr>
                      <tr>
                        <th>Fecha mantenimiento</th>
                          <td>{{$activo->fecha_mantenimiento}}</td>
                          
                      </tr>
                      <tr>
                        <th>Estado mantenimiento</th>
                          <td>{{$activo->estado_mantenimiento}}</td>
                          
                      </tr>
                      <tr>
                        <th>Propiedad</th>
                          <td>{{$activo->propiedad}}</td>
                          
                      </tr>
                      <tr>
                        <th>Tipo de accesorio</th>
                          <td>{{$activo->tipo_de_equipo}}</td>
                          
                      </tr>
                      <tr>
                        <th>Marca de accesorio</th>
                          <td>{{$activo->marca_equipo}}</td>
                          
                      </tr>
                      <tr>
                        <th>Ref accesorio</th>
                          <td>{{$activo->referencia_equipo}}</td>
                          
                      </tr>
                      <tr>
                        <th>Serial accesorio</th>
                          <td>{{$activo->serial_equipo}}</td>
                          
                      </tr>
                      </tr>
                        <th>FCC-ID accesorio</th>
                          <td>{{$activo->fccid_equipo}}</td>
                          
                      </tr>
                      </tr>
                        <th>IC-ID accesorio</th>
                          <td>{{$activo->icid_equipo}}</td>
                          
                      </tr>
                      </tr>
                        <th>Incluido</th>
                          <td>{{$activo->incluido}}</td>
                          
                      </tr>
                  </tbody>
              </table>
          </div>
	@endsection