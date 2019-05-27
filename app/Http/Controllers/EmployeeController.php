<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($companyId)
    {
        $employees = DB::table('employees')->where('company', $companyId)->paginate(10);

        return view('employee.index', ['employees' => $employees]);
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

        // Note: Explicit is better than implicit in this case for use of the 'id'
        // TODO: Could visit this again... where('id', $request->id)
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
        $employee = Employee::where($id)->firstOrFail();

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
