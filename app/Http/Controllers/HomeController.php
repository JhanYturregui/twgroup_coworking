<?php

namespace App\Http\Controllers;

use App\Models\Local;

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
      $this->local = new Local;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
      $locales = $this->local->obtenerLocalesActivos();
      
      return view('dashboard', compact('locales'));
    }
}
