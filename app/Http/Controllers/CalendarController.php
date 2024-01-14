<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\{Calendar, Requisition};

class CalendarController extends Controller
{

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!session('user')){return redirect('/logout');}
        //$eventsCalendar =  Calendar::all();
        $requisitions = Requisition::all();
        return view('calendar')->with([
            'userSession'  => session('user'),
            'requisitions'  => $requisitions,
        ]);
    }

    public function eventsCalendar()
    {
        $response =  Calendar::all();
        return response()->json($response, Response::HTTP_OK);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!session('user')){return redirect('/logout');}
        $countries = Calendar::all();
        return view('Requisition_create')->with([
            'userSession'  => session('user'),
            'countries' => $countries,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'Calendar_id' => 'required',
        ]);
    
        Requisition::create($request->all());
        return redirect()->route('Requisitions.index')
                        ->with('success','Requisition created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requisition  $Requisition
     * @return \Illuminate\Http\Response
     */
    public function show(Requisition $Requisition)
    {
        return view('Requisitions.show',compact('Requisition'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requisition  $Requisition
     * @return \Illuminate\Http\Response
     */
    public function edit(Requisition $Requisition)
    {
        if (!session('user')){return redirect('/logout');}
        $countries = Calendar::all();
        return view('Requisition_edit')->with([
            'Requisition' => $Requisition,
            'countries' => $countries,
            'userSession'  => session('user'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Calendar  $Requisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requisition $Requisition)
    {
        $request->validate([
            'name' => 'required',
            'Calendar_id' => 'required',
        ]);
    
        $Requisition->update($request->all());
    
        return redirect()->route('Requisitions.index'); 
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requisition  $Requisition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requisition $Requisition)
    {
        $Requisition->delete();
    
        return redirect()->route('Requisitions.index')
                        ->with('success','Requisition deleted successfully');
    }


    public function RequisitionsCalendar($Calendar_id)
    {
        return Requisition::where('Calendar_id',$Calendar_id)->get();
    }
}
