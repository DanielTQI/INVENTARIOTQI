<?php

namespace App\Http\Controllers;

use App\Activo;
use App\Categoria;
use App\Reporte;
use App\User;
use Barryvdh\Debugbar\Facade as Debugbar;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;
use QR_Code\QR_Code;
use Validator;

class ActivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = auth()->user();

        if ($user->permisos == 'escritura') {

            $activos = Activo::leftjoin('users', 'activos.usuario_id', '=', 'users.id')
                ->leftjoin('reportes', 'reportes.activo_id', '=', 'activos.id')
                ->leftjoin('categorias', 'activos.categoria_id', '=', 'categorias.id')
                ->select('users.name as nus', 'categorias.nombre as ncate', 'activos.*', 'reportes.id as repor')
                ->groupby('activos.id')
                ->orderby('activos.created_at', 'DESC')
                ->get();
            Debugbar::info($activos);

            return view('admin.activos.index', compact('activos'));

        } elseif ($user->permisos == 'lectura') {

            $activos = Activo::leftjoin('categorias', 'activos.categoria_id', '=', 'categorias.id')
                ->leftjoin('reportes', 'reportes.activo_id', '=', 'activos.id')
                ->select('categorias.nombre as ncate', 'activos.*', 'reportes.id as repor')
                ->where('activos.usuario_id', '=', $user->id)
                ->groupby('activos.id')
                ->orderby('activos.created_at', 'DESC')
                ->get();
            Debugbar::info($activos);

            return view('usuario.activos.index', compact('activos', 'user'));

        } else {

            return redirect()->route('activos.index');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = auth()->user();

        if ($user->permisos == 'lectura') {

            return redirect()->route('activos.index');

        } elseif ($user->permisos == 'escritura') {

            $user = User::pluck('name', 'id');
            $cate = Categoria::pluck('nombre', 'id');
            $cate->prepend(" ", "0");
            $user->prepend(" ", " ");

            return view('admin.activos.crear', compact('user', 'cate'));
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
        $user = auth()->user();
        if ($user->permisos == 'escritura') {

            if ($request->categoria == 1) {

                $validator = Validator::make($request->all(), [
                    'user_id'             => 'required',
                    'fecha_entrega'       => 'required|max:10|date',
                    'fecha_mantenimiento' => 'required|max:10|date',
                    'propiedad'           => 'required',
                    'tipo_de_equipo'      => 'required',
                    'marca'               => 'required|max:100',
                    'referencia'          => 'required|max:100',
                    'serial'              => 'required|max:100',
                    'categoria'           => 'required|max:100',
                    'tipo_de_equipo'      => 'required|string',
                    'mtm'                 => 'max:100',
                    'tipo_de_soc'         => 'required|string',
                    'tipo_de_lic'         => 'required|string ',
                    'office'              => 'required|string',
                    'nid'                 => 'max:30|required_if:tipo_de_soc,Windows',
                    'workgroup_equipo'    => 'max:100|required_if:tipo_de_soc,Windows',
                    'lan_mac'             => 'max:100|required_if:tipo_de_equipo,Escritorio todo en uno
                                                     |required_if:tipo_de_equipo,Escritorio',
                    'nombre'              => 'required|max:100',
                    'vso'                 => 'required|max:100',
                    'wifi_mac'            => 'max:100|required_if:tipo_de_equipo,Portatil',
                    'cuenta_admin'        => 'max:100|required_if:propiedad,TQI',
                    'contraseña'          => 'max:100|required_if:propiedad,TQI',
                    'fecha_compra'        => 'required|max:10|date',
                    'proveedor'           => 'required|max:100',
                    'precio'              => 'required|max:100',
                ], [
                    'required' => 'Este campo es requerido',
                    'nid.required_if' => 'Este campo es requerido ya que el sistema operativo es Windows',
                    'workgroup_equipo.required_if' => 'Este campo es requerido ya que el sistema operativo es Windows',
                    'lan_mac.required_if' => 'Este campo es requerido ya que el computador es de Escritorio',
                    'wifi_mac.required_if' => 'Este campo es requerido ya que el computador es Portatil',
                    'cuenta_admin.required_if' => 'Este campo es requerido ya que el computador es de TQI',
                    'contraseña.required_if' => 'Este campo es requerido ya que el computador es de TQI',
                    'email'    => 'Este campo debe tener formato de correo electrónico',
                    'unique'   => 'Este correo debe ser único',
                    'max'      => 'Este campo no debe superar :max caracteres',
                    'min'      => 'Este campo no debe ser menor de :min caracteres',
                    'numeric'  => 'Este campo debe ser numerico',
                    'string'   => 'Este campo debe ser solo texto',
                    'url'      => 'Este campo debe ser una url',
                    'date'     => 'Este campo debe ser una fecha',
                ]);
                if ($validator->fails()) {

                    return redirect()->route('activos.create')
                        ->withErrors($validator)
                        ->withInput();
                }

                $activo                      = new Activo();
                $activo->usuario_id          = $request->input('user_id');
                $activo->categoria_id        = $request->input('categoria');
                $activo->fecha_entrega       = Carbon::parse($request->input('fecha_entrega'));
                $activo->fecha_mantenimiento = Carbon::parse($request->input('fecha_mantenimiento'));
                $mantenimiento               = Carbon::parse($request->input('fecha_mantenimiento'));
                $hoy                         = Carbon::parse(now()->toDateString());
                $diasDiferencia              = $hoy->diffInDays($mantenimiento);
                if ($diasDiferencia > 60) {
                    $activo->estado_mantenimiento = 'pendiente';
                } else {
                    $activo->estado_mantenimiento = 'bien';
                }
                $activo->propiedad             = $request->input('propiedad');
                $activo->tipo_de_equipo        = $request->input('tipo_de_equipo');
                $activo->marca_equipo          = $request->input('marca');
                $activo->referencia_equipo     = $request->input('referencia');
                $activo->serial_equipo         = $request->input('serial');
                $activo->mtm_equipo            = $request->input('mtm');
                $activo->tipo_so               = $request->input('tipo_de_soc');
                $activo->licencia              = $request->input('tipo_de_lic');
                $activo->vso_equipo            = $request->input('vso');
                $activo->nid_sistema_operativo = $request->input('nid');
                $activo->tipo_office           = $request->input('office');
                $activo->nombre_equipo         = $request->input('nombre');
                $activo->workgroup_equipo      = $request->input('workgroup_equipo');
                $activo->cuenta_admin_equipo   = $request->input('cuenta_admin');
                $activo->lan_mac               = $request->input('lan_mac');
                $activo->wifi_mac              = $request->input('wifi_mac');
                $activo->pass_admin            = $request->input('contraseña');
                $activo->fecha_compra          = Carbon::parse($request->input('fecha_compra'));
                $activo->proveedor             = $request->input('proveedor');
                $activo->precio                = $request->input('precio');

                $name          = time() . '.png';
                $activo->imgqr = $name;

                $activo->save();

                $rout = explode(',', env('APP_URL'));

                File::makeDirectory(public_path() . '/ACT/' . $activo->id);
                $text = $rout[0] . '/activos/' . $activo->id;
                $url  = QR_Code::png($text, public_path() . '/ACT/' . $activo->id . '/' . $name);

                return redirect()->route('activos.index')->with('status', 'Computador guardado correctamente');

            } else if ($request->categoria == 2) {

                $validator = Validator::make($request->all(), [
                    'user_id'             => 'required',
                    'fecha_entrega'       => 'required|max:10|date',
                    'fecha_mantenimiento' => 'required|max:10|date',
                    'propiedad'           => 'required',
                    'marca'               => 'required|max:100',
                    'referencia'          => 'required|max:100',
                    'serial'              => 'required|max:100',
                    'categoria'           => 'required|max:100',
                    'tipo_accesorio'      => 'required|string',
                    'fccid'               => 'max:100',
                    'icid'                => 'max:100',
                    'incluido'            => 'required|string',

                    'mtm'                 => 'max:100',
                    'tipo_de_soc'         => 'max:100',
                    'tipo_de_lic'         => 'max:100 ',
                    'office'              => 'max:100',
                    'nid'                 => 'max:30',
                    'workgroup_equipo'    => 'max:100',
                    'fccid'               => 'max:100',
                    'icid'                => 'max:100',
                    'lan_mac'             => 'max:100',
                    'nombre'              => 'max:100',
                    'vso'                 => 'max:100',
                    'wifi_mac'            => 'max:100',
                    'cuenta_admin'        => 'max:100',
                    'contraseña'          => 'max:100',
                    'fecha_compra'        => 'required|max:10|date',
                    'proveedor'           => 'required|max:100',
                    'precio'              => 'required|max:100',
                ], [
                    'required' => 'Este campo es requerido',
                    'email'    => 'Este campo debe tener formato de correo electrónico',
                    'unique'   => 'Este correo debe ser único',
                    'max'      => 'Este campo no debe superar :max caracteres',
                    'min'      => 'Este campo no debe ser menor de :min caracteres',
                    'numeric'  => 'Este campo debe ser numerico',
                    'string'   => 'Este campo debe ser solo texto',
                    'url'      => 'Este campo debe ser una url',
                    'date'     => 'Este campo debe ser una fecha',
                ]);
                if ($validator->fails()) {

                    return redirect()->route('activos.create')
                        ->withErrors($validator)
                        ->withInput();
                }

                $activo                      = new Activo();
                $activo->usuario_id          = $request->input('user_id');
                $activo->categoria_id        = $request->input('categoria');
                $activo->fecha_entrega       = Carbon::parse($request->input('fecha_entrega'));
                $activo->fecha_mantenimiento = Carbon::parse($request->input('fecha_mantenimiento'));
                $mantenimiento               = Carbon::parse($request->input('fecha_mantenimiento'));
                $hoy                         = Carbon::parse(now()->toDateString());
                $diasDiferencia              = $hoy->diffInDays($mantenimiento);
                if ($diasDiferencia > 60) {
                    $activo->estado_mantenimiento = 'pendiente';
                } else {
                    $activo->estado_mantenimiento = 'bien';
                }
                $activo->propiedad         = $request->input('propiedad');
                $activo->tipo_de_equipo    = $request->input('tipo_accesorio');
                $activo->marca_equipo      = $request->input('marca');
                $activo->incluido          = $request->input('incluido');
                $activo->referencia_equipo = $request->input('referencia');
                $activo->serial_equipo     = $request->input('serial');
                $activo->fccid_equipo      = $request->input('fccid');
                $activo->icid_equipo       = $request->input('icid');
                $activo->mtm_equipo        = $request->input('mtm');
                $activo->nombre_equipo     = $request->input('nombre');
                $activo->wifi_mac          = $request->input('wifi_mac');
                $activo->fecha_compra      = Carbon::parse($request->input('fecha_compra'));
                $activo->proveedor         = $request->input('proveedor');
                $activo->precio            = $request->input('precio');

                $name          = time() . '.png';
                $activo->imgqr = $name;

                $activo->save();

                $rout = explode(',', env('APP_URL'));

                File::makeDirectory(public_path() . '/ACT/' . $activo->id);
                $text = $rout[0] . '/activos/' . $activo->id;
                $url  = QR_Code::png($text, public_path() . '/ACT/' . $activo->id . '/' . $name);

                return redirect()->route('activos.index')->with('status', 'Accesorio guardado correctamente');

            } else if ($request->categoria == 3) {

                $validator = Validator::make($request->all(), [
                    'user_id' => 'required',
                    'fecha_entrega' => 'required|max:10|date',
                    'fecha_mantenimiento' => 'required|max:10|date',
                    'propiedad' => 'required|string',
                    'marca' => 'required|max:100',
                    'referencia'=> 'required|max:100',
                    'serial'  => 'required|max:100',
                    'categoria'  => 'required|max:100',
                    'fccid' => 'max:100',
                    'icid'   => 'max:100',
                    'incluido' => 'max:100',
                    'tipo_de_telefono' => 'required|max:100',
                    'tipo_de_sot'=> 'required|max:100|string',
                    'imei_1' => 'max:100|required_if:tipo_de_telefono,Movil',
                    'imei_2' => 'max:100',

                    'mtm'  => 'max:100',
                    'tipo_de_soc' => 'max:100',
                    'tipo_de_lic' => 'max:100 ',
                    'office' => 'max:100',
                    'nid' => 'max:30',
                    'workgroup_equipo' => 'max:100',
                    'lan_mac' => 'max:100',
                    'nombre' => 'max:100|required_if:tipo_de_sot,IOS|required_if:tipo_de_telefono,Movil',
                    'vso' => 'required|max:100',
                    'wifi_mac' => 'max:100|required_if:tipo_de_sot,Android|required_if:tipo_de_sot,IOS',
                    'cuenta_admin' => 'max:100|required_if:propiedad,TQI',
                    'contraseña' => 'max:100|required_if:propiedad,TQI',
                    'fecha_compra'=> 'required|max:10|date',
                    'proveedor' => 'required|max:100',
                    'precio'  => 'required|max:100',

                ], [

                    'required' => 'Este campo es requerido',
                    'cuenta_admin.required_if' => 'Este campo es requerido ya que es propiedad de TQI',
                    'contraseña.required_if' => 'Este campo es requerido ya que es propiedad de TQI',
                    'nombre.required_if' => 'Este campo es requerido ya que su sistema operativo es IOS',
                    'wifi_mac.required_if' => 'Este campo es requerido ya que su sistema operativo es IOS o Android',
                    'email'    => 'Este campo debe tener formato de correo electrónico',
                    'unique'   => 'Este correo debe ser único',
                    'max'      => 'Este campo no debe superar :max caracteres',
                    'min'      => 'Este campo no debe ser menor de :min caracteres',
                    'numeric'  => 'Este campo debe ser numerico',
                    'string'   => 'Este campo debe ser solo texto',
                    'url'      => 'Este campo debe ser una url',
                    'date'     => 'Este campo solo admite fechas',
                ]);
                if ($validator->fails()) {

                    return redirect()->route('activos.create')
                        ->withErrors($validator)
                        ->withInput();
                }

                $activo                      = new Activo();
                $activo->usuario_id          = $request->input('user_id');
                $activo->categoria_id        = $request->input('categoria');
                $activo->fecha_entrega       = Carbon::parse($request->input('fecha_entrega'));
                $activo->fecha_mantenimiento = Carbon::parse($request->input('fecha_mantenimiento'));
                $mantenimiento               = Carbon::parse($request->input('fecha_mantenimiento'));
                $hoy                         = Carbon::parse(now()->toDateString());
                $diasDiferencia              = $hoy->diffInDays($mantenimiento);
                if ($diasDiferencia > 60) {
                    $activo->estado_mantenimiento = 'pendiente';
                } else {
                    $activo->estado_mantenimiento = 'bien';
                }
                $activo->propiedad         = $request->input('propiedad');
                $activo->tipo_de_equipo    = $request->input('tipo_de_telefono');
                $activo->marca_equipo      = $request->input('marca');
                $activo->referencia_equipo = $request->input('referencia');
                $activo->serial_equipo     = $request->input('serial');
                $activo->imei_1            = $request->input('imei_1');
                $activo->imei_2            = $request->input('imei_2');
                $activo->wifi_mac          = $request->input('wifi_mac');
                $activo->vso_equipo        = $request->input('vso');
                $activo->tipo_so           = $request->input('tipo_de_sot');
                $activo->nombre_equipo     = $request->input('nombre');
                $activo->wifi_mac          = $request->input('wifi_mac');
                $activo->fecha_compra      = Carbon::parse($request->input('fecha_compra'));
                $activo->proveedor         = $request->input('proveedor');
                $activo->precio            = $request->input('precio');

                $name          = time() . '.png';
                $activo->imgqr = $name;

                $activo->save();

                $rout = explode(',', env('APP_URL'));

                File::makeDirectory(public_path() . '/ACT/' . $activo->id);
                $text = $rout[0] . '/activos/' . $activo->id;
                $url  = QR_Code::png($text, public_path() . '/ACT/' . $activo->id . '/' . $name);

                return redirect()->route('activos.index')->with('status', 'Teléfono guardado correctamente');
            }
        } else {

            return redirect()->route('activos.index');

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
        $user = auth()->user();

        if ($user->permisos == 'escritura') {

            $activo = Activo::leftjoin('users', 'activos.usuario_id', '=', 'users.id')
                ->leftjoin('categorias', 'activos.categoria_id', '=', 'categorias.id')
                ->select('users.name', 'categorias.nombre as ncate', 'activos.*')
                ->where('activos.id', '=', $id)
                ->first();

            if ($activo->categoria_id == 1) {

                return view('admin.activos.vermaspc', compact('activo'));

            } elseif ($activo->categoria_id == 2) {
                Debugbar::info($activo);

                return view('admin.activos.vermasac', compact('activo'));

            } elseif ($activo->categoria_id == 3) {

                return view('admin.activos.vermastel', compact('activo'));

            } else {

                return redirect()->route('activos.index');
            }

        } else if ($user->permisos == 'lectura') {

            $activo = Activo::leftjoin('categorias', 'activos.categoria_id', '=', 'categorias.id')
                ->select('categorias.nombre as ncate', 'activos.*')
                ->where('activos.id', '=', $id)
                ->first();

            if ($activo->categoria_id == 1) {

                return view('usuario.activos.vermaspc', compact('activo'));

            } elseif ($activo->categoria_id == 2) {

                return view('usuario.activos.vermasac', compact('activo'));

            } elseif ($activo->categoria_id == 3) {

                return view('usuario.activos.vermastel', compact('activo'));

            } else {

                return redirect()->route('activos.index');
            }
        } else {
            return redirect()->route('activos.index');
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
        $user = auth()->user();

        if ($user->permisos == 'escritura') {

            $activo = Activo::find($id);

            $user = User::pluck('name', 'id');
            Debugbar::info($activo);

            $cate = Categoria::where('categorias.id', '=', $activo->categoria_id)
                ->pluck('nombre', 'id');

            if ($activo->categoria_id == 1) {
                $nameca = 'Computador';
            } else if ($activo->categoria_id == 2) {
                $nameca = 'Accesorio';
            } else if ($activo->categoria_id == 3) {
                $nameca = 'Teléfono';
            }

            $cate->prepend(" ", "0");
            $user->prepend(" ", " ");

            return view('admin.activos.editar', compact('user', 'cate', 'activo', 'nameca'));

        } else {

            return redirect()->route('activos.index');
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

        $user = auth()->user();

        if ($user->permisos == 'escritura') {

            if ($request->categoria == 1) {

                $validator = Validator::make($request->all(), [
                    'user_id'             => 'required',
                    'fecha_entrega'       => 'required|max:10|date',
                    'fecha_mantenimiento' => 'required|max:10|date',
                    'propiedad'           => 'required',
                    'tipo_de_equipo'      => 'required',
                    'marca'               => 'required|max:100',
                    'referencia'          => 'required|max:100',
                    'serial'              => 'required|max:100',
                    'categoria'           => 'required|max:100',
                    'tipo_de_equipo'      => 'required|string',
                    'mtm'                 => 'max:100',
                    'tipo_de_soc'         => 'required|string',
                    'tipo_de_lic'         => 'required|string ',
                    'office'              => 'required|string',
                    'nid'                 => 'max:30|required_if:tipo_de_soc,Windows',
                    'workgroup_equipo'    => 'max:100|required_if:tipo_de_soc,Windows',
                    'lan_mac'             => 'max:100|required_if:tipo_de_equipo,Escritorio todo en uno
                                                     |required_if:tipo_de_equipo,Escritorio',
                    'nombre'              => 'required|max:100',
                    'vso'                 => 'required|max:100',
                    'wifi_mac'            => 'max:100|required_if:tipo_de_equipo,Portatil',
                    'cuenta_admin'        => 'max:100|required_if:propiedad,TQI',
                    'contraseña'          => 'max:100|required_if:propiedad,TQI',
                    'fecha_compra'        => 'required|max:10|date',
                    'proveedor'           => 'required|max:100',
                    'precio'              => 'required|max:100',
                ], [
                    'required' => 'Este campo es requerido',
                    'nid.required_if' => 'Este campo es requerido ya que el sistema operativo es Windows',
                    'workgroup_equipo.required_if' => 'Este campo es requerido ya que el sistema operativo es Windows',
                    'lan_mac.required_if' => 'Este campo es requerido ya que el computador es de Escritorio',
                    'wifi_mac.required_if' => 'Este campo es requerido ya que el computador es Portatil',
                    'cuenta_admin.required_if' => 'Este campo es requerido ya que el computador es de TQI',
                    'contraseña.required_if' => 'Este campo es requerido ya que el computador es de TQI',
                    'email'    => 'Este campo debe tener formato de correo electrónico',
                    'unique'   => 'Este correo debe ser único',
                    'max'      => 'Este campo no debe superar :max caracteres',
                    'min'      => 'Este campo no debe ser menor de :min caracteres',
                    'numeric'  => 'Este campo debe ser numerico',
                    'string'   => 'Este campo debe ser solo texto',
                    'url'      => 'Este campo debe ser una url',
                    'date'     => 'Este campo debe ser una fecha',
                ]);
                if ($validator->fails()) {

                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }

                $activo = Activo::find($id);

                $activo->usuario_id          = $request->input('user_id');
                $activo->categoria_id        = $request->input('categoria');
                $activo->fecha_entrega       = Carbon::parse($request->input('fecha_entrega'));
                $activo->fecha_mantenimiento = Carbon::parse($request->input('fecha_mantenimiento'));
                $mantenimiento               = Carbon::parse($request->input('fecha_mantenimiento'));
                $hoy                         = Carbon::parse(now()->toDateString());
                $diasDiferencia              = $hoy->diffInDays($mantenimiento);
                if ($diasDiferencia > 60) {
                    $activo->estado_mantenimiento = 'pendiente';
                } else {
                    $activo->estado_mantenimiento = 'bien';
                }
                $activo->propiedad             = $request->input('propiedad');
                $activo->tipo_de_equipo        = $request->input('tipo_de_equipo');
                $activo->marca_equipo          = $request->input('marca');
                $activo->referencia_equipo     = $request->input('referencia');
                $activo->serial_equipo         = $request->input('serial');
                $activo->mtm_equipo            = $request->input('mtm');
                $activo->tipo_so               = $request->input('tipo_de_soc');
                $activo->licencia              = $request->input('tipo_de_lic');
                $activo->vso_equipo            = $request->input('vso');
                $activo->nid_sistema_operativo = $request->input('nid');
                $activo->tipo_office           = $request->input('office');
                $activo->nombre_equipo         = $request->input('nombre');
                $activo->workgroup_equipo      = $request->input('workgroup_equipo');
                $activo->cuenta_admin_equipo   = $request->input('cuenta_admin');
                $activo->lan_mac               = $request->input('lan_mac');
                $activo->wifi_mac              = $request->input('wifi_mac');
                $activo->pass_admin            = $request->input('contraseña');
                $activo->fecha_compra          = Carbon::parse($request->input('fecha_compra'));
                $activo->proveedor             = $request->input('proveedor');
                $activo->precio                = $request->input('precio');

                $activo->save();

                return redirect()->route('activos.index')->with('status', 'Computador actualizado correctamente');

            } elseif ($request->categoria == 2) {

                $validator = Validator::make($request->all(), [
                    'user_id' => 'required',
                    'fecha_entrega' => 'required|max:10|date',
                    'fecha_mantenimiento' => 'required|max:10|date',
                    'propiedad'=> 'required|string',
                    'marca' => 'required|max:100',
                    'referencia' => 'required|max:100',
                    'serial'=> 'required|max:100',
                    'categoria'=> 'required|max:100',
                    'tipo_accesorio' => 'required|string',
                    'fccid'=> 'max:100',
                    'icid' => 'max:100',
                    'incluido' => 'required|string',

                    'mtm'                 => 'max:100',
                    'tipo_de_soc'         => 'max:100',
                    'tipo_de_lic'         => 'max:100 ',
                    'office'              => 'max:100',
                    'nid'                 => 'max:30',
                    'workgroup_equipo'    => 'max:100',
                    'fccid'               => 'max:100',
                    'icid'                => 'max:100',
                    'lan_mac'             => 'max:100',
                    'nombre'              => 'max:100',
                    'vso'                 => 'max:100',
                    'wifi_mac'            => 'max:100',
                    'cuenta_admin'        => 'max:100',
                    'contraseña'          => 'max:100',
                    'fecha_compra'        => 'required|max:10|date',
                    'proveedor'           => 'required|max:100',
                    'precio'              => 'required|max:100',
                ], [
                    'required' => 'Este campo es requerido',
                    'email'    => 'Este campo debe tener formato de correo electrónico',
                    'unique'   => 'Este correo debe ser único',
                    'max'      => 'Este campo no debe superar :max caracteres',
                    'min'      => 'Este campo no debe ser menor de :min caracteres',
                    'numeric'  => 'Este campo debe ser numerico',
                    'string'   => 'Este campo debe ser solo texto',
                    'url'      => 'Este campo debe ser una url',
                    'date'     => 'Este campo debe ser una fecha',

                ]);
                if ($validator->fails()) {

                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }

                $activo                      = Activo::find($id);
                $activo->usuario_id          = $request->input('user_id');
                $activo->categoria_id        = $request->input('categoria');
                $activo->fecha_entrega       = Carbon::parse($request->input('fecha_entrega'));
                $activo->fecha_mantenimiento = Carbon::parse($request->input('fecha_mantenimiento'));
                $mantenimiento               = Carbon::parse($request->input('fecha_mantenimiento'));
                $hoy                         = Carbon::parse(now()->toDateString());
                $diasDiferencia              = $hoy->diffInDays($mantenimiento);
                if ($diasDiferencia > 60) {
                    $activo->estado_mantenimiento = 'pendiente';
                } else {
                    $activo->estado_mantenimiento = 'bien';
                }
                $activo->propiedad         = $request->input('propiedad');
                $activo->tipo_de_equipo    = $request->input('tipo_accesorio');
                $activo->marca_equipo      = $request->input('marca');
                $activo->incluido          = $request->input('incluido');
                $activo->referencia_equipo = $request->input('referencia');
                $activo->serial_equipo     = $request->input('serial');
                $activo->fccid_equipo      = $request->input('fccid');
                $activo->icid_equipo       = $request->input('icid');
                $activo->mtm_equipo        = $request->input('mtm');
                $activo->nombre_equipo     = $request->input('nombre');
                $activo->wifi_mac          = $request->input('wifi_mac');
                $activo->fecha_compra      = Carbon::parse($request->input('fecha_compra'));
                $activo->proveedor         = $request->input('proveedor');
                $activo->precio            = $request->input('precio');

                $activo->save();

                return redirect()->route('activos.index')->with('status', 'Accesorio actualizado correctamente');

            } else if ($request->categoria == 3) {
                Debugbar::info($request->categoria);

                $validator = Validator::make($request->all(), [
                    'user_id' => 'required',
                    'fecha_entrega' => 'required|max:10|date',
                    'fecha_mantenimiento' => 'required|max:10|date',
                    'propiedad' => 'required|string',
                    'marca' => 'required|max:100',
                    'referencia'=> 'required|max:100',
                    'serial'  => 'required|max:100',
                    'categoria'  => 'required|max:100',
                    'fccid' => 'max:100',
                    'icid'   => 'max:100',
                    'incluido' => 'max:100',
                    'tipo_de_telefono' => 'required|max:100',
                    'tipo_de_sot'=> 'required|max:100|string',
                    'imei_1' => 'max:100|required_if:tipo_de_telefono,Movil',
                    'imei_2' => 'max:100',

                    'mtm'  => 'max:100',
                    'tipo_de_soc' => 'max:100',
                    'tipo_de_lic' => 'max:100 ',
                    'office' => 'max:100',
                    'nid' => 'max:30',
                    'workgroup_equipo' => 'max:100',
                    'lan_mac' => 'max:100',
                    'nombre' => 'max:100|required_if:tipo_de_sot,IOS|required_if:tipo_de_telefono,Movil',
                    'vso' => 'required|max:100',
                    'wifi_mac' => 'max:100|required_if:tipo_de_sot,Android|required_if:tipo_de_sot,IOS',
                    'cuenta_admin' => 'max:100|required_if:propiedad,TQI',
                    'contraseña' => 'max:100|required_if:propiedad,TQI',
                    'fecha_compra'=> 'required|max:10|date',
                    'proveedor' => 'required|max:100',
                    'precio'  => 'required|max:100',

                ], [

                    'required' => 'Este campo es requerido',
                    'cuenta_admin.required_if' => 'Este campo es requerido ya que es propiedad de TQI',
                    'contraseña.required_if' => 'Este campo es requerido ya que es propiedad de TQI',
                    'nombre.required_if' => 'Este campo es requerido ya que su sistema operativo es IOS',
                    'wifi_mac.required_if' => 'Este campo es requerido ya que su sistema operativo es IOS o Android',
                    'email'    => 'Este campo debe tener formato de correo electrónico',
                    'unique'   => 'Este correo debe ser único',
                    'max'      => 'Este campo no debe superar :max caracteres',
                    'min'      => 'Este campo no debe ser menor de :min caracteres',
                    'numeric'  => 'Este campo debe ser numerico',
                    'string'   => 'Este campo debe ser solo texto',
                    'url'      => 'Este campo debe ser una url',
                    'date'     => 'Este campo solo admite fechas',

                ], [

                    'required' => 'Este campo es requerido',
                    'cuenta_admin.required_if' => 'Este campo es requerido ya que es propiedad de TQI',
                    'contraseña.required_if' => 'Este campo es requerido ya que es propiedad de TQI',
                    'nombre.required_if' => 'Este campo es requerido ya que su sistema operativo es IOS',
                    'wifi_mac.required_if' => 'Este campo es requerido ya que su sistema operativo es IOS o Android',
                    'email'    => 'Este campo debe tener formato de correo electrónico',
                    'unique'   => 'Este correo debe ser único',
                    'max'      => 'Este campo no debe superar :max caracteres',
                    'min'      => 'Este campo no debe ser menor de :min caracteres',
                    'numeric'  => 'Este campo debe ser numerico',
                    'string'   => 'Este campo debe ser solo texto',
                    'url'      => 'Este campo debe ser una url',
                    'date'     => 'Este campo solo admite fechas',
                ]);
                if ($validator->fails()) {

                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }

                $activo                      = Activo::find($id);
                $activo->usuario_id          = $request->input('user_id');
                $activo->categoria_id        = $request->input('categoria');
                $activo->fecha_entrega       = Carbon::parse($request->input('fecha_entrega'));
                $activo->fecha_mantenimiento = Carbon::parse($request->input('fecha_mantenimiento'));
                $mantenimiento               = Carbon::parse($request->input('fecha_mantenimiento'));
                $hoy                         = Carbon::parse(now()->toDateString());
                $diasDiferencia              = $hoy->diffInDays($mantenimiento);
                if ($diasDiferencia > 60) {
                    $activo->estado_mantenimiento = 'pendiente';
                } else {
                    $activo->estado_mantenimiento = 'bien';
                }
                $activo->propiedad         = $request->input('propiedad');
                $activo->tipo_de_equipo    = $request->input('tipo_de_telefono');
                $activo->marca_equipo      = $request->input('marca');
                $activo->referencia_equipo = $request->input('referencia');
                $activo->serial_equipo     = $request->input('serial');
                $activo->imei_1            = $request->input('imei_1');
                $activo->imei_2            = $request->input('imei_2');
                $activo->wifi_mac          = $request->input('wifi_mac');
                $activo->vso_equipo        = $request->input('vso');
                $activo->tipo_so           = $request->input('tipo_de_sot');
                $activo->nombre_equipo     = $request->input('nombre');
                $activo->wifi_mac          = $request->input('wifi_mac');
                $activo->fecha_compra      = Carbon::parse($request->input('fecha_compra'));
                $activo->proveedor         = $request->input('proveedor');
                $activo->precio            = $request->input('precio');

                $activo->save();

                return redirect()->route('activos.index')->with('status', 'Teléfono actualizado correctamente');
            } else {
                return redirect()->route('activos.index')->with('statuselim', 'No existe');

            }

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
        $user = auth()->user();

        if ($user->permisos == 'escritura') {

            $activo = Activo::find($id);

            File::deleteDirectory(public_path() . '/ACT/' . $id);

            $reporte = Reporte::where('reportes.activo_id', '=', $id)
                ->get()->each;

            $reporte->delete();
            $activo->delete();

            return redirect()->route('activos.index')->with('statuselim', 'Activo eliminado correctamente');

        } else {

            return redirect()->route('activos.index');
        }
    }
}
