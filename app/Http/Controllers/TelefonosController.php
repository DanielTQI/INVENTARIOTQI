<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;
use App\User;
use App\Accesorio;
use App\Telefono;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Validator;

class TelefonosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $telefonos= Telefono::all();
    
        return view('telefonos.index', compact('telefonos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::pluck('name', 'id');
        $user->prepend(" ");

        return view('telefonos.creartelefono', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'usuario_id' => 'required',
            'fecha_entrega' =>'required',
            'fecha_mantenimiento' => 'required',
            'propiedad' => 'required',
            'tipo_de_telefono' => 'required',
            'marca_telefono' => 'required|max:100',
            'referencia_telefono' => 'required|max:100',
            'tipo_so' => 'required|max:100',
            'version_so' => 'required|max:100',
            'tipo_de_so' => 'required',
            'serial_telefono' => 'required',
            'imei_1' => 'required|max:100',
            'imei_2' => 'max:100',
            'mac_telefono' => 'required',
            'incluido' => 'required|max:100',
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
            return redirect('telefonos/create')
               ->withErrors($validator)
               ->withInput();
         }

        $telefono = new Telefono();
        $telefono->usuario_id=$request->input('usuario_id');
        $telefono->fecha_entrega=Carbon::parse($request->input('fecha_entrega'));
        $telefono->fecha_mantenimiento=Carbon::parse($request->input('fecha_mantenimiento'));

        $mantenimiento = Carbon::parse($request->input('fecha_mantenimiento'));
        $hoy = Carbon::parse(now()->toDateString());
        $diasDiferencia = $hoy->diffInDays($mantenimiento);

            if ($diasDiferencia>60) {
                $telefono->estado_mantenimiento='PENDIENTE';
            }else{
                $telefono->estado_mantenimiento='BIEN';
            }

        $telefono->propiedad=$request->input('propiedad');
        $telefono->tipo_de_telefono=$request->input('tipo_de_telefono');
        $telefono->marca_telefono=$request->input('marca_telefono');
        $telefono->referencia_telefono=$request->input('referencia_telefono');
        $telefono->tipo_so=$request->input('tipo_so');
        $telefono->version_so=$request->input('version_so');
        $telefono->serial_telefono=$request->input('serial_telefono');
        $telefono->imei_1=$request->input('imei_1');
        $telefono->imei_2=$request->input('imei_2');
        $telefono->mac_telefono=$request->input('mac_telefono');
        $telefono->incluido=$request->input('incluido');
        $telefono->proveedor=$request->input('proveedor');
        $telefono->precio=$request->input('precio');

        $telefono->save();
        
        return redirect()->route('telefonos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $telefono= Telefono::find($id);
        return view('telefonos.vermas' , compact('telefono'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $telefono= Telefono::find($id);
        $user = User::pluck('name', 'id');
        $user->prepend("");

        return view('telefonos.editar' , compact('telefono', 'user'));
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
        $validator = Validator::make($request->all(),[
            'usuario_id' => 'required',
            'fecha_entrega' =>'required',
            'fecha_mantenimiento' => 'required',
            'propiedad' => 'required',
            'tipo_de_telefono' => 'required',
            'marca_telefono' => 'required|max:100',
            'referencia_telefono' => 'required|max:100',
            'tipo_so' => 'required|max:100',
            'version_so' => 'required|max:100',
            'tipo_de_so' => 'required',
            'serial_telefono' => 'required',
            'imei_1' => 'required|max:100',
            'imei_2' => 'max:100',
            'mac_telefono' => 'required',
            'incluido' => 'required|max:100',
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
            return back()
               ->withErrors($validator)
               ->withInput();
         }

        $telefono = Telefono::find($id);
        $telefono->usuario_id=$request->input('usuario_id');
        $telefono->fecha_entrega=Carbon::parse($request->input('fecha_entrega'));
        $telefono->fecha_mantenimiento=Carbon::parse($request->input('fecha_mantenimiento'));

        $mantenimiento = Carbon::parse($request->input('fecha_mantenimiento'));
        $hoy = Carbon::parse(now()->toDateString());
        $diasDiferencia = $hoy->diffInDays($mantenimiento);

            if ($diasDiferencia>60) {
                $telefono->estado_mantenimiento='PENDIENTE';
            }else{
                $telefono->estado_mantenimiento='BIEN';
            }

        $telefono->propiedad=$request->input('propiedad');
        $telefono->tipo_de_telefono=$request->input('tipo_de_telefono');
        $telefono->marca_telefono=$request->input('marca_telefono');
        $telefono->referencia_telefono=$request->input('referencia_telefono');
        $telefono->tipo_so=$request->input('tipo_so');
        $telefono->version_so=$request->input('version_so');
        $telefono->serial_telefono=$request->input('serial_telefono');
        $telefono->imei_1=$request->input('imei_1');
        $telefono->imei_2=$request->input('imei_2');
        $telefono->mac_telefono=$request->input('mac_telefono');
        $telefono->incluido=$request->input('incluido');
        $telefono->proveedor=$request->input('proveedor');
        $telefono->precio=$request->input('precio');

        $telefono->save();
        
        return redirect()->route('telefonos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $telefono = Telefono::find($id);
        $telefono->delete();

        return redirect()->route('telefonos.index');
    }
}
