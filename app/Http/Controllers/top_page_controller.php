<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class top_page_controller extends Controller
{
    //
    public function index() 
    {
        return view('top_pages.top_page');
    }
    
    public function search() 
    {
        return view('top_pages.search');
    }
    
    
    public function loged()
    {
        return view('loged.loged_top_page');
    }
    
    public function hyouki()
    {
        return view('top_pages.hyouki');
    }
    
    public function privacy()
    {
        return view('top_pages.privacy');
    }
    
    public function cart()
    {
        return view('top_pages.cart');
    }

}

   
    
