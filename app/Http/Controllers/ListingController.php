<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Show all listings
    public function index()
    {

        return view('listings.index', [
            'heading' => 'Latest Listings',
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(2)
        ]);
    }

    // Single Listings
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing

        ]);
    }

    // Show Create Form
    public function create()
    {
        return view('listings.create');
    }

    // STore Listing Data
    public function store(Request $request)
    {

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            // 'website' => 'required',
            // 'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);



        if ($request->hasFile('logo')) {

            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Listing::create($formFields);

        return redirect('/')->with('message', 'Job Created Successfully!');
    }

    //show edit form
    public function edit(Listing $listing)
    {

        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            // 'website' => 'required',
            // 'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'


        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return redirect('/')->with('message', 'Listing Updated Successfully!');
    }

    //Delete Listing
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted succesfully');
    }
}
