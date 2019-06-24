<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $usuario = Auth::user();
        if ($usuario->rol) {
            $usuarios = User::where('id','!=',$usuario->id)->orderBy('name','asc')->get();
            return view('dashboard.administrador', compact('usuario','usuarios'));
        } else {
            $reportes = $usuario->reportes;
            return view('dashboard.empleado', compact('reportes','usuario'));
        }
    }
}
