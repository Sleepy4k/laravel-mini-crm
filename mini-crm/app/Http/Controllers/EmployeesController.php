<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(){
        $class = Employees::all();
        return view('employees/employees', ['employees'=>$class]);
    }
    
    public function add(){
        return view('employees.add');
    }

    public function save(Request $request){
        Employees::create($request->all());
        return redirect('/employees');
    }

    public function getdata($id){
        $data = Employees::find($id);
        return view('employees.editform', compact('data'));
        //dd($data);
    }
    public function edit(Request $request, $id){
        $data = Employees::find($id);
        $data->update($request->all());
        return redirect('/employees')->with('success','Data Berhasil Diupdate');
    }

    public function delete($id){
        $data = Employees::find($id);
        $data->delete();
        return redirect('/employees')->with('success','Data Berhasil Dihapus');
    }
}
