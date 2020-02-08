<?php

namespace App\Http\Controllers;

use App\Companies;
use App\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validation(){
        $data = request()->validate([
            'firstName'=>'required|string',
            'lastName'=>'required|string',
            'email'=>'email|nullable',
            'phone'=>'regex:/^(01)[0125][0-9]{8}$/|nullable'
        ]);

        $data['companies_id']=Companies::where('name',Request('company'))->first()->id;
        return $data;
    }

    public function index(){
        $employees =Employees::paginate(10);
        return view('admin.Employees.index',[
            'employees'=>$employees
        ]);}

        public function employeeAdd(){
            $companies = Companies::all();
            return view('admin.Employees.employeeAdd',[
                'companies'=>$companies
            ]);
        }

    public function employeeStore(Request $request){
        Employees::create($this->validation());
        return redirect(route('employees'))->with('success','Employee added successfully ..');
    }

    public function employeeEdit(Employees $employee){
        $companies=Companies::all();
        return view('admin.Employees.employeeAdd',[
            'employee'=>$employee,
            'companies'=>$companies
        ]);
    }
    public function employeeUpdate(Request $request, Employees $employee){
        $employee->update($this->validation());
        return redirect(route('employees'))->with('success','Employee updated successfully ..');
    }

    public function delete(Employees $employee){
        try {
            $employee->delete();
        } catch (\Exception $e) {
        }
        return redirect(route('employees'))->with('success','Employee deleted successfully..');
    }
}
