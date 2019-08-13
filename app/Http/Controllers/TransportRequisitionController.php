<?php

namespace App\Http\Controllers;

use App\TransportRequisition;
use Illuminate\Http\Request;
use App\User;
use Auth;

class TransportRequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransportRequisition  $transportRequisition
     * @return \Illuminate\Http\Response
     */
    public function show(TransportRequisition $transportRequisition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransportRequisition  $transportRequisition
     * @return \Illuminate\Http\Response
     */
    public function edit(TransportRequisition $transportRequisition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransportRequisition  $transportRequisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransportRequisition $transportRequisition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransportRequisition  $transportRequisition
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      TransportRequisition::findOrFail($id)->delete();
      return redirect()->route('requisitions');
    }

    public function inbox(Request $request)
    {
        $request->user()->authorizeRoles(['Head of Department','Transport Officer']);
        if (Auth::user()->hasRole('Head of Department'))
        {
            $department_id = Auth::user()->department_id;
            $users = User::where('department_id',$department_id)->pluck('id');
            $requisitions = TransportRequisition::where('current_stage',1)->whereIn('user_id',$users)->get();
            return view('transportrequisitions.inbox',compact('requisitions'));
        }
        else if(Auth::user()->hasRole('Transport Officer'))
        {
            $requisitions = TransportRequisition::where('current_stage',2)->get();
            return view('transportrequisitions.inbox',compact('requisitions'));
        }

    }
    public function outbox(Request $request)
    {
       $request->user()->authorizeRoles(['Head of Department','Transport Officer']);
       if (Auth::user()->hasRole('Head of Department'))
       {
           $department_id = Auth::user()->department_id;
           $users = User::where('department_id',$department_id)->pluck('id');
           $requisitions = TransportRequisition::whereIn('current_stage',[2,3])->whereIn('user_id',$users)->get();
           return view('transportrequisitions.outbox',compact('requisitions'));
       }
       else if(Auth::user()->hasRole('Transport Officer'))
       {
           $requisitions = TransportRequisition::where('current_stage',3)->get();
           return view('transportrequisitions.outbox',compact('requisitions'));
       }
    }
    public function approve(Request $request,$id)
    {
      $request->user()->authorizeRoles(['Head of Department','Transport Officer']);
      $requisition = TransportRequisition::findOrFail($id);
      $stage = $requisition->current_stage + 1;
      TransportRequisition::findOrFail($id)->update([
        'current_stage' => $stage,
      ]);
      return redirect()->route('requisitions.inbox');
    }
}
