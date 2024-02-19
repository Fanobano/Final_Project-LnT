<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployController extends Controller
{
    public function homePage(){
        $employee = Employee::all(); 
        return view('Employee.Home')->with('employee', $employee);
    }
    


    public function viewPage(){
        $employees = Employee::all();
        return view('Employee.View')->with('employees', $employees);
    }

    public function addPage(){
        return view('Employee.Add');
    }

    public function store(Request $request, Employee $employee){
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:20',
            'age' => 'required|integer|min:18',
            'address' => 'required|min:10|max:40',
            'phone' => 'required'
        ]);
    
        Employee::create([
            'name' => $request->name,
            'age' => $request->age,
            'address' => $request->address,
            'phone' => $request->phone
        ]);
    
        return redirect()->route('viewPage')->with('success', 'Employee added successfully');
    }

    public function editPage($id){
        $employee = Employee::findOrFail($id);

        return view('Employee.Edit')->with('employee', $employee);
    }

    public function updateEmployee($id, Request $request){
    $request->validate([
        'name' => 'required|min:5|max:20',
        'age' => 'required',
        'address' => 'required|min:10|max:40',
        'phone' => 'required'
    ]);

    Employee::findOrFail($id)->update([
        'name' => $request->name,
        'age' => $request->age,
        'address' => $request->address,
        'phone' => $request->phone
    ]);

    return redirect()->route('viewPage')->with('success', 'Employee updated successfully');
    }

    public function deleteEmployee($id){
        Employee::destroy($id);

        return redirect(route('viewPage'));
    }
}
