<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index(){
        $class = Companies::all();
        return view('companies', ['companies'=>$class]);
    }
}
