<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use function view;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.home.index');
    }
}
