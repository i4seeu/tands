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
        $request->user()->authorizeRoles(['Member','System Administrator']);
        if (Auth::user()->hasRole('Member'))
        {
            $requisitions = Auth::user()->transportRequisitions()->get();
        }
        else if(Auth::user()->hasRole('System Administrator'))
        {
            $requisitions = TransportRequisition::all();
        }


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
          $this->validate($request,[
             'date_required'        => 'date_format:Y-m-d|after:today',
             'time_back'          => 'date_format:Y-m-d|after:yesterday',
          ]);
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
      /**
       * Show the form for editing the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {
        $requisition =TransportRequisition::findOrFail($id);
        $car_types = CarType::pluck('name', 'id');
        return view('requisitions.edit', compact('requisition','car_types')) ;
      }
      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request, $id)
      {
        $this->validate($request,[
           'date_required'        => 'date_format:Y-m-d|after:today',
           'time_back'          => 'date_format:Y-m-d|after:yesterday',
        ]);
        TransportRequisition::findOrFail($id)->update([
          'contact_no'     => $request['contact_no'],
          'description'    => $request['description'],
          'car_type_id'     => $request['car_type_id'],
          'no_passengers'    => $request['no_passengers'],
          'date_required' => $request['date_required'],
          'time_out' => $request['time_out'],
          'time_back' => $request['time_back'],
        ]);
        return redirect()->route('requisitions');
      }

}
