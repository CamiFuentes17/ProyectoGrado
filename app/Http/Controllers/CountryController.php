<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!session('user')){return redirect('/logout');}
        $countries = Country::all();
        return view('countries')->with([
            'countries' => $countries,
            'userSession'  => session('user'),
        ]);
    }

    public function create()
    {
        return view('country_create')->with([
            'userSession'  => session('user'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'ISO' => 'required',
        ]);
        
        Country::create($request->all());
        return redirect()->route('countries.index')
                        ->with('success','Countrie created successfully.');
    }


    public function edit(Country $country)
    {
        return view('country_edit')->with([
            'country' => $country,
            'userSession'  => session('user'),
        ]);

    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name' => 'required',
            'ISO' => 'required',
        ]);
    
        $country->update($request->all());
    
        return redirect()->route('countries.index')
                        ->with('success','Country updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('countries.index')
                        ->with('success','Country deleted successfully');
    }

}
