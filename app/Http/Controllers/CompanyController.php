<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    private function handleLogoUpload(Request $request, $currentLogo = null)
    {
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');

            $dimensions = getimagesize($logo->path());
            $minWidth = 100;
            $minHeight = 100;

            if ($dimensions[0] < $minWidth || $dimensions[1] < $minHeight) {
                return redirect()
                    ->back()
                    ->withErrors(['logo' => 'The logo must be at least 100x100 pixels.'])
                    ->withInput();
            }

            $logoPath = $logo->storeAs('public/logos', $logo->getClientOriginalName());

            if ($currentLogo) {
                Storage::delete($currentLogo);
            }

            return $logoPath;
        }

        return $currentLogo;
    }

    public function index()
    {
        $companies = Company::all();
        return view('company.index', compact('companies'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(CompanyRequest $request)
    {
        $logoPath = $this->handleLogoUpload($request);

        Company::create(array_merge($request->validated(), ['logo' => $logoPath]));

        return redirect()->route('companies.index')->with('success', 'Company created successfully!');
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('company.edit', compact('company'));
    }

    public function update(CompanyRequest $request, $id)
    {
        $company = Company::findOrFail($id);
        $logoPath = $this->handleLogoUpload($request, $company->logo);

        $company->update(array_merge($request->validated(), ['logo' => $logoPath]));

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
