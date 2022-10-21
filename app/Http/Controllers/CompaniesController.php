<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;



class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index(Request $request)
    {
        if ($request->has('search')){
            $class = Companies::where('name','LIKE', '%' .$request->search. '%')-> paginate(10);
            Session::put('companies_url', request()->fullUrl());
        }
        else{
            $class = Companies::paginate(10);    
            Session::put('companies_url', request()->fullUrl());
        }

        return view('companies.companies', ['companies'=>$class]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('companies.add');
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
            'name' => 'required',
            'email' => 'nullable',
            'logo' => 'image|mimes:jpeg,png,jpg|max:1024',
            'website' => 'nullable'
        ]);

        if($request->file('logo')){
            $validateData['logo'] = $request->file('logo')->store('logo');
        }

        Companies::create($validateData);
        Alert::success('Data Masuk', 'Data Berhasil Ditambahkan');
        return redirect()->route('companies.index');
        
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
    public function edit($id)
    {        
        $data = Companies::find($id);
        return view('companies.editform', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Companies $companies, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'nullable',
            'logo' => 'file|mimes:jpeg,png,jpg|max:1024',
            'website' => 'nullable'
        ];

        $validateData = $request->validate($rules);

        if ($request->file('logo')) {
            if($request->oldLogo){
                Storage::delete($request->oldLogo);
            }
            $validateData['logo'] = $request->file('logo')->store('logo');
        }
        
        $data = Companies::where('id', $id)->update($validateData);
        
        Alert::success('Data Diubah', 'Data Berhasil Diubah');
        if(session('companies_url')){
            return redirect(session('companies_url'));
        }
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Companies::find($id);
        if($data->logo){
            Storage::delete($data->logo);
        }
        $data->delete();

        Alert::success('Data Terhapus', 'Data Berhasil Dihapus');
        return redirect()->back();
    }

}

