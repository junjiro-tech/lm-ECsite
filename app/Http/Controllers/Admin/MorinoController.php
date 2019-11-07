<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Morino;

class MorinoController extends Controller
{
    public function index()
    {
    return view('admin/login');
    }
}
