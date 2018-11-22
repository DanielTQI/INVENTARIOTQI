<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
use Validator;
use App\Activo;
use App\Equipo;
use App\Reporte;
use App\Telefono;
use App\Accesorio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Barryvdh\Debugbar\Facade as Debugbar;



class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

     $user = auth()->user();

           if ($user->permisos=='escritura') {

                 $reportes=Reporte::leftjoin('activos', 'reportes.activo_id', '=', 'activos.id')
                                 ->leftjoin('categorias', 'activos.categoria_id', '=', 'categorias.id')
                                 ->leftjoin('users', 'reportes.usuario_id', '=', 'users.id')
                                 ->select('reportes.*','users.name as nombreuser','categorias.nombre as ncat')
                                 ->orderby('reportes.created_at','DESC')
                                 ->get();
                      
                    Debugbar::info($reportes);
                    $users=$user->name;

                    return view('admin.reportes.index', compact('reportes','users'));

               }elseif ($user->permisos=='lectura') {

                 $reportes=Reporte::leftjoin('activos', 'reportes.activo_id', '=', 'activos.id')
                                 ->leftjoin('categorias', 'activos.categoria_id', '=', 'categorias.id')
                                 ->leftjoin('users', 'reportes.usuario_id', '=', 'users.id')
                                 ->select('activos.*','reportes.*','categorias.nombre as ncat')
                                 ->where('users.id', '=', $user->id)
                                 ->orderby('reportes.created_at','DESC')
                                 ->get();
                       
                    Debugbar::info($reportes);
                    $users=$user->name;

                    return view('usuario.reportes.index', compact('reportes','users'));

               }         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = auth()->user();

        $info=Activo::leftjoin('users', 'activos.usuario_id', '=', 'users.id')
                                ->select('users.id as us','activos.id as ida')
                                ->where('activos.id', '=', $request->id)
                                ->first();
        
        $users=User::pluck('name','id');
        $users->prepend(' ',' ');


        if ($user->permisos=='escritura') {

            return view('admin.reportes.crear', compact('users','info'));

        }else if($user->permisos=='lectura') {

            return view('usuario.reportes.crear', compact('users','info'));
        } 
        }    

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

                $user= User::where('permisos','=','escritura')->pluck('email');
                $userl = auth()->user();


                if ($userl->permisos=='lectura') {

                $validator = Validator::make($request->all(),[
                    'tipo_reporte' => 'required|max:100',
                    'descripcion_usuario' => 'required|max:191',
                    'fecha_reporte' => 'required|max:100|date',
                ],[
                    'required' => 'Este campo es requerido',
                    'email' => 'Este campo debe tener formato de correo electrónico',
                    'unique' => 'Este correo debe ser único',
                    'max' => 'Este campo no debe superar :max caracteres',
                    'min' => 'Este campo no debe ser menor de :min caracteres',
                    'numeric' => 'Este campo debe ser numerico',
                    'string' => 'Este campo debe ser solo texto',
                    'url' => 'Este campo debe ser una url',
                    'date' => 'Este campo solo admite fechas',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()
                       ->withErrors($validator)
                       ->withInput();
                 }
                
                    $reporte = new Reporte;

                    $reporte->usuario_id=$request->input('iduser');
                    $reporte->activo_id=$request->input('idactivo');
                    $reporte->tipo_reporte=$request->input('tipo_reporte');
                    $reporte->descripcion_usuario=$request->input('descripcion_usuario');
                    $reporte->fecha_reporte=Carbon::parse($request->input('fecha_reporte'));
                    $reporte->atendido='NO';


                    $data =  array(
                        'reporti' => 'Equipo' , 
                           );

                            Mail::send('emails.report', $data, function($message){
                             
                                    $message->to('daniel.lopez@tqi.co', 'Ticket Laravel')
                                    ->bcc(array('dflopez620@misena.edu.co','dflopez9920@hotmail.com'))
                                    ->subject('Reporte de ACTIVOS');
                         });

                    $reporte->save();

                    return redirect()->route('reportes.index')->with('status', 'Reporte realizado exitosamente');

                }elseif ($userl->permisos=='escritura') {
                    
                    $validator = Validator::make($request->all(),[
                        'user_id' => 'required|max:100',
                        'tipo_reporte' => 'required|max:100',
                        'descripcion_usuario' => 'required|max:191',
                        'fecha_reporte' => 'required|max:100',
                    ],[
                        'required' => 'Este campo es requerido',
                        'email' => 'Este campo debe tener formato de correo electrónico',
                        'unique' => 'Este correo debe ser único',
                        'max' => 'Este campo no debe superar :max caracteres',
                        'min' => 'Este campo no debe ser menor de :min caracteres',
                        'numeric' => 'Este campo debe ser numerico',
                        'string' => 'Este campo debe ser solo texto',
                        'url' => 'Este campo debe ser una url',
                        'date' => 'Este campo solo admite fechas',
                    ]);

                    if ($validator->fails()) {
                        return redirect()->back()
                           ->withErrors($validator)
                           ->withInput();
                     }
                    
                        $reporte = new Reporte;

                        $reporte->usuario_id=$request->input('iduser');
                        $reporte->activo_id=$request->input('idactivo');
                        $reporte->tipo_reporte=$request->input('tipo_reporte');
                        $reporte->descripcion_usuario=$request->input('descripcion_usuario');
                        $reporte->fecha_reporte=Carbon::parse($request->input('fecha_reporte'));
                        $reporte->atendido='NO';


                        $data =  array(
                            'reporti' => 'Equipo' , 
                               );

                                Mail::send('emails.report', $data, function($message){
                                 
                                        $message->to('daniel.lopez@tqi.co', 'Ticket Laravel')
                                        ->bcc(array('dflopez620@misena.edu.co','dflopez9920@hotmail.com'))
                                        ->subject('Reporte de ACTIVOS');
                             });

                        $reporte->save();

                        return redirect()->route('reportes.index')->with('status', 'Reporte realizado exitosamente');
                }else{
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
        $user=auth()->user();

        if ($user->permisos=='escritura') {

             $usersup = User::where('permisos', '=' ,'escritura')->pluck('name', 'id');
             $usersup->prepend(' ', ' ');


             $reporte = Reporte::leftjoin('activos', 'reportes.activo_id', '=', 'activos.id')
                               ->leftjoin('categorias', 'activos.categoria_id' ,'=','categorias.id')
                               ->leftjoin('users', 'reportes.usuario_id' ,'=','users.id')
                               ->select('categorias.nombre as ncat','users.name', 'activos.*', 'reportes.*')
                               ->where('reportes.id', '=', $id)  
                               ->first();

            return view('admin.reportes.atender' , compact('reporte', 'usersup'));

        } else{

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
        $user=auth()->user();
        
        $consu=Reporte::where('id','=', $id)->first();


        if ($user->id==$consu->usuario_id){

            $reporte = Reporte::where('reportes.id','=', $id)
                              ->first();

                    Debugbar::info($reporte);

        return view('usuario.reportes.editar' , compact('reporte'));

      }else{

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
        $user=auth()->user();

        $consu=Reporte::where('id', $id)->first();


        if ($user->id==$consu->usuario_id) {

             $validator = Validator::make($request->all(),[
                'tipo_reporte' => 'required|max:100',
                'descripcion_usuario' => 'required|max:100',
                'fecha_reporte' => 'required|max:100|date',
            ],[
                'required' => 'Este campo es requerido',
                'email' => 'Este campo debe tener formato de correo electrónico',
                'unique' => 'Este correo debe ser único',
                'max' => 'Este campo no debe superar :max caracteres',
                'min' => 'Este campo no debe ser menor de :min caracteres',
                'numeric' => 'Este campo debe ser numerico',
                'string' => 'Este campo debe ser solo texto',
                'url' => 'Este campo debe ser una url',
                'date' => 'Aqui solo se admiten fechas',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
             }

                $reporte =  Reporte::find($id);

                $reporte->tipo_reporte=$request->input('tipo_reporte');
                $reporte->descripcion_usuario=$request->input('descripcion_usuario');
                $reporte->fecha_reporte=Carbon::parse($request->input('fecha_reporte'));
                $reporte->atendido='NO';

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
        $user=auth()->user();

        $consu=Reporte::where('id', $id)->first();


        if ($user->id==$consu->usuario_id) {

            $reporte = Reporte::find($id);
            $reporte->delete();

            return redirect()->route('reportes.index')->with('statuselim', 'Reporte eliminado exitosamente');

        }else if ($user->permisos='escritura') {

                $reporte = Reporte::find($id);
                $reporte->delete();

                return redirect()->route('reportes.index')->with('status', 'Reporte eliminado exitosamente');

        }else{
        
                return redirect()->route('reportes.index');
        }

  }


  //esta funcion se encarga del soporte

  public function supporte($id, Request $request){

     $user=auth()->user();

        if ($user->permisos=='escritura') {

             $validator = Validator::make($request->all(),[
                'usuario_soportee' => 'required|max:100',
                'atendidoo' => 'required|max:100',
                'descripcion_soportee' => 'required|max:100',
                'fecha_soportee' => 'required|max:100|date',
            ],[
                'required' => 'Este campo es requerido',
                'email' => 'Este campo debe tener formato de correo electrónico',
                'unique' => 'Este correo debe ser único',
                'max' => 'Este campo no debe superar :max caracteres',
                'min' => 'Este campo no debe ser menor de :min caracteres',
                'numeric' => 'Este campo debe ser numerico',
                'string' => 'Este campo debe ser solo texto',
                'url' => 'Este campo debe ser una url',
                'date' => 'Este campo solo admite fecha',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
             }

                $reporte =  Reporte::find($id);

                $reporte->usuario_soporte=$request->input('usuario_soportee');
                $reporte->atendido=$request->input('atendidoo');
                $reporte->descripcion_soporte=$request->input('descripcion_soportee');
                $reporte->fecha_soporte=Carbon::parse($request->input('fecha_soportee'));

                $reporte->save();

                return redirect()->route('reportes.index');
        }else{

                return redirect()->route('reportes.index');
        }

    } 


    public function historialactivo($id,$tipo){

        $user=auth()->user();

        if ($user->permisos=='escritura') {
            Debugbar::info($tipo);

            if ($tipo=='equipo') {

                 $reportes = Reporte::leftjoin('equipos', 'reportes.equipo_id', '=', 'equipos.id')
                                ->leftjoin('accesorios', 'reportes.accesorio_id', '=', 'accesorios.id')
                                ->leftjoin('telefonos', 'reportes.telefono_id', '=', 'telefonos.id')
                                ->leftjoin('users', 'reportes.usuario_id', '=', 'users.id')
                                ->select(DB::raw('if(equipos.id is null, if(accesorios.id is null,"telefono","accesorio"),"equipo") as tipo, 
                                                 users.name, reportes.tipo_reporte, reportes.descripcion_usuario, reportes.fecha_reporte, 
                                                 reportes.atendido, reportes.descripcion_soporte, reportes.id,reportes.fecha_soporte '))

                                ->where('reportes.equipo_id','=',$id)
                                ->get();
                           
                        Debugbar::info($reportes);
                        return view('admin.reportes.historial', compact('reportes', 'tipo'));

             }elseif ($tipo=='accesorio') {

                 $reportes = Reporte::leftjoin('equipos', 'reportes.equipo_id', '=', 'equipos.id')
                                ->leftjoin('accesorios', 'reportes.accesorio_id', '=', 'accesorios.id')
                                ->leftjoin('telefonos', 'reportes.telefono_id', '=', 'telefonos.id')
                                ->leftjoin('users', 'reportes.usuario_id', '=', 'users.id')
                                ->select(DB::raw('if(equipos.id is null, if(accesorios.id is null,"telefono","accesorio"),"equipo") as tipo, 
                                                 users.name, reportes.tipo_reporte, reportes.descripcion_usuario, reportes.fecha_reporte, 
                                                 reportes.atendido, reportes.descripcion_soporte, reportes.id,reportes.fecha_soporte '))

                                ->where('reportes.accesorio_id','=',$id)
                                ->get();
                           
                        Debugbar::info($reportes);
                        return view('admin.reportes.historial', compact('reportes', 'tipo'));

             }elseif ($tipo=='telefono') {

                 $reportes = Reporte::leftjoin('equipos', 'reportes.equipo_id', '=', 'equipos.id')
                                ->leftjoin('accesorios', 'reportes.accesorio_id', '=', 'accesorios.id')
                                ->leftjoin('telefonos', 'reportes.telefono_id', '=', 'telefonos.id')
                                ->leftjoin('users', 'reportes.usuario_id', '=', 'users.id')
                                ->select(DB::raw('if(equipos.id is null, if(accesorios.id is null,"telefono","accesorio"),"equipo") as tipo, 
                                                 users.name, reportes.tipo_reporte, reportes.descripcion_usuario, reportes.fecha_reporte, 
                                                 reportes.atendido, reportes.descripcion_soporte, reportes.id,reportes.fecha_soporte '))

                                ->where('reportes.accesorio_id','=',$id)
                                ->get();
                           
                        Debugbar::info($reportes);
                        return view('admin.reportes.historial', compact('reportes', 'tipo'));
             }
                    
        }else{

            return redirect()->route('reportes.index');
        }

            return redirect()->back();
     }

}
