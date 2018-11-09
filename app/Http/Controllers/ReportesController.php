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
        
        $equipos = Reporte::join('equipos', 'reportes.equipo_id', '=', 'equipos.id')->get();
        $accesorios = Reporte::join('accesorios', 'reportes.accesorio_id', '=', 'accesorios.id')->get();
        $telefonos = Reporte::join('telefonos', 'reportes.telefono_id', '=', 'telefonos.id')->get();     

        Debugbar::info($equipos);


        $todo =[$equipos , $accesorios, $telefonos];

        // return $todo;

        // $c = Customer::leftJoin('orders', function($join) {
        //     $join->on('customers.id', '=', 'orders.customer_id');
        //     })
        //     ->whereNull('orders.customer_id')
        //     ->first();

         // $reportes = Reporte::all();
        // $reportes = Equipo::leftjoin('reportes' ,'equipos.id', '=', 'reportes.equipo_id')
        //     ->where('reportes.tipo_reporte', '=' ,'SOFTWARE')
        //     ->first();

         return view('reportes.index', compact('todo','equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user= User::pluck('name', 'id');
        $equipos = Equipo::pluck('serial_equipo', 'id');
        $accesorios = Accesorio::pluck('serial_accesorio', 'id');
        $telefonos = Telefono::pluck('serial_telefono', 'id');

        $user->prepend(' ');

        return view('reportes.crear', compact('user','equipos','accesorios','telefonos'));
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
