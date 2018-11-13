<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Equipo;
use App\Reporte;
use App\User;
use App\Accesorio;
use App\Telefono;
use Barryvdh\Debugbar\Facade as Debugbar;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
     $equipos = Reporte::leftjoin('equipos', 'reportes.equipo_id', '=', 'equipos.id')
                ->leftjoin('accesorios', 'reportes.accesorio_id', '=', 'accesorios.id')
                ->leftjoin('telefonos', 'reportes.telefono_id', '=', 'telefonos.id')
                ->leftjoin('users', 'reportes.usuario_id', '=', 'users.id')
                ->select(DB::raw('if(equipos.id is null, if(accesorios.id is null,"telefono","accesorio"),"equipo") as tipo, 
                                 users.name, reportes.tipo_reporte, reportes.descripcion_usuario, reportes.fecha_reporte, 
                                 reportes.atendido, reportes.descripcion_soporte, reportes.id '))
                ->orderby('users.name')
                ->get();
           

        Debugbar::info($equipos);

        return view('reportes.index', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = auth()->user();
        // $user= pluck('name', 'id')
        // $user->prepend(' ',' ');

        $equipos = Equipo::where('id', $request->id)->get();

        // return $user;

        return view('reportes.crear', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
