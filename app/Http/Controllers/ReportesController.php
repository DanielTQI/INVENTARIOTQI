<?php

namespace App\Http\Controllers;

use App\Activo;
use App\Reporte;
use App\User;
use Barryvdh\Debugbar\Facade as Debugbar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;
use Validator;

class ReportesController extends Controller
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

            $reportes = Reporte::leftjoin('activos', 'reportes.activo_id', '=', 'activos.id')
                ->leftjoin('categorias', 'activos.categoria_id', '=', 'categorias.id')
                ->leftjoin('users', 'reportes.usuario_id', '=', 'users.id')
                ->select('reportes.*', 'users.name as nombreuser', 'categorias.nombre as ncat', 'activos.id as activoid')
                ->orderby('reportes.created_at', 'DESC')
                ->get();

            Debugbar::info($reportes);
            $users = $user->name;

            return view('admin.reportes.index', compact('reportes', 'users'));

        } elseif ($user->permisos == 'lectura') {

            $reportes = Reporte::leftjoin('activos', 'reportes.activo_id', '=', 'activos.id')
                ->leftjoin('categorias', 'activos.categoria_id', '=', 'categorias.id')
                ->leftjoin('users', 'reportes.usuario_id', '=', 'users.id')
                ->select('activos.*', 'reportes.*', 'categorias.nombre as ncat')
                ->where('users.id', '=', $user->id)
                ->orderby('reportes.created_at', 'DESC')
                ->get();

            Debugbar::info($reportes);
            $users = $user->name;

            return view('usuario.reportes.index', compact('reportes', 'users'));

        }
        $users = $user->name;

        return view('usuario.reportes.index', compact('reportes', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $user = auth()->user();

        $info = Activo::leftjoin('users', 'activos.usuario_id', '=', 'users.id')
            ->select('users.id as us', 'activos.id as ida')
            ->where('activos.id', '=', $request->id)
            ->first();

        $users = User::pluck('name', 'id');

        if ($user->permisos == 'escritura') {

            return view('admin.reportes.crear', compact('users', 'info'));

        } else if ($user->permisos == 'lectura') {

            return view('usuario.reportes.crear', compact('users', 'info'));
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
        $user  = User::where('permisos', '=', 'escritura')->pluck('email');
        $userl = auth()->user();
        if ($userl->permisos == 'lectura') {
            $validator = Validator::make($request->all(), [
                'tipo_reporte'        => 'required|max:100',
                'descripcion_usuario' => 'required|max:191',
                'fecha_reporte'       => 'required|max:100|date',
            ], [
                'required' => 'Este campo es requerido',
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
            $reporte                      = new Reporte;
            $reporte->usuario_id          = $request->input('iduser');
            $reporte->activo_id           = $request->input('idactivo');
            $reporte->tipo_reporte        = $request->input('tipo_reporte');
            $reporte->descripcion_usuario = $request->input('descripcion_usuario');
            $reporte->fecha_reporte       = Carbon::parse($request->input('fecha_reporte'));
            $reporte->atendido            = 'NO';

            $usua= User::find($request->iduser);

            $userh = explode(',', env('ADMIN_EMAILS'));
            $rout = explode(',', env('APP_URL'));

            Debugbar::info($rout);

            $data = array(
                'reporti' => $request->tipo_reporte,
                'usuario' => $usua->name,
                'ruta' => $rout[0].'/reportes/'.$request->idactivo,
             );

            Mail::send('emails.report', $data, function ($message) use ($userh) {

                $message->to($userh)
                    ->subject('Se generó un reporte');
            });

            $reporte->save();

            return redirect()->route('reportes.index')->with('status', 'Reporte realizado exitosamente');

        } elseif ($userl->permisos == 'escritura') {
            $validator = Validator::make($request->all(), [
                'user_id'             => 'required|max:100',
                'tipo_reporte'        => 'required|max:100',
                'descripcion_usuario' => 'required|max:191',
                'fecha_reporte'       => 'required|max:100',
            ], [
                'required' => 'Este campo es requerido',
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
            // dd($request->idactivo);
            $reporte = new Reporte;
            $reporte->usuario_id          = $request->input('user_id');
            $reporte->activo_id           = $request->input('idactivo');
            $reporte->tipo_reporte        = $request->input('tipo_reporte');
            $reporte->descripcion_usuario = $request->input('descripcion_usuario');
            $reporte->fecha_reporte       = Carbon::parse($request->input('fecha_reporte'));
            $reporte->atendido            = 'NO';
            $userh = explode(',', env('ADMIN_EMAILS'));
            $rout = explode(',', env('APP_URL'));
            $data = array(
                'reporti' => $request->tipo_reporte,
                'usuario' => auth()->user()->name,
                'ruta' => $rout[0].'/reportes/'.$request->idactivo,
            );
            Mail::send('emails.report', $data, function ($message) use ($userh) {
                $message->to($userh)
                    ->subject('Se generó un reporte');
            });
            $reporte->save();

            return redirect()->route('reportes.index')->with('status', 'Reporte realizado exitosamente');
        } else {
            return redirect()->route('reportes.index');
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
        // return $id;
        $user = auth()->user();

        if ($user->permisos == 'escritura') {

            $usersup = User::where('permisos', '=', 'escritura')->pluck('name', 'id');
            $usersup->prepend(' ', ' ');

            $reporte = Reporte::leftjoin('activos', 'reportes.activo_id', '=', 'activos.id')
                ->leftjoin('categorias', 'activos.categoria_id', '=', 'categorias.id')
                ->leftjoin('users', 'reportes.usuario_id', '=', 'users.id')
                ->select('categorias.nombre as ncat', 'users.name as nuser', 'activos.id as idactive', 'activos.*', 'reportes.*')
                ->where('reportes.id', '=', $id)
                ->first();

            return view('admin.reportes.atender', compact('reporte', 'usersup'));

        } else {

            return redirect()->route('reportes.index');

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
        // $reporte = Reporte::find($id);
        $user = auth()->user();

        $consu = Reporte::where('id', '=', $id)->first();

        if ($user->permisos == 'lectura') {

            if ($user->id == $consu->usuario_id) {

                $reporte = Reporte::where('reportes.id', '=', $id)
                    ->first();

                Debugbar::info($reporte);

                return view('usuario.reportes.editar', compact('reporte'));
            } else {

                return redirect()->route('reportes.index');
            }

        } else if ($user->permisos == 'escritura') {

            $reporte = Reporte::where('reportes.id', '=', $id)
                ->first();

            Debugbar::info($reporte);

            return view('admin.reportes.editar', compact('reporte'));
        } else {

            return redirect()->route('reportes.index');

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

        $consu = Reporte::where('id', $id)->first();

        if ($user->id == $consu->usuario_id) {

            $validator = Validator::make($request->all(), [
                'tipo_reporte'        => 'required|max:100',
                'descripcion_usuario' => 'required|max:100',
                'fecha_reporte'       => 'required|max:100|date',
            ], [
                'required' => 'Este campo es requerido',
                'email'    => 'Este campo debe tener formato de correo electrónico',
                'unique'   => 'Este correo debe ser único',
                'max'      => 'Este campo no debe superar :max caracteres',
                'min'      => 'Este campo no debe ser menor de :min caracteres',
                'numeric'  => 'Este campo debe ser numerico',
                'string'   => 'Este campo debe ser solo texto',
                'url'      => 'Este campo debe ser una url',
                'date'     => 'Aqui solo se admiten fechas',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $reporte = Reporte::find($id);

            $reporte->tipo_reporte        = $request->input('tipo_reporte');
            $reporte->descripcion_usuario = $request->input('descripcion_usuario');
            $reporte->fecha_reporte       = Carbon::parse($request->input('fecha_reporte'));
            $reporte->atendido            = 'NO';

            $reporte->save();

            return redirect()->route('reportes.index')->with('status', 'Reporte actualizado exitosamente');

        } else if($user->permisos =='escritura') {

          $validator = Validator::make($request->all(), [
                'tipo_reporte'        => 'required|max:100',
                'descripcion_usuario' => 'required|max:100',
                'fecha_reporte'       => 'required|max:100|date',
            ], [
                'required' => 'Este campo es requerido',
                'email'    => 'Este campo debe tener formato de correo electrónico',
                'unique'   => 'Este correo debe ser único',
                'max'      => 'Este campo no debe superar :max caracteres',
                'min'      => 'Este campo no debe ser menor de :min caracteres',
                'numeric'  => 'Este campo debe ser numerico',
                'string'   => 'Este campo debe ser solo texto',
                'url'      => 'Este campo debe ser una url',
                'date'     => 'Aqui solo se admiten fechas',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $reporte = Reporte::find($id);

            $reporte->tipo_reporte        = $request->input('tipo_reporte');
            $reporte->descripcion_usuario = $request->input('descripcion_usuario');
            $reporte->fecha_reporte       = Carbon::parse($request->input('fecha_reporte'));
            $reporte->atendido            = 'NO';

            $reporte->save();

            return redirect()->route('reportes.index')->with('status', 'Reporte actualizado exitosamente');

        }else{

            return redirect()->route('reportes.index');
        }
            return redirect()->route('reportes.index');
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

        $consu = Reporte::where('id', $id)->first();

        if ($user->id == $consu->usuario_id) {

            $reporte = Reporte::find($id);
            $reporte->delete();

            return redirect()->route('reportes.index')->with('statuselim', 'Reporte eliminado exitosamente');

        } else if ($user->permisos = 'escritura') {

            $reporte = Reporte::find($id);
            $reporte->delete();

            return redirect()->route('reportes.index')->with('statuselim', 'Reporte eliminado exitosamente');

        } else {

            return redirect()->route('reportes.index');
        }

    }

    //esta funcion se encarga del soporte

    public function supporte($id, Request $request)
    {

        $user = auth()->user();

        if ($user->permisos == 'escritura') {

            $validator = Validator::make($request->all(), [
                'usuario_soportee'     => 'required|max:100',
                'atendidoo'            => 'required|max:100',
                'descripcion_soportee' => 'required|max:191',
                'fecha_soportee'       => 'required|max:10|date',
            ], [
                'required' => 'Este campo es requerido',
                'email'    => 'Este campo debe tener formato de correo electrónico',
                'unique'   => 'Este correo debe ser único',
                'max'      => 'Este campo no debe superar :max caracteres',
                'min'      => 'Este campo no debe ser menor de :min caracteres',
                'numeric'  => 'Este campo debe ser numerico',
                'string'   => 'Este campo debe ser solo texto',
                'url'      => 'Este campo debe ser una url',
                'date'     => 'Este campo solo admite fecha',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $reporte = Reporte::find($id);
            $userh   = User::where('id', '=', $reporte->usuario_id)->first();

            $reporte->usuario_soporte     = $request->input('usuario_soportee');
            $reporte->atendido            = $request->input('atendidoo');
            $reporte->descripcion_soporte = $request->input('descripcion_soportee');
            $reporte->fecha_soporte       = Carbon::parse($request->input('fecha_soportee'));

            if ($request->atendidoo == 'EN PROCESO') {
                $data = array(
                    'reporti' => 'Esta en proceso de solucion',
                );
            } elseif ($request->atendidoo == 'SI') {
                $data = array(
                    'reporti' => 'Se solucionó satisfactoriamente',
                );
            }
            Mail::send('emails.respuesta', $data, function ($message) use ($userh) {

                $message->to($userh->email, $userh->name)
                    ->subject('Atencion de Reporte');
            });

            $reporte->save();

            return redirect()->route('reportes.index')->with('status', 'Soporte ejecutado exitosamente');
        } else {

            return redirect()->route('reportes.index');
        }

    }

    public function historialactivo($id)
    {

        $user = auth()->user();

        if ($user->permisos == 'escritura') {

            $histori = Reporte::leftjoin('activos', 'reportes.activo_id', '=', 'activos.id')
                ->leftjoin('users', 'reportes.usuario_id', '=', 'users.id')
                ->leftjoin('categorias', 'activos.categoria_id', '=', 'categorias.id')
                ->select('reportes.*', 'activos.tipo_de_equipo as tipo',
                    'activos.estado_mantenimiento', 'users.name as nombreusuario',
                    'categorias.nombre as ncat')
                ->where('reportes.activo_id', '=', $id)
                ->groupby('reportes.id')
                ->orderby('reportes.created_at', 'DESC')
                ->get();

            return view('admin.reportes.historial', compact('histori'));

        } else {

            return redirect()->route('reportes.index');
        }

        return redirect()->route('activos.index');
    }

}
