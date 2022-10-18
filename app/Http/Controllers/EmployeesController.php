<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use App\Models\Employees;
use Illuminate\Support\Facades\Storage;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')){
            $class = Employees::where('first_name','LIKE', '%' .$request->search. '%')-> paginate(10);
            }else{
            $class = Employees::paginate(10);    
            }
    
            return view('employees/employees', ['employees'=>$class]);
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
        return redirect('/employees')->with('success','Data Berhasil Diupdate');
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
        return redirect('/employees')->with('success','Data Berhasil Dihapus');
    }
}
