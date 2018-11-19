<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Activo;
use App\Equipo;
use App\Accesorio;
use App\Categoria;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ActivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       $user=auth()->user();

        if ($user->permisos=='lectura') {
            
            return redirect()->route('activos.index');

        }elseif ($user->permisos=='escritura') {

            $user = User::pluck('name', 'id');
            $cate = Categoria::pluck('nombre', 'id');
            $cate->prepend(" ","0");
            $user->prepend(" "," ");
            return view('admin.activos.crear', compact('user','cate'));
        }    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $user=auth()->user();

         if ($request->categoria==1) {
                $validator = Validator::make($request->all(),[
                    'user_id' => 'required',
                    'fecha_entrega' =>'required',
                    'fecha_mantenimiento' => 'required',
                    'propiedad' => 'required',
                    'tipo_de_equipo' => 'required',
                    'marca' => 'required|max:100',
                    'referencia' => 'required|max:100',
                    'serial' => 'required|max:100',
                    'categoria' => 'required|max:100',
                    'tipo_de_equipo' => 'required|string',
                    'mtm' => 'max:100',
                    'tipo_de_soc' => 'required|string',
                    'tipo_de_lic' => 'required|string ',
                    'office' => 'required|string',
                    'nid'=>'max:30',
                    'workgroup_equipo'=>'max:100',
                    'lan_mac'=>'max:100',
                    'nombre'=>'required|max:100',
                    'vso'=>'required|max:100',
                    'wifi_mac'=>'required|max:100',
                    'cuenta_admin'=>'required|max:100',
                    'contraseña'=>'max:100',
                    'proveedor'=>'required|max:100',
                    'precio'=>'required|max:100',
                    ],[
                    'required' => 'Este campo es requerido',
                    'email' => 'Este campo debe tener formato de correo electrónico',
                    'unique' => 'Este correo debe ser único',
                    'max' => 'Este campo no debe superar :max caracteres',
                    'min' => 'Este campo no debe ser menor de :min caracteres',
                    'numeric' => 'Este campo debe ser numerico',
                    'string' => 'Este campo debe ser solo texto',
                    'url' => 'Este campo debe ser una url',
                ]);
                     if ($validator->fails()) {

                        return redirect()->route('activos.create')
                       ->withErrors($validator)
                       ->withInput();
                    }

                     $activo = new Activo();
                        $activo->usuario_id=$request->input('user_id');
                        $activo->categoria_id=$request->input('categoria');
                        $activo->fecha_entrega=Carbon::parse($request->input('fecha_entrega'));
                        $activo->fecha_mantenimiento=Carbon::parse($request->input('fecha_mantenimiento'));
                        $mantenimiento = Carbon::parse($request->input('fecha_mantenimiento'));
                        $hoy = Carbon::parse(now()->toDateString());
                        $diasDiferencia = $hoy->diffInDays($mantenimiento);

                            if ($diasDiferencia>60) {
                                $activo->estado_mantenimiento='pendiente';
                            }else{
                                $activo->estado_mantenimiento='bien';
                            }

                        $activo->propiedad=$request->input('propiedad');
                        $activo->tipo_de_equipo=$request->input('tipo_de_equipo');
                        $activo->marca_equipo=$request->input('marca');
                        $activo->referencia_equipo=$request->input('referencia');
                        $activo->serial_equipo=$request->input('serial');
                        $activo->mtm_equipo=$request->input('mtm');
                        $activo->tipo_so=$request->input('tipo_de_soc');
                        $activo->licencia=$request->input('tipo_de_lic');
                        $activo->vso_equipo=$request->input('vso');
                        $activo->nid_sistema_operativo=$request->input('nid');
                        $activo->tipo_office=$request->input('office');
                        $activo->nombre_equipo=$request->input('nombre');
                        $activo->workgroup_equipo=$request->input('workgroup_equipo');
                        $activo->cuenta_admin_equipo=$request->input('cuenta_admin');
                        $activo->lan_mac=$request->input('lan_mac');
                        $activo->wifi_mac=$request->input('wifi_mac');
                        $activo->pass_admin=$request->input('contraseña');
                        $activo->proveedor=$request->input('proveedor');
                        $activo->precio=$request->input('precio');

                        $activo->save();
                        
                        return redirect()->route('activos.create');

             }else if($request->categoria==2) {
                $validator = Validator::make($request->all(),[
                    'user_id' => 'required',
                    'fecha_entrega' =>'required',
                    'fecha_mantenimiento' => 'required',
                    'propiedad' => 'required',
                    'tipo_de_equipo' => 'required',
                    'marca' => 'required|max:100',
                    'referencia' => 'required|max:100',
                    'serial' => 'required|max:100',
                    'categoria' => 'required|max:100',
                    'tipo_accesorio' => 'required|string',
                    'fccid' => 'max:100',
                    'icid' => 'max:100',
                    'incluido' => 'required|string',

                    'mtm' => 'max:100',
                    'tipo_de_soc' => 'string',
                    'tipo_de_lic' => 'string ',
                    'office' => 'string',
                    'nid'=>'min:23|max:30',
                    'workgroup_equipo'=>'max:100',
                    'lan_mac'=>'max:100',
                    'nombre'=>'max:100',
                    'vso'=>'max:100',
                    'wifi_mac'=>'max:100',
                    'cuenta_admin'=>'max:100',
                    'contraseña'=>'max:100',
                    'proveedor'=>'required|max:100',
                    'precio'=>'required|max:100',
                    ],[
                    'required' => 'Este campo es requerido',
                    'email' => 'Este campo debe tener formato de correo electrónico',
                    'unique' => 'Este correo debe ser único',
                    'max' => 'Este campo no debe superar :max caracteres',
                    'min' => 'Este campo no debe ser menor de :min caracteres',
                    'numeric' => 'Este campo debe ser numerico',
                    'string' => 'Este campo debe ser solo texto',
                    'url' => 'Este campo debe ser una url',
                ]);
                     if ($validator->fails()) {

                        return redirect()->route('activos.create')
                       ->withErrors($validator)
                       ->withInput();
                    }

             }else if($request->categoria==3) {
                $validator = Validator::make($request->all(),[
                    'user_id' => 'required',
                    'fecha_entrega' =>'required',
                    'fecha_mantenimiento' => 'required',
                    'propiedad' => 'required',
                    'tipo_de_equipo' => 'required',
                    'marca' => 'required|max:100',
                    'referencia' => 'required|max:100',
                    'serial' => 'required|max:100',
                    'categoria' => 'required|max:100',
                    'tipo_accesorio' => 'required|string',
                    'fccid' => 'max:100',
                    'icid' => 'max:100',
                    'incluido' => 'string',
                    'tipo_de_telefono'=>'required|max:100',
                    'tipo_de_sot'=>'required|max:100|string',
                    'imei_1'=>'required|max:100|numeric',
                    'imei_2'=>'max:100|numeric',


                    'mtm' => 'max:100',
                    'tipo_de_soc' => 'string',
                    'tipo_de_lic' => 'string ',
                    'office' => 'string',
                    'nid'=>'min:23|max:30',
                    'workgroup_equipo'=>'max:100',
                    'lan_mac'=>'max:100',
                    'nombre'=>'max:100',
                    'vso'=>'required|max:100',
                    'wifi_mac'=>'max:100',
                    'cuenta_admin'=>'max:100',
                    'contraseña'=>'max:100',
                    'proveedor'=>'required|max:100',
                    'precio'=>'required|max:100',

                    ],[
                    'required' => 'Este campo es requerido',
                    'email' => 'Este campo debe tener formato de correo electrónico',
                    'unique' => 'Este correo debe ser único',
                    'max' => 'Este campo no debe superar :max caracteres',
                    'min' => 'Este campo no debe ser menor de :min caracteres',
                    'numeric' => 'Este campo debe ser numerico',
                    'string' => 'Este campo debe ser solo texto',
                    'url' => 'Este campo debe ser una url',
                ]);
                     if ($validator->fails()) {

                        return redirect()->route('activos.create')
                       ->withErrors($validator)
                       ->withInput();
                    }
             }
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
