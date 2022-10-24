<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use App\Models\Employees;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('employees_url', request()->fullUrl());
    
        return view('employees.employees', ['employees'=>Employees::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.add', [
            'companies'=>Companies::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'companies_id' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable'
        ]);

        Employees::create($request->all());
        Alert::success('Berhasil', 'Data Telah Diinput');
        return redirect('/employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $data = Employees::find($id);
        return view('employees.editform', compact('data'), [
            'companies' => Companies::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validateData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'companies_id' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable'
        ]);

        $data = Employees::find($id);
        $data->update($validateData);

        Alert::success('Data Masuk', 'Data Berhasil Diubah');
        if(session('employees_url')){
            return redirect(session('employees_url'));
        }
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Employees::find($id);
        $data->delete();

        Alert::success('Success', 'Data Berhasil Dihapus');
        return redirect()->back();

    }
}
