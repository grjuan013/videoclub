<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mckenziearts\Notify\LaravelNotify;

class HomeController extends Controller
{
    protected $notify;
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
        return view('home');
    }

    public function getHome()
    {
        notify()->success('¡Haz ingresado a la sesión!');
        return redirect()->action([CatalogController::class, 'getIndex']);
    }
}
