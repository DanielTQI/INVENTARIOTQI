<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Equipo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=auth()->user();

        if ($user->permisos=='lectura') {
             
             $equipos=Equipo::where('usuario_id', $user->id)->get();
             return view('usuario.equipos.index', compact('equipos'));

        }elseif ($user->permisos=='escritura') {

             $equipos=Equipo::all();
             return view('admin.equipos.index', compact('equipos'));
        }
       
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

            return redirect()->route('equipos.index');

        }elseif ($user->permisos=='escritura') {
             
             $user = User::pluck('name', 'id');
             $user->prepend(" ", " ");

             $equipos=Equipo::all();
             return view('admin.equipos.crearequipo', compact('user'));
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

        if ($user->permisos=='lectura') {

            return redirect()->route('equipos.index');

        }elseif ($user->permisos=='escritura') {

            $validator = Validator::make($request->all(),[
                'user_id' => 'required',
                'fecha_entrega' =>'required',
                'fecha_mantenimiento' => 'required',
                'propiedad' => 'required',
                'tipo_de_equipo' => 'required',
                'marca_equipo' => 'required|max:100',
                'referencia_equipo' => 'required|max:100',
                'serial_equipo' => 'required|max:100',
                'mtm_equipo' => 'max:100',
                'tipo_de_so' => 'required',
                'licencia' => 'required',
                'vso_equipo' => 'required|max:100',
                'nidso_equipo' => 'max:100',
                'tipo_de_office' => 'required',
                'nombre_equipo' => 'required|max:100',
                'workgroup_equipo' => 'max:100',
                'cuenta_admin' => 'required',
                'lan_mac' => 'max:100',
                'wifi_mac' => 'required|max:100',
                'pass_admin' => 'required|max:100',
                'proveedor' => 'required|max:100',
                'precio_equipo' => 'required|max:100',
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
                return redirect('equipos/create')
                   ->withErrors($validator)
                   ->withInput();
             }

            $equipo = new Equipo();
            $equipo->usuario_id=$request->input('user_id');
            $equipo->fecha_entrega=Carbon::parse($request->input('fecha_entrega'));
            $equipo->fecha_mantenimiento=Carbon::parse($request->input('fecha_mantenimiento'));

            $mantenimiento = Carbon::parse($request->input('fecha_mantenimiento'));
            $hoy = Carbon::parse(now()->toDateString());
            $diasDiferencia = $hoy->diffInDays($mantenimiento);

                if ($diasDiferencia>60) {
                    $equipo->estado_mantenimiento='pendiente';
                }else{
                    $equipo->estado_mantenimiento='bien';
                }

            $equipo->propiedad=$request->input('propiedad');
            $equipo->tipo_de_equipo=$request->input('tipo_de_equipo');
            $equipo->marca_equipo=$request->input('marca_equipo');
            $equipo->referencia_equipo=$request->input('referencia_equipo');
            $equipo->serial_equipo=$request->input('serial_equipo');
            $equipo->mtm_equipo=$request->input('mtm_equipo');
            $equipo->tipo_so=$request->input('tipo_de_so');
            $equipo->licencia=$request->input('licencia');
            $equipo->vso_equipo=$request->input('vso_equipo');
            $equipo->nid_sistema_operativo=$request->input('nidso_equipo');
            $equipo->tipo_office=$request->input('tipo_de_office');
            $equipo->nombre_equipo=$request->input('nombre_equipo');
            $equipo->workgroup_equipo=$request->input('workgroup_equipo');
            $equipo->cuenta_admin_equipo=$request->input('cuenta_admin');
            $equipo->lan_mac=$request->input('lan_mac');
            $equipo->wifi_mac=$request->input('wifi_mac');
            $equipo->pass_admin=$request->input('pass_admin');
            $equipo->proveedor=$request->input('proveedor');
            $equipo->precio=$request->input('precio_equipo');

            $equipo->save();
            
            return redirect()->route('equipos.index');
     }else{
            return redirect()->route('equipos.index');
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
        $user=auth()->user();

        if ($user->permisos=='lectura') {

            $equipo= Equipo::find($id);
            return view('usuario.equipos.vermas' , compact('equipo'));

        }elseif ($user->permisos=='escritura') {

            $equipo= Equipo::find($id);
            return view('admin.equipos.vermas' , compact('equipo'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
       $user=auth()->user();

        if ($user->permisos=='lectura') {

            return redirect()->route('equipos.index');

        }elseif ($user->permisos=='escritura') {
        
            $equipo= Equipo::find($id);
            $user = User::pluck('name', 'id');
            $user->prepend(" ", " ");
            return view('admin.equipos.editarequipo', compact('equipo','user'));
     }
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
        $user=auth()->user();

        if ($user->permisos=='lectura') {

            return redirect()->route('equipos.index');

        }else if ($user->permisos=='escritura') {

            $validator = Validator::make($request->all(),[
                'user_id' => 'required',
                'fecha_entrega' =>'required',
                'fecha_mantenimiento' => 'required',
                'propiedad' => 'required',
                'tipo_de_equipo' => 'required',
                'marca_equipo' => 'required|max:100',
                'referencia_equipo' => 'required|max:100',
                'serial_equipo' => 'required|max:100',
                'mtm_equipo' => 'max:100',
                'tipo_de_so' => 'required',
                'licencia' => 'required',
                'vso_equipo' => 'required|max:100',
                'nidso_equipo' => 'max:100',
                'tipo_de_office' => 'required',
                'nombre_equipo' => 'required|max:100',
                'workgroup_equipo' => 'max:100',
                'cuenta_admin' => 'required',
                'lan_mac' => 'max:100',
                'wifi_mac' => 'required|max:100',
                'pass_admin' => 'required|max:100',
                'proveedor' => 'required|max:100',
                'precio_equipo' => 'required|max:100',
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
                return redirect('equipos/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
                      
             }

            $equipo= Equipo::find($id);
            $equipo->usuario_id=$request->input('user_id');
            $equipo->fecha_entrega=Carbon::parse($request->input('fecha_entrega'));
            $equipo->fecha_mantenimiento=Carbon::parse($request->input('fecha_mantenimiento'));
            $mantenimiento = Carbon::parse($request->input('fecha_mantenimiento'));
            $hoy = Carbon::parse(now()->toDateString());
            $diasDiferencia = $hoy->diffInDays($mantenimiento);

                if ($diasDiferencia>60) {
                    $equipo->estado_mantenimiento='pendiente';
                }else{
                    $equipo->estado_mantenimiento='bien';
                }

            $equipo->propiedad=$request->input('propiedad');
            $equipo->tipo_de_equipo=$request->input('tipo_de_equipo');
            $equipo->marca_equipo=$request->input('marca_equipo');
            $equipo->referencia_equipo=$request->input('referencia_equipo');
            $equipo->serial_equipo=$request->input('serial_equipo');
            $equipo->mtm_equipo=$request->input('mtm_equipo');
            $equipo->tipo_so=$request->input('tipo_de_so');
            $equipo->licencia=$request->input('licencia');
            $equipo->vso_equipo=$request->input('vso_equipo');
            $equipo->nid_sistema_operativo=$request->input('nidso_equipo');
            $equipo->tipo_office=$request->input('tipo_de_office');
            $equipo->nombre_equipo=$request->input('nombre_equipo');
            $equipo->workgroup_equipo=$request->input('workgroup_equipo');
            $equipo->cuenta_admin_equipo=$request->input('cuenta_admin');
            $equipo->lan_mac=$request->input('lan_mac');
            $equipo->wifi_mac=$request->input('wifi_mac');
            $equipo->pass_admin=$request->input('pass_admin');
            $equipo->proveedor=$request->input('proveedor');
            $equipo->precio=$request->input('precio_equipo');

            $equipo->save();

            return redirect()->route('equipos.index');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=auth()->user();

        if ($user->permisos=='lectura') {

            return redirect()->route('equipos.index');

        }else if ($user->permisos=='escritura') {

            $equipo = Equipo::find($id);
            $equipo-> delete();

            return redirect()->route('equipos.index');
        }
    }
}
