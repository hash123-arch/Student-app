<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class HomeController extends Controller
{
   
    
    public function index()
    {
       

        return view('Pages.home.index');
    }
}
