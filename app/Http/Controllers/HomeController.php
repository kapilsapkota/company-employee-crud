<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\BaseController;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    protected $panel = 'Dashboard';
    protected $base_route = 'admin.dashboard';
    protected $view_path = 'admin.dashboard';
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
//        return view('home');
        return view($this->loadCommonDataToView('admin.home'));
    }
}
