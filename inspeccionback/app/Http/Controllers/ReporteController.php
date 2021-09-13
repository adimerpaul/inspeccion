<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Reporte::with('user')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reporte=new Reporte();
        $reporte->area=$request->area;
        $reporte->subarea=$request->subarea;
        $reporte->user_id=$request->user()->id;
        $reporte->fecha=date('Y-m-d');
        $reporte->hora=date('H:i:s');
//            estado='".date('H:i:s')."',
        $reporte->save();
        foreach ($request->datos as $dato){
            DB::select("INSERT INTO place_sensor SET
            sensor_id='".$dato['sensor_id']."',
            place_id='".$dato['place_id']."',
            estado='".$dato['estado']."',
            reporte_id='".$reporte->id."'
            ");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function show($dat)
    {
//        return $dat;
        return DB::select("SELECT *
FROM reportes r
INNER JOIN place_sensor p ON p.reporte_id=r.id
WHERE r.id='$dat'");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function edit(Reporte $reporte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reporte $reporte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reporte $reporte)
    {
        //
    }
}
