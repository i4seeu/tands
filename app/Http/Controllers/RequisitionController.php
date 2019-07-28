<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarType;
use App\TransportRequisition;
use Auth;
class RequisitionController extends Controller
{

      /**
       * Create a new controller instance.
       *
       * @return void
       */
      public function __construct()
      {
          $this->middleware('auth');
      }
        /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index(Request $request)
      {
        $request->user()->authorizeRoles(['Head of Department','Member']);
        $requisitions = TransportRequisition::all();
        return view('requisitions.index',compact('requisitions'));
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create(Request $request)
      {
        $car_types = CarType::pluck('name', 'id');
        return view('requisitions.create',compact('car_types'));
      }

      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {
          $user_id = Auth::user()->id;
          $transport_requisition =TransportRequisition::create([
            'contact_no'     => $request['contact_no'],
            'description'    => $request['description'],
            'car_type_id'     => $request['car_type_id'],
            'no_passengers'    => $request['no_passengers'],
            'date_required' => $request['date_required'],
            'time_out' => $request['time_out'],
            'time_back' => $request['time_back'],
            'user_id'  => $user_id,
          ]);
          return redirect()->route('requisitions');
      }

}
