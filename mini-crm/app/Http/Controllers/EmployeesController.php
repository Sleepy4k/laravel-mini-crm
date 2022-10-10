<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(){
        $class = Employees::all();
        return view('employees', ['employees'=>$class]);
    }
}
