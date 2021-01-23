<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Hash;
use App\Employee;
use App\Address;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(6);

        return view('pages.employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.employees.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\EmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        //First we need to create a new address column
        //We will need the id of the newly created address to be 
        //Inserted into the employees table
        $address = new Address();
        $address->city = $request->input('employeeCity');
        $address->street = $request->input('employeeStreet');
        $address->post_code = $request->input('employeePostcode');
        $address->save();

        //Get the id of the newly created address
        $address_id = Address::select('id')->max('id');
        
        //New employee object from the model
        //This will represent the employees table from the database
        //And we will fill in the new employee column with values from inputs
        $emp = new Employee();
        $emp->address_id = $address_id;
        $emp->name = $request->input('employeeName');
        $emp->surname = $request->input('employeeSurname');
        $emp->email = $request->input('employeeEmail');
        $emp->password = Hash::make($request->input('employeePassword'));
        $emp->type = $request->input('types');
        $emp->salary = $request->input('employeeSalary');
        $emp->start_date = Carbon::now()->toDateTimeString();
        $emp->save();

        return redirect("/employee/create")->with("success", 'Employee added successfuly');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('pages.employees.edit')->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\EmployeeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $emp = Employee::findOrFail($id);

        $emp->name = $request->input('employeeName');
        $emp->surname = $request->input('employeeSurname');
        $emp->email = $request->input('employeeEmail');
        $emp->password = Hash::make($request->input('employeePassword'));
        $emp->type = $request->input('types');
        $emp->salary = $request->input('employeeSalary');

        //Save the new values to db
        $emp->save();
        
        //Updated the address table which belongsTo employee
        $emp->address()->update([
            'city' => $request->input('employeeCity'),
            'street' => $request->input('employeeStreet'),
            'post_code' => $request->input('employeePostcode')
        ]);

        return redirect("/employee")->with("success", 'Employee updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find the address id of the employee we are deleting
        $address_id = Employee::select('address_id')->where('id', $id)->first();

        //Get the address we will delete
        $address = Address::find($address_id);

        //Check that we are not trying to delete yourself
        if(auth()->user()->$id != $id) {
            //Check incase no employee or address was found
            if($address != null || $address != false) {
                $address->each->delete();
                return redirect('employee')->with('success', 'Employee deleted successfuly');
            }
            else return redirect('employee')->with('success', 'Employee was not found');
        }
        else return redirect('employee')->with('success', 'You cant delete yourself');
    }
}
