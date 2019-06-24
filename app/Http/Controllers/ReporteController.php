<?php

namespace App\Http\Controllers;

use App\Reporte;
use App\Http\Requests\ReporteRequest;
use App\Http\Requests\FilterReporteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $reportes = Reporte::where('user_id','=',Auth::id())
            ->orderBy('fecha','desc')
            ->get();
        return view('partials.reportes._index', compact('reportes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reportes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ReporteRequest;
     * @return \Illuminate\Http\Response
     */
    public function store(ReporteRequest $request)
    {
        Reporte::create(array_merge($request->all(),['user_id' => Auth::id()]));
        /*return Reporte::where('user_id','=',Auth::id())
            ->orderBy('fecha','desc')
            ->get();*/
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function show(Reporte $reporte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function edit(Reporte $reporte)
    {
        $len = strlen($reporte->descripcion);
        return view('reportes.edit', compact('reporte', 'len'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function update(ReporteRequest $request, Reporte $reporte)//int $id)
    {
        $reporte->update($request->all());
        /*$reportes = Reporte::where('user_id','=',$reporte->user_id)
            ->orderBy('fecha','desc')
            ->get();
        return view('partials.reportes._index', compact('reportes'));*/
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reporte $reporte)
    {
        Reporte::destroy($reporte->id);
        /*$reportes = Reporte::where('user_id','=',$reporte->user_id)
            ->orderBy('fecha','desc')
            ->get();
        return view('partials.reportes._index', compact('reportes'));*/
        return $this->index();
    }

    /**
     * Display a listing of the filtered resource.
     * @param \App\Http\Requests\FilterReporteRequest;
     */
    public function filter(FilterReporteRequest $request)
    {
        $desde = $request->input('fecha_desde');
        $hasta = $request->input('fecha_hasta');
        $reportes = Reporte::with('user')
            ->whereBetween('fecha', [$desde,$hasta])
            ->orderBy('fecha', 'desc')
            ->get();
        return view('reportes.filter', compact('reportes', 'desde', 'hasta'));
    }
}
