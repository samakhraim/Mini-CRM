<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company; 
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        $employees = Employee::all(); 
        return view('employee.index', compact('employees'));
        
    }
    public function create()
{
    $companies = Company::all(); // Fetch the companies to pass to the view.
    return view('employee.create', compact('companies'));
}

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => [
                'nullable',
                'string',
                'email',
                'max:255',
                Rule::unique('employees')->where(function ($query) use ($request) {
                    return $query->where('company_id', $request->company_id);
                }),
            ],
            'phone' => [
                'nullable',
                'string',
                'regex:/^([0-9\s\-\+\(\)]*)$/',
                'min:10',
                'max:15',
                Rule::unique('employees')->where(function ($query) use ($request) {
                    return $query->where('company_id', $request->company_id);
                }),
            ],
            'company_id' => 'required|exists:companies,id',
        ]);
        Employee::create($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Employee added successfully.');
    }

    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employee.edit', compact('employee', 'companies'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('employees')->where(function ($query) use ($request, $employee) {
                    return $query->where('company_id', $request->company_id)
                        ->whereNotIn('id', [$employee->id]);
                }),
            ],
            'phone' => [
                'nullable',
                'string',
                'regex:/^([0-9\s\-\+\(\)]*)$/',
                'min:10',
                'max:15',
                Rule::unique('employees')->where(function ($query) use ($request, $employee) {
                    return $query->where('company_id', $request->company_id)
                        ->whereNotIn('id', [$employee->id]);
                }),
            ],
            'company_id' => 'required|exists:companies,id',
        ]);

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
