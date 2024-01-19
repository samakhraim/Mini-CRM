<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller 
{
    public function index()
    {
        $companies = Company::all(); 
        return view('company.index', compact('companies'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email:rfc|max:255',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=100,min_height=100',
        ]);
    
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
    
            $dimensions = getimagesize($logo->path());
            $minWidth = 100;
            $minHeight = 100;
    
            if ($dimensions[0] < $minWidth || $dimensions[1] < $minHeight) {
                return redirect()->back()->withErrors(['logo' => 'The logo must be at least 100x100 pixels.'])->withInput();
            }
    
            $logoPath = $logo->storeAs('public/logos', $logo->getClientOriginalName());
            
        }
    
        Company::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'logo' => isset($logoPath) ? $logoPath : null,
        ]);
    
        return redirect()->route('companies.index')->with('success', 'Company created successfully!');
    }
    public function edit($id)
{
    $company = Company::findOrFail($id);
    return view('company.edit', compact('company'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'nullable|email:rfc|max:255',
        'website' => 'nullable|url|max:255',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=100,min_height=100',
    ]);

    $company = Company::findOrFail($id);

    if ($request->hasFile('logo')) {
        $logo = $request->file('logo');

     
        $company->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'logo' => isset($logoPath) ? $logoPath : null,
        ]);
    } else {
        $company->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
        ]);
    }

    return redirect()->route('companies.index')->with('success', 'Company updated successfully!');
}
public function destroy($id)
{
    $company = Company::findOrFail($id);

    if ($company->logo) {
        Storage::delete($company->logo);
    }

    $company->delete();

    return redirect()->route('companies.index')->with('success', 'Company deleted successfully!');
}

    
}
