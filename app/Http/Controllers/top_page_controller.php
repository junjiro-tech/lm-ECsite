<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Uuid;
use App\CartItem;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Cookie;

class top_page_controller extends Controller
{
    
    
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

   
    
