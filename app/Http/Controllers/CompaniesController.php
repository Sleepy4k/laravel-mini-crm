<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use Illuminate\Support\Facades\Storage;


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
            }else{
            $class = Companies::paginate(10);    
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
            'logo' => 'file|mimes:jpeg,png,jpg|max:1024',
            'website' => 'nullable'
        ]);

        if($request->file('image')){
            $validateData['logo'] = $request->file('image')->store('logo');
        }

        Companies::create($validateData);
        return redirect('/companies');
        return redirect()->route('index');
        //

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
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'logo' => 'file|mimes:jpeg,png,jpg|max:1024',
            'website' => 'required'
        ]);

        if ($request->file('logo')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['logo'] = $request->file('logo')->store('logo');
        }
        $data = Companies::find($id);
        $data->update($validateData);
        return redirect()->back()->with('success','Data Berhasil Diupdate');
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
        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}
