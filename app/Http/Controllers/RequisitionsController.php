<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Models\Requisition;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class RequisitionsController extends Controller
{

    public function index()
    {
        if (!session('user')){return redirect('/logout');}

        $role_id = session('user')->role_id;
        $requisitions = Requisition::where('active',1)
        ->with(['userRequisition' => function ($query) {
            $query->select('id', 'name');
        }]);

        if( $role_id !=1){ // si es admin traer todas las aprobaciones
            //$requisitions = Requisition::where('user_id',session('user')->id)->orderBy('id','DESC')->get();
            $requisitions = Requisition::all();
        }else{
            $requisitions = Requisition::all();
        }

        return view('requisitions')->with([
            'requisitions' => $requisitions,
            'userSession'  => session('user'),
        ]);
    }

    public function show(Request $request)
    {
        if (!session('user')){return redirect('/logout');}

        $requisition = Requisition::where('id',$request->id)
        ->with(['userRequisition' => function ($query) {
            $query->select('id', 'name');
        }])->first();

        $user = session('user');
        if ($user->role_id == 2){
            Requisition::where('id',$request->id)->update([
                'status' => "En Proceso" 
            ]);        
        }
        return view('requisitionDetail')->with([
            'userSession' => session('user'),
            'requisition' => $requisition,
        ]);

        return $requisition;
    }

    public function requisitionForm()
    {
        if (!session('user')){return redirect('/logout');}

        return view('requisitionForm')->with([
            'userSession'     => session('user'),
        ]);
        return view('requisitionForm');
    }

    public function store(Request $request)
    {
       
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('uploads', 'public');
        }
        
        $requisitionCreate = Requisition::firstOrCreate([
            'name'                  => $request->name,
            'user_id'               => $request->user_id,
            'status'                => isset($request->status) ? $request->status: 'Pendiente',
            'area'                  => isset($request->area) ? $request->area: Null,
            'requisition_type'      => isset($request->requisition_type) ? $request->requisition_type: Null,
            'deliverable_type'      => isset($request->deliverable_type) ? $request->deliverable_type: Null,
            'deliverable_date'      => isset($request->deliverable_date) ? $request->deliverable_date: Null,
            'safety_approval_file'  => isset($path) ? $path : null, 
            'periodicity'           => isset($request->periodicity) ? $request->periodicity : null,
            'database'              => isset($request->database) ? $request->database : null,
            'report_fields'         => isset($request->report_fields) ? $request->report_fields : null,
            'description'           => isset($request->description) ? $request->description : null,
        ]);

        if($requisitionCreate){
            // Guardar en el calendario incrementando de a un mes segun la periodicidad
            if(isset($request->periodicity) && $request->periodicity >= 1){
                $periodicity = intval($request->periodicity);
                $date = Carbon::create($request->deliverable_date);
                for ($i=0; $i < $periodicity  ; $i++) { 
                    Calendar::create([
                        'requisitions_id' => $requisitionCreate->id,
                        'title' => $requisitionCreate->name,
                        'start' => $date,
                        'end' => $date,
                        'allDay' => true,
                        'url' => $requisitionCreate->id,
                        'color' => "blue"
                    ]);
                $date = $date->addMonth();
                }
            }
        }

        return view('requisitions')->with([
            'requisitions' => Requisition::all(),
            'userSession'  => session('user'),
            'newCode'      => '#-'.$requisitionCreate->id,
            'showCode'     =>  1,
        ]);

    }

    public function searchRequisition(Request $request){

        $requisition = Requisition::where('id',$request->id)->with(['userRequisition' => function ($query) {
            $query->select('id', 'name');
        }])
        ->with(['userTechLead' => function ($query) {
            $query->select('id', 'name');
        }])
        ->first();

        if($requisition){
            return view('searchRequisitionResult')->with([
                'requisition'=> $requisition,
            ]);
        }else{
            return view('searchRequisitionResult')->with([
                'error' => "No se encontró la aprobación con el código suministrado",
            ]);
        }
    }

    public function requisitionEdit(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('uploads', 'public');
        }

        if($request->devolver == "devolver"){
            Requisition::where('id',$request->id)->update([
                'status' => "Devuelto" 
            ]);   
        }else{
            Requisition::where('id',$request->id)->update([
                'safety_approval_file_detail' => isset($path) ? $path : null, 
                'description'                 => isset($request->description) ? $request->description : null,
                'status' => "Cerrado" 
            ]);
        }
        return redirect('requisitions')->with([
            'updateSuccess' => "updateSuccess",
        ]);
    }

}
