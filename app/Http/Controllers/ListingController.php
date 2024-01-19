<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{


    public function index()
    {

        return view('listings.index', ['listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(5)]);
    }

    public function show(Listing $listing)
    {
        return view('listings.show', ['listing' => $listing]);
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        // dd($request->file('logo'));
        $formFields = $request->validate([
            'title'    => 'required',
            'company'  => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website'  => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public'); // 'logos' is the sub-folder and 'public' is the main folder
        }

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing successfully created...!');
    }
}
