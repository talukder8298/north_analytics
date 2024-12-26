<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{

    public function index()
    {
        $countries = Country::all();  
        return view('backend.pages.countries', compact('countries'));  
    }

    // Store a newly created country
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'note'   => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);
    
        // Create the new country record
        Country::create([
            'name'   => $validated['name'],
            'note'   => $validated['note'],
            'status' => $request->has('status') ? 1 : 0, 
        ]);
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Country added successfully!');
    }

    public function edit($id)
    {

        $country = Country::findOrFail($id);
        return response()->json($country);  
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'note'   => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);
    

        $country = Country::findOrFail($id);
        $country->update([
            'name'   => $validated['name'],
            'note'   => $validated['note'],
            'status' => $request->has('status') ? 1 : 0,  
        ]);
    
        return redirect()->route('countries.index')->with('success', 'Country updated successfully!');
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return redirect()->route('countries.index')->with('success', 'Country deleted successfully!');
    }

}
