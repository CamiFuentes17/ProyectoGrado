<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Requisition;
use App\Models\Country;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // $requestMonth = isset($request->month) ? $request->month : Carbon::now()->month;
        $requestMonth = isset($request->month) ? $request->month : null;
        $monthNumber  = isset($request->month) ? $request->month : Carbon::now()->month;
        $totalRequisitions = null;
        if (!session('user')){return redirect('/logout');}
        $requisitionsCounts = [
            'totalRequisitions'=> Requisition::where('status', 'Pendiente')->count(),
            'inProgressRequisitions'=> Requisition::where('status', 'En Proceso')->count(),
            'closedRequisitions'=> Requisition::where('status', 'Cerrado')->count(),
            'returnedRequisitions'=> Requisition::where('status', 'Devuelto')->count(),
        ];

        // Si es un usuario tech lead contar las aprobaciones revisadas por QA
        // if(session('user')->role_id ==3){
        //     $totalRequisitions = $totalRequisitions->where('status_id',1);
        // }

        return view('dashboard')->with([
            'requisitions' => Requisition::all(),
            'requisitionsCounts'=> $requisitionsCounts,
            'dataChart'=> array_values($requisitionsCounts),
            'userSession' => session('user'),
            'totalRequisitions' =>  Requisition::whereMonth('requisitions.created_at', $monthNumber)->count(),
        ]);
    }


    private function nameMoth($monthNumber)
    {
        $months = [
            1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
        ];
        return  $months[$monthNumber];
    }

    private function uniqueMonths()
    {
        $months = Requisition::selectRaw("DISTINCT MONTH(created_at) as month")
        ->orderBy("month")
        ->pluck("month");

    $monthNames = [
        1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
    ];

    $uniqueMonths = $months->map(function ($monthNumber) use ($monthNames) {
        return  [
            'month' => $monthNumber,
            'name' => $monthNames[$monthNumber]
        ];
    });
//dd($uniqueMonths);
    return $uniqueMonths ;

    }

}
