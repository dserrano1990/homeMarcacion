<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Auth;

use App\marcaje;

use App\Empleado;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\CreateMarcajesRequest;

use Barryvdh\DomPDF\Facade as PDF;

class marcajesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$marcaje = marcaje::all();
        //return view("marcajes.listarM", compact('marcaje'));
        //$marcaje = App\Empleado::find(1)->marcajes;
        $marcaje = marcaje::with('empleados')->get();
        return view("marcajes.listarM", compact('marcaje'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$pdf = PDF::loadHTML('<h1>Test</h1>');
        //$pdf = PDF::loadView('marcajes.diasPdf');
        //return $pdf->stream();
        
        $pdf = PDF::loadView('marcajes.diasPdf');
        return $pdf->stream();


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMarcajesRequest $request)
    {
        //
        $id = $request['id'];

        $fHoy = date('Y/m/d', strtotime(date('d-m-Y')));
        //fecha formateada/ echo date("Y/m/d", strtotime($fHoy));
        $marcaje = DB::table('marcajes')->where('id_empleado',$id)->where('fecha', $fHoy)->first();
        
        if($marcaje == null){
            marcaje::create([
                'id_empleado' => $id,
                'hora_entrada' => date('H:i'),
                'fecha' => date('Y/m/d', strtotime(date('d-m-Y'))),
            ]);

            return redirect('/marcajes');
            
        }else if($marcaje != null){
            $cont = 0;
            foreach($marcaje as $marc){
                if($cont == 3){
                    if($marc == null){
                        $hoy = date('Y/m/d', strtotime(date('d-m-Y')));
                        DB::table('marcajes')->where('id_empleado', $id)->where('fecha', $fHoy)->update(array('hora_salida' => date('H:i:s')));

                        return redirect('/marcajes');
                    }
                }
                $cont++;
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
        $titulo = "";

        //Funciona
        $empleado = DB::table('empleados')->where('id',$id)->first();
        //return view("marcajes.createM", compact('empleado'));
        
        $fHoy = date('Y/m/d', strtotime(date('d-m-Y')));
        //fecha formateada/ echo date("Y/m/d", strtotime($fHoy));
        $marcaje = DB::table('marcajes')->where('id_empleado',$id)->where('fecha', $fHoy)->first();
        
        if($marcaje == null){
            $titulo = "Entrada";
            return view("marcajes.createM", compact('empleado','titulo'));
            
        }else{
            $cont = 0;
            foreach($marcaje as $marc){
                if($cont == 3){
                    if($marc == null){
                        $titulo = "Salida";
                        return view("marcajes.createM", compact('empleado','titulo'));
                    }else{
                        $titulo = "Día laboral terminado";
                        return view("marcajes.createM", compact('empleado','titulo'));
                    }
                }
                $cont++;
            }
            
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
