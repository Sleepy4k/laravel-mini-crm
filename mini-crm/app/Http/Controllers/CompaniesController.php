<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    public function index(Request $request){
        if ($request->has('search')){
        $class = Companies::where('name','LIKE', '%' .$request->search. '%')-> paginate(10);
        }else{
        $class = Companies::paginate(10);    
        }
        return view('companies.companies', ['companies'=>$class]);
    }

    public function add(){
        return view('companies.add');
    }

    public function save(Request $request){
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'logo' => 'file|mimes:jpeg,png,jpg|max:1024',
            'website' => 'required'
        ]);

        $validateData['logo'] = $request->file('logo')->store('logo');

        Companies::create($validateData);
        return redirect('/companies');
    }

    public function getdata($id){
        
        $data = Companies::find($id);
        return view('companies.editform', compact('data'));
    }
    public function edit(Request $request, $id){
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
        return redirect('/companies')->with('success','Data Berhasil Diupdate');
    }

    public function delete($id){
        $data = Companies::find($id);
        if($data->logo){
            Storage::delete($data->logo);
        }
        $data->delete();
        return redirect('/companies')->with('success','Data Berhasil Dihapus');
    }

}
