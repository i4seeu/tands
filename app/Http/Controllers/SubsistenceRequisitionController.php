<?php

namespace App\Http\Controllers;

use App\SubsistenceRequisition;
use Illuminate\Http\Request;
use Auth;
class SubsistenceRequisitionController extends Controller
{
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
          $requisitions = Auth::user()->subsistenceRequisitions()->get();
      }
      else if(Auth::user()->hasRole('System Administrator'))
      {
          $requisitions = SubsistenceRequisition::all();
      }


      return view('subsistencerequisitions.index',compact('requisitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('subsistencerequisitions.create');
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
      $transport_requisition = SubsistenceRequisition::create([
        'description'    => $request['description'],
        'no_days'     => $request['no_days'],
        'allowance_scale'    => $request['allowance_scale'],
        'from_date' => $request['from_date'],
        'to_date' => $request['to_date'],
        'user_id'  => $user_id,
      ]);
      return redirect()->route('subsistencerequisitions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubsistenceRequisition  $subsistenceRequisition
     * @return \Illuminate\Http\Response
     */
    public function show(SubsistenceRequisition $subsistenceRequisition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubsistenceRequisition  $subsistenceRequisition
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $requisition =SubsistenceRequisition::findOrFail($id);
      return view('subsistencerequisitions.edit', compact('requisition')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubsistenceRequisition  $subsistenceRequisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      SubsistenceRequisition::findOrFail($id)->update([
        'description'    => $request['description'],
        'no_days'     => $request['no_days'],
        'allowance_scale'    => $request['allowance_scale'],
        'from_date' => $request['from_date'],
        'to_date' => $request['to_date'],
      ]);
      return redirect()->route('subsistencerequisitions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubsistenceRequisition  $subsistenceRequisition
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      SubsistenceRequisition::findOrFail($id)->delete();
      return redirect()->route('subsistencerequisitions');
    }
}
