<?php

namespace App\Http\Controllers;

use App\Companies;
use App\Notifications\CompanyAdded;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validation(){
        $data = request()->validate([
            'name'=>'required',
            'email'=>'email|nullable',
            'logo'=>'dimensions:min_width=100,min_height=100',
            'website'=>'nullable'
        ]);
        if(request()->hasFile('logo')){
            $data['logo']=request()->file('logo')->store('CompaniesLogos','public');
        }
        return $data;
    }

    public function index(){
        $companies =Companies::paginate(10);
        return view('admin.Companies.index',[
            'companies'=>$companies
        ]);
    }

    public function companyAdd(){
        return view('admin.Companies.companyAdd');
    }

    public function companyStore(Request $request){

        $company = Companies::create($this->validation());
        $user = User::first();
        $user->notify(new CompanyAdded($company));
        return redirect(route('companies'))->with('success','Company added successfully ..');
    }

    public function companyEdit(Companies $company){
        return view('admin.Companies.companyAdd',[
            'company'=>$company
        ]);
    }

    public function companyUpdate(Request $request, Companies $company){
        $company->update($this->validation());
        return redirect(route('companies'))->with('success','Company updated successfully ..');
    }
    public function delete(Companies $company){
        try {
            $company->delete();
        } catch (\Exception $e) {
        }
        return redirect('/companies')->with('success','Company deleted successfully..');
    }
}
