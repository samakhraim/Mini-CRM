<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('employee.create', compact('companies'));
    }

    public function store(EmployeeRequest $request)
    {
        Employee::create($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Employee added successfully.');
    }

    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employee.edit', compact('employee', 'companies'));
    }

    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully.');
    }
}
