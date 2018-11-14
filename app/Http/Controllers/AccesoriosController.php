<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Equipo;
use App\Accesorio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class AccesoriosController extends Controller
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

            $accesorios=Accesorio::where('usuario_id', $user->id)->get();
    
            return view('usuario.accesorios.index', compact('accesorios'));

        }else if ($user->permisos=='escritura') {

            $accesorios=Accesorio::all();

            return view('admin.accesorios.index', compact('accesorios'));

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
            
            return redirect()->route('accesorios.index');

        }elseif ($user->permisos=='escritura') {

            $user = User::pluck('name', 'id');
            $user->prepend(" "," ");
            return view('admin.accesorios.crearaccesorio', compact('user'));
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
            
             return redirect()->route('accesorios.index');

        }elseif ($user->permisos=='escritura') {

            $validator = Validator::make($request->all(),[
                'usuario_id' => 'required',
                'fecha_entrega' =>'required',
                'fecha_mantenimiento' => 'required',
                'propiedad' => 'required',
                'tipo_accesorio' => 'required',
                'marca_accesorio' => 'required|max:100',
                'referencia_accesorio' => 'required|max:100',
                'serial_accesorio' => 'required|max:100',
                'fccid_accesorio' => 'max:100',
                'icid_accesorio' => 'max:100',
                'incluido' => 'required',
                'proveedor' => 'required|max:100',
                'precio' => 'required|max:100',
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
                return redirect('accesorios/create')
                   ->withErrors($validator)
                   ->withInput();
             }

            $accesorio = new Accesorio();
            $accesorio->usuario_id=$request->input('usuario_id');
            $accesorio->fecha_entrega=Carbon::parse($request->input('fecha_entrega'));
            $accesorio->fecha_mantenimiento=Carbon::parse($request->input('fecha_mantenimiento'));

            $mantenimiento = Carbon::parse($request->input('fecha_mantenimiento'));
            $hoy = Carbon::parse(now()->toDateString());
            $diasDiferencia = $hoy->diffInDays($mantenimiento);

                if ($diasDiferencia>60) {
                    $accesorio->estado_mantenimiento='PENDIENTE';
                }else{
                    $accesorio->estado_mantenimiento='BIEN';
                }

            $accesorio->propiedad=$request->input('propiedad');
            $accesorio->tipo_de_accesorio=$request->input('tipo_accesorio');
            $accesorio->marca_accesorio=$request->input('marca_accesorio');
            $accesorio->referencia_accesorio=$request->input('referencia_accesorio');
            $accesorio->serial_accesorio=$request->input('serial_accesorio');
            $accesorio->fccid_accesorio=$request->input('fccid_accesorio');
            $accesorio->icid_accesorio=$request->input('icid_accesorio');
            $accesorio->incluido=$request->input('incluido');
            $accesorio->proveedor=$request->input('proveedor');
            $accesorio->precio=$request->input('precio');

            $accesorio->save();
            
            return redirect()->route('accesorios.index');
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
            
            $accesorio= Accesorio::find($id);
            return view('usuario.accesorios.vermas' , compact('accesorio'));

        }elseif ($user->permisos=='escritura') {

            $accesorio= Accesorio::find($id);
            return view('admin.accesorios.vermas' , compact('accesorio'));
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

             return redirect()->route('accesorios.index');

        }elseif ($user->permisos=='escritura') {
            $accesorio= Accesorio::find($id);
            $user = User::pluck('name', 'id');
            $user->prepend(" "," ");

            return view('admin.accesorios.editar' , compact('accesorio', 'user'));
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
            
             return redirect()->route('accesorios.index');

        }elseif ($user->permisos=='escritura') {

            $validator = Validator::make($request->all(),[
                'usuario_id' => 'required',
                'fecha_entrega' =>'required',
                'fecha_mantenimiento' => 'required',
                'propiedad' => 'required',
                'tipo_accesorio' => 'required',
                'marca_accesorio' => 'required|max:100',
                'referencia_accesorio' => 'required|max:100',
                'serial_accesorio' => 'required|max:100',
                'fccid_accesorio' => 'max:100',
                'icid_accesorio' => 'max:100',
                'incluido' => 'required',
                'proveedor' => 'required|max:100',
                'precio' => 'required|max:100',
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
                    return redirect()
                       ->back()
                       ->withErrors($validator)
                       ->withInput();
                 }

            $accesorio=Accesorio::find($id);
            $accesorio->usuario_id=$request->input('usuario_id');
            $accesorio->fecha_entrega=Carbon::parse($request->input('fecha_entrega'));
            $accesorio->fecha_mantenimiento=Carbon::parse($request->input('fecha_mantenimiento'));

            $mantenimiento = Carbon::parse($request->input('fecha_mantenimiento'));
            $hoy = Carbon::parse(now()->toDateString());
            $diasDiferencia = $hoy->diffInDays($mantenimiento);

                if ($diasDiferencia>60) {
                    $accesorio->estado_mantenimiento='PENDIENTE';
                }else{
                    $accesorio->estado_mantenimiento='BIEN';
                }

            $accesorio->propiedad=$request->input('propiedad');
            $accesorio->tipo_de_accesorio=$request->input('tipo_accesorio');
            $accesorio->marca_accesorio=$request->input('marca_accesorio');
            $accesorio->referencia_accesorio=$request->input('referencia_accesorio');
            $accesorio->serial_accesorio=$request->input('serial_accesorio');
            $accesorio->fccid_accesorio=$request->input('fccid_accesorio');
            $accesorio->icid_accesorio=$request->input('icid_accesorio');
            $accesorio->incluido=$request->input('incluido');
            $accesorio->proveedor=$request->input('proveedor');
            $accesorio->precio=$request->input('precio');

            $accesorio->save();
            
            return redirect()->route('accesorios.index');
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
            
             return redirect()->route('accesorios.index');

        }elseif ($user->permisos=='escritura') { 

            $accesorio = Accesorio::find($id);
            $accesorio->delete();

            return redirect()->route('accesorios.index');
        }
    }
}
