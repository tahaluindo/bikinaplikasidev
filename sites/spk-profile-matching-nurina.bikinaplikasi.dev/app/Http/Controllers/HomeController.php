<?php

namespace App\Http\Controllers;

use App\Aspek;
use App\Bobot;
use App\Project;
use App\Kriteria;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['aspek_count']    = Aspek::all()->count();
        $data['bobot_count']    = Bobot::all()->count();
        $data['kriteria_count'] = Kriteria::all()->count();
        $data['project_count']  = Project::all()->count();

        return view('home', $data);
    }
}
