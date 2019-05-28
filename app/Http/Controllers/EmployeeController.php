<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($companyId)
    {
        $employees = Employee::where('company_id', $companyId)->paginate(10);

        return view('employees.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company' => 'string',
            'email' => 'email',
            'phone' => 'phone'
        ]);

        /** @var Employee $employee */
        $employee = Employee::where('id', $request->id)->firstOrFail();

        $employee->forceFill($input);

        $employee->save();

        return view('employee.show')->with('message', 'Employee updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Employee::where($id)->firstOrFail();

        return view('employee.show', compact(
            'first_name',
            'last_name',
            'company',
            'email',
            'phone'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($companyId, $employee)
    {
        $employee = Employee::where('id', $employee)->firstOrFail();

        return view('employees.edit')->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $companyId, $employeeId)
    {
        $input = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company' => 'string',
            'email' => 'email',
            'phone' => 'string'
        ]);

        /** @var Employee $employee */
        $employee = Employee::where('id', $employeeId)->firstOrFail();

        $employee->forceFill($input);

        $employee->save();

        return view('employees.edit', ['message', 'Employee updated', 'employee', $employee]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $employeeId)
    {
        Employee::destroy($employeeId);

        return redirect()->route('employees.index');
    }
}
